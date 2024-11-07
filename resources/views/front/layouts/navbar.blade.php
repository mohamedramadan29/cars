<div class="top">

    <div class="top_navbar">
        <div class="top_bar_links">
            <ul class="list-unstyled">
                <li> <a href="#"> <i class="bi bi-person-vcard-fill"></i> من نحن </a> </li>
                <li> <a href="#"> <i class="bi bi-envelope-open-fill"></i> اتصل بنا </a> </li>
                <li> <a href="#"> <i class="bi bi-shield-fill-check"></i> سياسة الخصوصية </a> </li>
                <li> <a href="#"> <i class="bi bi-file-earmark-ruled-fill"></i> اتفاقية الاستخدام </a> </li>
                <li> <a href="#"> <i class="bi bi-file-earmark-zip-fill"></i> الارشيف </a> </li>
            </ul>
        </div>
        <div class="top_bar_social">
            <ul class="list-unstyled">
                <li> <a href="#"> <i class="bi bi-facebook"></i> </a> </li>
                <li> <a href="#"> <i class="bi bi-twitter-x"></i> </a> </li>
                <li> <a href="#"> <i class="bi bi-instagram"></i> </a> </li>
                <li> <a href="#"> <i class="bi bi-pinterest"></i> </a> </li>
                <li> <a href="#"> <i class="bi bi-telegram"></i> </a> </li>
                <li> <a href="#"> <i class="bi bi-youtube"></i> </a> </li>
            </ul>
        </div>
    </div>
</div>
<div class="display-mobile">
    <div class="clearfix2 mobileNav">
        <div class="rgt">
            <a href="index.php"><img src="{{asset('assets/front/uploads/logo.png')}}" style="width:130px;" /> </a>
        </div>
        <div class="lft iconPart">
            <a href="#" data-toggle="modal" data-target="#LoginModalmain"><i class="fa fa-users"></i></a>
            <a href="adv-search.html"><i class="fa fa-search"></i></a>
            <a href="#" onclick="openNav()"><i class="fa fa-bars"></i></a>
        </div>
    </div>
</div>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php"><i class="fa fa-home"></i> الرئيسية </a>
    <a href="create.html"><i class="fa fa-plus"></i> بيع سيارتك </a>
    <a href="new-car.html"><i class="fa fa-car"></i> سيارات جديدة</a>
    <a href="used-car.html"><i class="fa fa-car"></i> سيارات مستعملة </a>
    <a href="#" data-toggle="modal" data-target="#LoginModal"><i class="fas fa-user-shield"></i> تسجيل الدخول</a>
    <a href="index9ed2.html?lang=en"><i class="fa fa-globe"></i> English </a>
    <a href="#" data-toggle="modal" data-target="#flagsModal">
        <img src="images/ma.png" style="width:32px;" />
    </a>
    <div class="clr"></div>
    <hr style="color:#333333;" />
    <div class="navink-mobile">
        <a href="cars-agencies.html"><i class="fas fa-building"></i> الوكالات</a>
        <a href="showrooms.php"><i class="fas fa-car"></i> المعارض</a>
        <a href="rent.html"><i class="fas fa-handshake"></i> تأجير</a>
        <a href="car-numbers.php"><i class="fas fa-sort-numeric-up"></i> أرقام مميزة</a>
        <a href="auto-repair.html"><i class="fas fa-wrench"></i> مراكز الصيانة</a>
        <a href="brands.html"><i class="fas fa-ring"></i> الماركات</a>
        <a href="forums.php"><i class="far fa-comments"></i> منتدى الأراء</a>
        <a href="blog.html"><i class="far fa-newspaper"></i> المدونة</a>
        <a href="subscription.html"><i class="fas fa-star"></i> العضويات المميزة</a>
        <a href="contactus.html"><i class="fas fa-headset"></i> إتصل بنا</a>
        <div class="clr"></div>
        <hr style="color:#333333;" />
        <center>
            <img src="images/a3.png" />
            <div class="clr"></div>
            <div class="copy"><a href="https://www.chakirdev.com/" target="_blank" style="font-size:12px;">POWERED
                    BY CHAKIRDEV</a></div>
        </center>
    </div>
