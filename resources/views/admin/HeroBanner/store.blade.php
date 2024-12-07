store
@extends('admin.layouts.master')
@section('title')
    بانر رئيسي
@endsection
@section('css')
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/banner/add') }}" enctype="multipart/form-data">
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
                                                name="title" value="{{ old('title') }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label"> العنوان باللغة الانجليزية </label>
                                            <input required type="text" id="title_en" class="form-control"
                                                name="title_en" value="{{ old('title_en') }}">
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="desc" class="form-label"> الوصف </label>
                                            <input required type="text" id="desc" class="form-control"
                                                name="desc" value="{{ old('desc') }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="desc_en" class="form-label"> الوصف  باللغة الانجليزية </label>
                                            <input required type="text" id="desc_en" class="form-control"
                                                name="desc_en" value="{{ old('desc_en') }}">
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="country" class="form-label"> الصفحة </label>
                                            <select class="form-control" name="page">
                                                <option value="" selected disabled> -- حدد  -- </option>
                                                <option value="الرئيسية"> الرئيسية  </option>
                                                <option value="الوكالات"> الوكالات   </option>
                                                <option value="المعارض"> المعارض   </option>
                                                <option value="ارقام مميزة"> ارقام مميزة   </option>
                                                <option value="مركز صيانة"> مركز صيانة   </option>
                                                <option value="تاجير"> تاجير   </option>
                                                <option value="غسيل السيارات"> غسيل السيارات    </option>
                                                <option value="شركات المزاد"> شركات المزاد   </option>
                                                <option value="معرض الادوات الاحتياطية"> معرض الادوات الاحتياطية    </option>
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
                                    <input required type="file" class="form-control" name="image" accept="image/*">
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
