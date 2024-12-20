<!DOCTYPE html>
<html lang="ar" class="h-100" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <title> تسجيل دخول الادمن </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully responsive premium admin dashboard template"/>
    <meta name="author" content="Techzaa"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    @php
        $publicsetting = \App\Models\admin\PublicSetting::select('website_logo')->first();
    @endphp
        <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/uploads/PublicSetting/'.$publicsetting['website_logo'])}}">


    <!-- Vendor css (Require in all Page) -->
    <link href="{{asset('assets/admin/css/vendor.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Icons css (Require in all Page) -->
    <link href="{{asset('assets/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- App css (Require in all Page) -->
    <link href="{{asset('assets/admin/css/app.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/admin/css/app-rtl.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Theme Config js (Require in all Page) -->
    <script src="{{asset('assets/admin/js/config.js')}}"></script>
</head>
<body class="h-100">
@yield('content')
<script src="{{asset('assets/admin/js/vendor.js')}}"></script>
<script src="{{asset('assets/admin/js/app.js')}}"></script>
</body>
</html>

