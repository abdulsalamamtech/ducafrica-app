<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Mail\AutomatedMessageResponseMail;
use App\Models\Message;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * [Admin] Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::with(['messageReplies.user'])->latest()->paginate();
        return view('dashboard.pages.messages.index', [
            'messages' => $messages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('home')->withFragment('contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        $data = $request->validated();
        $message = Message::create($data);

        // Send an automated response email
        Mail::to($message->email)->queue(new AutomatedMessageResponseMail());
        // log the message creation
        Log::info('Message created and automated response sent', [
            'id' => $message->id,
            'email' => $message->email,
            'content' => $message->message,
        ]);
        return redirect()->route('home')
            ->with('success', 'message sent!')
            ->withFragment('contact');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return view('homepages.home', [
            'message' => $message,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully');
    }
}
