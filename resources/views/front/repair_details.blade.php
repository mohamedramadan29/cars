@extends('front.layouts.master')
@section('title')
    {{ $repair['name'] }}
@endsection
@section('content')
    <div id="HomePage">
        <div class="card PageCard">
            <div class="card-body" style="padding:0px;">
                <h5 class="card-title CT1"><i class="fa fa-car"></i> {{ $repair['name'] }} </h5>
                <h6 class="text-muted desc-textpg"><span style="font-weight:bold;">هل لديك مركز صيانة ؟ </span> يمكنك إضافة
                    مراكز صيانة معنا وعرضها على موقعنا مجانا</h6>
                <div class="clr"></div>
                <style>
                    .cardrepair .repair-ico {
                        padding-top: 5px;
                        font-weight: bold;
                        color: var(--main-color);
                        line-height: 35px;
                    }
                </style>
                <div class="card-text" style="padding:20px;">
                    <div class="rgt card cardrepair" style="width:100%;height:auto;">
                        <div class="row no-gutters">
                            <div class="col-md-2"><img src="{{ asset('assets/uploads/AutoRepair/' . $repair['logo']) }}"
                                    class="repair-img"></div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $repair['name'] }}</h5>
                                    <p class="card-text">
                                    <div class="repair-ico"><i class="fas fa-map-marker-alt"></i> المنطقة : <span>
                                            {{ $repair['Country']['name'] }} - {{ $repair['City']['name'] }} </span></div>
                                    <div class="repair-ico"><i class="fas fa-map"></i> العنوان : <span>
                                            {{ $repair['address'] }} </span></div>
                                    <div class="repair-ico"><i class="fas fa-phone"></i> رقم التواصل : <span>
                                            {{ $repair['phone'] }} </span></div>
                                    <div class="repair-ico"><i class="fas fa-bars"></i> نبذة عن المركز : <span>
                                            {{ $repair['desc'] }}
                                        </span></div>
                                    <div class="repair-ico"><i class="fas fa-clock"></i> أوقات العمل : <span>
                                            {{ $repair['work_time'] }} </span></div>
                                    <div class="clr"></div>
                                    <a href="tel:{{ $repair['phone'] }} " class="rgt btn btn-primary btn-sm"><i
                                            class="fas fa-phone"></i> إتصل الأن</a>
                                    <div class="clr"></div>
                                    <p class="card-text"><small class="text-muted">تاريخ الإضافة :
                                            {{ $repair['created_at'] }} </small></p>

                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters" >
                            <div style="padding: 20px">

                                <h5 class="card-title CC3"><i class="fas fa-hashtag"></i>روابط التواصل </h5>
                                <div class="clr"></div>
                                <div class="d-flex">
                                    @if (!empty($repair['website']))
                                        <div class="SRINFO"><a href="{{ $repair['website'] }}"
                                                class="btn btn-primary btn-sm"
                                                style="background-color:#f57500;border-color:#f57500;"
                                                target="_blank"><i class="fas fa-globe"></i> زيارة الموقع </a></div>
                                    @endif
                                    @if (!empty($repair['facebook_link']))
                                        <div class="SRINFO"><a href="{{ $repair['facebook_link'] }}"
                                                class="btn btn-light btn-sm" target="_blank"><i
                                                    class="fab fa-facebook" style="color:#0b70ea;"></i> رابط
                                                الصفحة </a>
                                        </div>
                                    @endif
                                    @if (!empty($repair['twitter_link']))
                                        <div class="SRINFO"><a href="{{ $repair['twitter_link'] }}"
                                                class="btn btn-light btn-sm" target="_blank"><i
                                                    class="fab fa-twitter" style="color:#4fdbf7;"></i> رابط
                                                الصفحة
                                            </a></div>
                                    @endif
                                    @if (!empty($repair['instagram_link']))
                                        <div class="SRINFO"><a href="{{ $repair['instagram_link'] }}"
                                                class="btn btn-light btn-sm" target="_blank"><i
                                                    class="fab fa-instagram" style="color:#E73E53;"></i> رابط الصفحة
                                            </a></div>
                                    @endif
                                </div>
                                <div class="clr"></div><br><br>
                                <h5 class="card-title CC3"><i class="fas fa-hashtag"></i> الموقع على الخريطة </h5>
                                <div class="clr"></div>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14948548.954898184!2d36.05427085182272!3d23.834663897796574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2sma!4v1578447115480!5m2!1sen!2sma"
                                    width="100%" height="450" frameborder="0" style="border:0;"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="clr"></div> <br>
                </div>
            </div>
        </div>
        <div class="clr"></div><br>
    </div>
    <div class="clr"></div><br>
@endsection
