@extends('front.layouts.master')
@section('title')
   تغير كلمة المرور
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
                <h4>  تغير كلمة المرور   </h4>
            </div>
            <hr>
            <form method="POST" action="{{ url('user/update_forget_password') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" readonly name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ $email }}">
                    <label for="floatingInput"> البريد الالكتروني  </label>
                </div>
                <div class="form-floating  mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">كلمة المرور </label>
                </div>
                <div class="form-floating  mb-3">
                    <input type="password" name="confirm_password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword"> تاكيد كلمة المرور  </label>
                </div>
                <div class="form-floating">
                    <button class="rgt btn gradient-btn btn-sm">  تغير كلمة المرور </button>
                </div>
            </form>

            <br>
            <br>
           
        </div>
        <div class="clr"></div>
        <br>
    </div>
@endsection
