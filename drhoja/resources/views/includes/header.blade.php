<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@yield('CDNs')

{{--    <script src="./build/app.js" defer></script>--}}
    <link rel="stylesheet" href="{{url('/build/tailwind.css')}}">
    <link rel="stylesheet" href="{{url('/css/font.css')}}">
</head>
