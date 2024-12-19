<!--

 * DEVELOPER : Abdulsalam Amtech
 * EMAIL: abdulsalamamtech@gmail.com

-->






<!-- Header -->
@include('dashboard.partials.header')


{{-- Alertify Js --}}
<script>
    alertify.set('notifier','position', 'top-right');
</script>

{{-- For Success Messages --}}
@if (session('success'))
    {{-- {{'Good!'}} --}}
    {{-- {{session('success', 'successful!')}} --}}
    <script> alertify.success( @json(session('success', 'Good!')) );</script>
@endif


{{-- For error Messages in string --}}
@if (session('error'))
    {{-- {{'something went wrong!'}} --}}
    <script> alertify.error( @json(session('error', 'There was an error!')) );</script>
@endif.

{{-- For Error Messages --}}
@if (session('errors' || $errors->any()))
    {{-- {{'something went wrong!'}} --}}

    <script> alertify.error( @json(session('errors', 'There was an error!')) );</script>
@endif


{{-- For warnings Messages in string --}}
@if (session('warnings'))
    {{-- {{'something went wrong!'}} --}}
    <script> alertify.warning( @json(session('warnings')) );</script>
@endif


{{-- For Error Messages in JSON format --}}
@if ($errors->any())
    <script> alertify.error("There was an error!");</script>
        @foreach ($errors->all() as $error)
            <script> alertify.error(@json($error));</script>
        @endforeach
@endif


{{-- @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach
@endif --}}


<!-- Navigation -->
@include('dashboard.partials.navbar')

<!-- Sidebar -->
@include('dashboard.partials.sidebar')



@yield('content')



<!-- Footer -->
@include('dashboard.partials.footer')
