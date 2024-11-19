@extends('front.layouts.master')
@section('title')
    {{ $topic['title'] }}
@endsection
@section('content')
    <div class="clr"></div><br>

    <div id="HomePage">
        @if (Session::has('Success_message'))
            @php
                toastify()->success(\Illuminate\Support\Facades\Session::get('Success_message'));
            @endphp
        @endif
        @if (Session::has('Error_Message'))
        @php
            toastify()->error(\Illuminate\Support\Facades\Session::get('Error_Message'));
        @endphp
    @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @php
                    toastify()->error($error);
                @endphp
            @endforeach
        @endif
        <div class="rgt TopicRight">
            <div class="card" style="margin-bottom:15px;">
                <div class="card-body" style="padding:0px;">
                    <div class="card-text TPText">
                        <h5 class="card-title TPTitle"><img src="https://www.chakirdev.com/demo/Cars/images/comments.png"
                                style="width:32px;"> {{ $topic['title'] }} </h5>
                        <div class="clr"></div>
                        <span class="rgt topic-info"><i class="fas fa-user"></i> {{ $topic['User']['name'] }} </span>
                        <span class="rgt topic-info"><i class="fas fa-bars"></i> <a href="#">اسأل الاعضاء</a></span>
                        <span class="rgt topic-info"><i class="fas fa-envelope"></i> {{ $topic['created_at'] }} </span>
                        <div class="clr"></div>
                        <p class="topic-content"> {{ $topic['topic'] }} </p>
                    </div>
                </div>
            </div>
            <div class="clr"></div>
            <div class="card" style="margin-bottom:15px;">
                <div class="card-body">
                    <a class="card-title TPTitle collapsed" data-bs-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample"><i class="far fa-comments"></i> أضف تعليق </a>
                    <div class="collapse" id="collapseExample" style="">
                        <div class="clr"></div><br>
                        <form action="{{ url('topic/comment') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="topic_id" value="{{ $topic['id'] }}">
                                <textarea class="form-control" rows="4" name="comment" placeholder="أدخل التعليق "></textarea>
                            </div>
                            <br>
                            <button type="submit" name="sendcomment" class="btn btn-primary">أرسل </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clr"></div>
            @foreach ($topic['Comments'] as $comment)
                <div class="card" style="margin-bottom:15px;">
                    <div class="card-body">
                        <div class="media">
                            <img src="https://www.chakirdev.com/demo/Cars/images/comments.png" class="mr-3" alt=""
                                style="width:52px;">
                            <div class="media-body" style="font-weight:bold;">
                                <h5 class="mt-0" style="font-weight:bold;color:#3160A5;">
                                    {{ $comment['User']['name'] }}
                                    <div class="clr"></div>
                                    <span style="font-weight:normal;font-size:12px;"> {{ $comment['created_at'] }} </span>
                                    <div class="clr"></div>
                                </h5>
                                {{ $comment['comment'] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clr"></div>
            @endforeach

        </div>

        <div class="rgt TopicLeft">
            <div class="card">
                <p class="TPTitle" style="padding:20px;"><i class="fa fa-th-list"></i> اخر المواضيع نشرا</p>
                <table class="table">
                    <tbody>
                        @foreach ($lasttopics as  $topic)
                        <tr>
                            <th style="color:#0069D9;"><a
                                    href="{{url('topic/'.$topic['id'].'/'.$topic['slug'])}}"><i
                                        class="fa fa-align-center" style="font-size:12px;"></i> {{$topic['name']}} </a></th>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="clr"></div><br>
            <div class="card">
                <p class="TPTitle" style="padding:20px;"><i class="fa fa-bolt"></i> إعلانات </p>
                <center><a href="#"><img src="https://www.chakirdev.com/demo/Cars/images/ban300.jpg"></a></center>
            </div>
            <div class="clr"></div><br>
            <div class="card">
                <div class="clr"></div><br>
                <center>
                    @foreach ($categories as $category)
                    <div class="card Forumcat" style="width:90%;margin-bottom:10px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category['name'] }} </h5>
                            <h6 class="card-subtitle mb-2 text-muted">عدد المساهمات : {{ count($category['Topics'])}}</h6>
                            <a href="{{ url('forum/' . $category['slug']) }}"
                                class="btn gradient-btn btn-sm">زيارة القسم </a>
                        </div>
                    </div>

                    @endforeach
                </center>
            </div>

        </div>

        <div class="clr"></div><br>
    </div>
@endsection
