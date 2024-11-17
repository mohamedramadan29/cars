<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/front/css/styles.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="https://www.chakirdev.com/404.html" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
            integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="../../../cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.0/sweetalert2.min.js" integrity="sha512-OlF0YFB8FRtvtNaGojDXbPT7LgcsSB3hj0IZKaVjzFix+BReDmTWhntaXBup8qwwoHrTHvwTxhLeoUqrYY9SEw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="description"
          content="سوق وحراج سيارات . يأتيكم موقع بآخر عروض السيارات الجديدة والسيارات المستعملة المعروضة للبيع في معارض وحراجات الدول مع اسعارها، مواصفاتها، واسماء وارقام جوالات المعارض والصالات، والوكالات، أولاً بأول">
    <meta name="keywords" content="سوق،حراج،سيارات،السيارات المستعملة،السيارات الجديدة،معارض،وكالات،ارقام ">
    @yield('css')
    @toastifyCss
</head>

<body>
