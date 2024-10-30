@extends('admin.layouts.master')
@section('title')
   موديلات الماركة
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
                            <h4 class="card-title flex-grow-1"> موديلات الماركة :: {{$mark['name']}}  </h4>


                            <button type="button" class="btn btn-soft-danger btn-sm" data-bs-toggle="modal" data-bs-target="#store_model">
                                اضف جديد   <i class="ti ti-plus"></i>
                            </button>

                            @include('admin.CarMarks.add_model')
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
                                        <th> العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php

                                        $i = 1;
                                    @endphp
                                    @foreach($models as $model)
                                        <tr>
                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td> {{$model->getTranslation('name','ar')}} </td>
                                            <td> {{$model->getTranslation('name','en')}} </td>

                                            <td>
                                                <div class="d-flex gap-2">
{{--                                                    <a href="{{url('admin/car_mark/update/'.$model['id'])}}" class="btn btn-soft-primary btn-sm">--}}
{{--                                                        <iconify-icon icon="solar:pen-2-broken"--}}
{{--                                                                      class="align-middle fs-18"></iconify-icon>--}}
{{--                                                    </a>--}}

                                                    <button type="button" class="btn btn-soft-danger btn-sm" data-bs-toggle="modal" data-bs-target="#edit_model_{{$model['id']}}">
                                                        <iconify-icon icon="solar:pen-2-broken"
                                                                      class="align-middle fs-18"></iconify-icon>
                                                    </button>


                                                    <button type="button" class="btn btn-soft-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_model_{{$model['id']}}">
                                                        <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                                      class="align-middle fs-18"></iconify-icon>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        @include('admin.CarMarks.update_model')
                                        @include('admin.CarMarks.delete_model')
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
