@extends('layouts.app')

@section('content')
<div class="pb-14 bg-right bg-cover" style="background-image:url('images/bg.svg');">
	<div class="w-full container mx-auto p-6">
		<div class="w-full flex items-center justify-between">
			<a class="flex items-center no-underline hover:no-underline font-bold text-2xl lg:text-4xl"  href="/">
                {{ config('app.name', 'Laravel') }}
			</a>
            <div class="flex w-1/2 justify-end content-center">
				<a class="button inline-block no-underline text-blue-500 hover:text-blue-800 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4" href="login">
                    Login
                </a>
				<a class="button inline-block no-underline text-blue-500 hover:text-blue-800 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 " href="register">
                    Register
                </a>
			</div>
		</div>
	</div>

	<div class="container pt-20 px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center">
		<div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
			<h1 class="my-4 text-3xl md:text-5xl text-blue-500 font-bold leading-tight text-center md:text-left slide-in-bottom-h1">Be in the Know,<br>Make a Poll!</h1>
			<p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left slide-in-bottom-subtitle">Feel like you're missing something?<br>Get to know your users with a simple poll!</p>
		</div>
        <div class="w-full xl:w-3/5 py-6 overflow-y-hidden text-right">

		</div>
		<div class="w-full pt-16 pb-6 text-sm text-center md:text-left fade-in">
			<a class="text-gray-500 no-underline hover:no-underline" href="#">&copy; {{ config('app.name', 'Laravel') }} 2019</a>
		</div>
	</div>
</div>
@endsection