</div>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.body.style.backgroundColor = "white";
    }
</script>
<div class="clr"></div>
<div style="background:white;">
    <div id="HomePage" class="display-desk">

        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{url('/')}}"><img width="120px" src="{{asset('assets/front/uploads/logo.png')}}" style /></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="new-car.php"><i class="fa fa-car"></i> سيارات جديدة </a></li>
                    <li class="nav-item"><a href="used-car.php"><i class="fa fa-car"></i> سيارات مستعملة</a></li>
                </ul>
                @if(Auth::check())
                    <a href="{{url('user/car/add')}}" class="rgt btn gradient-btn btn-sm" style="margin-right:10px;"><i
                            class="fa fa-plus"></i> بيع سيارتك</a>
                @else
                    <a href="{{url('create-car')}}" class="rgt btn gradient-btn btn-sm" style="margin-right:10px;"><i
                            class="fa fa-plus"></i> بيع سيارتك</a>
                @endif

                <a href="create-2.html" class="rgt btn gradient-btn btn-sm" style="margin-right:10px;"><i
                        class="fa fa-plus"></i> بيع دراجتك </a>
            </div>
            <ul class="navbar-nav">
                @if(Auth::check())
                    <li class="nav-item login_nav">
                        <a href="{{url('user/dashboard')}}">
                            <i class="bi bi-person-circle"></i> حسابي  <i class="bi bi-text-paragraph"></i> </a>
                    </li>
                @else
                    <li class="nav-item login_nav">
                        <a data-toggle="modal" data-bs-target="#LoginModallarge" data-bs-toggle="modal">
                            <i class="bi bi-person-circle"></i> تسجيل الدخول <i class="bi bi-text-paragraph"></i> </a>
                    </li>


                    <li class="nav-item login_nav register_nav">
                        <a href="#" data-toggle="modal" data-target="#LoginModal">
                            <i class="bi bi-person-fill-add"></i> انشاء حساب جديد <i class="bi bi-text-paragraph"></i> </a>
                    </li>
                @endif

                <li class="nav-item countryflags">
                    <a href="#" data-toggle="modal" data-target="#flagsModal">
                        <img src="{{asset('assets/front/uploads/ma.png')}}" style="width:32px;" />
                    </a>
                </li>
                <li class="nav-item" style="margin-top:10px;">
                    <a href="index9ed2.html?lang=en"><i class="fas fa-globe"></i> EN</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<div class="shadow display-desk">
    <div class="navbar navbar-expand-lg" id="HomePage">
        <ul class="navbar-nav navbtm">
            <li><a href="{{url('agency')}}"><i class="fas fa-building"></i> الوكالات</a></li>
            <li><a href="{{url('showrooms')}}"><i class="fas fa-car"></i> المعارض</a></li>
            <li><a href="{{url('rent')}}"><i class="fas fa-handshake"></i> تأجير </a></li>
            <li><a href="{{url('car_numbers')}}"><i class="fas fa-sort-numeric-up"></i> أرقام مميزة</a></li>
            <li><a href="{{url('auto-repair')}}"><i class="fas fa-wrench"></i> مراكز الصيانة</a></li>
            <li><a href="{{url('forums')}}"><i class="far fa-comments"></i> منتدى الأراء</a></li>
            <li><a href="subscription.php"><i class="fas fa-star"></i> العضويات المميزة</a></li>
        </ul>
    </div>
</div>


