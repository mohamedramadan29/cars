@extends('front.layouts.master')
@section('title')
    ميز اعلانك
@endsection
@section('content')
    <div id="HomePage">
        <div class="clr"></div><br>
        <div class="card feature_ads">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-9 col-12">
                        <div class="info">
                            <div class="first_section">
                                <h2> <img src="{{ asset('assets/icons/user.png') }}"> احصـــل علــــى زبائـن
                                    أكثـر
                                </h2>
                                <p> <img src="{{ asset('assets/icons/more.png') }}"> زد مشاهداتـك
                                    ومبيعاتـك.
                                </p>
                            </div>
                            <div class="second_section">
                                <p> بيــــــــــع وتأجيــــــــر وشـــــــــراء الســـــــيـارات , بشكــــــل أســـــرع.
                                </p>
                                <h5> اختــر الباقـــة الأفضـــل للحصـــول على المزيـــد مـــن المشاهـــدات والتفاعلات </h5>
                                <button> <img src="{{ asset('assets/icons/star.png') }}" alt=""> شكـــــل
                                    الأعــــــلان </button>
                                <div class="advs_shap">
                                    <img src="{{ asset('assets/uploads/ads1.png') }}" alt="">
                                    <img src="{{ asset('assets/uploads/ads2.png') }}" alt="">
                                    <img src="{{ asset('assets/uploads/ads3.png') }}" alt="">
                                </div>
                            </div>
                            <div class="pricing-container">
                                <h2 class="title">إعلان مميز ⚡</h2>
                                <p class="subtitle">انتقل إلى القسم المميز في أعلى قائمة نتائج البحث واحصل على المزيد من
                                    المشاهدات والمزايا مقارنة مع القسم العادي.</p>
                                <div class="plans">
                                    <div class="plan">
                                        <div class="price">IQD 15.000</div>
                                        <div class="info">
                                            <div class="badge">الأنســـب</div>
                                            <ul class="features">
                                                <li><img src="{{ asset('assets/icons/check_plan.png') }}" alt="">
                                                    القائمة الأفضل من حيث التفاصيل </li>
                                                <li> <img src="{{ asset('assets/icons/check_plan.png') }}" alt="">
                                                    تمتاز بشكل ملفت للنتائج وجذابة</li>
                                                <li><img src="{{ asset('assets/icons/check_plan.png') }}" alt="">
                                                    يزيد انتباه مشترين جدد </li>
                                                <li><img src="{{ asset('assets/icons/check_plan.png') }}" alt="">
                                                    يكون إعلانك في أول النتائج دائماً </li>
                                                <li class="not-included"><img
                                                        src="{{ asset('assets/icons/not-checked.png') }}" alt="">
                                                    تظهر في عمليات بحث مختلفة وجماهير متنوعة </li>
                                                <li class="not-included"><img
                                                        src="{{ asset('assets/icons/not-checked.png') }}" alt="">
                                                    أضف صورة ملفتة أو فيديو لجذب الزوار </li>
                                                <li class="not-included"><img
                                                        src="{{ asset('assets/icons/not-checked.png') }}" alt="">
                                                    تدعم إعلانك على منصات التمييز لديك </li>
                                            </ul>
                                            <div class="duration">3 أيام</div>
                                            <button class="btn">اطلب الآن</button>
                                        </div>

                                    </div>
                                    <div class="plan">
                                        <div class="price">IQD 135.000</div>
                                        <div class="info">
                                            <div class="badge">الأفضل قيمة</div>
                                            <ul class="features">
                                                <li>القائمة الأفضل من حيث التفاصيل</li>
                                                <li>تمتاز بشكل ملفت للنتائج وجذابة</li>
                                                <li>يزيد انتباه مشترين جدد</li>
                                                <li>يكون إعلانك في أول النتائج دائماً</li>
                                                <li>تظهر في عمليات بحث مختلفة وجماهير متنوعة</li>
                                                <li>أضف صورة ملفتة أو فيديو لجذب الزوار</li>
                                                <li>تدعم إعلانك على منصات التمييز لديك</li>
                                            </ul>
                                            <div class="duration">30 يوم</div>
                                            <button class="btn">اطلب الآن</button>
                                        </div>

                                    </div>
                                    <div class="plan">
                                        <div class="price">IQD 30.000</div>
                                        <div class="info">
                                            <div class="badge">الأكثر مبيعاً</div>
                                            <ul class="features">
                                                <li>القائمة الأفضل من حيث التفاصيل</li>
                                                <li>تمتاز بشكل ملفت للنتائج وجذابة</li>
                                                <li>يزيد انتباه مشترين جدد</li>
                                                <li>يكون إعلانك في أول النتائج دائماً</li>
                                                <li>تظهر في عمليات بحث مختلفة وجماهير متنوعة</li>
                                                <li class="not-included">أضف صورة ملفتة أو فيديو لجذب الزوار</li>
                                                <li class="not-included">تدعم إعلانك على منصات التمييز لديك</li>
                                            </ul>
                                            <div class="duration">7 أيام</div>
                                            <button class="btn">اطلب الآن</button>
                                        </div>

                                    </div>

                                </div>
                                <h3> أعلانــــــــك سيـكــــــون بهــــــذا الشكــــــل </h3>
                                <img class="image_shap" src="{{ asset('assets/uploads/shap1.png') }}">
                                <h4> بــدلاً مــــن هــــذا </h4>
                                <img class="normal_shap" src="{{ asset('assets/uploads/shap1_normal.png') }}">
                            </div>
                            <section class="premium-service">
                                <h2 class="title">
                                    <span>⚡</span> خدمة مميزة
                                </h2>
                                <div class="service-box">
                                    <div class="step">
                                        <div class="step-number">1</div>
                                        <div class="step-content">
                                            <h3>انقل إعلانك إلى قسم الإعلانات المميزة في أعلى قائمة الإعلانات</h3>
                                            <p>
                                                تكون الإعلانات المميزة أعلى من الإعلانات العادية في قائمة الإعلانات في نتائج
                                                البحث،
                                                مما يعني أن المستخدمين سيشاهدون الإعلانات التي تم تمييزها أولاً.
                                                لا يوجد مكان مضمون في قسم الإعلانات المميزة، لكن يمكنك دائماً نقل الإعلان
                                                إلى أعلى قائمة النتائج عن طريق إعادة نشر الإعلان.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="step">
                                        <div class="step-number">2</div>
                                        <div class="step-content">
                                            <h3>مشاهدات عالية</h3>
                                            <p>
                                                احصل على مزيد من المشاهدات لإعلانك بالإضافة إلى المزيد من المكالمات
                                                والدردشات، وبالتالي
                                                بيع أسرع مقارنة بالإعلانات العادية.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="note">
                                    <div class="note-icon"> ! </div>
                                    <div class="note-content">
                                        <h3>تنبيـــة</h3>
                                        <ul>
                                            <li>سوف تفقد خدمة مميز في حال قمت بحذف إعلانك الفعّال.</li>
                                            <li>تنتهي خدمة مميز بمجرد وصولك لآخر يوم من تاريخ صلاحية الخدمة.</li>
                                            <li>
                                                نسبة المشاهدات والزوار المحتملين عند تطبيق مميز على الإعلان هي نسبة تقريبية
                                                في حال تم ذكرها.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                            <hr>

                            <div class="pricing-container pricing-container2">
                                <h2 class="title"> إعـــادة نشـــر
                                     <img src="{{ asset('assets/icons/arrows.png') }}" alt=""></h2>
                                <p class="subtitle"> قم بالتحديث تلقائياً إلى أعلى نتائج البحث كما لو قمت بالنشر مرة أخرى للحصول على المزيد
                                    من المشاهدات والزبائن.
                                </p>
                                <div class="plans">
                                    <div class="plan">
                                        <div class="price">IQD 15.000</div>
                                        <div class="info">
                                            <div class="badge">الأنســـب</div>
                                            <ul class="features">
                                                <li><img src="{{ asset('assets/icons/check_plan.png') }}" alt="">
                                                    القائمة الأفضل من حيث التفاصيل </li>
                                                <li> <img src="{{ asset('assets/icons/check_plan.png') }}" alt="">
                                                    تمتاز بشكل ملفت للنتائج وجذابة</li>
                                                <li><img src="{{ asset('assets/icons/check_plan.png') }}" alt="">
                                                    يزيد انتباه مشترين جدد </li>
                                                <li><img src="{{ asset('assets/icons/check_plan.png') }}" alt="">
                                                    يكون إعلانك في أول النتائج دائماً </li>
                                                <li class="not-included"><img
                                                        src="{{ asset('assets/icons/not-checked.png') }}" alt="">
                                                    تظهر في عمليات بحث مختلفة وجماهير متنوعة </li>
                                                <li class="not-included"><img
                                                        src="{{ asset('assets/icons/not-checked.png') }}" alt="">
                                                    أضف صورة ملفتة أو فيديو لجذب الزوار </li>
                                                <li class="not-included"><img
                                                        src="{{ asset('assets/icons/not-checked.png') }}" alt="">
                                                    تدعم إعلانك على منصات التمييز لديك </li>
                                            </ul>
                                            <div class="duration">3 أيام</div>
                                            <button class="btn">اطلب الآن</button>
                                        </div>

                                    </div>
                                    <div class="plan">
                                        <div class="price">IQD 135.000</div>
                                        <div class="info">
                                            <div class="badge">الأفضل قيمة</div>
                                            <ul class="features">
                                                <li>القائمة الأفضل من حيث التفاصيل</li>
                                                <li>تمتاز بشكل ملفت للنتائج وجذابة</li>
                                                <li>يزيد انتباه مشترين جدد</li>
                                                <li>يكون إعلانك في أول النتائج دائماً</li>
                                                <li>تظهر في عمليات بحث مختلفة وجماهير متنوعة</li>
                                                <li>أضف صورة ملفتة أو فيديو لجذب الزوار</li>
                                                <li>تدعم إعلانك على منصات التمييز لديك</li>
                                            </ul>
                                            <div class="duration">30 يوم</div>
                                            <button class="btn">اطلب الآن</button>
                                        </div>

                                    </div>
                                    <div class="plan">
                                        <div class="price">IQD 30.000</div>
                                        <div class="info">
                                            <div class="badge">الأكثر مبيعاً</div>
                                            <ul class="features">
                                                <li>القائمة الأفضل من حيث التفاصيل</li>
                                                <li>تمتاز بشكل ملفت للنتائج وجذابة</li>
                                                <li>يزيد انتباه مشترين جدد</li>
                                                <li>يكون إعلانك في أول النتائج دائماً</li>
                                                <li>تظهر في عمليات بحث مختلفة وجماهير متنوعة</li>
                                                <li class="not-included">أضف صورة ملفتة أو فيديو لجذب الزوار</li>
                                                <li class="not-included">تدعم إعلانك على منصات التمييز لديك</li>
                                            </ul>
                                            <div class="duration">7 أيام</div>
                                            <button class="btn">اطلب الآن</button>
                                        </div>

                                    </div>

                                </div>
                                <h3> أعلانــــــــك سيـكــــــون بهــــــذا الشكــــــل </h3>
                                <img class="image_shap" src="{{ asset('assets/uploads/shap2.png') }}">
                                <h4> بــدلاً مــــن هــــذا </h4>
                                <img class="normal_shap" src="{{ asset('assets/uploads/shap1_normal.png') }}">
                            </div>
                            <section class="premium-service premium-service2">
                                <h2 class="title">
                                    <span>⚡</span> خدمة إعادة النشر
                                    <img src="{{ asset('assets/icons/arrows.png') }}" alt="">

                                </h2>
                                <div class="service-box">
                                    <div class="step">
                                        <div class="step-number">1</div>
                                        <div class="step-content">
                                            <h3>انقل إعلانك إلى قسم الإعلانات المميزة في أعلى قائمة الإعلانات</h3>
                                            <p>
                                                تكون الإعلانات المميزة أعلى من الإعلانات العادية في قائمة الإعلانات في نتائج
                                                البحث،
                                                مما يعني أن المستخدمين سيشاهدون الإعلانات التي تم تمييزها أولاً.
                                                لا يوجد مكان مضمون في قسم الإعلانات المميزة، لكن يمكنك دائماً نقل الإعلان
                                                إلى أعلى قائمة النتائج عن طريق إعادة نشر الإعلان.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="step">
                                        <div class="step-number">2</div>
                                        <div class="step-content">
                                            <h3>مشاهدات عالية</h3>
                                            <p>
                                                احصل على مزيد من المشاهدات لإعلانك بالإضافة إلى المزيد من المكالمات
                                                والدردشات، وبالتالي
                                                بيع أسرع مقارنة بالإعلانات العادية.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="note">
                                    <div class="note-icon"> ! </div>
                                    <div class="note-content">
                                        <h3>تنبيـــة</h3>
                                        <ul>
                                            <li>سوف تفقد خدمة مميز في حال قمت بحذف إعلانك الفعّال.</li>
                                            <li>تنتهي خدمة مميز بمجرد وصولك لآخر يوم من تاريخ صلاحية الخدمة.</li>
                                            <li>
                                                نسبة المشاهدات والزوار المحتملين عند تطبيق مميز على الإعلان هي نسبة تقريبية
                                                في حال تم ذكرها.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                            <hr>

                            <div class="pricing-container pricing-container3">
                                <h2 class="title"> إعـــادة نشـــر
                                     <img src="{{ asset('assets/icons/arrows.png') }}" alt=""></h2>
                                <p class="subtitle"> قم بالتحديث تلقائياً إلى أعلى نتائج البحث كما لو قمت بالنشر مرة أخرى للحصول على المزيد
                                    من المشاهدات والزبائن.
                                </p>
                                <div class="plans">
                                    <div class="plan">
                                        <div class="price">IQD 15.000</div>
                                        <div class="info">
                                            <div class="badge">الأنســـب</div>
                                            <ul class="features">
                                                <li><img src="{{ asset('assets/icons/check_plan.png') }}" alt="">
                                                    القائمة الأفضل من حيث التفاصيل </li>
                                                <li> <img src="{{ asset('assets/icons/check_plan.png') }}" alt="">
                                                    تمتاز بشكل ملفت للنتائج وجذابة</li>
                                                <li><img src="{{ asset('assets/icons/check_plan.png') }}" alt="">
                                                    يزيد انتباه مشترين جدد </li>
                                                <li><img src="{{ asset('assets/icons/check_plan.png') }}" alt="">
                                                    يكون إعلانك في أول النتائج دائماً </li>
                                                <li class="not-included"><img
                                                        src="{{ asset('assets/icons/not-checked.png') }}" alt="">
                                                    تظهر في عمليات بحث مختلفة وجماهير متنوعة </li>
                                                <li class="not-included"><img
                                                        src="{{ asset('assets/icons/not-checked.png') }}" alt="">
                                                    أضف صورة ملفتة أو فيديو لجذب الزوار </li>
                                                <li class="not-included"><img
                                                        src="{{ asset('assets/icons/not-checked.png') }}" alt="">
                                                    تدعم إعلانك على منصات التمييز لديك </li>
                                            </ul>
                                            <div class="duration">3 أيام</div>
                                            <button class="btn">اطلب الآن</button>
                                        </div>

                                    </div>
                                    <div class="plan">
                                        <div class="price">IQD 135.000</div>
                                        <div class="info">
                                            <div class="badge">الأفضل قيمة</div>
                                            <ul class="features">
                                                <li>القائمة الأفضل من حيث التفاصيل</li>
                                                <li>تمتاز بشكل ملفت للنتائج وجذابة</li>
                                                <li>يزيد انتباه مشترين جدد</li>
                                                <li>يكون إعلانك في أول النتائج دائماً</li>
                                                <li>تظهر في عمليات بحث مختلفة وجماهير متنوعة</li>
                                                <li>أضف صورة ملفتة أو فيديو لجذب الزوار</li>
                                                <li>تدعم إعلانك على منصات التمييز لديك</li>
                                            </ul>
                                            <div class="duration">30 يوم</div>
                                            <button class="btn">اطلب الآن</button>
                                        </div>

                                    </div>
                                    <div class="plan">
                                        <div class="price">IQD 30.000</div>
                                        <div class="info">
                                            <div class="badge">الأكثر مبيعاً</div>
                                            <ul class="features">
                                                <li>القائمة الأفضل من حيث التفاصيل</li>
                                                <li>تمتاز بشكل ملفت للنتائج وجذابة</li>
                                                <li>يزيد انتباه مشترين جدد</li>
                                                <li>يكون إعلانك في أول النتائج دائماً</li>
                                                <li>تظهر في عمليات بحث مختلفة وجماهير متنوعة</li>
                                                <li class="not-included">أضف صورة ملفتة أو فيديو لجذب الزوار</li>
                                                <li class="not-included">تدعم إعلانك على منصات التمييز لديك</li>
                                            </ul>
                                            <div class="duration">7 أيام</div>
                                            <button class="btn">اطلب الآن</button>
                                        </div>

                                    </div>

                                </div>
                                <h3> أعلانــــــــك سيـكــــــون بهــــــذا الشكــــــل </h3>
                                <img class="image_shap" src="{{ asset('assets/uploads/shap3.png') }}">
                                <h4> بــدلاً مــــن هــــذا </h4>
                                <img class="normal_shap" src="{{ asset('assets/uploads/shap1_normal.png') }}">
                            </div>
                            <section class="premium-service premium-service3">
                                <h2 class="title">
                                    <span>⚡</span> خدمة الأعلان عــــــادي
                                    <img src="{{ asset('assets/icons/normal.png') }}" alt="">

                                </h2>
                                <div class="service-box">
                                    <div class="step">
                                        <div class="step-number">1</div>
                                        <div class="step-content">
                                            <h3>انقل إعلانك إلى قسم الإعلانات المميزة في أعلى قائمة الإعلانات</h3>
                                            <p>
                                                تكون الإعلانات المميزة أعلى من الإعلانات العادية في قائمة الإعلانات في نتائج
                                                البحث،
                                                مما يعني أن المستخدمين سيشاهدون الإعلانات التي تم تمييزها أولاً.
                                                لا يوجد مكان مضمون في قسم الإعلانات المميزة، لكن يمكنك دائماً نقل الإعلان
                                                إلى أعلى قائمة النتائج عن طريق إعادة نشر الإعلان.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="step">
                                        <div class="step-number">2</div>
                                        <div class="step-content">
                                            <h3>مشاهدات عالية</h3>
                                            <p>
                                                احصل على مزيد من المشاهدات لإعلانك بالإضافة إلى المزيد من المكالمات
                                                والدردشات، وبالتالي
                                                بيع أسرع مقارنة بالإعلانات العادية.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="note">
                                    <div class="note-icon"> ! </div>
                                    <div class="note-content">
                                        <h3>تنبيـــة</h3>
                                        <ul>
                                            <li>سوف تفقد خدمة مميز في حال قمت بحذف إعلانك الفعّال.</li>
                                            <li>تنتهي خدمة مميز بمجرد وصولك لآخر يوم من تاريخ صلاحية الخدمة.</li>
                                            <li>
                                                نسبة المشاهدات والزوار المحتملين عند تطبيق مميز على الإعلان هي نسبة تقريبية
                                                في حال تم ذكرها.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                            <hr>


                        </div>
                    </div>
                    <div class="col-lg-3 col-12">
                        <div class="info_contact">
                            <h4> هل تحتاج إلى مساعدة؟ </h4>
                            <p> تواصــل معنـا الآن </p>
                            <a class="whatsapp" href="#"><img src="{{ asset('assets/icons/whatapp.png') }}" alt="">   واتساب </a>
                            <br>
                            <a class="phone" href="#"> <img src="{{ asset('assets/icons/phone.png') }}" alt="">  رقم الهـاتـف </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
