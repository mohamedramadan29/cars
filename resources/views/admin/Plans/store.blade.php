@extends('admin.layouts.master')
@section('title')
    اضافة خطة
@endsection
@section('css')
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">
        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{ url('admin/plan/add') }}" enctype="multipart/form-data">
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
                                            <label for="title_en" class="form-label"> العنوان باللغة الانجليزية </label>
                                            <input required type="text" id="title_en" class="form-control"
                                                name="title_en" value="{{ old('title_en') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label"> السعر </label>
                                            <input required type="number" id="number" class="form-control"
                                                name="price" value="{{ old('number') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="advantages" class="form-label"> مميزات الخطة  <span class="badge bagde-danger bg-danger"> افصل بين كل نقطة والاخري ب ( , ) </span></label>
                                            <textarea name="advantages" class="form-control">{{ old('advantages') }}</textarea>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="advantages_en" class="form-label"> مميزات الخطة باللغة الانجليزية <span class="badge bagde-danger bg-danger"> افصل بين كل نقطة والاخري ب ( , ) </span>
                                            </label>
                                            <textarea name="advantages_en" class="form-control">{{ old('advantages_en') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="dis_advantages" class="form-label">  لا تحتوي <span class="badge bagde-danger bg-danger"> افصل بين كل نقطة والاخري ب ( , ) </span>
                                            </label>
                                            <textarea name="dis_advantages" class="form-control">{{ old('dis_advantages') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="dis_advantagesـen" class="form-label">  لا تحتوي باللغة الانجليزية <span class="badge bagde-danger bg-danger"> افصل بين كل نقطة والاخري ب ( , ) </span> 
                                            </label>
                                            <textarea name="dis_advantagesـen" class="form-control">{{ old('dis_advantagesـen') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label"> الحالة </label>
                                            <select name="status" id="" class="form-select">
                                                <option value=""> -- حدد حالة الخطة -- </option>
                                                <option value="1"> فعال </option>
                                                <option value="0"> غير فعال </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="p-3 bg-light mb-3 rounded">
                                        <div class="row justify-content-end g-2">
                                            <div class="col-lg-2">
                                                <button type="submit" class="btn btn-outline-secondary w-100"> حفظ <i
                                                        class='bx bxs-save'></i> </button>
                                            </div>
                                            <div class="col-lg-2">
                                                <a href="{{ url('admin/plans') }}" class="btn btn-primary w-100"> رجوع </a>
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
