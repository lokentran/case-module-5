@extends('frontend.master.master')
@section('content')
<div class="site-section bg-light bg-image" id="register">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-register">
                    <form action="" method="POST" enctype="multipart/form-data" class="">
                        @csrf

                        <h2 class="text-center mb-3">Đăng Ký thành viên</h2>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Bạn cần điền đúng và đủ thông tin theo lời nhắc thông báo lỗi</strong>
                        </div>
                         @endif

                        <div class="row form-group">
                            <div class="col-md-12">

                                <input type="text" name="name" id="name"
                                       class="form-control " autofocus placeholder="Họ và tên (*)" value="{{old('name')}}">
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>



                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">

                                <input type="name" id="email" name="email"
                                       class="form-control"
                                       value="{{old('email')}}" autofocus placeholder="Email(*), ví dụ: abc@gmail.com">
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">

                                <input type="password" name="password" id="password"
                                       class="form-control " autofocus placeholder="Mật khẩu(*)" value="">
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger">
                                           <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">

                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       class="form-control " autofocus placeholder="Xác nhận mật khẩu(*)" value="">
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger">
                                           <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">

                                <input type="text" name="phone" id="text"
                                        class="form-control " autofocus placeholder="Số điện thoại(*)Ví dụ: xxx.xxxx.xxx" value="{{old('phone')}}">
                                @if ($errors->has('phone'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </div>
                                @endif
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="">Ảnh chân dung</label>
                                <input type="file" id="avatar" name="avatar"
                                       class="form-control"
                                       value="">
                            </div>
                            <div id="result">

                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black">Bạn muốn:</label>
                                <br>
                                <input type="radio" name="role" value="1"> Cho thuê
                                <br>
                                <input type="radio" name="role" value="2"> Thuê nhà
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">

                                <textarea name="address" id="message" cols="30" rows="3" placeholder="Địa chỉ"
                                          class="form-control " value="">{{old('address')}}</textarea>
                                @if ($errors->has('address'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div>
                            <p>Ghi chú: Những mục tích dấu (*) là bắt buộc</p>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-md text-white">Đăng ký</button>
                                <button class="btn btn-secondary" onclick="window.history.go(-1); return false">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
</div>

@endsection
