<x-mail::message>
    # Hello {{ $sender->name }},
    You have received a new reply to your message.
    {{ $sender->subject }}
    - Your original message was:
    <x-mail::panel>
        {{ $sender->message }}
    </x-mail::panel>

    - This is a reply to your message sent on {{ $sender->created_at->format('Y-m-d H:i') }}.
    <x-mail::panel>
        {{ $reply }}
    </x-mail::panel>

    <x-mail::button :url="{{ route('login') }}">
        Login
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
