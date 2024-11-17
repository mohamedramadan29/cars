@extends('front.layouts.master')
@section('title')
    ارقام سيارات
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
                                style="border-radius:0px;font-size:19px;">
                                <i class="fab fa-buffer"></i> القائمة </a>
                            <a href="{{ url('user/dashboard') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> رئيسية البروفايل</a>
                            <a href="{{ url('user/car/add') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف سيارة للبيع</a>
                            <a href="https://www.chakirdev.com/demo/Cars/messages"
                                class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> الرسائل <span class="lft badge badge-primary">0</span></a>
                            <a href="https://www.chakirdev.com/demo/Cars/notice"
                                class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> التنبيهات <span class="lft badge badge-danger">0</span></a>
                            <a href="{{ url('user/numbers') }}" class="list-group-item list-group-item-action active">
                                <i class="fab fa-buffer"></i> أضف رقم مميز</a>
                            <a href="{{ url('user/centers') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف مركز صيانة </a>
                            <a href="https://www.chakirdev.com/demo/Cars/myposts"
                                class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف موضوع في المنتدى </a>
                            <a href="{{ url('user/update') }}" class="list-group-item list-group-item-action"
                                style="border-radius:0px;">
                                <i class="fab fa-buffer"></i> البيانات الشخصية </a>
                            <a href="{{ url('user/password') }}" class="list-group-item list-group-item-action"
                                style="border-radius:0px;">
                                <i class="fab fa-buffer"></i> تغير كلمة المرور  </a>
                            <a href="{{url('user/logout')}}"
                                class="list-group-item list-group-item-action" style="border-radius:0px;color:#C82333;">
                                <i class="fa fa-power-off"></i> تسجيل الخروج </a>
                        </div>
                    </div>

                    <div class="clr"></div>
                </div>
                <div class="lft profileLeft">
                    <div class="clr"></div>
                    <br>
                    <a href="{{url('user/number/add')}}" class="lft btn btn-primary btn-form">
                        <i class="fas fa-edit"></i> أضف رقم جديد</a>
                    <h5 class="p-title">- أرقام سيارات </h5>
                    <div class="clr"></div>
                    <br>
                    @if(count($numbers) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered profile-table">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" style="width:45%;"> الرقم  </th>
                                    <th scope="col">الحالة</th>
                                    <th scope="col">تعديل</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($numbers as $number)
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$number['car_number']}} </td>
                                        <td>
                                            @if($number['status'] == '1')
                                                <span class="badge badge-success bg-success"> فعال  </span>
                                            @elseif($number['status'] == 2)
                                                <span class="badge badge-warning bg-warning">   تم البيع   </span>
                                                @else
                                                <span class="badge badge-danger bg-danger"> غير فعال </span>
                                            @endif  </td>
                                        <td><a href="{{url('user/number/update/'.$number['id'])}}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                        </td>
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
