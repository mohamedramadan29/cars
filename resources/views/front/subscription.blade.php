@extends('front.layouts.master')
@section('title')
    العضويات
@endsection
@section('content')
    <title> العضويات المميزة </title>
    <script src="../../../www.google.com/recaptcha/api.js" async defer></script>
    <div id="HomePage">
        <div class="card PageCard" style="background:#F8F8F8;">
            <div class="card-body" style="padding:30px;">
                <center>
                    <h2 class="subs-title"><i class="fas fa-star-half-alt"></i> العضويات المميزة </h2>
                    <p class="subs-text"> تتيح لك العضوية المميزة الإستفادة القصوى من خصائص الموقع مقارنة بالعضوية العادية
                        المجانية وذلك لتحقيق أفضل النتائج </p>
                </center>
                <div class="clr"></div>
                <section class="pricing py-4" id="navbar-example2">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-5 mb-lg-0 price1">
                                <div class="card-header">
                                    <h5 class="card-title text-muted text-uppercase text-center"> مجاني </h5>
                                    <h6 class="card-price text-center">0$<span class="period">/شهريا </span></h6>
                                </div>
                                <div class="card-body">
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إضافات 10 إعلانات فقط
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 1 أرقام
                                            سيارات</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 1 مراكز
                                            الصيانة</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> رابط خاص لحسابك</li>
                                        <li class="text-muted"><span class="fa-li"><i
                                                    class="fas fa-times text-muted"></i></span> لا يمكن إضافة معارض </li>
                                        <li class="text-muted"><span class="fa-li"><i
                                                    class="fas fa-times text-muted"></i></span> لا يمكن إضافة وكالات </li>
                                        <li class="text-muted"><span class="fa-li"><i
                                                    class="fas fa-times text-muted"></i></span> لا يمكن إضافة مكاتب التأجير
                                        </li>
                                    </ul>
                                    <a href="#order" class="btn btn-block btn-info"> اشترك </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card mb-5 mb-lg-0 price2">
                                <div class="card-header">
                                    <h5 class="card-title text-muted text-uppercase text-center"> الفضي </h5>
                                    <h6 class="card-price text-center">9$<span class="period">/شهريا </span></h6>
                                </div>
                                <div class="card-body">
                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إضافات 200 إعلانات
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> رابط خاص لحسابك</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إحصائيات إعلاناتك و
                                            معارضك</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> 2 إعلانات مميزة من
                                            اختيارك</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 5 معارض
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 5 وكالات
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 10 أرقام
                                            سيارات</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 10 مراكز
                                            الصيانة</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> صفحة الحساب المميز
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> علامة الحساب المميز
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> الترقية ترفع الإيقاف عن
                                            العضويات المحظورة </li>
                                    </ul>
                                    <a href="#order" class="btn btn-block btn-info"> اشترك </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card price3">
                                <div class="card-header">
                                    <h5 class="card-title text-muted text-uppercase text-center"> الذهبي </h5>
                                    <h6 class="card-price text-center">49$<span class="period">/شهريا </span></h6>
                                </div>
                                <div class="card-body">

                                    <ul class="fa-ul">
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إضافات 500 إعلانات
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> رابط خاص لحسابك</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إحصائيات إعلاناتك و
                                            معارضك</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> 20 إعلانات مميزة من
                                            اختيارك</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 10 معارض
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 10 وكالات
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 60 أرقام
                                            سيارات</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إمكانية إضافة 40 مراكز
                                            الصيانة</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> صفحة الحساب المميز
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> علامة الحساب المميز
                                        </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> الترويج إعلاناتك على
                                            صفحة الأولى</li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> نشر إعلاناتك على
                                            صفحات تواصل </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> إستفادة من مساحات
                                            إعلانية </li>
                                        <li><span class="fa-li"><i class="fas fa-check"></i></span> الترقية ترفع الإيقاف
                                            عن العضويات المحظورة </li>
                                    </ul>
                                    <a href="#order" class="btn btn-block btn-info"> اشترك </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
                    <div class="clr" id="order"></div><br>
                    <center>
                        <h2 class="subs-title"><i class="far fa-handshake"></i> إشترك الأن </h2>
                    </center>
                    <div class="clr"></div>
                    <form action method="post" class="form-rent-req">
                        <div class="alert alert-info" role="alert"> يجب أن تكون عضو في الموقع قبل إرسال طلب الإشتراك
                            <div class="clr"></div>
                            <a href="#" data-toggle="modal" data-target="#LoginModal"> إضغط هنا لتسجيل </a>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputAddress2"> حدد نوع الإشتراك </label>
                                <select class="form-control form-control-lg" name="subject"
                                    style="border-color: #007EE4;height:55px;border-radius:0px;" disabled>
                                    <option value="الفضي"> الفضي </option>
                                    <option value="الذهبي"> الذهبي </option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputAddress2"> وسيلة الدفع </label>
                                <select class="form-control form-control-lg" name="msg"
                                    style="border-color: #007EE4;height:55px;border-radius:0px;" disabled>
                                    <option value="Bank Transfer"> تحويل بنكي </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2"> الاسم كامل </label>
                            <input type="text" name="fullname" class="form-control form-control-lg"
                                placeholder="الاسم كامل " style="border-color: #007EE4;" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2"> البريد الالكتروني </label>
                            <input type="text" name="email" class="form-control form-control-lg"
                                placeholder="البريد الالكتروني" style="border-color: #007EE4;" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2"> رقم الهاتف </label>
                            <input type="number" name="mobile" class="form-control form-control-lg"
                                placeholder="رقم الهاتف " style="border-color: #007EE4;">
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-theme="light"
                                data-sitekey="6LetnQATAAAAAF0iiOBKpJcLHZQRnRyaqhxXlVxg"></div>
                        </div>
                        <br>
                        <button type="submit" name="sendorder" class="lft btn btn-success"> ارسل الطلب </button>
                    </form>
                </div>
                <center>
                    <div class="clr"></div><br><br><br>
                    <h2 class="subs-title"><i class="fas fa-comments-dollar"></i> خيارات الدفع </h2>
                    <div class="clr"></div>
                    <p class="subs-text2" style="margin-top:10px;">
                        1- يمكنك الإشتراك والدفع عبر البطاقة الإئتمانية من خلال خدمة PayPal وتفعيل الخدمة مباشرة <br />
                        <br />
                        2- الإيداع أو التحويل البنكي ثم التواصل مع الإدارة
                    </p>
                    <div class="clr"></div><br><br><br>
                    <h2 class="subs-title"><i class="far fa-comments"></i> تواصل معنا </h2>
                    <div class="clr"></div>
                    <p class="subs-text">
                        <a href="https://api.whatsapp.com/send?phone=212632551533" class="btn btn-success"
                            style="margin:10px;"><i class="fab fa-whatsapp"></i> عبر الواتساب : 212632551533</a> or
                        <a href="contactus-2.html" class="btn btn-danger" style="margin:10px;"><i
                                class="fa fa-envelope"></i> ارسل رسالة لبريد الموقع </a>
                    </p>
                </center>
            </div>
            <div class="clr"></div><br>
        </div>
    </div>
    <div class="clr"></div><br>
@endsection
