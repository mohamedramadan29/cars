@extends('admin.layouts.master')
@section('title')
    الماركات
@endsection
@section('css')

    {{--    <!-- DataTables CSS -->--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <div class="row">
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
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center gap-1">
                            <h4 class="card-title flex-grow-1">  ماركات السيارات    </h4>

                            <a href="{{url('admin/car_mark/add')}}" class="btn btn-sm btn-primary">
                                 اضف جديد   <i class="ti ti-plus"></i>
                            </a>
                        </div>


                        <div>
                            <div class="table-responsive">
                                <table id="table-search" class="table table-bordered gridjs-table align-middle mb-0 table-hover table-centered">
                                    <thead class="bg-light-subtle">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1"></label>
                                            </div>
                                        </th>
                                        <th> الاسم   </th>
                                        <th> الاسم باللغة الانجليزية  </th>
                                        <th> الصورة</th>
                                        <th> الحالة</th>
                                        <th> العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php

                                    $i = 1;
                                    @endphp
                                    @foreach($marks as $mark)
                                        <tr>
                                            <td>
                                                {{$i++}}
{{--                                                <div class="form-check">--}}
{{--                                                    <input type="checkbox" class="form-check-input" id="customCheck2">--}}
{{--                                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>--}}
{{--                                                </div>--}}
                                            </td>
                                            <td> {{$mark['name']}} </td>
                                            <td> {{$mark->getTranslation('name','en')}} </td>
                                            <td>
                                                @if($mark['status'] == 1)
                                                    <span class="badge bg-success"> مفعل  </span>
                                                @else
                                                    <span class="badge bg-danger"> غير مفعل  </span>
                                                @endif
                                            </td>
                                            <td>
                                                <img class="img-thumbnail" src="{{asset('assets/uploads/Marks/'.$mark['logo'])}}" width="80" height="80px" alt="">
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{url('admin/car_mark/update/'.$mark['id'])}}" class="btn btn-primary btn-sm">
                                                        <iconify-icon icon="solar:pen-2-broken"
                                                                      class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <a href="{{url('admin/car_mark/models/'.$mark['id'])}}" class="btn btn-warning btn-sm">
                                                        الموديلات
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_category_{{$mark['id']}}">
                                                        <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                                      class="align-middle fs-18"></iconify-icon>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        @include('admin.CarMarks.delete')
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Container Fluid -->

    </div>
    <!-- ==================================================== -->
    <!-- End Page Content -->
    <!-- ==================================================== -->

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{--    <!-- DataTables JS -->--}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // تحقق ما إذا كان الجدول قد تم تهيئته من قبل
            if ($.fn.DataTable.isDataTable('#table-search')) {
                $('#table-search').DataTable().destroy(); // تدمير التهيئة السابقة
            }

            // تهيئة DataTables من جديد
            $('#table-search').DataTable({
                "language": {
                    "search": "بحث:",
                    "lengthMenu": "عرض _MENU_ عناصر لكل صفحة",
                    "zeroRecords": "لم يتم العثور على سجلات",
                    "info": "عرض _PAGE_ من _PAGES_",
                    "infoEmpty": "لا توجد سجلات متاحة",
                    "infoFiltered": "(تمت التصفية من إجمالي _MAX_ سجلات)",
                    "paginate": {
                        "previous": "السابق",
                        "next": "التالي"
                    }
                }
            });
        });
    </script>
@endsection
