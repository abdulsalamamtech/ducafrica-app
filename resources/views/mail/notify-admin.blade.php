<x-mail::message>
# Hello, Bello Idris

View the new centers added to the system.

## New Centers Added
@component('mail::panel')
    {{ $contents?->first()?->name }} has added new centers to the system.
@endcomponent

## Center Details
@component('mail::table')
| Name | Description | Map URL |
|:-----|:------------|:-------:|
@foreach($contents as $center)
| {{ $center->name }} | {{ $center->state }} | [View Map]({{ $center->map_url }}) |
@endforeach
@endcomponent

@component('mail::button', ['url' => config('app.url')])View Website @endcomponent

<div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
    @foreach($contents as $center)
    <a href="{{ $center->map_url }}" target="_blank" rel="noopener noreferrer">
        <div style="width: 250px; max-height: 300px; border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
            <div class="center-image" style="width: 100%; height: 150px; overflow: hidden; margin-bottom: 10px;">
                <img src="{{ $center->centerAsset->url }}" alt="{{ $center->name }}" style="width: 100%; height: auto; display: block; margin-bottom: 10px;" />
            </div>
            <h3 style="font-size: 18px; margin: 0;">{{ $center->name }}</h3>
            <p style="font-size: 14px; margin: 0;">{{ $center->state }}</p>
        </div>
    </a>
    <a href="{{ $center->map_url }}" target="_blank" rel="noopener noreferrer">
        <div style="width: 250px; max-height: 300px; border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
            <div class="center-image" style="width: 100%; height: 150px; overflow: hidden; margin-bottom: 10px;">
                <img src="{{ $center->centerAsset->url }}" alt="{{ $center->name }}" style="width: 100%; height: auto; display: block; margin-bottom: 10px;" />
            </div>
            <h3 style="font-size: 18px; margin: 0;">{{ $center->name }}</h3>
            <p style="font-size: 14px; margin: 0;">{{ $center->state }}</p>
        </div>
    </a>
        <a href="{{ $center->map_url }}" target="_blank" rel="noopener noreferrer">
        <div style="width: 250px; max-height: 300px; border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
            <div class="center-image" style="width: 100%; height: 150px; overflow: hidden; margin-bottom: 10px;">
                <img src="{{ $center->centerAsset->url }}" alt="{{ $center->name }}" style="width: 100%; height: auto; display: block; margin-bottom: 10px;" />
            </div>
            <h3 style="font-size: 18px; margin: 0;">{{ $center->name }}</h3>
            <p style="font-size: 14px; margin: 0;">{{ $center->state }}</p>
        </div>
    </a>
    <a href="{{ $center->map_url }}" target="_blank" rel="noopener noreferrer">
        <div style="width: 250px; max-height: 300px; border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
            <div class="center-image" style="width: 100%; height: 150px; overflow: hidden; margin-bottom: 10px;">
                <img src="{{ $center->centerAsset->url }}" alt="{{ $center->name }}" style="width: 100%; height: auto; display: block; margin-bottom: 10px;" />
            </div>
            <h3 style="font-size: 18px; margin: 0;">{{ $center->name }}</h3>
            <p style="font-size: 14px; margin: 0;">{{ $center->state }}</p>
        </div>
    </a>
    @endforeach
</div>

<a href="{{ config('app.url') }}" target="_blank" rel="noopener noreferrer">
    View Website
</a>
</br>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
