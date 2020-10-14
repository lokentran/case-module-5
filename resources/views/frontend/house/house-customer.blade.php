@extends('frontend.master.master')

@section('content')
<div class="box-background-1">
    <div class="container">

        {{-- <form action="{{ route('user.searchCustomerHouse', $user->id) }}" method="POST" id="advanceSearch-customer" >
            @csrf
            <div class="row mb-3">

                <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Tên" value="{{ request('name') }}">
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="{{ request('address') }}">
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group">
                        <input type="number" min="100000"  class="form-control" name="minPrice" placeholder="Gía thấp nhất" value="{{ request('minPrice') }}">
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-3">
                    <div class="form-group">
                        <input type="number" min="500000"  class="form-control" name="maxPrice" placeholder="Giá cao nhất" value="{{ request('maxPrice') }}">
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
                        <button type="submit" class="btn south-btn">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </form> --}}

        <div class="row">
            <div class="col-md-12">
                <div class="boxIn-background-1">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Tên phòng cho thuê</th>
                                    <th scope="col">Người thuê</th>
                                    <th scope="col">Ngày đặt phòng</th>
                                    <th scope="col">Ngày trả phòng</th>
                                    <th scope="col">Tổng giá tiền</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($results as $result)
                                    <tr>
                                        <td scope="col">{{ $result->name }}</td>
                                        <td scope="col">{{ $result->user_rent }}</td>

                                        <td scope="col">{{ \Carbon\Carbon::parse($result->checkIn)->format('d/m/Y')}}</td>
                                        <td scope="col">{{ \Carbon\Carbon::parse($result->checkOut)->format('d/m/Y')}}</td>
                                        <td scope="col"><b>{{ number_format($result->totalPrice,0,",",".") }}</b> VNĐ</td>
                                    </tr>
                                @endforeach
                                @if (!empty($totalPriceByUser[0]))
                                    <tr>
                                        <td colspan="4" class="text-right"><b>Tổng tiền: </b></td>
                                        <td><b>{{ number_format($totalPriceByUser[0]->total,0,",",".") }} VNĐ</b></td>
                                    </tr>
                                @endif


                                {{-- @foreach ($user->houses as $house)

                                    @forelse ($house->bills as $bill)
                                        <tr>
                                            <td scope="col">{{ $house->name }}</td>
                                            <td scope="col">{{ $bill->user->name }}</td>
                                            <td scope="col">{{ \Carbon\Carbon::parse($bill->checkIn)->format('d/m/Y')}}</td>
                                            <td scope="col">{{ \Carbon\Carbon::parse($bill->checkOut)->format('d/m/Y')}}</td>
                                            <td scope="col"><b>{{ number_format($bill->totalPrice,0,",",".") }}</b> VNĐ</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>{{ $house->name }}</td>
                                            <td colspan="4">Chưa có ai thuê</td>
                                        </tr>
                                    @endforelse

                                @endforeach
                                        <tr>
                                            <td colspan="4" class="text-right"><b>Tổng tiền: </b></td>
                                            <td><b>{{ number_format($totalPriceByUser[0]->total,0,",",".") }}VNĐ</b></td>
                                        </tr> --}}
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>





    </div>
</div>

@endsection
