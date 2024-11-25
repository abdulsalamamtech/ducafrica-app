@extends('dashboard.layouts.app')

@section('content')


<!-- Container -->
<section>
    <!--
        You can use the following blend mode
            overlay, darken
     -->
    <div
        class="container py-16 bg-[rgba(0,0,0,0.6)] h-screen bg-no-repeat max-w-full bg-blend-darken bg-center bg-cover
                bg-[url('https://images.pexels.com/photos/590016/pexels-photo-590016.jpeg?auto=compress&cs=tinysrgb&w=600')]">
        <!-- <div class="px-6 m-auto space-y-8 text-gray-500 md:px-12 lg:px-20"> -->
        <div class="flex items-center justify-center h-full px-6 m-auto space-y-8 text-center text-gray-500 md:px-20 lg:px-20">
            <div>
                <h1 class="mb-4 text-4xl font-bold text-gray-300 md:text-6xl md:px-10">
                    Manage And Track All Your Assets
                    <br><span class="text-[#0c1c96]">100% free</span>
                </h1>
                <p class="mb-8 text-2xl text-gray-200">Be part of millions of people around the world using
                    <span class="text-xl font-bold">The Finder</span> as their online assets tracker and finder solution</p>
                <a href="register">
                    <button type="button" title="Contact Us" class="w-full py-3 px-6 text-center rounded-xl transition
                                bg-[#0c1c96] shadow-xl hover:bg-[#0c1cff] active:bg-gray-700
                                focus:bg-gray-600 sm:w-max">
                        <span class="block font-semibold text-white">
                            Register Now
                        </span>
                    </button>
                </a>
            </div>
        </div>
        <!-- </div> -->
    </div>
</section>

@endsection
