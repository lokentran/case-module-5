@extends('frontend.master.master')

@section('content')
    @include('frontend.master.slider')

    <div class="south-search-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="advanced-search-form">
                        <!-- Search Title -->
                        <div class="search-title">
                            <p>Search for your home</p>
                        </div>
                        <!-- Search Form -->
                        <form action="/search" method="post" id="advanceSearch">
                            @csrf
                            <div class="row">

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Tên">
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <input type="number" min="100000" step="50000" class="form-control" name="minPrice" placeholder="Gía thấp nhất">
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <input type="number" min="500000" step="50000"  class="form-control" name="maxPrice" placeholder="Giá cao nhất">
                                    </div>
                                </div>


                                <div class="col-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control " name="typeHouse">
                                            <option value="{{ null }}">Loại căn hộ</option>
                                            <option value="Nhà nghỉ">Nhà nghỉ</option>
                                            <option value="Khách sạn">Khách sạn</option>
                                            <option value="Homestay">Homestay</option>
                                            <option value="Penhouse">Penhouse</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control " name="bedroom">
                                            <option value="{{ null }}">Số phòng ngủ</option>
                                            <option value="1">1 Phòng</option>
                                            <option value="2">2 Phòng</option>
                                            <option value="3">3 Phòng</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-xl-4">
                                    <div class="form-group">
                                        <select class="form-control " name="bathroom">
                                            <option value="{{ null }}">Số phòng tắm</option>
                                            <option value="1">1 Phòng</option>
                                            <option value="2">2 Phòng</option>
                                            <option value="3">3 Phòng</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 box-center">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn south-btn">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp">
                        <h2>Danh sách nhà</h2>
                        <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- {{ dd($houses[3]->images()->first()) }} --}}
                @foreach ($houses as $house)

                        <!-- Single Featured Property -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                                <!-- Property Thumbnail -->


                                <div class="property-thumb">
                                    <a href="{{ route('house.detail', $house->id) }}">


                                            <img
                                                src="{{asset('storage/'.$house->images()->first()->image)}}"
                                                class="img-fluid"
                                            >


                                    </a>


                                    <div class="tag">
                                        <span>For Sale</span>
                                    </div>
                                    <div class="list-price">
                                        <p>{{ number_format($house->price,0,",",".") }} VNĐ/Ngày</p>
                                    </div>
                                </div>
                                <!-- Property Content -->
                                <div class="property-content">
                                    <a href="{{ route('house.detail', $house->id) }}">
                                        <h5>{{ $house->name }}</h5>
                                    </a>

                                    <p class="location"><img src="img/icons/location.png" alt="">{{ $house->address }}</p>
                                    <p>{{ $house->description }}</p>
                                    <div class="property-meta-data d-flex align-items-end justify-content-between">
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
                        </div>

                @endforeach


            </div>
        </div>
    </section>

   <!-- ##### Call To Action Area Start ##### -->
   <section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(img/bg-img/cta.jpg)">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-12">
                <div class="cta-content text-center">
                    <h2 class="wow fadeInUp" data-wow-delay="300ms">Are you looking for a place to rent?</h2>
                    <h6 class="wow fadeInUp" data-wow-delay="400ms">Suspendisse dictum enim sit amet libero malesuada feugiat.</h6>
                    <a href="#" class="btn south-btn mt-50 wow fadeInUp" data-wow-delay="500ms">Search</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Call To Action Area End ##### -->


        <!-- ##### Testimonials Area Start ##### -->
        <section class="south-testimonials-area section-padding-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                            <h2>Client testimonials</h2>
                            <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="testimonials-slides owl-carousel wow fadeInUp" data-wow-delay="500ms">

                            <!-- Single Testimonial Slide -->
                            <div class="single-testimonial-slide text-center">
                                <h5>Perfect Home for me</h5>
                                <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                                <div class="testimonial-author-info">
                                    <img src="img/bg-img/feature6.jpg" alt="">
                                    <p>Daiane Smith, <span>Customer</span></p>
                                </div>
                            </div>

                            <!-- Single Testimonial Slide -->
                            <div class="single-testimonial-slide text-center">
                                <h5>Perfect Home for me</h5>
                                <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                                <div class="testimonial-author-info">
                                    <img src="img/bg-img/feature6.jpg" alt="">
                                    <p>Daiane Smith, <span>Customer</span></p>
                                </div>
                            </div>

                            <!-- Single Testimonial Slide -->
                            <div class="single-testimonial-slide text-center">
                                <h5>Perfect Home for me</h5>
                                <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                                <div class="testimonial-author-info">
                                    <img src="img/bg-img/feature6.jpg" alt="">
                                    <p>Daiane Smith, <span>Customer</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Testimonials Area End ##### -->
@endsection
