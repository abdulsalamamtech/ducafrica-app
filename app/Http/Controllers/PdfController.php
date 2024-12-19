<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Facades\Pdf;

class PdfController extends Controller
{

    // https://spatie.be/docs/laravel-pdf/v1/introduction
    // https://github.com/spatie/laravel-pdf
    // composer require spatie/laravel-pdf
    // npm install puppeteer
    // npm install puppeteer
    // npx puppeteer install

    // sudo apt update
    // sudo apt install -y \
    //     libatk1.0-0 libatk-bridge2.0-0 libcups2 libxcomposite1 libxrandr2 \
    //     libxdamage1 libgbm-dev libxkbcommon0 libpango-1.0-0 libnss3 \
    //     libnspr4 libdrm2 libgdk-pixbuf2.0-0 libasound2 libxshmfence-dev

    // sudo chmod -R 755 /home/amtech/Desktop/projects/ducafrica-app


    // public function generatePdf(){
    //     $pdf = \PDF::loadView('dashboard.pages.pdf.invoice', ['data' => 'Hello World']);
    //     return $pdf->stream('invoice.pdf');
    // }



    public function center(){

        $invoice = [
            'amount' => 20,
            'currency' => 'USD',
        ];


        $top = 20;
        $right = 10;
        $bottom = 10;
        $left = 10;

       $done =  Pdf::view('pdfs.tailwind-invoice-and-format', ['invoice' => $invoice])
            ->format('a4')
            ->margins($top, $right, $bottom, $left)
            ->save('invoice.pdf');

        return $done;
    }


    public function event(Request $request, Event $event){

        // $invoice = [
        //     'amount' => 20,
        //     'currency' => 'USD',
        // ];


        $top = 20;
        $right = 10;
        $bottom = 10;
        $left = 10;

       $done =  Pdf::view('dashboard.pages.events.print', ['event' => $event])
            ->format('a4')
            // ->margins($top, $right, $bottom, $left)
            ->save('eventInvoice.pdf');

    // use Spatie\Browsershot\Browsershot;

    // $done = Browsershot::html('<h1>Hello World</h1>')
    //     ->noSandbox() // Add this line
    //     ->save('invoice.pdf');

    // $htmlContent = view('dashboard.pages.events.print', ['event' => $event])->render();

    // $done = Browsershot::html($htmlContent)
    //     ->noSandbox()
    //     ->save('invoice.pdf');

        return $done;


    }




}
