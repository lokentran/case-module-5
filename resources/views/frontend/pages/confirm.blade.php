@extends('frontend.master.master')

@section('content')

<section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title">Xác nhận</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="confirm-house">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="confirm-box">
                    <section class="listings-content-wrapper section-padding-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="listings-content">
                                        <!-- Price -->
                                        <img src="{{ asset('/storage/'.$house->image) }}" alt="">
                                        <div class="list-price">
                                            <p>{{ $house->price }} VNĐ</p>
                                        </div>
                                        <h5>{{ $house->name }}</h5>
                                        <p class="location"><img src="img/icons/location.png" alt="">{{ $house->address }}</p>
                                        <p>{{ $house->description }}</p>
                                        <!-- Meta -->
                                        <div class="property-meta-data d-flex align-items-end">
                                            <div class="new-tag">
                                                <img src="img/icons/new.png" alt="">
                                            </div>
                                            <div class="bathroom">
                                                <img src="img/icons/bathtub.png" alt="">
                                                <span>{{ $house->bathroom }}</span>
                                            </div>
                                            <div class="garage">
                                                <img src="img/icons/garage.png" alt="">
                                                <span>{{ $house->bedroom }}</span>
                                            </div>
                                            <div class="space">
                                                <img src="img/icons/space.png" alt="">
                                                <span>120 sq ft</span>
                                            </div>
                                        </div>

                                    </div>



                                </div>
                                <div class="col-md-6">
                                    <div class="rent-house">
                                        <h5>Xác nhận</h5>
                                        <form action="" method="POST">
                                            @csrf
                                            <input type="text" name="house_id" value="{{ $house->id }}" >
                                            <input type="text" name="user_id"
                                                value="@if (isset(Session::get('user')->id))
                                                {{ Session::get('user')->id }}
                                                @endif" >

                                            <div class="form-group">
                                                <label for="">Ngày đặt phòng</label>
                                                <input class="form-control" type="date" name="checkIn" value="{{ Session::get('userRent')['checkIn'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Ngày trả phòng</label>
                                                <input class="form-control" type="date" name="checkOut" value="{{ Session::get('userRent')['checkOut'] }}">
                                            </div>

                                            {{-- {{ \Carbon\Carbon::parse( Session::get('userRent')['checkIn'])->diffInDays( Session::get('userRent')['checkOut'] ) }} --}}

                                            <div class="form-group">
                                                <label for="">Tổng số tiền(VNĐ):</label>
                                                <input class="totalPrice" type="number" readonly value="{{ $totalPrice }}" name="totalPrice">
                                            </div>

                                            <button class="btn btn-success" type="submit"
                                                @if (isset(Session::get('user')->id))

                                                @else
                                                    disabled
                                                @endif
                                            >
                                            Đặt phòng</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="">


</form>


@endsection



