<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserInstallmentRequest;
use App\Http\Requests\UpdateUserInstallmentRequest;
use App\Models\BookedEvent;
use App\Models\Center;
use App\Models\Event;
use App\Models\Role;
use App\Models\UserInstallment;
use Illuminate\Http\Request;

class UserInstallmentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user_installments = UserInstallment::whereNot('approved_by', null)
            ->whereNot('approved_by', null)
            ->latest()->get();
        // $user_installments = UserInstallment::where('approved_by', '<', '1')->latest()->get();


        $centers = Center::all();
        $roles = Role::all();

        // dd($user_installments);
        return view('dashboard.pages.installments.index', [
            'user_installments' => $user_installments,
            'centers' => $centers,
            'roles' => $roles
        ]);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserInstallmentRequest $request)
    {
        $user = $request->user();
        $data = $request->validated();
        $data['user_id'] = $user->id;

        // Check if the event is available
        $event = Event::find($data['event_id']);
        if (!$event || !$event->isAvailable()) {
            return redirect()->back()->with('error', 'Sorry, this event is not available.');
        }

        // Check id user has already make payment
        // if ($event->isPaid()) {
        //     return redirect()->back()->with('warnings', 'You have paid for this event');
        // }


        // Check if user has booked this event
        $booked_event = BookedEvent::where('user_id', $user->id)
            ->where('event_id', $event->id)->first();
        if (!$booked_event) {
            return redirect()->back()->with('error', 'You have not booked this event yet.');
        }


        // Check if user has already made installment payment for this event
        $userInstallment = UserInstallment::where('user_id', $user->id)
            ->where('booked_event_id', $booked_event->id)->first();
        if ($userInstallment) {
            return redirect()->back()->with('error', 'You have already made installment payment request for this event.');
        }


        // Create a new installment payment request
        // 'user_id',
        // 'booked_event_id',
        // 'approved_by',
        // 'approved',
        // 'amount','paid', 'balance',
        // 'settle'
        // return [$data, $request->all(), $booked_event];

        $data['booked_event_id'] = $booked_event->id;
        $data['amount'] = $booked_event->payment_amount;
        $data['paid'] = 0;
        // $data['approved'] = false;
        $data['balance'] = $booked_event->payment_amount;


        // 'user_id',
        // 'booked_event_id',
        // 'approved_by',
        // 'approved',
        // 'amount','paid', 'balance',
        // 'settle'
        // return [$data, $request->all(), $booked_event];
        $userInstallment = UserInstallment::create($data);
        if($userInstallment){

            // Update the booking payment type
            $booked_event->payment_type = 'installment';
            $booked_event->save();

            // Send email notification to user
            // sendEmailNotification($user->email, 'Installment Payment Request', 'installment_payment_request', $data);

            return redirect()
                ->route('events.show', $data['event_id'])
                ->with('success', 'Installment payment request successfully sent, Please await email confirmation');


            return redirect()
                ->route('events.show', $data['event_id'])
                ->with('success', 'Installment payment request successfully sent, Please await email confirmation');
        }

        return redirect()->back()->with('error', 'Failed to send installment payment request. Please try again later.');

    }

    /**
     * Display the specified resource.
     */
    public function show(UserInstallment $userInstallment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserInstallment $userInstallment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserInstallmentRequest $request, UserInstallment $userInstallment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserInstallment $userInstallment)
    {
        //
    }



    public function request()
    {

        // $user_installments = UserInstallment::latest()->get();

        $user_installments = UserInstallment::whereNull('approved_by')->orWhere('approved', false)->latest()->get();

        $centers = Center::all();
        $roles = Role::all();

        // dd($user_installments);
        return view('dashboard.pages.installments.request', [
            'user_installments' => $user_installments,
            'centers' => $centers,
            'roles' => $roles
        ]);  
    }


    public function approve(Request $request, UserInstallment $userInstallment)
    {


        $user = $request->user();

        
        
        $accessible_roles = [\App\Enum\UserRoleEnum::SUPERADMIN, \App\Enum\UserRoleEnum::ADMIN, 'admin'];


        if(request()->user()->role !== \App\Enum\UserRoleEnum::ADMIN || 
            !in_array(request()->user()?->activeRole(), $accessible_roles)
        ){
            return redirect()->back()->with('error', 'You are not eligible to approve installment payment.');
        }
        
        // dd($userInstallment);

        $booked_event_id = $userInstallment->bookedEvent->id;

        $booked_event = BookedEvent::where('id', $booked_event_id)->first();
        if ($booked_event->payment_type !== 'installment') {
            return redirect()->back()->with('error', 'user has already made full payment request for this event.');
        }

        $userInstallment->approved = true;
        $userInstallment->approved_by = $user->id;
        $userInstallment->save();
        // Send email notification to user
        if (!$userInstallment) {
            return redirect()->back()->with('error', 'User installment payment request for this event, approval error, try again later.');
        }

        return redirect()->back()->with('success', 'User installment payment request approved.');
 
    }
}
