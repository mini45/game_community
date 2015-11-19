<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="noindex" />
        <title>@section('title'){{config('config.title')}}@show</title>
        @section('styles')
            {!! HTML::style('css/bootstrap.min.css') !!}
            {!! HTML::style('css/app.css') !!}
        @show
        {!! HTML::script('js/jquery.min.js') !!}
        {!! HTML::script('js/bootstrap.min.js') !!}
    </head>
    <body>
        @include('navigation.navigation')

        {{--<div class="container">--}}
            {{--@include('flash::message')--}}
        {{--</div>--}}
        @yield('content')


    </body>
    @section('scripts')

    @show
    {!! HTML::script('js/notify.min.js') !!}
</html>