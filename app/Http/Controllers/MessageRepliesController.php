<?php

namespace App\Http\Controllers;

use App\Helpers\ActorHelper;
use App\Http\Requests\StoreMessageRepliesRequest;
use App\Http\Requests\UpdateMessageRepliesRequest;
use App\Mail\AdminMessageResponseMail;
use App\Mail\MessageReply as MailMessageReply;
use App\Models\Message;
use App\Models\MessageReplies;
use App\Models\MessageReply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MessageRepliesController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRepliesRequest $request)
    {
        $data = $request->validated();
        // Testing purpose
        $data['user_id'] = Auth::id();
        $messageReplies = MessageReply::create($data);
        $reply = $messageReplies->message;
        // $messageReplies->load('message');

        // Send Email To The Email
        $messageReplies->message()->update([
            'status' => 'replied',
        ]);

        // Get the message
        $message = Message::find($messageReplies->message_id);

        // return $messageReplies->message;
        // Send message to the user
        // Mail::to($message->email)
        //     ->queue(new \App\Mail\MessageReply($message, $reply));
        Mail::to($message?->email)->queue(new AdminMessageResponseMail(Message::find($messageReplies->message_id), $messageReplies));

        // log
        info('Message reply sent from admin', [
            'message_id' => $messageReplies->message_id,
            'reply_id' => $messageReplies->id,
            'user_id' => $messageReplies->user_id,
            'content' => $messageReplies->content,
        ]);

        // return redirect to message route
        return redirect()->route('messages.index')->with('success', 'Reply sent successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MessageReply $messageReplies)
    {
        $messageReplies->delete();

        // redirect to message route
        return redirect()->route('messages.index')->with('success', 'Reply deleted successfully');
    }
}
