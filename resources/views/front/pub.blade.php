@extends('front.layouts.master')
@section('title')
    أعلن معنا
@endsection
@section('content')
<div class="clr"></div><br>
<div id="HomePage">
    <a href="{{url('pub')}}" class="rgt card pages-card" style="border:1px dashed var(--main-color);">
        <div class="card-body">
            <center>
                <i class="fas fa-bullhorn fa-2x" style="color:var(--main-color);"></i>
                <div class="clr"></div>
                <h5 class="card-title" style="color:var(--main-color);"> أعلن معنا </h5>
            </center>
        </div>
    </a>
    <a href="{{url('aboutus')}}" class="rgt card pages-card">
        <div class="card-body">
            <center>
                <i class="far fa-lightbulb fa-2x"></i>
                <div class="clr"></div>
                <h5 class="card-title"> عن الموقع </h5>
            </center>
        </div>
    </a>
    <a href="{{url('faqs')}}" class="rgt card pages-card">
        <div class="card-body">
            <center>
                <i class="far fa-comments fa-2x"></i>
                <div class="clr"></div>
                <h5 class="card-title"> الاسئلة الشائعه </h5>
            </center>
        </div>
    </a>
    <a href="{{url('contactus')}}" class="rgt card pages-card">
        <div class="card-body">
            <center>
                <i class="fas fa-headset fa-2x"></i>
                <div class="clr"></div>
                <h5 class="card-title"> تواصل معنا </h5>
            </center>
        </div>
    </a>
    <div class="clr"></div><br>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" style="font-weight:bold;">أعلن معنا</h5>
            <div class="card-text pages-text">
                <p style="font-weight:bold;">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
            </div>
        </div>
    </div>
</div>
<div class="clr"></div><br>
@endsection
