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

{{-- For Error Messages --}}
@if (session('errors' || $errors))
    {{-- {{'something went wrong!'}} --}}

    <script> alertify.error( @json(session('errors', 'There was an error!')) );</script>
@endif

<!-- Navigation -->
@include('dashboard.partials.navbar')

<!-- Sidebar -->
@include('dashboard.partials.sidebar')



@yield('content')



<!-- Footer -->
@include('dashboard.partials.footer')
