@extends('front.layouts.master')
@section('title')
الاسئلة الشائعه
@endsection
@section('content')
<div class="clr"></div><br>
<div id="HomePage">
    <a href="{{url('pub')}}" class="rgt card pages-card">
        <div class="card-body">
            <center>
                <i class="fas fa-bullhorn fa-2x"></i>
                <div class="clr"></div>
                <h5 class="card-title"> أعلن معنا </h5>
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
    <a href="{{url('faqs')}}" class="rgt card pages-card" style="border:1px dashed var(--main-color);">
        <div class="card-body">
            <center>
                <i class="far fa-comments fa-2x" style="color:var(--main-color);"></i>
                <div class="clr"></div>
                <h5 class="card-title" style="color:var(--main-color);"> الاسئلة الشائعه </h5>
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
            <h5 class="card-title" style="font-weight:bold;"> الاسئلة الشائعة </h5>
            <div class="clr"></div><br>
            <div class="accordion" id="accordionExample">
                @foreach($faqs as $faq)
                    <div class="faq-collpase">
                        <div id="headingOne" class="clearfix2" style="background:#f2f4f4;">
                            <h2 class="rgt mb-0">
                                <div class="rgt faq-icon"><i class="fas fa-question"></i></div>
                                <a class="btn faq-quest" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq['id']}}" aria-expanded="true" aria-controls="collapse{{$faq['id']}}"> {{$faq['title']}} </a>
                            </h2>
                        </div>
                        <div class="clr"></div>
                        <div id="collapse{{$faq['id']}}" class="collapse" aria-labelledby="heading{{$faq['id']}}" data-parent="#accordionExample">
                            <div class="card-body faq-body">{!! $faq['content'] !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="clr"></div><br>



@endsection
