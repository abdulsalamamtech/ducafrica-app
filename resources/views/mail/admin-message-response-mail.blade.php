<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        h1 {
            color: #4CAF50;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            padding: 8px 0;
        }

        p {
            margin: 0 0 10px;
        }

        main {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .box {
            max-width: 600px;
            background-color: #e0f7fa;
            border-radius: 5px;
            margin-top: 20px;
        }

        @media (max-width: 600px) {
            main {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <main style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
        <h1>Message Response</h1>
        <p>Hello {{ $data?->name ?? 'Dear' }},</p>
        <p>Thank you for reaching out to us. We have received your message.</p>
        <p>Here are the details of your message:</p>

        {{-- Message Details --}}
        <ul>
            <li><strong>Subject:</strong> {{ $data?->subject }}</li>
            <li><strong>Email:</strong> {{ $data?->email }}</li>
            @if ($data?->phone_number)
                <li><strong>Phone:</strong> {{ $data?->phone_number }}</li>
            @endif
            <li><strong>Message:</strong> {{ $data?->message }}</li>
        </ul>
        {{-- Message Response --}}
        <h2>Response from {{ config('app.name') }}:</h2>
        <div class="box">
            <p style="padding: 10px">{{ $messageReplies?->message }}</p>
        </div>

        <p>If you have any further questions, please do not hesitate to contact us.</p>
        <p>Best regards,</p>
        <p>{{ config('app.name') }} Team</p>
    </main>
</body>

</html>
