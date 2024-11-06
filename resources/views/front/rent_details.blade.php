@extends('front.layouts.master')
@section('title')
     {{$rent['name']}}
@endsection
@section('content')
<div id="HomePage">
    <div class="card PageCard">
        <div class="card-body" style="padding:0px;">
            <div class="card-text rent" style="padding:20px;">
                <div class="rgt col-2">
                    <img class="rounded-circle rent-img" src="{{asset('assets/uploads/AgencyRent/'.$rent['logo'])}}" alt="اوتو راب" />
                </div>
                <div class="rgt rent-col6">
                    <h4 class="rent-title"> {{$rent['name']}} </h4>
                    <div class="clr"></div>
                    <p class="text-muted rent-desc display-desk">
                        {{$rent['desc']}}</p>
                    <div class="rent-info"><i class="fas fa-map-marker-alt"></i>  {{$rent['country']}} - {{$rent['city']}} </div>
                    <div class="clr"></div>
                    <div class="rent-info"><i class="fas fa-clock"></i>  {{$rent['work_time']}}</div>
                </div>
                <div class="rgt rent-col4">
                    <h4 class="rent-title"> مراسلة المكتب</h4>
                    <div class="clr"></div>
                    <a href="tel:{{$rent['phone']}}" class="Inforent btn btn-info btn-sm"><i class="fas fa-mobile-alt"></i>{{$rent['phone']}}</a>
                    <a href="https://api.whatsapp.com/send?phone=966052222314" class="Inforent btn btn-success btn-sm"><i class="fab fa-whatsapp"></i> 966052222314</a>
                    <div class="Inforent btn btn-danger btn-sm" data-toggle="modal" data-target="#message"><i class="far fa-comments"></i> أرسل رسالة</div>
                    <div class="clr"></div>
                </div>
                <div class="clr"></div><br>
                <hr class="style14">
                <div class="rent-car">
                    <h5 class="card-title CT1"><i class="fa fa-car"></i> السيارات المتوفرة</h5>
                    <hr class="style14">
                    <div class="clr"></div>
                    <div id="owl-car" class="owl-carousel owl-theme new_cars">
                        @foreach($rent['advs'] as $adv)
                            <div class="item">
                                <div class="card car-card">
                                    <div class="ribbon"><span class="ribbon4 ribbonplus">{{number_format($adv['c_price'],2)}} $ </span></div>
                                    <a href="#"><img
                                            src="{{ asset('assets/uploads/CarImages/' . $adv->carImages->first()->c_image) }}" class="card-img-top"></a>
                                    <div class="card-body">
                                        <a href="#">
                                            <h5 class="card-title" style="text-align:center;">{{$adv['c_title']}}</h5>
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
                            <p class="card-text rent-infotext">- يجب تقديم رخصة القيادة الخاصة بالمستأجر سارية المفعول وتحمل اسمه.<br />
                                - المستأجر بين عمر 21 - 26 عام يجب ان يقدم بطاقة بنكية ( لا يجوز تقديم بطاقة الصراف الالي) و رخصه قيادة سارية المفعول الخاصة بالمستأجر<br />
                                - جواز السفر و رخصة قيادة دولية صادرة من دولة المستأجر مطلوبة عند استئجار السيارة<br />
                                - اسعار التأجير تتغير مثل تغير اسعار حجز تذاكر الطيران , ولكن السعر لن يتغير عندما تقوم بعمل الحجز. ولكن يتغير سعر التأجير مع مدة التأجير.</p>
                        </div>
                    </div>
                    <div class="clr"></div><br>
                    <h5 class="card-title CT1"><i class="fa fa-align-right"></i> إرسال طلب تأجير </h5>
                    <div class="clr"></div>
                    <div style="width:100%;">
                        <div class="card-body">
                            <p class="card-text rent-infotext">
                            <form action method="post" class="form-rent-req">
                                <div class="alert alert-info" role="alert">يجب أن تكون عضو في الموقع قبل إرسال طلب الحجز<div class="clr"></div>
                                    <a href="#" data-toggle="modal" data-target="#LoginModal">إضغط هنا لتسجيل</a>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>الإسم الكريم</label>
                                        <input type="text" name="fullname" class="form-control form-control-lg" placeholder="الإسم الكريم" style="border-color: #007EE4;" required disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>تاريخ الحجز من : </label>
                                        <input type="date" name="from" class="form-control form-control-lg" style="border-color: #007EE4;" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>إلى </label>
                                        <input type="date" name="to" class="form-control form-control-lg" style="border-color: #007EE4;" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">عنوانك</label>
                                    <input type="text" name="adresse" class="form-control form-control-lg" placeholder="مدينة / المنطقة مكان التسليم..." style="border-color: #007EE4;" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">رقم الهاتف</label>
                                    <input type="number" name="mobile" class="form-control form-control-lg" placeholder="رقم الهاتف" style="border-color: #007EE4;" required disabled>
                                </div>
                                <label for="inputAddress2">حدد السيارة</label>
                                <select class="form-control form-control-lg" name="carname" style="border-color: #007EE4;height:55px;" disabled>
                                    <option value selected>لا توجد أي سيارة في الوكالة</option>
                                </select>
                                <br>
                                <button type="submit" name="sendrev" class="btn btn-primary">أرسل الحجز </button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
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
