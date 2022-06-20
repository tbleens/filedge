<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ config('settings.meta_description') }}">
    <meta name="keywords" content="{{ config('settings.meta_keywords') }}">
    <meta name="author" content="{{ config('settings.site_name') }}">
    <meta property="og:title" content="{{ config('settings.home_title') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="{{ config('settings.site_name') }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="{{ asset('assets/logo/logo.png') }}" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="{{ config('settings.meta_description') }}">
    <meta name="twitter:title" content="{{ config('settings.home_title') }}">
    <meta name="twitter:site" content="{{ url('/') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/logo/'.config('settings.favicon')) }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('assets/libs/prismjs/themes/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/prismjs/plugins/line-numbers/prism-line-numbers.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/prismjs/plugins/toolbar/prism-toolbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/dropzone/dropzone.min.css') }}">
    <link href="{{ asset('assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">

    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @if(!empty($home_title))
    <title>{{ $home_title }}</title>
    @elseif(!empty($page_title))
    <title>{{ config('settings.site_name') }} | {{ $page_title }}</title>
    @else
    <title>{{ config('settings.site_name') }} | @yield('title')</title>
    @endif
</head>