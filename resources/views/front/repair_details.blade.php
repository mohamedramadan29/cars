@extends('front.layouts.master')
@section('title')
   {{$repair['name']}}
@endsection
@section('content')
<div id="HomePage">
    <div class="card PageCard">
        <div class="card-body" style="padding:0px;">
            <h5 class="card-title CT1"><i class="fa fa-car"></i> {{$repair['name']}} </h5>
            <h6 class="text-muted desc-textpg"><span style="font-weight:bold;">هل لديك مركز صيانة ؟ </span> يمكنك إضافة مراكز صيانة معنا وعرضها على موقعنا مجانا</h6>
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
                        <div class="col-md-2"><img src="{{asset('assets/uploads/AutoRepair/'.$repair['logo'])}}" class="repair-img"></div>
                        <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title">{{$repair['name']}}</h5>
                                <p class="card-text">
                                <div class="repair-ico"><i class="fas fa-map-marker-alt"></i> المنطقة : <span>  {{$repair['country']}} - {{$repair['city']}}   </span></div>
                                <div class="repair-ico"><i class="fas fa-map"></i> العنوان : <span> {{$repair['address']}}  </span></div>
                                <div class="repair-ico"><i class="fas fa-phone"></i> رقم التواصل : <span> {{$repair['phone']}} </span></div>
                                <div class="repair-ico"><i class="fas fa-bars"></i> نبذة عن المركز : <span> {{$repair['desc']}}
                                    </span></div>
                                <div class="repair-ico"><i class="fas fa-clock"></i> أوقات العمل : <span> {{$repair['work_time']}}  </span></div>
                                </p>
                                <div class="clr"></div>
                                <a href="tel:{{$repair['phone']}} " class="rgt btn btn-primary btn-sm"><i class="fas fa-phone"></i> إتصل الأن</a>
                                <div class="clr"></div>
                                <p class="card-text"><small class="text-muted">تاريخ الإضافة : {{$repair['created_at']}}  </small></p>
                            </div>
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
