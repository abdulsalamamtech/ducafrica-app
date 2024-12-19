<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        h4 {
            margin: 0;
        }
        .w-full {
            width: 100%;
            padding: 1rem;
        }
        .w-half {
            width: 50%;
            padding: 0.8rem;
        }
        .margin-top {
            margin-top: 1.25rem;
        }
        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            background-color: rgb(241 245 249);
        }
        table {
            width: 100%;
            border-spacing: 0;
        }
        table.products {
            font-size: 0.875rem;
        }
        table.products tr {
            background-color: rgb(241 245 249);
            padding: 8px 12px;
        }
        table.products th {
            color: #ffffff;
            padding: 0.5rem;
        }
        table tr.items {
            background-color: #f4f4f4;
        }
        table tr.items td {
            padding: 0.7rem;
        }
        .total {
            text-align: right;
            margin-top: 1rem;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <table class="w-full">
        <tr>
            <td class="w-half">
                <img src="{{ asset('images/logo.png') }}" alt="DucAfrica" width="200" />
            </td>
            <td class="w-half">
                <h2>Invoice ID: 834{{ $event->id . $event->center_id }}</h2>
            </td>
        </tr>
    </table>

    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div><h4>To:</h4></div>
                    <div>{{ Auth::user()->first_name }}</div>
                    <div>{{ Auth::user()->email }}</div>
                </td>
                <td class="w-half">
                    <div><h4>From:</h4></div>
                    <div>DucAfrica</div>
                    <div>Nigeria</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="margin-top">
        <table class="products">
            {{-- <tr>
                <th>Qty</th>
                <th>Description</th>
                <th>Price</th>
            </tr> --}}
            <tr class="items">
                {{-- @foreach($data as $item)
                    <td>
                        {{ $item['quantity'] }}
                    </td>
                    <td>
                        {{ $item['description'] }}
                    </td>
                    <td>
                        {{ $item['price'] }}
                    </td>
                @endforeach --}}

                <tr class="w-full">
                    <td class="w-half">Center Name:</td>
                    <td class="w-half">{{ $event->center->name }}</td>
                </tr>

                <tr class="w-full">
                    <td class="w-half">Event Name:</td>
                    <td class="w-half">{{ $event->name }}</td>
                </tr>

                <tr class="w-full">
                    <td class="w-half">Type:</td>
                    <td class="w-half">{{ $event->type }}</td>
                </tr>

                <tr class="w-full">
                    <td class="w-half">Start Date:</td>
                    <td class="w-half">{{ $event->start_date }}</td>
                </tr>

                <tr class="w-full">
                    <td class="w-half">End Date:</td>
                    <td class="w-half">{{ $event->end_date }}</td>
                </tr>


                <tr class="w-full">
                    <td class="w-half">Contact Name:</td>
                    <td class="w-half">{{ $event->contact_name }}</td>
                </tr>


                <tr class="w-full">
                    <td class="w-half">Contact Phone Number:</td>
                    <td class="w-half">{{ $event->contact_phone_number }}</td>
                </tr>
            </tr>
        </table>
    </div>

    <div class="total">
        Total: #{{ $event->cost }} NGN
    </div>

    <div class="footer margin-top">
        <div>Thank you</div>
        <div>&copy; DucAfrica Daily</div>
    </div>
</body>
</html>
