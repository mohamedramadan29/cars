@extends('admin.layouts.master')
@section('title')
    تعديل القسم
@endsection
@section('css')
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/feature-category/update/'.$main_category['id']) }}" enctype="multipart/form-data">
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
                                <h4 class="card-title"> تعديل القسم  </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">  اسم القسم  <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <input required type="text" id="name" class="form-control"
                                                name="name" value="{{ $main_category->getTranslation('name','ar')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">  اسم القسم باللغة الانجليزية  <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <input required type="text" id="nameـen" class="form-control"
                                                name="name_en" value="{{ $main_category->getTranslation('name','en')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">  الوصف  <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <textarea required name="description" id="" class="form-control" >{{ $main_category->getTranslation('description','ar')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="description_en" class="form-label">  الوصف باللغة الانجليزية  <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <textarea required name="description_en" id="" class="form-control" >{{ $main_category->getTranslation('description','en')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">  شكل الاعلان  <span class="star"
                                                    style="color: red"> * </span>
                                            </label>
                                            <input type="file" id="file" class="form-control"
                                                name="image">
                                                <img width="80" src="{{ asset('assets/uploads/FeatureMainCategories/'.$main_category['adv_shap']) }}" alt="">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-outline-secondary w-100"> حفظ <i
                                            class='bx bxs-save'></i></button>
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
