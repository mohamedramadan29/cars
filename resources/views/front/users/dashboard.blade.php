@extends('front.layouts.master')
@section('title')
    حسابي
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
                            <a href="#" class="list-group-item list-group-item-action active"
                                style="border-radius:0px;color:white;font-size:19px;">
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

                            <a href="{{ url('user/numbers') }}" class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف رقم مميز</a>
                            <a href="{{url('user/centers')}}"
                                class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف مركز صيانة </a>
                            <a href="https://www.chakirdev.com/demo/Cars/myposts"
                                class="list-group-item list-group-item-action">
                                <i class="fab fa-buffer"></i> أضف موضوع في المنتدى </a>

                            <a href="{{url('user/update')}}"
                                class="list-group-item list-group-item-action" style="border-radius:0px;">
                                <i class="fab fa-buffer"></i> البيانات الشخصية </a>
                            <a href="https://www.chakirdev.com/demo/Cars/logout"
                                class="list-group-item list-group-item-action" style="border-radius:0px;color:#C82333;">
                                <i class="fa fa-power-off"></i> تسجيل الخروج </a>
                        </div>
                    </div>

                    <div class="clr"></div>
                </div>
                <div class="lft profileLeft">

                    <div class="card pcard-stats">
                        <div class="card-body">
                            <h5 class="card-title pt"><i class="fas fa-car"></i> سياراتي </h5>
                            <h6 class="card-subtitle mb-2 text-muted">العدد : {{ count($user_cars) }} </h6>
                            <a href="{{ url('user/car/add') }}" class="card-link">أضف سيارة للبيع </a>
                        </div>
                    </div>
                    <div class="card pcard-stats">
                        <div class="card-body">
                            <h5 class="card-title pt"><i class="fas fa-bars"></i> مواضيعي </h5>
                            <h6 class="card-subtitle mb-2 text-muted">العدد : 0</h6>
                            <a href="https://www.chakirdev.com/demo/Cars/addpost.php" class="card-link">أضف موضوع</a>
                        </div>
                    </div>
                    <div class="card pcard-stats">
                        <div class="card-body">

                            <h5 class="card-title pt"><i class="fas fa-shield-alt"></i> نوع العضوية</h5>
                            <h6 class="card-subtitle mb-2 text-muted">عضوية عادية</h6>

                            <div class="clr"></div>
                            <a href="https://www.chakirdev.com/demo/Cars/subscription.php" class="card-link">ترقية
                                العضوية</a>
                        </div>
                    </div>
                    <div class="clr"></div>
                    <br>
                    <h5 class="p-title">- سياراتي </h5>
                    <div class="clr"></div>
                    <br>
                    @if (count($user_cars) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered profile-table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" style="width:45%;">عنوان السيارة</th>
                                        <th scope="col">الحالة</th>
                                        <th scope="col">تعديل</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($user_cars as $car)
                                        <tr>
                                            <td> {{ $i++ }} </td>
                                            <td> {{ $car['c_title'] }} </td>
                                            <td>
                                                @if ($car['c_type'] == '1')
                                                    <span class="badge badge-success bg-success"> جديدة </span>
                                                @else
                                                    <span class="badge badge-warning bg-warning"> مستعملة </span>
                                                @endif
                                            </td>
                                            <td><a href="{{ url('user/car/update/' . $car['id']) }}"
                                                    class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
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
