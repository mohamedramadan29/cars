@php

    $publicsetting = \App\Models\admin\PublicSetting::first();

@endphp
<!-- ========== App Menu Start ========== -->
<div class="main-nav">
    <!-- Sidebar Logo -->
    <div class="logo-box">
        <a href="{{url('admin/dashboard')}}" class="logo-dark">
            <img src="{{asset('assets/uploads/PublicSetting/'.$publicsetting['website_logo'])}}" class="logo-sm" alt="logo sm">
            <img src="{{asset('assets/uploads/PublicSetting/'.$publicsetting['website_logo'])}}" class="logo-lg" alt="logo dark">
        </a>

        <a href="{{url('admin/dashboard')}}" class="logo-light">
            <img src="{{asset('assets/uploads/PublicSetting/'.$publicsetting['website_logo'])}}" class="logo-sm" alt="logo sm">
            <img src="{{asset('assets/uploads/PublicSetting/'.$publicsetting['website_logo'])}}" class="logo-lg" alt="logo light">
        </a>
    </div>

    <!-- Menu Toggle Button (sm-hover) -->
    <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
        <iconify-icon icon="solar:double-alt-arrow-right-bold-duotone" class="button-sm-hover-icon"></iconify-icon>
    </button>

    <div class="scrollbar" data-simplebar>
        <ul class="navbar-nav" id="navbar-nav">

            <li class="menu-title"> العام</li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/dashboard')}}">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                                   </span>
                    <span class="nav-text"> الرئيسية  </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarmarks" data-bs-toggle="collapse" role="button"
                   aria-expanded="false" aria-controls="sidebarBrands">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:clipboard-list-bold-duotone"></iconify-icon>
                                   </span>
                    <span class="nav-text">  الماركات   </span>
                </a>
                <div class="collapse" id="sidebarmarks">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/car-marks')}}"> تفاصيل الماركات  </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/car_mark/add')}}"> اضف جديد </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebaragency" data-bs-toggle="collapse" role="button"
                   aria-expanded="false" aria-controls="sidebaragency">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
                                   </span>
                    <span class="nav-text">  الوكالات   </span>
                </a>
                <div class="collapse" id="sidebaragency">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/agency')}}"> جميع الوكالات  </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/agency/add')}}"> اضف منتج جديد </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarshowroom" data-bs-toggle="collapse" role="button"
                   aria-expanded="false" aria-controls="sidebarshowroom">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
                                   </span>
                    <span class="nav-text">  المعارض   </span>
                </a>
                <div class="collapse" id="sidebarshowroom">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/showrooms')}}"> جميع المعارض   </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/showroom/add')}}"> اضف معرض جديد </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarcarnumbers" data-bs-toggle="collapse" role="button"
                   aria-expanded="false" aria-controls="sidebarcarnumbers">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
                                   </span>
                    <span class="nav-text"> ارقام مميزة  </span>
                </a>
                <div class="collapse" id="sidebarcarnumbers">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/car_numbers')}}">  جميع الارقام   </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/car_number/add')}}"> اضف رقم  جديد </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarautorepair" data-bs-toggle="collapse" role="button"
                   aria-expanded="false" aria-controls="sidebarautorepair">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
                                   </span>
                    <span class="nav-text"> مراكز الصيانة  </span>
                </a>
                <div class="collapse" id="sidebarautorepair">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/auto_repairs')}}">  جميع المراكز  </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/auto_repair/add')}}"> اضف  مركز جديد </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebartopiccategory" data-bs-toggle="collapse" role="button"
                   aria-expanded="false" aria-controls="sidebartopiccategory">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
                                   </span>
                    <span class="nav-text"> منتدي الاراء  </span>
                </a>
                <div class="collapse" id="sidebartopiccategory">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/topic_category')}}">  الاقسام  </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/auto_repair/add')}}"> المواضيع  </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-title mt-2"> اعدادات الموقع</li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('admin/public-setting/update')}}">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:settings-bold-duotone"></iconify-icon>
                                   </span>
                    <span class="nav-text">  الاعدادات العامة   </span>
                </a>
            </li>


            <li class="menu-title mt-2"> المستخدمين</li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebaradminprofile" data-bs-toggle="collapse" role="button"
                   aria-expanded="false" aria-controls="sidebarCustomers">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:chat-square-like-bold-duotone"></iconify-icon>
                                   </span>
                    <span class="nav-text"> حسابي  </span>
                </a>
                <div class="collapse" id="sidebaradminprofile">
                    <ul class="nav sub-navbar-nav">

                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/update_admin_details')}}"> تعديل البيانات </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/update_admin_password')}}"> تعديل كلمة
                                المرور </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarCustomers" data-bs-toggle="collapse" role="button"
                   aria-expanded="false" aria-controls="sidebarCustomers">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
                                   </span>
                    <span class="nav-text"> العملاء  </span>
                </a>
                <div class="collapse" id="sidebarCustomers">
                    <ul class="nav sub-navbar-nav">

                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="customer-list.html"> جميع العملاء </a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="customer-detail.html">Details</a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarbanners" data-bs-toggle="collapse" role="button"
                   aria-expanded="false" aria-controls="sidebarbanners">
                                   <span class="nav-icon">
                                        <iconify-icon icon="solar:case-round-bold-duotone"></iconify-icon>
                                   </span>
                    <span class="nav-text"> البانرات الرئيسية   </span>
                </a>
                <div class="collapse" id="sidebarbanners">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{url('admin/banners')}}">التفاصيل </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>
<!-- ========== App Menu End ========== -->
