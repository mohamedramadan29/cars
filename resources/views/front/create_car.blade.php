@extends('front.layouts.master')
@section('title')
    اضافة سيارة
@endsection
@section('content')
<div id="HomePage">
    <center>
        <p class="home-title"><i class="fa fa-car"></i>  بيع سيارتك مجانا </p>
    </center>
    <div class="card CreateCard">
        <div class="card-body">
            <h5 class="card-title" style="font-weight:bold;color:#22426E;"> أدخل معلومات سيارتك </h5>
            <h6 class="card-subtitle mb-2 text-muted"> جميع الحقول التي تحمل علامة  <span style="color: #c72510;"> * </span>إلزامية </h6>
            <div class="card-text" style="padding-top:20px;">
                <div class="alert alert-light"> يجب تسجيل دخولك للموقع قبل إدخال سيارة جديدة .
                    <button type="button" class="btn gradient-btn btn-sm" data-toggle="modal" data-target="#LoginModal" id="logModal">  اضغط هنا للتسجيل  </button>
                </div>
            </div>
        </div>
    </div>
    <div class="clr"></div><br>
    <div class="card CreateCard">
        <div class="card-body">
            <div class="alert alert-info" style="background-color:#28A745;color:#fff"><i class="fab fa-whatsapp"></i>   للمساعدة المباشرة، تواصل معنا عبر الواتس أب التالي : <span style="font-weight:bold;">212632551533</span></div>
        </div>
    </div>

    <link href="imagesfiles/jquery.fileuploader.css" media="all" rel="stylesheet">
    <link href="imagesfiles/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">

    <script src="imagesfiles/jquery.fileuploader.min.js" type="text/javascript"></script>
    <script src="imagesfiles/custom.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#brand').on('change', function() {
                var brandID = $(this).val();
                if (brandID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxData.php',
                        data: 'brand_id=' + brandID,
                        success: function(html) {
                            $('#subbrand').html(html);
                        }
                    });
                } else {
                    $('#subbrand').html('<option value="">Select the brand first</option>');
                }
            });
        });

        $(document).ready(function() {
            $('#place').on('change', function() {
                var placeID = $(this).val();
                if (placeID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajaxData.php',
                        data: 'place_id=' + placeID,
                        success: function(html) {
                            $('#subplace').html(html);
                        }
                    });
                } else {
                    $('#subplace').html('<option value="">Select country first</option>');
                }
            });
        });
    </script>
    <div class="clr"></div><br>
</div>
<div class="clr"></div><br>
@endsection
