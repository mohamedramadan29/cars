@extends('front.layouts.master')
@section('title')
    {{$auction['name']}}
@endsection
@section('content')
    <div id="HomePage">
        <div class="card PageCard">
            <div class="card-body" style="padding:0px;">
                <div class="card-text rent" style="padding:20px;">
                    <div class="rgt col-2">
                        <img class="rounded-circle rent-img" src="{{asset('assets/uploads/Auctions/'.$auction['logo'])}}" alt="اوتو راب" />
                    </div>
                    <div class="rgt rent-col6">
                        <h4 class="rent-title"> {{$auction['name']}} </h4>
                        <div class="clr"></div>
                        <p class="text-muted rent-desc display-desk">
                            {{$auction['desc']}}</p>
                        <div class="rent-info"><i class="fas fa-map-marker-alt"></i>  {{$auction['City']['name']}} </div>
                        <div class="clr"></div>
                        <div class="rent-info"><i class="fas fa-clock"></i>  {{$auction['work_time']}}</div>
                    </div>
                    <div class="rgt rent-col4">
                        <h4 class="rent-title"> مراسلة الشركة </h4>
                        <div class="clr"></div>
                        <a href="tel:{{$auction['phone']}}" class="Inforent btn btn-info btn-sm"><i class="fas fa-mobile-alt"></i>{{$auction['phone']}}</a>
                        <a href="https://api.whatsapp.com/send?phone={{$auction['phone']}}" class="Inforent btn btn-success btn-sm"><i class="fab fa-whatsapp"></i>{{$auction['phone']}} </a>
                        <div class="Inforent btn btn-danger btn-sm" data-toggle="modal" data-target="#message"><i class="far fa-comments"></i> أرسل رسالة</div>
                        <div class="clr"></div>
                    </div>
                    <div class="clr"></div><br>
                    <hr class="style14">
                    <div class="clr"></div>
                    <div class="rent-car rgt card-text showRight">
                        <h5 class="card-title CT1"><i class="fa fa-car"></i> السيارات المتوفرة</h5>
                        <hr class="style14">
                        <div class="clr"></div>
                        <div id="owl-car" class="owl-carousel owl-theme new_cars">
                            @foreach ($auction['advs'] as $adv)
                                <div class="item">
                                    <div class="card car-card">
                                        <div class="ribbon"><span
                                                class="ribbon4 ribbonplus">{{ number_format($adv['c_price'], 2) }} $ </span>
                                        </div>
                                        <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}"><img
                                                src="{{ asset('assets/uploads/CarImages/' . $adv->carImages->first()->c_image) }}"
                                                class="card-img-top"></a>
                                        <div class="card-body">
                                            <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}">
                                                <h5 class="card-title" style="text-align:center;">{{ $adv['c_title'] }}
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="clr"></div>
                        <h5 class="card-title CT1"><i class="fa fa-align-right"></i> معلومات التأجير </h5>
                        <div class="clr"></div>
                        <div style="width:100%;">
                            <div class="card-body">
                                <p class="card-text rent-infotext">- يجب تقديم رخصة القيادة الخاصة بالمستأجر سارية المفعول
                                    وتحمل اسمه.<br />
                                    - المستأجر بين عمر 21 - 26 عام يجب ان يقدم بطاقة بنكية ( لا يجوز تقديم بطاقة الصراف
                                    الالي) و رخصه قيادة سارية المفعول الخاصة بالمستأجر<br />
                                    - جواز السفر و رخصة قيادة دولية صادرة من دولة المستأجر مطلوبة عند استئجار السيارة<br />
                                    - اسعار التأجير تتغير مثل تغير اسعار حجز تذاكر الطيران , ولكن السعر لن يتغير عندما تقوم
                                    بعمل الحجز. ولكن يتغير سعر التأجير مع مدة التأجير.</p>
                            </div>
                        </div>
                        <div class="clr"></div><br>
                        <h5 class="card-title CT1"><i class="fa fa-align-right"></i> إرسال طلب تأجير </h5>
                        <div class="clr"></div>
                        <div style="width:100%;">
                            <div class="card-body">
                                <p class="card-text rent-infotext">
                                <form action method="post" class="form-rent-req">
                                    @if (Auth::check())
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>الإسم الكريم</label>
                                                <input type="text" name="fullname" class="form-control" required>
                                            </div>

                                            <div class="form-group col-12">
                                                <label>تاريخ الحجز من : </label>
                                                <input type="date" name="from" class="form-control">
                                            </div>
                                            <div class="form-group col-12">
                                                <label>إلى </label>
                                                <input type="date" name="to" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="inputAddress2">عنوانك</label>
                                            <input type="text" name="adresse" class="form-control"
                                                placeholder="مدينة / المنطقة مكان التسليم..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress2">رقم الهاتف</label>
                                            <input type="number" name="mobile" class="form-control"
                                                placeholder="رقم الهاتف"required>
                                        </div>
                                        <label for="inputAddress2">حدد السيارة</label>
                                        <select class="form-control form-select" name="carname">
                                            <option value selected>لا توجد أي سيارة في الوكالة</option>
                                            @foreach ($auction['advs'] as $adv)
                                                <option value="{{ $adv['id'] }}"> {{ $adv['c_title'] }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <button type="submit" name="sendrev" class="btn btn-primary">أرسل الحجز </button>
                                    @else
                                        <div class="alert alert-info" role="alert">يجب أن تكون عضو في الموقع قبل إرسال
                                            طلب الحجز<div class="clr"></div>
                                            <a href="{{ url('login') }}">إضغط هنا لتسجيل</a>
                                        </div>
                                    @endif


                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="lft card-text showLeft" style="padding: 20px;text-align:center">
                        <div class="rgt card">
                            <div class="card-body">
                                <h5 class="card-title CC3"><i class="fas fa-warehouse"></i> معلومات الشركة  </h5>
                                <br>
                                <h5 class="card-title CC3"><i class="fas fa-clock"></i> ساعات العمل </h5>
                                <br>
                                <div class="clr"></div>
                                <div class="card-text ico-SRinfo">
                                    <div class="SRINFO" style="font-weight: bold">
                                        {{ $auction['work_time'] }}
                                    </div>
                                    <div class="clr"></div>
                                    <br />
                                    <div class="SRINFO">
                                        <a href="tel:{{ $auction['phone'] }}" class="btn btn-info btn-sm">
                                            {{ $auction['phone'] }}
                                            <i class="fas fa-phone-volume" style="color: white"></i></a>
                                    </div>
                                    <div class="SRINFO">
                                        <a href="#" class="btn btn-info btn-sm">
                                            <span class="__cf_email__"> {{ $auction['email'] }} </span><i
                                                class="fas fa-envelope" style="color: white"></i></a>
                                    </div>
                                </div>

                                <br>
                                <h5 class="card-title CC3"><i class="fas fa-hashtag"></i>روابط التواصل </h5>
                                <br>
                                <div>
                                    @if (!empty($auction['website']))
                                        <div class="SRINFO"><a href="{{ $auction['website'] }}" class="btn btn-primary btn-sm"
                                                style="background-color:#f57500;border-color:#f57500;" target="_blank"><i
                                                    class="fas fa-globe"></i> زيارة الموقع  </a></div>
                                    @endif
                                    @if (!empty($auction['facebook_link']))
                                        <div class="SRINFO"><a href="{{ $auction['facebook_link'] }}" class="btn btn-light btn-sm"
                                                target="_blank"><i class="fab fa-facebook" style="color:#0b70ea;"></i> رابط
                                                الصفحة </a>
                                        </div>
                                    @endif
                                    @if (!empty($auction['twitter_link']))
                                        <div class="SRINFO"><a href="{{ $auction['twitter_link'] }}" class="btn btn-light btn-sm"
                                                target="_blank"><i class="fab fa-twitter" style="color:#4fdbf7;"></i> رابط
                                                الصفحة
                                            </a></div>
                                    @endif
                                    @if (!empty($auction['instagram_link']))
                                        <div class="SRINFO"><a href="{{ $auction['instagram_link'] }}"
                                                class="btn btn-light btn-sm" target="_blank"><i class="fab fa-instagram"
                                                    style="color:#E73E53;"></i> رابط الصفحة </a></div>
                                    @endif
                                </div>
                                <br />
                                <h5 class="card-title CC3">
                                    <i class="fas fa-hashtag"></i>  الموقع على الخريطة
                                </h5>
                                <br>
                                <iframe
                                {{-- src="https://www.google.com/maps/embed/v1/place?key=YOUR_GOOGLE_API_KEY&q={{ urlencode($rent->address) }}"  --}}
                                    src="https://www.google.com/maps/embed?pb={{ urlencode($auction->address) }}"
                                 width="" height="450" frameborder="0" style="border: 0"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="clr"></div> <br>
                    <div class="clr"></div> <br>
                </div>
            </div>
        </div>
        <div class="clr"></div><br>
    </div>

    <script>
        $("#logModal").click(function() {
            var button = $(this);

            var id = button.val();

            button.closest(".modal").modal('hide');
            $('#' + id).modal('show');
        });
        $(document).ready(function() {
            $('#owl-car').owlCarousel({
                rtl: true,
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    500: {
                        items: 2,
                        nav: false
                    },
                    800: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 4,
                        nav: false,
                        loop: false
                    }
                }
            });
        });
    </script>
    <div class="clr"></div><br>

@endsection
