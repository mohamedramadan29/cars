@foreach ($lastadvs as $adv)
    <div class="card CarCard new_car">
        <div class="row no-gutters" style="align-items: center;">
            <div class="col-md-4">
                <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}">
                    <img src="{{ asset('assets/uploads/CarImages/' . $adv->carImages->first()->c_image) }}"
                        class="card-img" alt="{{ $adv['c_title'] }}">
                </a>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="car_banner">
                        <span> تم البيع  </span>
                    </div>
                    <div class="car_price">{{ number_format($adv['c_price'], 2) }} $</div>
                    <h5 class="card-title CC2">
                        <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}">{{ $adv['c_title'] }}</a>
                    </h5>
                    <div class="car_more_info">
                        <div class="card-text">
                            <div class="rgt ico-car">
                                <img src="{{ asset('assets/uploads/Marks/' . $adv->carMark->logo) }}">
                            </div>
                            <div class="rgt ico-car kmclass">{{ $adv['c_km'] }}
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            <div class="rgt ico-car"><i class="fas fa-dumbbell"></i> {{ $adv['c_trans'] }}</div>
                            <div class="rgt ico-car"><i class="fas fa-calendar-alt"></i> {{ $adv['c_years'] }}</div>
                        </div>
                        {{-- <small class="text-muted">{{ $adv['created_at'] }}</small> --}}
                        <div class="more_details">
                            <div class="address"><i class="bi bi-geo-alt-fill"></i>
                                <h6> {{ $adv->Country->name }} - {{ $adv->City->name }}</h6>
                            </div>
                            <div class="details">
                                <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}"
                                    class="btn btn-danger btn-sm gradient-btn">التفاصيل</a>
                            </div>
                            <div class="details">
                                <span class="lft"><button id="phone31_{{ $adv['id'] }}" type="button"
                                        class="btn btn-success btn-sm Phone" data-text-swap="{{ $adv['c_phone'] }}"
                                        data-text-original="{{ $adv['c_phone'] }}">06xx xxxxxx</button></span>
                                <script type="text/javascript">
                                    $("#phone31_{{ $adv['id'] }}").on("click", function() {
                                        var el = $(this);
                                        el.text() == el.data("text-swap") ?
                                            el.text(el.data("text-original")) :
                                            el.text(el.data("text-swap"));
                                    });
                                </script>
                            </div>
                            <div class="details adv_user">
                                {{-- <div>
                                    <i class="bi bi-person-fill"></i>
                                    <p> البائـــع </p>
                                </div> --}}
                                <div>
                                    <img src="{{ asset('assets/icons/person.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endforeach
