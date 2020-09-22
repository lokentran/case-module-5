
@extends('frontend.master.master')

@section('content')

<section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-content">
                    <h3 class="breadcumb-title">Property</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="listings-content-wrapper section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Single Listings Slides -->
                <div class="single-listings-sliders owl-carousel">
                    <!-- Single Slide -->
                    <img src="{{ asset('/storage/'.$house->image) }}" alt="">
                    <!-- Single Slide -->
                    <img src="{{ asset('/storage/'.$house->image) }}" alt="">
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="listings-content">
                    <!-- Price -->
                    <div class="list-price">
                        <p>{{ number_format($house->price,0,",",".") }} VNĐ/Ngày</p>
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
                    <!-- Core Features -->
                    {{-- <ul class="listings-core-features d-flex align-items-center">
                        <li><i class="fa fa-check" aria-hidden="true"></i> Gated Community</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Automatic Sprinklers</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Fireplace</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Window Shutters</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Ocean Views</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Heated Floors</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Heated Floors</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Private Patio</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Window Shutters</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Fireplace</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Beach Access</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Rooftop Terrace</li>
                    </ul> --}}
                    <!-- Listings Btn Groups -->
                    {{-- <div class="listings-btn-groups">
                        <a href="#" class="btn south-btn">See Floor plans</a>
                        <a href="#" class="btn south-btn active">calculate mortgage</a>
                    </div> --}}
                </div>

                <div class="rent-house mt-5">
                    <form action="" method="POST">
                        @csrf
                        <input hidden type="text" name="house_id" value="{{ $house->id }}" >
                        <input hidden type="text" name="user_id"
                            value="@if (isset(Session::get('user')->id))
                            {{ Session::get('user')->id }}
                            @endif" >

                        <div class="form-group">
                            <label for="">Ngày đặt phòng</label>
                            <input class="form-control" type="date" name="checkIn">
                        </div>
                        <div class="form-group">
                            <label for="">Ngày trả phòng</label>
                            <input class="form-control" type="date" name="checkOut">
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
            <div class="col-12 col-md-6 col-lg-4">
                <div class="contact-realtor-wrapper">
                    <div class="realtor-info">
                        <img src="storage/images/{{ $house->user->image }}" alt="">
                        <div class="realtor---info">
                            <h2>{{ $house->user->name }}</h2>
                            <p>Chủ nhà</p>
                            <h6><img src="img/icons/phone-call.png" alt="">{{ $house->user->phone }}</h6>
                            <h6><img src="img/icons/envelope.png" alt="">{{ $house->user->email }}</h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-12">
                <div class="listings-maps mt-100">
                    <div id="googleMap"></div>
                </div>
            </div>
        </div> --}}

        <!-- Listing Maps -->
        {{-- <div class="row">
            <div class="col-12">
                <div class="listings-maps mt-100">
                    <div id="googleMap"></div>
                </div>
            </div>
        </div> --}}
    </div>
</section>
@endsection



