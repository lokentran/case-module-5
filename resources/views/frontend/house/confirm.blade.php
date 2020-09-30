@extends('frontend.master.master')

@section('content')

<section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title">Xác nhận đặt phòng</h3>
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
                                        <div class="single-listings-sliders owl-carousel">
                                            {{-- <!-- Single Slide -->
                                            <img src="{{ asset('/storage/'.$house->image) }}" alt="">
                                            <!-- Single Slide -->
                                            <img src="{{ asset('/storage/'.$house->image) }}" alt=""> --}}

                                            @foreach($house->images as $image)
                                                <img
                                                    src="{{asset('storage/'.$image->image)}}"
                                                    class="img-fluid"
                                                >
                                             @endforeach

                                        </div>
                                        <div class="list-price">
                                            <p>{{ number_format($house->price,0,",",".") }} VNĐ/Ngày</p>
                                        </div>
                                        <h5>{{ $house->name }}</h5>
                                        <p class="location"><img src="img/icons/location.png" alt="">{{ $house->address }}</p>
                                        {{-- <p>{{ $house->description }}</p> --}}
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

                                        <p>Người đặt phòng: {{ \Illuminate\Support\Facades\Auth::user()->name }}</p>

                                        <form action="" method="POST">
                                            @csrf
                                            <input hidden type="text" name="house_id" value="{{ $house->id }}" >
                                            <input hidden type="text" name="user_id"
                                                value="@if (\Illuminate\Support\Facades\Auth::check())
                                                {{ \Illuminate\Support\Facades\Auth::user()->id }}
                                                @endif" >

                                            <div class="form-group">
                                                <label for="">Ngày đặt phòng</label>
                                                <input readonly class="form-control" type="date" name="checkIn" value="{{ Session::get('userRent')['checkIn'] }}">
                                                @if ($errors->has('checkIn'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('checkIn') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="">Ngày trả phòng</label>
                                                <input readonly class="form-control" type="date" name="checkOut" value="{{ Session::get('userRent')['checkOut'] }}">
                                                @if ($errors->has('checkOut'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('checkOut') }}</strong>
                                                </div>
                                                @endif
                                            </div>

                                            {{-- {{ \Carbon\Carbon::parse( Session::get('userRent')['checkIn'])->diffInDays( Session::get('userRent')['checkOut'] ) }} --}}

                                            <div class="form-group">
                                                <label for=""><b>Tổng số tiền: {{ number_format($totalPrice,0,",",".") }} VNĐ ({{ $subDay }} ngày)</b></label>
                                                <input hidden class="totalPrice" type="text" readonly value="{{ $totalPrice }}" name="totalPrice">
                                            </div>

                                            <div class="form-group">
                                                <div class="realtor---info">
                                                    <h5>Chủ nhà: {{ $house->user->name }}</h5>
                                                    <h6><img src="img/icons/phone-call.png" alt="">{{ $house->user->phone }}</h6>
                                                    <h6><img src="img/icons/envelope.png" alt="">{{ $house->user->email }}</h6>
                                                </div>
                                            </div>

                                            <a href="{{ route('house.detail',$house->id ) }}" class="btn btn-secondary" >Cập nhật</a>
                                            <button class="btn btn-success" type="submit"
                                                @if (\Illuminate\Support\Facades\Auth::check())

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



@endsection



