store
@extends('admin.layouts.master')
@section('title')
   تعديل البانر
@endsection
@section('css')
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/banner/update/'.$banner['id']) }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-xl-12 col-lg-12 ">
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> ادخل المعلومات </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label"> العنوان </label>
                                            <input required type="text" id="title" class="form-control"
                                                name="title" value="{{ $banner['title'] }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label"> العنوان باللغة الانجليزية </label>
                                            <input required type="text" id="title_en" class="form-control"
                                                name="title_en" value="{{ $banner->getTranslation('title','en') }}">
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="desc" class="form-label"> الوصف </label>
                                            <input required type="text" id="desc" class="form-control"
                                                name="desc" value="{{ $banner['desc'] }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="desc_en" class="form-label"> الوصف  باللغة الانجليزية </label>
                                            <input required type="text" id="desc_en" class="form-control"
                                                name="desc_en" value="{{ $banner->getTranslation('desc','en') }}">
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="page" class="form-label"> الصفحة </label>
                                            <select class="form-select" name="page">
                                                <option value="" selected disabled> -- حدد  -- </option>
                                                <option @if($banner['page']  == 'الرئيسية') selected @endif value="الرئيسية"> الرئيسية  </option>
                                                <option @if($banner['page']  == 'الوكالات') selected @endif value="الوكالات"> الوكالات   </option>
                                                <option @if($banner['page']  == 'المعارض') selected @endif value="المعارض"> المعارض   </option>
                                                <option @if($banner['page']  == 'ارقام مميزة') selected @endif value="ارقام مميزة"> ارقام مميزة   </option>
                                                <option @if($banner['page']  == 'مركز صيانة') selected @endif value="مركز صيانة"> مركز صيانة   </option>
                                                <option @if($banner['page']  == 'تاجير') selected @endif value="تاجير"> تاجير   </option>
                                                <option @if($banner['page']  == 'غسيل السيارات') selected @endif value="غسيل السيارات"> غسيل السيارات    </option>
                                                <option @if($banner['page']  == 'شركات المزاد') selected @endif value="شركات المزاد"> شركات المزاد   </option>
                                                <option @if($banner['page']  == 'معرض الادوات الاحتياطية') selected @endif value="معرض الادوات الاحتياطية"> معرض الادوات الاحتياطية    </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> صورة البانر  </h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                    <img src="{{ asset('assets/uploads/Banners/'.$banner['image']) }}" width="60px" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-outline-secondary w-100"> حفظ <i
                                            class='bx bxs-save'></i> </button>
                                </div>
                                <div class="col-lg-2">
                                    <a href="{{ url('admin/banners') }}" class="btn btn-primary w-100"> رجوع </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Container Fluid -->


        <!-- ==================================================== -->
        <!-- End Page Content -->
        <!-- ==================================================== -->
    @endsection

    @section('js')
    @endsection
