@extends('front.layouts.master')
@section('title')
    تسجيل دخول
@endsection
@section('content')
    @if (Session::has('Success_message'))
        @php
            toastify()->success(\Illuminate\Support\Facades\Session::get('Success_message'));
        @endphp
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @php
                toastify()->error($error);
            @endphp
        @endforeach
    @endif

    <div id="HomePage">
        <div class="login_page">
            <div class="social_media">
                <h4> يمكنك الدخول باستخدام </h4>
                <a href="{{route('auth.google.redirect','facebook')}}"> <i class="bi bi-facebook"></i> </a>
                <a href="{{route('auth.google.redirect','google')}}"> <i class="bi bi-google"></i> </a>
            </div>
            <hr>
            <form method="POST" action="{{ url('login') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput"> البريد الالكتروني  </label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">كلمة المرور </label>
                </div>
                <br>
                <div class="form-floating">
                    <button class="rgt btn gradient-btn btn-sm"> تسجيل دخول </button>
                </div>
            </form>

            <br>
            <br>
            <hr>
            <h5> مساعدة </h5>
            <ul>
                <li> <a href="{{ url('register') }}"> لا املك حساب </a> </li>
                <li> <a href="{{ url('forget-password') }}"> نسيت كلمة المرور </a> </li>
            </ul>
        </div>
        <div class="clr"></div>
        <br>
    </div>
@endsection
