@extends('admin.layouts.master')
@section('title')
     اضافة فرع جديد
@endsection
@section('css')
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{url('admin/agency_branch/add/'.$agency['id'])}}" enctype="multipart/form-data">
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
                                <h4 class="card-title"> ادخل المعلومات  </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="name" class="form-label"> الاسم  </label>
                                            <input required type="text" id="name" class="form-control" name="name"
                                                   value="{{old('name')}}">
                                            <input type="hidden" name="agency_id" value="{{$agency['id']}}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name_en" class="form-label">  الاسم باللغة الانجليزية   </label>
                                            <input required type="text" id="name_en" class="form-control" name="name_en"
                                                   value="{{old('nam_en')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="country" class="form-label"> الدولة   </label>
                                          <select class="form-control" name="country">
                                              <option value="" selected disabled>  -- حدد -- </option>
                                              <option value="مصر"> مصر  </option>
                                              <option value="العراق"> العراق  </option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="city" class="form-label"> المدينة    </label>
                                            <select class="form-control" name="city">
                                                <option value="" selected disabled>  -- حدد -- </option>
                                                <option value="القاهرة"> القاهرة </option>
                                                <option value="البحيرة"> البحيرة   </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="address" class="form-label"> العنوان  </label>
                                            <input required type="text" id="address" class="form-control" name="address"
                                                   value="{{old('address')}}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="address_en" class="form-label"> العنوان  باللغة الانجليزية   </label>
                                            <input required type="text" id="address_en" class="form-control" name="address_en"
                                                   value="{{old('address_en')}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="car_status" class="form-label"> حالة السيارات   </label>
                                            <select class="form-control" name="car_status">
                                                <option value="" selected disabled>  -- حدد -- </option>
                                                <option value="مستعملة"> مستعملة </option>
                                                <option value="جديدة"> جديدة   </option>
                                                <option value="كلاهما"> كلاهما </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="work_time" class="form-label">  اوقات العمل   </label>
                                            <input required type="text" id="work_time" class="form-control" name="work_time"
                                                   value="{{old('work_time')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="address_en" class="form-label"> اوقات العمل  باللغة الانجليزية   </label>
                                            <input required type="text" id="work_time_en" class="form-control" name="work_time_en"
                                                   value="{{old('work_time_en')}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">  رقم الهاتف   </label>
                                            <input required type="text" id="phone" class="form-control" name="phone"
                                                   value="{{old('phone')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-outline-secondary w-100">  حفظ <i class='bx bxs-save'></i> </button>
                                </div>
                                <div class="col-lg-2">
                                    <a href="{{url('admin/agency')}}" class="btn btn-primary w-100"> رجوع </a>
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
