@extends('layouts.app')

@section('content')
<div class="pt-10 px-6 mx-auto flex flex-wrap-reverse md:flex-no-wrap">
    <div class="flex flex-col w-full xl:w-2/5 justify-center overflow-y-hidden">
        <h1 class="my-4 text-3xl md:text-5xl text-blue-500 font-semibold leading-tight text-center md:text-left slide-in-bottom-h1">Be in the Know,<br>Make a Poll!</h1>
        <p class="leading-normal font-hairline text-base md:text-2xl mb-8 text-center md:text-left slide-in-bottom-subtitle">Feel like you're missing something?<br>Get to know your users with a simple poll!</p>
    </div>
    <div class="flex flex-col w-full xl:w-3/5 py-6 overflow-y-hidden justify-center object-center text-center items-center bg-center">
        <img src="images/logo.png" id="logo" class="h-64 mx-auto" alt="Hippoll Logo">
    </div>
</div>
@endsection
