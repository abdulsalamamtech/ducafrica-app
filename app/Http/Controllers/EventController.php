<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PaymentController;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\BookedEvent;
use App\Models\Center;
use App\Models\Event;
use App\Models\EventType;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\UserInstallment;
use App\Models\UserInstallmentPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * [Admin] Display a listing of the resource.
     */
    public function index()
    {

        // Search for events
        if(request()->filled('search')){
            $search = request()->validate([
                'search' => ['required','string']
            ]);
            $events = $this?->search($search);
        }
        else
        {
            $events = Event::with(['eventRoles'])->latest()->paginate(5);
        }

        $event_types = EventType::all();
        $centers = Center::all();
        $roles = Role::all();


        // $event->load(['eventRoles' => function ($query) use ($role) {
        //     $query->where('role_id', $role->id);
        // }]);
        // dd($events->eventRoles());

        return view('dashboard.pages.events.index', [
            'events' => $events,
            'event_types' => $event_types,
            'centers' => $centers,
            'roles' => $roles,
        ]);
    }


    /**
     * Search for events
     */
    private function search($search){
        
        $events = Event::whereAny([
            'added_by',
            'center_id',
            'event_type_id',
            'name',
            'description',
            'start_date',
            'end_date',
            'cost',
            'slots',
            'status',
            'contact_name',
            'contact_phone_number',
        ], 'like', '%' .$search['search'] .'%')
        ->with(['eventRoles'])
        ->latest()
        ->paginate()->withQueryString();

        return $events ?? null;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Event $event)
    {
        return $this->show($request, $event);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $data = $request->validated();

        $data['added_by'] = $request->user()->id;
        // return [$request->all(),  auth()->user()];

        // return $data;

        $event = Event::create($data);
        foreach ($data['event_roles'] as $roleId)
        {
            $event->eventRoles()->attach($roleId);
        }

        return redirect()
            ->route('events.index')
            ->with('success', 'event added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Event $event)
    {
        $event->load(['eventRoles']);

        // http://127.0.0.1:8000/events/8?trxref=soq9s7fxmf&reference=soq9s7fxmf
        // Verify payment transaction
        if ($request?->filled('trxref') && $request?->filled('reference')){
            $reference = $request->reference;
            $verify_payment = $this->verifyPayment($reference);
            $message = $verify_payment['message'];
            if($verify_payment['success']){
                $transaction = Transaction::where('reference', $reference)->first();
                if($transaction){
                    $transaction->payment_status = 'success';
                    $transaction->status = true;
                    $transaction->save();

                    // Confirm the booked event
                    // $user = Auth::user();
                    // $booked_event = BookedEvent::where('user_id', $user->id)
                    $booked_event = BookedEvent::where('user_id', $transaction->user_id)
                    ->where('event_id', $event->id)->first();

                    if ($booked_event) {
                        if($booked_event->payment_type == 'full_payment'){
                            $booked_event->paid = true;
                            $booked_event->status = true;
                            $booked_event->save();
                        }
    
                        // Confirm booked event for installment payments
                        if($booked_event->payment_type == 'installment' && $event->isPaid()){
                            $booked_event->paid = true;
                            $booked_event->status = true;
                            $booked_event->save();
                        }
                    }

                }
                // return redirect()->route('events.show', $event->id)
                //     ->with('success', $message);
                return redirect()->back()->with('success', $message);

            }
            // return redirect()->route('events.show', $event->id)
            //         ->with('error', $message);
            return redirect()->back()->with('error', $message);
        }

        return view('dashboard.pages.events.show', ['event' => $event]);

    }

    /**
     * Show the event details.
     */
    public function eventDetails(Event $event)
    {
        return view('dashboard.pages.events.details', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {

        $data = $request->validated();

        // return $data;
        $event->update($data);
        $event->eventRoles()->sync(array_values($data['event_roles']));

        return redirect()
            ->route('events.index')
            ->with('success', 'event updated successfully');
    }


    /**
     * Close an events
     */
    public function closeEvent(Request $request, Event $event)
    {


        // return $data;
        $event->status = false;
        $event->save();

        return redirect()
            ->route('events.index')
            ->with('success', 'event closed successfully');
    }

    /**
     * Open an events
     */
    public function openEvent(Request $request, Event $event)
    {


        // return $data;
        $event->status = true;
        $event->save();

        return redirect()
            ->route('events.index')
            ->with('success', 'event opened successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

    // Get the list of available events
    public function available()
    {

        // Get the logged in user
        $user = Auth::user();

        // $events = Event::where('slots', '>', 0)
        //     ->whereNotNull('status')
        //     ->where('end_date', '>=', now())
        //     ->with(['center'])
        //     ->latest()
        //     ->paginate(6);
        // return $events;


        // Search for events
        if(request()->filled('search')){
            $search = request()->validate([
                'search' => ['required','string']
            ]);
            $events = $this?->searchAvailableEvents($search);
        }
        else
        {
            // Get the available event available for the user role
            $events = Event::where('end_date', '>=', now())
                // ->where('start_date', '<=', now())
                ->where('slots', '>', 0)
                ->where('status', true)
                ->whereHas('eventRoles', function($role) {
                    $user = Auth::user();
                    $userRole = Role::where('name', $user?->activeRole())->first();
                    $role->Where('role_id', $userRole?->id);
                })
                ->with(['center', 'center.centerAsset'])
                ->latest()->paginate(9);
        }
        

            // $events = Event::all();
            // return($events);


        return view('dashboard.pages.events.available', [
            'events' => $events,
        ]);
    }

    // Search for available events
    private function searchAvailableEvents($search){
        $events = Event::whereAny([
            'added_by',
            'center_id',
            'event_type_id',
            'name',
            'description',
            'start_date',
            'end_date',
            'cost',
            'slots',
            'status',
            'contact_name',
            'contact_phone_number',
        ], 'like', '%' .$search['search'] .'%')
        ->where('end_date', '>=', now())
        // ->where('start_date', '<=', now())
        ->where('slots', '>', 0)
        ->where('status', true)
        ->whereHas('eventRoles', function($role) {
                $user = Auth::user();
                $userRole = Role::where('name', $user?->activeRole())->first();
                $role->Where('role_id', $userRole?->id);
            })
        ->with(['center', 'center.centerAsset'])
        ->latest()
        ->paginate(9);

        return $events ?? null;
    
    }



    // Book an event
    public function book(Event $event)
    {

        // Get the logged in user
        $user = Auth::user();

        if($user->role == 'admin'){
            return redirect()->back()->with('error', 'Login as user to book this event.');
        }

        // Check if user has already booked this event
        $booked_event = BookedEvent::where('user_id', $user->id)
            ->where('event_id', $event->id)->first();
        if ($booked_event) {
            return redirect()->route('events.show', $event->id)
                ->with('warnings', 'You have already booked this event.');
        }


        // Check if event is available
        if (!$event->isAvailable()) {
            return redirect()->route('available-events')
                ->with('error', 'Sorry, this event is not available.');
        }


        // Book the event
        $booked_event = BookedEvent::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'payment_type' => 'full_payment',
            'payment_amount' => $event->cost,
        ]);

        return redirect()->route('events.show', $event->id)
            ->with('success', 'You have successfully booked this event, please make payment to secure your slot.');


    }


    // Make full payment for a booked event
    public function makeFullPayment(Event $event)
    {

        // Get the logged in user
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login')->with('success', 'Please login!');
        }

        // If the event has been paid for
        if($event->isPaid()){
            return redirect()->route('events.show', $event->id)
                ->with('warnings', 'You have already successfully paid for this event.');
        }


        // Check if user has already booked this event
        $booked_event = BookedEvent::where('user_id', $user->id)
            ->where('event_id', $event->id)
            // ->where('paid', false)
            ->first();
        if (!$booked_event) {
            return redirect()->route('events.show', $event->id)
                ->with('error', 'You have not booked this event, go to available event and book for the event.');
        }


        // Get payment information
        $payment_data = [
            'amount' => $booked_event->payment_amount,
            'name' => $user?->first_name . ' ' . $user?->last_name,
            'email' => $user->email,
            'payment_id' => $booked_event->event->center->payment_id,
            'redirect_url' => url(route('events.show', $event->id))
        ];
        // Initiate payment using payment gateway API
        $paymentController = new PaymentController();
        $response = $paymentController->initiate($payment_data);

        // return $response;
        if (!$response['success']) {
            return redirect()->route('events.show', $event->id)
                ->with('error', 'Failed to initiate payment. Please try again later.');
        }


        // If payment initiation is successful, create a transaction record and redirect to payment gateway
        if($response['success'] && $response['authorization_url']) {
            // Add transitions record
            $payment = Transaction::create([
                'user_id' => $user->id,
                'booked_event_id' => $booked_event->id,
                'amount' => $booked_event->payment_amount,
                'reference' => $response['reference'],
                'payment_url' => $response['authorization_url'],
                'psp' => $response['gateway'] . ' full payment gateway',
                'currency' => 'NGN',
                'payment_status' => 'pending',
            ]);

            // Redirect to payment gateway
            return redirect($response['authorization_url']);
        }

        // return redirect()->back()->with('error', 'Server error, please try again later');

    }


    // Verify payment with reference number
    public function verifyPayment($reference){

        $transaction = Transaction::where('reference', $reference)
            ->first();

        // If transaction payment status is pending
        if($transaction?->payment_status != 'success'){

            $paymentController = new PaymentController();
            $response = $paymentController->verify($transaction->reference);

            if($response['success'] == 'true'){

                $transaction = Transaction::where('reference', $reference)->update([
                    'payment_status' => $response['data']['status']
                ]);

                // Verify amount paid
                // if($transaction->amount == ($response['data']['amount'] / 100)){
                // }

                $result = $response;
                $result['success'] = true;

            }
            else{
                $result['success'] = false;
                $result['message'] = 'Payment verification failed';
            }

        }else{
            $result['success'] = true;
            $result['message'] = 'Payment has already been verified';
        }

        return $result;
    }

    // Cancel booking for an event
    public function cancel(Event $event, BookedEvent $booked_event){
        // Check if user is the one who booked this event
        if($booked_event->user_id!= Auth::id()){
            return redirect()->route('events.show', $event->id)
                ->with('error', 'You are not authorized to cancel this booking.');
        }

        // Cancel the booking
        // $booked_event->cancel();

        return redirect()->route('events.show', $event->id)
            ->with('success', 'You have cancelled your booking for this event.');
    }


    // Get the list of booked events
    public function bookedEvents(){
        
        $user = Auth::user();

        // Search for events
        if(request()->filled('search')){
            $search = request()->validate([
                'search' => ['required','string']
            ]);
            $booked_events = $this?->searchBookedEvents($search);
        }
        else
        {
            $booked_events = BookedEvent::where('user_id', $user->id)
                ->with(['event', 'event.center'])
                ->latest()->paginate(5);
        }
        return view('dashboard.pages.events.booked', [
            'booked_events' => $booked_events,
        ]);
    }


    // Search booked events
    private function searchBookedEvents($search){

        $user = Auth::user();
        $booked_events = BookedEvent::whereAny([
            'user_id', 'event_id',
            'payment_type', 'approved_by',
            'payment_amount', 'status', 'paid',
        ], 'like', '%' .$search['search'] .'%')
        ->where('user_id', $user->id)
            ->with(['event', 'event.center'])
            ->latest()->paginate(5);

        return $booked_events ?? null;
    }


    // Make full payment for a booked event
    public function makeInstallmentPayment(Request $request, Event $event)
    {


        // return [$request->all(), $event];

        // Get the logged in user
        $user = Auth::user();

        // Check if user has already completed installment payment for this event
        if ($event->getPaymentDetails()['payment_status']){
            return redirect()->back()->with('success', 'You have successfully complete your installment payment for this event.');
        }

        // Check amount to be paid by user
        if(!$request->filled('amount_to_pay') || $request->amount_to_pay <= 0){
            return redirect()->back()->with('error', 'Enter an amount to pay for installment.');
        }


        // Check if payment has been successfully made
        if($event->isPaid()){
            return redirect()->route('events.show', $event->id)
                ->with('warnings', 'You have already successfully paid for this event.');
        }

        // Check if user has already booked this event
        $booked_event = BookedEvent::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->first();
        if (!$booked_event) {
            return redirect()->route('events.show', $event->id)
                ->with('error', 'You have not booked any events yet.');
        }

        // Check if user has already made installment payment for this event
        $userInstallment = UserInstallment::where('user_id', $user->id)
            ->where('booked_event_id', $booked_event->id)->first();

        // Check if the user installment payment is approved
        if (!$userInstallment->approved) {
            return redirect()->back()->with('error', 'Your installment payment request has not been approved.');
        }


        // Get payment information
        $payment_data = [
            // Amount to pay$request->amount_to_pay 
            // 'amount' => $booked_event->payment_amount,
            'amount' => $request->amount_to_pay,
            'name' => $user?->first_name . ' ' . $user?->last_name,
            'email' => $user->email,
            'payment_id' => $booked_event->event->center->payment_id,
            'redirect_url' => url(route('events.show', $event->id))
        ];
        // Initiate payment using payment gateway API
        $paymentController = new PaymentController();
        $response = $paymentController->initiate($payment_data);

        // return $response;

        if (!$response['success']) {
            return redirect()->route('events.show', $event->id)
                ->with('error', 'Failed to initiate payment. Please try again later.');
        }


        // If payment initiation is successful, create a transaction record and redirect to payment gateway
        if($response['success'] && $response['authorization_url']) {
            // Add transitions record
            $payment = Transaction::create([
                'user_id' => $user->id,
                'booked_event_id' => $booked_event->id,
                // amount_to_pay
                'amount' => $request->amount_to_pay,
                'reference' => $response['reference'],
                'payment_url' => $response['authorization_url'],
                'psp' => $response['gateway'] . ' installment payment gateway',
                'currency' => 'NGN',
                'payment_status' => 'pending',
            ]);


            // User installment
            // 'user_id',
            // 'booked_event_id',
            // 'approved_by',
            // 'approved',
            // 'amount','paid', 'balance',
            // 'settle'

            // User installment payment
            // 'user_id',
            // 'booked_event_id',
            // 'transaction_id',
            // 'user_installment_id'
            $user_installment_payment = UserInstallmentPayment::create([
                'user_id' => $user->id,
                'booked_event_id' => $booked_event->id,
                'transaction_id' =>  $payment->id,
                'user_installment_is' => $userInstallment->id,
            ]);

            // Redirect to payment gateway
            return redirect($response['authorization_url']);
        }

        // return redirect()->back()->with('error', 'Server error, please try again later');

    }


}
