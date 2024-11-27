@extends('front.layouts.master')
@section('title')
    اضافة محطة غسيل
@endsection
@section('content')
    <div id="HomePage">
        <div class="clr"></div>
        <br>

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
                            <a href="#"
                                class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> الرسائل <span class="lft badge badge-primary">0</span></a>
                            <a href="#"
                                class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> التنبيهات <span class="lft badge badge-danger">0</span></a>
                            <a href="{{ url('user/agency') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> اضف وكالة   </a>
                            <a href="{{ url('user/rooms') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> اضف معرض    </a>
                            <a href="{{ url('user/rent') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> اضف  مكتب تاجير    </a>
                            <a href="{{ url('user/numbers') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف رقم مميز</a>
                            <a href="{{url('user/centers')}}"
                                class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف مركز صيانة </a>
                            <a href="{{url('user/washs')}}"
                               class="list-group-item list-group-item-action active">
                                <i class="fab fa-buffer"></i> اضف محطة غسيل  </a>
                            <a href="{{url('user/auctions')}}"
                               class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i>  مكتب لشركة مزاد </a>
                            <a href="{{url('user/forums')}}"
                                class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف موضوع في المنتدى </a>
                            <a href="{{url('user/update')}}"
                                class="list-group-item list-group-item-action" style="border-radius:0px;">
                                <i class="fab fa-buffer"></i> البيانات الشخصية </a>
                                <a href="{{ url('user/password') }}" class="list-group-item list-group-item-action"
                                style="border-radius:0px;">
                                <i class="fab fa-buffer"></i> تغير كلمة المرور </a>
                            <a href="{{url('user/logout')}}"
                                class="list-group-item list-group-item-action" style="border-radius:0px;color:#C82333;">
                                <i class="fa fa-power-off"></i> تسجيل الخروج </a>
                        </div>
                    </div>

                    <div class="clr"></div>
                </div>
                <div class="lft profileLeft">
                    <h5 class="p-title"><i class="fa fa-bars"></i> محطات الغسيل   </h5>
                    <div class="clr"></div><br>
                    <a href="{{ url('user/wash/add') }}" class="lft btn btn-primary btn-form">
                        <i class="fas fa-edit"></i>  اضف محطة غسيل  </a>
                    <div class="clr"></div>
                    @if (count($washs) > 0)
                    <div class="table-responsive">

                        <table class="table table-bordered profile-table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"> الاسم  </th>
                                    <th scope="col"> عنوان المركز  </th>
                                    <th scope="col">توقيت العمل  </th>
                                    <th scope="col">تعديل </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($washs as $wash)
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$wash['name']}} </td>
                                        <td> {{$wash['address']}} </td>
                                        <td> {{$wash['work_time']}} </td>
                                        <td> <a href="{{url('user/wash/update/'.$wash['id'])}}" class="btn btn-primary btn-sm">  <i class="fa fa-edit"></i> </a> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-primary">لا توجد بيانات</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
