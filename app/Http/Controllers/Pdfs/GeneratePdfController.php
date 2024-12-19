<?php

namespace App\Http\Controllers\Pdfs;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GeneratePdfController extends Controller
{



    public function event(Request $request, Event $event) {

        $pdf = Pdf::loadView('dashboard.pages.events.print', ['event' => $event]);

        // $pdf = Pdf::loadView('pdfs.events.booked-invoice', ['event' => $event]);

        // return $pdf->download();
        return $pdf->stream();
    }
}
