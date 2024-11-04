<script type="text/javascript">
    $(document).ready(function() {
        $('#brand').on('change', function() {
            var brandID = $(this).val();
            if (brandID) {
                $.ajax({
                    type: 'POST',
                    url: 'https://www.chakirdev.com/demo/Cars/ajaxData.php',
                    data: 'brand_id=' + brandID,
                    success: function(html) {
                        $('#subbrand').html(html);
                    }
                });
            } else {
                $('#subbrand').html('<option value="">حدد الماركة أولا</option>');
            }
        });
    });

    $(document).ready(function() {
        $('#country').on('change', function() {
            var placeID = $(this).val();
            if (placeID) {
                $.ajax({
                    type: 'POST',
                    url: 'https://www.chakirdev.com/demo/Cars/ajaxData.php',
                    data: 'place_id=' + placeID,
                    success: function(html) {
                        $('#subplace').html(html);
                    }
                });
            } else {
                $('#subplace').html('<option value="">حدد البلد أولا</option>');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#owl-brand').owlCarousel({
            rtl: true,
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 4,
                    nav: false
                },
                600: {
                    items: 6,
                    nav: false
                },
                1000: {
                    items: 8,
                    nav: false,
                    loop: false
                }
            }
        });
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
        $('#owl-carold').owlCarousel({
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
        $('#owl-topcar').owlCarousel({
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
<footer class="clearfix2" style="background:url('images/back.png');">
    <style>
        .copy a {
            color: #3E5252;
            margin-top: 20px;
            font-size: 15px;
            font-weight: bold;
            padding: 0 0 30px 0;
        }

        .copy a:hover {
            color: #e4353a;
        }
    </style>
    <div class="clearfix2 footer-right">
        <div class="center">
            <img width="150px" src="{{asset('assets/front/uploads/logo.png')}}" />
            <div class="clr"></div>
            <h5> عن موقع "عراق أوتو كار "</h5>
            <p> موقع "عراق أوتو كار" يعد مزيجاً مثالياً من الأناقة والوظائف المتقدمة لعالم بيع وشراء السيارات في العراق. يفتح الموقع أبوابه بتصميم مذهل يجمع بين الحداثة والبساطة، مما يجعل تجربة التصفح سهلة وممتعة منذ اللحظة الأولى. </p>
        </div>
    </div>
    <div class="bgfooter clearfix2 footer-left" style="background-image: url('{{ asset('assets/front/uploads/car3.jpg') }}');">
        <div class="layerfooter">
            <div class="listgp display-footer">
                <a href="#" class="list-group-item listitem link-foot"><i class="fa fa-link"></i> روابط سريعة</a>
                <a href="new-car.html" class="list-group-item listitem"><i class="fa fa-car"></i> سيارات جديدة</a>
                <a href="used-car.html" class="list-group-item listitem"><i class="fa fa-car"></i> سيارات
                    مستعملة</a>
                <a href="cars-agencies.html" class="list-group-item listitem"><i class="fas fa-building"></i>
                    الوكالات</a>
                <a href="showrooms.html" class="list-group-item listitem"><i class="fas fa-building"></i>
                    المعارض</a>
                <a href="brands.html" class="list-group-item listitem"><i class="fas fa-ring"></i> الماركات</a>
            </div>
            <div class="listgp display-footer">
                <a href="#" class="list-group-item listitem link-foot"><i class="fa fa-link"></i> روابط سريعة</a>
                <a href="rent.html" class="list-group-item listitem"><i class="fas fa-handshake"></i> تأجير</a>
                <a href="car-numbers.html" class="list-group-item listitem"><i class="fas fa-sort-numeric-up"></i>
                    أرقام مميزة</a>
                <a href="auto-repair.html" class="list-group-item listitem"><i class="fas fa-wrench"></i> مراكز
                    الصيانة</a>
                <a href="forums.html" class="list-group-item listitem"><i class="far fa-comments"></i> منتدى
                    الأراء</a>
                <a href="blog.html" class="list-group-item listitem"><i class="far fa-newspaper"></i> المدونة</a>
            </div>
            <div class="listgp">
                <a href="#" class="list-group-item listitem link-foot"><i class="fa fa-globe"></i> الصفحات </a>
                <a href="contactus.php" class="list-group-item listitem"><i class="fas fa-headset"></i> إتصل
                    بنا</a>
                <a href="aboutus.php" class="list-group-item listitem"><i class="fas fa-inbox"></i> من نحن</a>
                <a href="subscription.php" class="list-group-item listitem"><i class="fas fa-star"></i> العضويات
                    المميزة</a>
                <a href="terms.php" class="list-group-item listitem"><i class="fas fa-inbox"></i> شروط
                    الاستخدام</a>
                <a href="privacy.php" class="list-group-item listitem"><i class="fas fa-user-secret"></i>
                    الخصوصية</a>
                <a href="faq.php" class="list-group-item listitem"><i class="fas fa-comments"></i> أسئلة
                    وإجابات</a>
            </div>
        </div>
    </div>
</footer>
<div class="bottom_footer">
    <div class="data">
        <div class="right-bottom" style="margin-top: 50px;">
            <p> جميع الحقوق محفوظة لـ موقع "عراق أوتو كار" @ 2024 </p>
        </div>
        <div class="left-bottom">
            <div class="follow_us">
                <p> تابعونا علي </p>
                <ul class="list-unstyle">
                    <li> <a href="#"> <i class="bi bi-facebook"></i> </a> </li>
                    <li> <a href="#"> <i class="bi bi-twitter-x"></i> </a> </li>
                    <li> <a href="#"> <i class="bi bi-instagram"></i> </a> </li>
                    <li> <a href="#"> <i class="bi bi-pinterest"></i> </a> </li>
                </ul>
            </div>
            <div class="page_links">
                <ul class="list-unstyled">
                    <li> <a href="#"> الشروط والاحكام  </a> </li>
                    <li> <a href="#"> سياسة الخصوصية  </a> </li>
                    <li> <a href="#"> اتصل بنا  </a> </li>
                    <li> <a href="#"> خريطة الموقع  </a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- <link rel="stylesheet"
        href="../../../cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" /> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- <link rel="stylesheet"
        href="../../../cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" /> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- <script src="../../../cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

<!-- Mirrored from www.chakirdev.com/demo/Cars/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2024 08:13:06 GMT -->

</html>
