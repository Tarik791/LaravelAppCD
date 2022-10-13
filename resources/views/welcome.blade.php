<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        @vite('resources/css/app.css')

    </head>
    <body>
    <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>
  @if(Route::has('login'))
  <div class="hidden fixed top-0 right-0 px-6 py-6 sm:block">
    @auth
      <a href="{{ url('/redirect') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
    @else
      <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

      @if(Route::has('register'))
        <a href="{{ route('register') }}" class="m1-4 text-sm text-gray-700 dark:text-gray-500 underline" >Register</a>
        @endif
        @endauth
  </div>
  @endif
    </body>
</html>
