@extends('frontend.master.master')

@section('content')
<div class="box-background">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="boxIn-background">
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
                            @foreach ($user->houses as $house)

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
                                    </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>





    </div>
</div>

@endsection
