<?php

namespace App\Http\Controllers;

use App\Models\Event;
use function Illuminate\Log\log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RunnerController extends Controller
{
    public function run(){

        // Log the start of the runner process
        Log::info('Runner process started.', [
            'timestamp' => now()->toDateTimeString()
        ]);
        
        // run events activities
        $this->closeEvents();


        // Log the completion of the runner process
        Log::info('Runner process completed successfully.', [
            'timestamp' => now()->toDateTimeString()
        ]);
        return [
            'status' => 'success',
            'message' => 'runner processed successfully.',
            'timestamp' => now()->toDateTimeString()
        ];
    }

    // close end events
    private function closeEvents(){

        // check if open event is to be close
        Log::info('Start_check_for_event_to_close', []);
        $events = Event::where('end_date', '<=', now())
                // ->where('start_date', '<=', now())
                ->where('slots', '>', 0)
                ->where('status', true)
                // check if the slot is full
                ->get();
        foreach ($events as $event) {
            # code...
            $event->status = false;
            $event->save();
            // Log the event data
            Log::info('Event closed:', ['event' => $event->toArray()]);
        }
        Log::info('End_check_for_event_to_close', ['count' => $events->count()]);
        return;

    }
}
