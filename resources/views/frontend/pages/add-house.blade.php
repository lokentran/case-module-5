@extends('frontend.master.master')

@section('content')
    <div class="add-house">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <div class="box-add-house">
                        <h2 class="text-center">Đăng bài cho thuê nhà</h2>
                        <form action="" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên của căn nhà</label>
                                <input type="text" class="form-control" placeholder="" name="name" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="">Giá thuê VNĐ/Ngày:</label>
                                <input type="number" name="price" autofocus class="form-control" value="{{ old('price') }}">
                            </div>

                            <div class="form-group">
                                <label class="">Địa chỉ</label>
                                <textarea class="form-control" name="address" id="" cols="30" rows="3" value="{{ old('address') }}"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Kiểu nhà</label>
                                <select class="form-control " name="typeHouse">
                                    {{-- <option value="">Loại căn hộ</option> --}}
                                    <option value="Nhà nghỉ">Nhà nghỉ</option>
                                    <option value="Khách sạn">Khách sạn</option>
                                    <option value="Homestay">Homestay</option>
                                    <option value="Penhouse">Penhouse</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="mt-2" for="">Loại phòng</label>
                                <select class="form-control " name="typeRoom">
                                    {{-- <option value="">Loại phòng</option> --}}
                                    <option value="Phòng thường">Phòng thường</option>
                                    <option value="Phòng víp">Phòng víp</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="">Số phòng ngủ:</label>
                                <select class="form-control " name="bedroom">
                                    <option value="1">1 Phòng</option>
                                    <option value="2">2 Phòng</option>
                                    <option value="3">3 Phòng</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="">Số phòng tắm:</label>
                                <select class="form-control " name="bathroom">
                                    <option value="1">1 Phòng</option>
                                    <option value="2">2 Phòng</option>
                                    <option value="3">3 Phòng</option>
                                </select>
                            </div>



                            <div class="form-group">
                                <label class="">Mô tả</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="3"></textarea>
                            </div>

                            <input  type="text" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">


                            <div class="form-group">
                                <label class="{{ $errors->first('photos') ? 'text-danger' : '' }}"
                                       for="Product Name">
                                    Hình
                                    ảnh
                                    (Có thể tải lên nhiều ảnh):</label>
                                <input type="file" id="imageUpload"
                                       class="form-control selectImage {{ $errors->first('photos') ? 'is-invalid' : '' }}"
                                       name="photos[]" multiple/>
                                @if($errors->first('photos'))
                                    <p class="text-danger">{{ $errors->first('photos') }}</p>
                                @endif
                                <div id="result">

                                </div>

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
