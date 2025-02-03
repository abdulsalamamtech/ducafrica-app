<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Google ReCaptcha Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center item-center my-10">
    
    <div class="bg-gray margin-auto w-45">
        <div class="p-4">
            <h3>Google ReCaptcha</h3>
            <p>This example demonstrates how to integrate Google ReCaptcha into your Laravel application.</p>
            <p>You'll need to sign up for a Google Cloud Platform project and enable the ReCaptcha API.</p>
            <a href="https://developers.google.com/recaptcha/docs/start" target="_blank" class="btn btn-primary">Sign up for Google Cloud Platform</a>
        </div>
        <div>
            <form method="POST" action="{{ route('google-recaptcha.store') }}">
                @csrf
                <!-- Other form fields -->
                <div class="my-3">
                    <input type="text" class="p-2" name="name" placeholder="Name" required>
                    <span class="help-block text-red-300">
                        @if ($errors->has('name'))
                            <strong>{{ $errors->first('name') }}</strong>
                        @endif
                    </span>
                </div>
                <div class="my-3">
                    <input type="email" class="p-2" name="email" placeholder="Email" required>
                    <span class="help-block text-red-300">
                        @if ($errors->has('email'))
                            <strong>{{ $errors->first('email') }}</strong>
                        @endif
                    </span>
                </div>        
                @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block text-red-300">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                    {!! NoCaptcha::display() !!}
                </div>
            
                <button type="submit" class="mt-4 btn bg-green-400 px-12 py-2 border text-gray-100">Submit</button>
            </form>
    
            {{-- {!! NoCaptcha::display() !!} --}}
            
            {!! NoCaptcha::renderJs() !!}
        </div>
    </div>
</body>
</html>