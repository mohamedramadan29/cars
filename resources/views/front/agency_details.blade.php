@extends('front.layouts.master')
@section('title')
    {{$agency['name']}}
@endsection
@section('content')
    <div id="HomePage">
        <div class="clr"></div>
        <br>
        <div>
            <section class="section1 clearfix">
                <div>
                    <div class="grid clearfix">
                        <div class="col2 first">
                            <img src="{{asset('assets/uploads/Agency/'.$agency['logo'])}}" alt>
                            <h1> {{$agency['name']}} </h1>
                            <p> {{$agency['desc']}} </p>
                        </div>
                        <div class="col2 last">
                            <div class="grid clearfix">
                                <div class="col3 first">
                                    <h1><i class="fa fa-building"></i></h1>
                                    <span>   {{$agency['address']}}</span>
                                </div>
                                <div class="col3">
                                    <h1><i class="fas fa-map-marker-alt"></i></h1>
                                    <span> {{$agency['City']['name']}}  </span>
                                </div>
                                <div class="col3 last">
                                    <h1><i class="fas fa-mobile-alt"></i></h1>
                                    <span><a href="tel:{{$agency['phone']}}" class="btn btn-success btn-sm">
                                             {{$agency['phone']}}<i class="fas fa-phone-volume"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="card PageCard">
            <div class="card-body" style="padding:0px;">
                @if(count($agency['branches']) > 0)
                    <h5 class="card-title CT1">
                        <i class="fa fa-building"></i> فروعنا
                    </h5>
                    <div class="clr"></div>

                    <div class="rgt card-text" style="padding: 20px; width: 100%">
                        @foreach($agency['branches'] as $branch)
                            <div class="rgt card Foro3">
                                <div class="card-body">
                                    <h5 class="card-title"> {{$branch['country']}} - {{ $branch['city'] }} </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        {{$branch['address']}}
                                    </h6>
                                    <a href="tel:{{$branch['phone']}}" class="btn btn-info btn-sm"
                                    ><i class="fas fa-phone"></i> {{$branch['phone']}} </a
                                    >
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endif
                <div class="clr"></div>
                <h5 class="card-title CT1"><i class="fa fa-car"></i> السيارات المتوفرة </h5>
                <div class="clr"></div>
                <div class="rgt card-text showRight">
                    @foreach($agency['advs'] as $adv)
                        <div class="card CarCard">
                            <div class="row no-gutters">
                                <div class="col-md-4"><a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}"><img src="{{ asset('assets/uploads/CarImages/' . $adv->carImages->first()->c_image) }}" class="card-img"
                                                                       alt="{{$adv['title']}}"></a></div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title CC2">
                                            <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}"> {{$adv['c_title']}} </a>
                                        </h5>
                                        <div class="card-text">
                                            <div class="rgt ico-car">
                                                <img src="{{asset('assets/uploads/Marks/'.$adv['carMark']['logo'])}}"/>
                                            </div>
                                            <div class="rgt ico-car kmclass"> {{$adv['c_km']}}
                                                <i class="fas fa-tachometer-alt"></i>
                                            </div>
                                            <div class="rgt ico-car"><i class="fas fa-dumbbell"></i> {{$adv['c_trans']}} </div>
                                            <div class="rgt ico-car"><i class="fas fa-calendar-alt"></i> {{$adv['c_years']}}</div>
                                        </div>
                                        <div class="clr"></div>
                                        <small class="text-muted"> {{$adv['created_at']}} </small>
                                        <div class="card-text">
                                            <span class="rgt Prix"> {{$adv['c_price']}} $ </span>
                                            <span class="lft"><button id="phone{{$adv['id']}}" type="button"
                                                                      class="btn btn-success btn-sm Phone"
                                                                      data-text-swap="{{$adv['c_phone']}}"
                                                                      data-text-original="{{$adv['c_phone']}}">06xx xxxxxx</button></span>
                                            <script type="text/javascript">
                                                $("#phone{{$adv['id']}}").on("click", function () {
                                                    var el = $(this);
                                                    el.text() == el.data("text-swap") ?
                                                        el.text(el.data("text-original")) :
                                                        el.text(el.data("text-swap"));
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="lft card-text showLeft" style="padding: 20px">
                    <div class="rgt card">
                        <div class="card-body">
                            <h5 class="card-title CC3">
                                <i class="far fa-clock"></i> ساعات العمل
                            </h5>
                            <div class="clr"></div>
                            <div class="card-text ico-SRinfo">
                                <div class="SRINFO" style="font-weight: bold">
                                    {{$agency['work_time']}}
                                </div>
                                <div class="clr"></div>
                                <br/>
                                <div class="SRINFO">
                                    <a href="tel:{{$agency['phone']}}" class="btn btn-info btn-sm">
                                        {{$agency['phone']}}
                                        <i class="fas fa-phone-volume" style="color: white"></i
                                        ></a>
                                </div>
                                <div class="SRINFO">
                                    <a href="#" class="btn btn-info btn-sm">
                      <span class="__cf_email__"> {{$agency['email']}} </span><i class="fas fa-envelope"
                                                                                             style="color: white"></i></a>
                                </div>
                            </div>
                            <div class="clr"></div>
                            <br/><br/>
                            {{--                            <h5 class="card-title CC3">--}}
                            {{--                                <i class="fas fa-hashtag"></i> Map location--}}
                            {{--                            </h5>--}}
                            {{--                            <div class="clr"></div>--}}
                            {{--                            <iframe--}}
                            {{--                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14948548.954898184!2d36.05427085182272!3d23.834663897796574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2sma!4v1578447115480!5m2!1sen!2sma"--}}
                            {{--                                width="600"--}}
                            {{--                                height="450"--}}
                            {{--                                frameborder="0"--}}
                            {{--                                style="border: 0"--}}
                            {{--                                allowfullscreen--}}
                            {{--                            ></iframe>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clr"></div>
        <br>
    </div>
    <div class="clr"></div><br>

@endsection