<div class="modal fade" id="LoginModallarge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-weight: bold" class="modal-title" id="exampleModalLabel">تسجيل الدخول / تسجيل عضوية
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="logreg-forms">
                    <form id="logform" method="post" autocomplete="off" class="form-signin">
                        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> دخول عبر</h1>
                        <div class="social-login">
                            <a href="https://www.facebook.com/v3.2/dialog/oauth?client_id=1691520907771284&amp;state=2b5c16521c44b86f6a9fdd4116efbd72&amp;response_type=code&amp;sdk=php-sdk-5.7.0&amp;redirect_uri=https%3A%2F%2Fwww.chakirdev.com%2Fdemo%2FCars%2F&amp;scope=email"
                               class="btn facebook-btn social-btn"><span><i class="fab fa-facebook-f"></i> تسجيل عن
                                    طريق الفيسبوك</span> </a>
                        </div>
                        <div class="social-login">
                            <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&amp;access_type=online&amp;client_id=165397382251-uhk4o60603v4l0h5sitevnn7sr0pngks.apps.googleusercontent.com&amp;redirect_uri=https%3A%2F%2Fwww.chakirdev.com%2Fdemo%2FCars%2Fg-callback.php&amp;state&amp;scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fplus.login%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&amp;approval_prompt=auto"
                               class="btn google-btn social-btn"><span><i class="fab fa-google-plus-g"></i> تسجيل
                                    عن طريق جوجل</span> </a>
                        </div>
                        <p style="text-align:center">أو</p>
                        <div id="result2" class="mt-2"></div>
                        <div class="clr"></div>
                        <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني"
                               required autofocus>
                        <input type="password" name="password" class="form-control" placeholder="كلمة السر"
                               required>
                        <button style="width: 100%; margin-top:15px" class="btn btn-success btn-block" type="button" id="loginBtn" name="submit"><i
                                class="fas fa-sign-in-alt"></i> دخول</button>
                        <a href="resetpass.html">نسيت كلمة السر ؟</a>
                        <hr>

                        <button style="width: 100%;" class="btn btn-primary btn-block" type="button" id="btn-signup"><i
                                class="fas fa-user-plus"></i> تسجيل حساب جديد</button>
                    </form>
                    <form id="regform" method="post" autocomplete="off" class="form-signup">
                        @csrf
                        <div class="social-login">
                            <a href="https://www.facebook.com/v3.2/dialog/oauth?client_id=1691520907771284&amp;state=2b5c16521c44b86f6a9fdd4116efbd72&amp;response_type=code&amp;sdk=php-sdk-5.7.0&amp;redirect_uri=https%3A%2F%2Fwww.chakirdev.com%2Fdemo%2FCars%2F&amp;scope=email"
                               class="btn facebook-btn social-btn"><span><i class="fab fa-facebook-f"></i> تسجيل عن
                                    طريق الفيسبوك</span> </a>
                        </div>
                        <div class="social-login">
                            <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&amp;access_type=online&amp;client_id=165397382251-uhk4o60603v4l0h5sitevnn7sr0pngks.apps.googleusercontent.com&amp;redirect_uri=https%3A%2F%2Fwww.chakirdev.com%2Fdemo%2FCars%2Fg-callback.php&amp;state&amp;scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fplus.login%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&amp;approval_prompt=auto"
                               class="btn google-btn social-btn"><span><i class="fab fa-google-plus-g"></i> تسجيل
                                    عن طريق جوجل</span> </a>
                        </div>
                        <p style="text-align:center">أو</p>
                        <div id="result" class="mt-2"></div>
                        <div class="clr"></div>
                        <input type="text" name="name" id="name" class="form-control"
                               placeholder="الإسم كامل" autofocus>
                        <input type="email" name="email" id="user-email" class="form-control"
                               placeholder="البريد الإلكتروني" autofocus>
                        <input type="number" name="phone" id="user-mobile" class="form-control"
                               placeholder="رقم الهاتف" autofocus>
                        <input type="password" name="password" id="user-pass" class="form-control"
                               placeholder="كلمة السر" autofocus>
                        <button class="btn btn-primary btn-block" type="button" id="registerBtn" name="submit"><i
                                class="fas fa-user-plus"></i> تسجيل </button>
                        <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> رجوع</a>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="flagsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight:bold;color:#3160A5;"> تصفح إعلانات
                    دولة معينة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="index4e36.html?countrycode=KSA" class="btn btn-light btnflags">
                    <img src="images/ksa.png" />
                    <div class="clr"></div>
                    <div class="flagstext">السعودية </div>
                </a>
                <a href="indexe44e.html?countrycode=MA" class="btn btn-light btnflags">
                    <img src="images/ma.png" />
                    <div class="clr"></div>
                    <div class="flagstext">المغرب </div>
                </a>
                <a href="index356f.html?countrycode=UAE" class="btn btn-light btnflags">
                    <img src="images/uae.png" />
                    <div class="clr"></div>
                    <div class="flagstext">الإمارات </div>
                </a>
                <a href="index0034.html?countrycode=QT" class="btn btn-light btnflags">
                    <img src="images/qt.png" />
                    <div class="clr"></div>
                    <div class="flagstext">قطر </div>
                </a>
                <a href="indexa518.html?countrycode=KW" class="btn btn-light btnflags">
                    <img src="images/kw.png" />
                    <div class="clr"></div>
                    <div class="flagstext">الكويت </div>
                </a>
                <a href="index10f3.html?countrycode=JO" class="btn btn-light btnflags">
                    <img src="images/jo.png" />
                    <div class="clr"></div>
                    <div class="flagstext">الأردن </div>
                </a>
                <a href="index856e.html?countrycode=BH" class="btn btn-light btnflags">
                    <img src="images/bh.png" />
                    <div class="clr"></div>
                    <div class="flagstext">البحرين </div>
                </a>
                <a href="indexaa8c.html?countrycode=OM" class="btn btn-light btnflags">
                    <img src="images/om.png" />
                    <div class="clr"></div>
                    <div class="flagstext">عمان </div>
                </a>
                <a href="indexf2ba.html?countrycode=EG" class="btn btn-light btnflags">
                    <img src="https://www.chakirdev.com/404.html" />
                    <div class="clr"></div>
                    <div class="flagstext">مصر </div>
                </a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function toggleResetPswd(e) {
        e.preventDefault();
        $('#logreg-forms .form-signin').toggle() // display:block or none
        $('#logreg-forms .form-reset').toggle() // display:block or none
    }

    function toggleSignUp(e) {
        e.preventDefault();
        $('#logreg-forms .form-signin').toggle(); // display:block or none
        $('#logreg-forms .form-signup').toggle(); // display:block or none
    }

    $(() => {
        // Login Register Form
        $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
        $('#logreg-forms #cancel_reset').click(toggleResetPswd);
        $('#logreg-forms #btn-signup').click(toggleSignUp);
        $('#logreg-forms #cancel_signup').click(toggleSignUp);
    })
