@extends('front.layouts.master')
@section('title')
     نسيت كلمة المرور
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
                <h4> استعادة كلمة المرور </h4> 
            </div>
            <hr>
            <form method="POST" action="{{ url('forget-password') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="" value="{{ old('email') }}">
                    <label for="floatingInput"> البريد الالكتروني المسجل لدينا  </label>
                </div>

                <br>
                <div class="form-floating">
                    <button class="rgt btn gradient-btn btn-sm"> ارسال رابط استعادة كلمة مرور </button>
                </div>
            </form>

            <br>
            <br>
            <hr>
            <h5> مساعدة </h5>
            <ul>
                <li> <a href="{{ url('login') }}">  تسجيل دخول  </a> </li>
            </ul>
        </div>
        <div class="clr"></div>
        <br>
    </div>
@endsection
