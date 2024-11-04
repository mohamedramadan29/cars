@extends('admin.layouts.master')
@section('title')
    الرئيسية
@endsection
@section('content')
    <!-- ==================================================== -->
    <!-- Start right Content here -->
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <!-- Start here.... -->

            <div class="row">
                <div class="col-md-3">
                    <div class="card overflow-hidden dashboard_info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="avatar-md bg-danger rounded">
                                        <i class="bi bi-car-front-fill avatar-title fs-32 text-primary"></i>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-9 text-center">
                                    <p class="text-muted mb-0">  عدد الاعلانات الكلي   </p>
                                    <h3 class="text-dark mt-1 mb-0"> 3 </h3>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div> <!-- end card body -->
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{url('admin/orders')}}" class="text-reset fw-semibold fs-12"> مشاهدة
                                    التفاصيل </a>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-md-3">
                    <div class="card overflow-hidden dashboard_info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="avatar-md bg-success rounded">
                                        <i class="bi bi-card-checklist avatar-title fs-32"></i>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-9 text-center">
                                    <p class="text-muted mb-0">  الاعلانات الفعالة  </p>
                                    <h3 class="text-dark mt-1 mb-0"> 8 </h3>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div> <!-- end card body -->
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{url('admin/orders')}}" class="text-reset fw-semibold fs-12"> مشاهدة
                                    التفاصيل </a>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-md-3">
                    <div class="card overflow-hidden dashboard_info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="avatar-md bg-warning rounded">
                                        <i class="bi bi-ui-checks-grid avatar-title fs-32"></i>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-9 text-center">
                                    <p class="text-muted mb-0">  اعلانات تحت المراجعه   </p>
                                    <h3 class="text-dark mt-1 mb-0"> 3 </h3>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div> <!-- end card body -->
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{url('admin/orders')}}" class="text-reset fw-semibold fs-12"> مشاهدة
                                    التفاصيل </a>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-md-3">
                    <div class="card overflow-hidden dashboard_info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="avatar-md bg-info rounded">
                                        <i class="bi bi-building avatar-title fs-32"></i>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-9 text-center">
                                    <p class="text-muted mb-0">  الوكاالات   </p>
                                    <h3 class="text-dark mt-1 mb-0"> 3 </h3>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div> <!-- end card body -->
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{url('admin/orders')}}" class="text-reset fw-semibold fs-12"> مشاهدة
                                    التفاصيل </a>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-md-3">
                    <div class="card overflow-hidden dashboard_info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="avatar-md bg-secondary rounded">
                                        <i class="bi bi-buildings-fill avatar-title fs-32"></i>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-9 text-center">
                                    <p class="text-muted mb-0">  المعارض  </p>
                                    <h3 class="text-dark mt-1 mb-0"> 3 </h3>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div> <!-- end card body -->
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{url('admin/orders')}}" class="text-reset fw-semibold fs-12"> مشاهدة
                                    التفاصيل </a>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-md-3">
                    <div class="card overflow-hidden dashboard_info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="avatar-md bg-dark rounded">
                                        <i class="bi bi-people-fill avatar-title fs-32 "></i>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-9 text-center">
                                    <p class="text-muted mb-0"> منتدي الاراء  </p>
                                    <h3 class="text-dark mt-1 mb-0"> 3 </h3>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div> <!-- end card body -->
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{url('admin/orders')}}" class="text-reset fw-semibold fs-12"> مشاهدة
                                    التفاصيل </a>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

            </div> <!-- end row -->

        </div>


    </div>
    <!-- ==================================================== -->
    <!-- End Page Content -->
    <!-- ==================================================== -->
@endsection

@section('js')
    <script src="{{asset('assets/admin/js/components/apexchart-column.js')}}"></script>
@endsection
