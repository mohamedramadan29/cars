@extends('front.layouts.master')
@section('title')
    تواصل معنا
@endsection
@section('content')
    <div class="clr"></div><br>
    <div id="HomePage">
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
        <script src="../../../www.google.com/recaptcha/api.js" async defer></script>
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
        <a href="{{url('faqs')}}" class="rgt card pages-card">
            <div class="card-body">
                <center>
                    <i class="far fa-comments fa-2x"></i>
                    <div class="clr"></div>
                    <h5 class="card-title"> الاسئلة الشائعه </h5>
                </center>
            </div>
        </a>
        <a href="{{url('contactus')}}" class="rgt card pages-card" style="border:1px dashed var(--main-color);">
            <div class="card-body">
                <center>
                    <i class="fas fa-headset fa-2x" style="color:var(--main-color);"></i>
                    <div class="clr"></div>
                    <h5 class="card-title" style="color:var(--main-color);"> تواصل معنا </h5>
                </center>
            </div>
        </a>
        <div class="clr"></div>
        <br>
        <div class="rgt card contact-card">
            <div class="card-body">
                <h5 class="card-title" style="font-weight:bold;"> نموذج الاتصال </h5>
                <div class="card-text pages-text">
                    <form action="{{url('contactus')}}" method="post" class="p-form">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <select class="custom-select my-1 mr-sm-2 form-control-lg select-form" name="category"
                                        style="height:45px;">
                                    <option selected> يرجي اختيار الموضوع</option>
                                    <option value="Technical issue">Technical issue</option>
                                    <option value="Website Inquiry">Website Inquiry</option>
                                    <option value="Premium Accounts Problem">Premium Accounts Problem</option>
                                    <option value="Car Sales Problems">Car Sales Problems</option>
                                    <option value="Featured Ads Problems">Featured Ads Problems</option>
                                    <option value="Another Inquiry">Another Inquiry</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control form-control-lg input-form"
                                       placeholder=" الاسم كامل  ">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" class="form-control form-control-lg input-form"
                                       placeholder=" رقم الهاتف  ">
                            </div>
                            <div class="col-12">
                                <input type="email" name="email" class="form-control form-control-lg input-form"
                                       placeholder=" البريد الالكتروني  " required>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control form-control-lg" name="message" rows="4"
                                          placeholder=" رسالتك  " required></textarea>
                            </div>
                            <div class="col-12">
                                <div class="g-recaptcha" data-theme="light"
                                     data-sitekey="6LetnQATAAAAAF0iiOBKpJcLHZQRnRyaqhxXlVxg"></div>
                            </div>
                            <div class="col-6">
                                <button type="submit" name="Send" class="btn btn-primary"> ارسل الرسالة</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="rgt card contact-card">
            <div class="card-body">
                <h5 class="card-title" style="font-weight:bold;"> الاتصال بنا </h5>
                <div class="card-text pages-text">
                    <p style="font-weight:bold;font-size:15px;"> الرجاء عدم التردد في الاتصال بموقع سيارات - Cars
                        والاستعلام عن كيفية استخدام الموقع، وكيفية عرض السيارات للبيع بدون عمولات او رسوم، وكيفية ترقية
                        اعلانك أو أي مسألة أخرى تتعلق بالموقع . </p>
                    <div class="clr"></div>
                    <br>
                    <div><i class="fas fa-map-marker-alt" style="color:var(--main-color);"></i> عنوان الشركة</div>
                    <div><i class="fas fa-envelope" style="color:var(--main-color);"></i> <a href="#"
                                                                                             class="__cf_email__"
                                                                                             data-cfemail="cfaca7aea4a6bdabaab98fa0babba3a0a0a4e1aca0a2">
                            MR@gmail.com </a></div>
                    <div><i class="fa fa-phone" style="color:var(--main-color);"></i> 212632551533</div>
                    <div><i class="fab fa-whatsapp" style="color:var(--main-color);font-size:25px;"></i> 212632551533
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clr"></div><br>

@endsection
