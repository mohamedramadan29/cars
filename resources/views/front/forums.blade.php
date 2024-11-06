@extends('front.layouts.master')
@section('title')
    منتدى الأراء و النصائح
@endsection
@section('content')
<div id="HomePage">
    <div class="card PageCard">
        <div class="card-body" style="padding:0px;">
            <div class="rgt forum-textright">
                <h5 class="card-title CT1"><i class="fa fa-car"></i>  منتدى الأراء و النصائح </h5>
                <h6 class="text-muted desc-textpg"><span style="font-weight: bold;"> هل لديك إستفسار ؟ </span>  منتدى سوق السيارات المستعملة هوة ساحة نقاش لكل ما يتعلق من اسألة الاعضاء وعروض بيع وشراء سيارات واحدث اخبار السيارات </h6>
                <div class="clr"></div>
                <div class="display-desk" style="padding:0 20px;">
                    <div class="blockquote-footer">شروط المنتدى 1 </div>
                    <div class="blockquote-footer">شروط المنتدى   2</div>
                    <div class="blockquote-footer"> شروط المنتدى 3</div>
                </div>
            </div>
            <div class="lft forum-img"><img src="{{asset('assets/front/uploads/hangout.png')}}" /></div>
            <div class="clr"></div>
            <div class="card-text" style="padding:20px;">
                <div class="display-desk">
                    @foreach($categories as $category)
                        <div class="rgt card Forumcat">
                            <div class="card-body">
                                <h5 class="card-title"> {{$category['name']}} </h5>
                                <h6 class="card-subtitle mb-2 text-muted">عدد المساهمات : 2</h6>
                                <a href="#" class="btn gradient-btn btn-sm"> زيارة القسم  </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="clr"></div>
                    <hr>
                    <div class="clr"></div><br>
                </div>
                <a href="addpost.html" class="rgt btn gradient-btn"><i class="fa fa-plus"></i> اضافة موضوع جديد  </a>
                <div class="clr"></div><br>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light" style="width:100%;">
                        <tr>
                            <th scope="col" style="width:60%;"><i class="fab fa-quora"></i> عنوان الموضوع </th>
                            <th scope="col"><i class="fa fa-user"></i>  الكاتب </th>
                            <th class="display-desk"><i class="fa fa-calendar-alt"></i>  تاريخ الموضوع </th>
                            <th><i class="fa fa-comments"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th style="color:#0069D9;"> <button class="btn btn-sm" style="background-color: #00B82A; color:#fff;box-shadow: 0 4px 7px rgba(0, 0, 0, 0.2);font-weight: bold;margin-left: 10px;margin-right: 10px;"> <i class="bi bi-lightbulb-fill"></i> نصيحة  </button> <a href="#"><i class="fa fa-align-center" style="font-size:12px;"></i> عاوزه اشتري عربيه</a></th>
                            <td><a href class="btn btn-light btn-sm">chakirdev@</a></td>
                            <td class="display-desk">2024-10-06 14:30:45</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <th style="color:#0069D9;"> <button class="btn btn-sm" style="background-color: #E8731E; color:#fff;box-shadow: 0 4px 7px rgba(0, 0, 0, 0.2);font-weight: bold;margin-left: 10px;margin-right: 10px;"> <i class="bi bi-person-raised-hand"></i>  استفسار  </button>  <a href="#"><i class="fa fa-align-center" style="font-size:12px;"></i> اريد سيارة بمبلغ 80000 الى 90000</a></th>
                            <td><a href class="btn btn-light btn-sm">chakirdev@</a></td>
                            <td class="display-desk">2024-10-05 23:53:58</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <th style="color:#0069D9;"> <button class="btn btn-sm" style="background-color: #6100FF; color:#fff;box-shadow: 0 4px 7px rgba(0, 0, 0, 0.2);font-weight: bold;margin-left: 10px;margin-right: 10px;"> <i class="bi bi-question-square-fill"></i> سؤال  </button>  <a href="#"><i class="fa fa-align-center" style="font-size:12px;"></i> نصيحة</a></th>
                            <td><a href class="btn btn-light btn-sm">Admin@</a></td>
                            <td class="display-desk">2024-10-06 07:59:59</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th style="color:#0069D9;"> <button class="btn btn-sm" style="background-color:  #C70505; color:#fff;box-shadow: 0 4px 7px rgba(0, 0, 0, 0.2);font-weight: bold;margin-left: 10px;margin-right: 10px;"> <i class="bi bi-exclamation-triangle-fill"></i> تحذير   </button>  <a href="#"><i class="fa fa-align-center" style="font-size:12px;"></i> استفسار عن السيارة ام جى</a></th>
                            <td><a href class="btn btn-light btn-sm">chakirdev@</a></td>
                            <td class="display-desk">2024-10-05 22:34:24</td>
                            <td>1</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="clr"></div> <br>
                <div class="display-mobile">
                    <div class="rgt card Forumcat">
                        <div class="card-body">
                            <h5 class="card-title">اسأل الاعضاء</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Number of Contributions : 2</h6>
                            <a href="forum/1/%d8%a7%d8%b3%d8%a3%d9%84-%d8%a7%d9%84%d8%a7%d8%b9%d8%b6%d8%a7%d8%a1.html" class="btn btn-info btn-sm">Visit Department</a>
                        </div>
                    </div>
                    <div class="rgt card Forumcat">
                        <div class="card-body">
                            <h5 class="card-title">عرض وطلب</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Number of Contributions : 3</h6>
                            <a href="forum/2/%d8%b9%d8%b1%d8%b6-%d9%88%d8%b7%d9%84%d8%a8.html" class="btn btn-info btn-sm">Visit Department</a>
                        </div>
                    </div>
                    <div class="rgt card Forumcat">
                        <div class="card-body">
                            <h5 class="card-title">قسم المقارنات</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Number of Contributions : 1</h6>
                            <a href="forum/3/%d9%82%d8%b3%d9%85-%d8%a7%d9%84%d9%85%d9%82%d8%a7%d8%b1%d9%86%d8%a7%d8%aa.html" class="btn btn-info btn-sm">Visit Department</a>
                        </div>
                    </div>
                    <div class="rgt card Forumcat">
                        <div class="card-body">
                            <h5 class="card-title">اخبار السيارات</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Number of Contributions : 1</h6>
                            <a href="forum/4/%d8%a7%d8%ae%d8%a8%d8%a7%d8%b1-%d8%a7%d9%84%d8%b3%d9%8a%d8%a7%d8%b1%d8%a7%d8%aa.html" class="btn btn-info btn-sm">Visit Department</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clr"></div><br>
</div>
@endsection
