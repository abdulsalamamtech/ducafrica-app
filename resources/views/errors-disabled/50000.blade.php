{{-- resources/views/errors/500.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Error (500)</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto text-center py-20">
        <h1 class="text-4xl font-bold text-red-600">Server Error</h1>
        <p class="text-lg mt-4">Something went wrong on our end.</p>

        @if(app()->environment('local')) <!-- Display error only in development -->
            <div class="mt-8 bg-white p-6 rounded-lg shadow-md text-left">
                <h2 class="text-2xl font-semibold">Error Details</h2>
                <pre class="mt-4 text-sm text-red-500">
                    {{ $exception->getMessage() ?? 'No specific error message available.' }}
                </pre>
                <p class="text-sm mt-2">File: {{ $exception->getFile() }}:{{ $exception->getLine() }}</p>
                <pre class="text-sm mt-4 text-gray-700">{{ $exception->getTraceAsString() }}</pre>
            </div>
        @else
            <p class="mt-6">Please try again later or contact support.</p>
        @endif
    </div>
</body>
</html>
