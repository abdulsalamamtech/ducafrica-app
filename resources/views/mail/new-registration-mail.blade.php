<x-mail::message>

# Hello, DucAfrica.

# New Registration Notification

A new user just register on DucAfrica.
Assign a role to the user.

Name: {{ $user->first_name}}
<br>
Email: {{ $user->email}}
<br>
Phone Number: {{ $user?->phone_number?? 'N/A' }}
<br>
State: {{ $user->state}}
<br>

{{-- <x-mail::button :url="'https://ducafrica.com'">
View User
</x-mail::button> --}}

<x-mail::button :url="$user_details" color="success">
View User Details
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
