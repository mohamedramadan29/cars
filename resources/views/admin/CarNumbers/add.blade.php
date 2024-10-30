@extends('admin.layouts.master')
@section('title')
     اضافة رقم مميز جديد
@endsection
@section('css')
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{url('admin/car_number/add')}}" enctype="multipart/form-data">
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
                                            <label for="car_number" class="form-label"> الرقم   </label>
                                            <input required type="text" id="car_number" class="form-control" name="car_number"
                                                   value="{{old('car_number')}}">
                                            <input required type="hidden" id="name" class="form-control" name="user_id"
                                                   value="{{\Illuminate\Support\Facades\Auth::guard('admin')->id()}}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="price" class="form-label"> السعر  </label>
                                            <input required type="number" id="price" class="form-control" name="price"
                                                   value="{{old('price')}}">
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
                                            <label for="phone" class="form-label">  رقم الهاتف   </label>
                                            <input required type="text" id="phone" class="form-control" name="phone"
                                                   value="{{old('phone')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> صورة الرقم   </h4>
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
                                    <button type="submit" class="btn btn-outline-secondary w-100">  حفظ <i class='bx bxs-save'></i> </button>
                                </div>
                                <div class="col-lg-2">
                                    <a href="{{url('admin/car_numbers')}}" class="btn btn-primary w-100"> رجوع </a>
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
