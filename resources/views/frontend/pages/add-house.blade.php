@extends('frontend.master.master')

@section('content')
    <div class="add-house">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-3">

                    <div class="box-add-house">
                        <h2 class="text-center">Đăng bài cho thuê nhà</h2>
                        <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên của căn nhà</label>
                                <input type="text" class="form-control" placeholder="" name="name">
                            </div>

                            <div class="form-group">
                                <label for="">Giá thuê VNĐ/Ngày:</label>
                                <input type="number" name="price" autofocus class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="">Địa chỉ</label>
                                <textarea class="form-control" name="address" id="" cols="30" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Kiểu nhà</label>
                                <select class="form-control " name="type">
                                    <option value="">Loại căn hộ</option>
                                    <option value="Nhà nghỉ">Nhà nghỉ</option>
                                    <option value="Khách sạn">Khách sạn</option>
                                    <option value="Homestay">Nhà nghỉ</option>
                                    <option value="Penhouse">Penhouse</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="mt-2" for="">Loại phòng</label>
                                <select class="form-control " name="type-room">
                                    <option value="">Loại phòng</option>
                                    <option value="Phòng thường">Phòng thường</option>
                                    <option value="Phòng víp">Phòng víp</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="mt-2" for="">Loại phòng</label>
                                <select class="form-control " name="type-room">
                                    <option value="">Loại phòng</option>
                                    <option value="Phòng thường">Phòng thường</option>
                                    <option value="Phòng víp">Phòng víp</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="">Số phòng ngủ:</label>

                                <input type="number" name="bedroom" autofocus
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="">Số phòng tắm:</label>
                                <input type="number" name="bathroom" autofocus
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="">Địa chỉ</label>
                                <textarea class="form-control" name="address" id="" cols="30" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="">Mô tả</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="3"></textarea>
                            </div>

                            <div class="text-center">
                                <button  type="submit" class="btn btn-primary text-center">Đăng bài</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
