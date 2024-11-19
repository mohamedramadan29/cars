@extends('front.layouts.master')
@section('title')
     تغير كلمة المرور
@endsection
@section('content')
    <div id="HomePage">
        <div class="clr"></div>
        <br>
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
        <div>
            <h5 class="card-title CT1"><i class="fas fa-user-shield"></i> بروفايل شخصي</h5>
            <h6 class="card-subtitle mb-2 text-muted" style="padding:20px;">من خلال البروفايل يمكنك تعديل بياناتك
                الشخصيت و إضافة سيارتك المتاحة للبيع كما يمكنك إضافة المعارض و الوكالات .</h6>
        </div>
        <div class="PageCard">
            <div class="card-body" style="padding:0px;">
                <div class="rgt profileRight">
                    <a class="btn btn-primary display-btnprofile" data-toggle="collapse" href="#collapseExample"
                        role="button" aria-expanded="false" aria-controls="collapseExample">عرض القائمة</a>
                    <div class="collapse show" id="collapseExample">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action"
                                style="border-radius:0px;color:white;font-size:19px;">
                                <i class="fab fa-buffer"></i> القائمة </a>
                            <a href="{{ url('user/dashboard') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> رئيسية البروفايل</a>
                            <a href="{{ url('user/car/add') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف سيارة للبيع</a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> الرسائل <span class="lft badge badge-primary">0</span></a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> التنبيهات <span class="lft badge badge-danger">0</span></a>
                            <a href="{{ url('user/agency') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> اضف وكالة </a>
                            <a href="{{ url('user/rooms') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> اضف معرض </a>
                            <a href="{{ url('user/rent') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> اضف مكتب تاجير </a>
                            <a href="{{ url('user/numbers') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف رقم مميز</a>
                            <a href="{{ url('user/centers') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف مركز صيانة </a>
                            <a href="{{ url('user/forums') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف موضوع في المنتدى </a>
                            <a href="{{ url('user/update') }}" class="list-group-item list-group-item-action"
                                style="border-radius:0px;">
                                <i class="fab fa-buffer"></i> البيانات الشخصية </a>
                            <a href="{{ url('user/password') }}" class="list-group-item list-group-item-action active"
                                style="border-radius:0px;">
                                <i class="fab fa-buffer"></i> تغير كلمة المرور </a>
                            <a href="{{ url('user/logout') }}" class="list-group-item list-group-item-action"
                                style="border-radius:0px;color:#C82333;">
                                <i class="fa fa-power-off"></i> تسجيل الخروج </a>
                        </div>
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="lft profileLeft">
                    <h5 class="p-title"><i class="fas fa-edit"></i>  تغير كلمة المرور  </h5>
                    <div class="clr"></div><br>
                    <form action="{{ url('user/password') }}" method="post" class="p-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="password" name="old_password" class="form-control form-control-lg input-form"
                                    placeholder="كلمة السر القديمة ">
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="new_password" class="form-control form-control-lg input-form"
                                    placeholder="كلمة السر جديدة">
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="confirm_password" class="form-control form-control-lg input-form"
                                    placeholder="تاكيد كلمة المرور">
                            </div>
                            <div class="col-md-12">
                                <br>
                                <button type="submit" name="Edit" class="btn btn-success"> تعديل كلمة المرور  </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
