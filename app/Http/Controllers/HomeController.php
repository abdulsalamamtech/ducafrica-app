<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Auth::logout();
        $message='';

        if($request->has('submit'))
        {
            $newMsaage=GuestMessage::create(
                [
                    'name'=>request('name'),
                    'email'=>request('email')??'',
                    'phone'=>request('phone')??'',
                    'subject'=>request('subject'),
                    'message'=>request('message')
                ]
            );
            if($newMsaage->save())
            {
                $message='Message Sent';

                Mail::to(env('CONTACT_MAIL'))->send(new ContactUsMail(request('name')??'', request('email')??'', request('subject')??'', request('message')??''));
            }
            else{
                $message='Could not send message';
            }
        }
        // return new JsonResponse([], 201);
        return view('homepages.home',['message'=>$message]);
    }

    public function registrationNotice()
    {
        // return new JsonResponse($id, 201);
        return view('auth.success-registration');
    }

    public function privacyPolicy()
    {
        return view('homepages.privacy-policy');
    }

    public function termsConditions()
    {
        return view('homepages.terms-and-conditions');
    }

    public function register()
    {
        return view('homepages.new-register');
    }

    public function login()
    {
        return view('homepages.new-login');
    }


    public function activateAccount($id)
    {
        $getAcc=AccountActivation::where('code','=',$id)->first();

        $user=User::find($getAcc->user_id);
        $user->verification_status='1';
        // $user->email_verified_at=getdate();
        $user->save();

        $updateActivate=AccountActivation::find($getAcc->id);
        $updateActivate->status='used';
        $updateActivate->save();


        // return new JsonResponse($id, 201);
        return view('auth.activation')->with(['message'=>'', 'user'=>$user->first_name]);
        // return view('homepages.home');
    }



    public function eventAutoNotify(Request $request)
    {


        $today=now()->toDateTimeString();
        $next7=now()->addDays(2)->toDateTimeString();

        // Between[$today,$next7];

        // dd(now()->addDays(2)->endOfDay()->toDateTimeString());
        // dd(now()->startOfDay()->toDateTimeString());

        $nextTwoEnd=now()->addDays(2)->endOfDay()->toDateTimeString();
        $nextTwoStart=now()->addDays(2)->startOfDay()->toDateTimeString();
        $events=Event::whereBetween('startDate', [$nextTwoStart,$nextTwoEnd])->get();

        $ev='';
        foreach ($events as $id => $event) {
            # code...
            // $ev.=$event->title;
            $getBooked=WaitList::where('event_id',$event->id)->where('status', 'waiting')->get();//
            // $ev.=$getBooked;

            foreach ($getBooked as $key => $booked) {
                # code...
                $ev.=$booked->user->first_name.': '.$booked->user->email;
                // Here we send email to each user that there are no available slots for this.
                try{
                        Mail::to($booked->user->email)->send(new WaitinNotification($booked->user->first_name, $event->title, url('/login')));
                    }
                    catch(Throwable $th)
                    {
                        $ev.=$th->getMessage();
                    }
            }
        }
        return ['users'=>$ev];
    }

}
