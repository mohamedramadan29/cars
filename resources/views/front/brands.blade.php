@extends('front.layouts.master')
@section('title')
    ماركات السيارات
@endsection
@section('content')
    <div id="HomePage">
        <div class="card PageCard">
            <div class="card-body" style="padding:0px;">
                <h5 class="card-title CT1"><i class="fa fa-car"></i> الماركات </h5>
                <h6 class="text-muted desc-textpg"><span style="font-weight:bold;">نعرض في هذه صفحة جميع مركات السيارات التي
                        يدعمها موقعنا </span></h6>
                <div class="clr"></div>
                <div class="card-text">
                    @foreach ($brands as $brand)
                    <a class="rgt brands-page" href="{{ url('brand/'.$brand['slug']) }}">
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <img src="{{ asset('assets/uploads/Marks/'.$brand['logo']) }}">
                                    <div class="" clr=""></div>
                                    <h5>{{ $brand['name'] }}</h5>
                                </center>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    <div class="clr"></div> <br>
                </div>
            </div>
        </div>

        <div class="clr"></div><br>
    </div>
@endsection
