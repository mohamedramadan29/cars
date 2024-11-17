@foreach ($lastadvs as $adv)
<div class="card CarCard new_car">
    <div class="row no-gutters" style="align-items: center;">
        <div class="col-md-4">
            <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}">
                <img src="{{ asset('assets/uploads/CarImages/' . $adv->carImages->first()->c_image) }}" class="card-img"
                    alt="{{ $adv['c_title'] }}">
            </a>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <div class="car_price">{{ number_format($adv['c_price'], 2) }} $</div>
                <h5 class="card-title CC2">
                    <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}">{{ $adv['c_title'] }}</a>
                </h5>
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
                <small class="text-muted">{{ $adv['created_at'] }}</small>
                <div class="more_details">
                    <div class="address"><i class="bi bi-geo-alt-fill"></i>
                        <h6> العراق - {{ $adv->City->name }}</h6>
                    </div>
                    <div class="details">
                        <a href="{{ url('car/' . $adv['id'] . '/' . $adv['slug']) }}"
                            class="btn btn-danger btn-sm gradient-btn">التفاصيل</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