</script>
<script>
    $(document).ready(function() {
        // Set up the CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#registerBtn").click(function() {
            var formData = $('#regform').serialize();
            $.ajax({
                type: "POST",
                url: '{{ url('user/register') }}',
                data: formData,
                beforeSend: function() {
                    $("#result").text(" جاري التسجيل ... ");
                },
                success: function(res) {
                    $("#result").html(res.message);
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        $.each(errors, function(key, value) {
                            errorMessages += value[0] + '<br>';
                        });
                        $("#result").html(errorMessages);
                    } else {
                        $("#result").text(" فشل التسجيل من فضلك حاول مرة اخري  ");
                    }
                }
            });
        });

    });
    $("#loginBtn").click(function() {
        var formData = $('#logform').serialize();
        $.ajax({
            type: "POST",
            url: '{{ url('login') }}',
            data: formData,
            beforeSend: function() {
                $("#result2").text("Please wait..");
            },
            success: function(res) {
                if (res.redirect) {
                    window.location.href = res.redirect;
                } else if (res.error) {
                    $("#result2").text(res.error);
                }
            },
            error: function(e) {
                if (e.status === 422) {
                    var errors = e.responseJSON.errors;
                    var errorMsg = "";
                    $.each(errors, function(key, value) {
                        errorMsg += value[0] + "<br>";
                    });
                    $("#result2").html(errorMsg);
                } else {
                    $("#result2").text("Failed to login. Please try again.");
                }
            }
        });
    });
</script>
