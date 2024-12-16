@extends('front.layouts.master')
@section('title')
    عن الموقع
@endsection
@section('content')
<div class="clr"></div><br>

<div id="HomePage">
    <a href="{{url('pub')}}" class="rgt card pages-card">
        <div class="card-body">
            <center>
                <i class="fas fa-bullhorn fa-2x"></i>
                <div class="clr"></div>
                <h5 class="card-title"> أعلن معنا </h5>
            </center>
        </div>
    </a>
    <a href="{{url('aboutus')}}" class="rgt card pages-card" style="border:1px dashed var(--main-color);">
        <div class="card-body">
            <center>
                <i class="far fa-lightbulb fa-2x" style="color:var(--main-color);"></i>
                <div class="clr"></div>
                <h5 class="card-title" style="color:var(--main-color);"> عن الموقع </h5>
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
    <a href="{{url('contactus')}}" class="rgt card pages-card">
        <div class="card-body">
            <center>
                <i class="fas fa-headset fa-2x"></i>
                <div class="clr"></div>
                <h5 class="card-title"> تواصل معنا </h5>
            </center>
        </div>
    </a>
    <div class="clr"></div><br>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" style="font-weight:bold;"> عن الموقع </h5>
            <div class="card-text" style="line-height:35px;">
                <p style=""> يعد موقع أحد أكبر المواقع الإلكترونية المتخصصة بالإعلانات التي تتيح لمستخدميه البحث بكل سهولة ويُسر عن حاجياته أو عرضها للبيع.

                    فهنالك قائمة الإلكترونيات التي تفتح المجال للمستخدم إيجاد العديد من عروض البيع والشراء لجميع الأجهزة الإلكترونية على حد سواء؛ من المعدّات الثقيلة كالطابعات والتلفاز وغيرها إلى أجهزة الكمبيوتر والأجهزة المحمولة وألعاب الفيديو وغيرها الكثير.

                    كما يمكن للمتصفّح استعراض قائمة الموضة المتخصصة بالأزياء والاكسسوارات ولوازم الأطفال إلى جانب العطور والمستحضرات التجميلية والكثير من الخيارات. كما بإمكانه العثور على قائمة المنزل التي تعرض له جميع الإعلانات المتاحة حول أثاث المنزل وما يحتاجه من معدّات كهربائية وإكسسوارات خاصة.

                    ثم يجد الباحث قائمة للبيع والتي تتيح له فرصة إيجاد أو الإعلان عن أجهزة أو كتب أو أرقام هواتف أو أي شيْ للبيع. ومن ثم ينتقل إلى قائمة والتي يسعى موقع السوق المفتوح من خلالها إلى تسهيل عملية البحث عن الخدمات المنزلية والطبية والكهربائية والتقنية وغيرها من الخدمات التي تلاقي رواجاً كبيراً

                    .لتأتي بعد ذلك قائمة سيارات ومركبات والتي تعتبر وجهة لأولى للباحثين عن عرض سياراتهم للبيع أو لشراء سيارة سواء كانت جديدة أو مستعملة. وتخدم قائمة عقارات الكثير من الباحثين عن إيجار أو شراء أو حتى عرض أي عقار للبيع أيّاً كانت وجهته.

                    وكأي موقع يرى السوق المفتوح حاجة الباحثين عن عمل لموقع موثوق يعرض لهم آخر فرص العمل المتاحة في كبرى الشركات. وأخيراً تعرض قائمة وظائف شاغرة لائحة بجميع التخصصات للبحث عن شاغر أو الإعلان عن الحاجة إلى عمل معين. كل هذا تجدونه في موقع الأوّل في خدمات الإعلان والتسويق الإلكتروني.

                </p>
            </div>
        </div>
    </div>
</div>
<div class="clr"></div><br>
@endsection
