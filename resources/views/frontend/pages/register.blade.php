@extends('frontend.master.master')
@section('content')
<div class="site-section bg-light bg-image" id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mb-5 mt-5">
                <div class="form-register">
                    <form action="" method="POST" enctype="multipart/form-data" class="p-5 bg-white">
                        @csrf

                        <h2 class="text-center mb-3">Đăng Ký thành viên</h2>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="{{$errors->first('name') ? 'text-danger': ''}}">Full Name (*)
                                </label>
                                <input type="text" name="name" id="name"
                                       class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" autofocus placeholder="Ví du: Nguyễn Văn A">
                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="{{$errors->first('email') ? 'text-danger': ''}}">Email (*)
                                </label>
                                <input type="email" id="email" name="email"
                                       class="form-control {{$errors->first('email') ? 'is-invalid' : ''}}"
                                       value="{{old('email')}}" autofocus placeholder="Ví du: abc@gmail.c">
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
                                <label class="{{$errors->first('password') ? 'text-danger': ''}}">Mật Khẩu (*)
                                </label>
                                <input type="password" name="password" id="password"
                                       class="form-control {{$errors->first('password') ? 'is-invalid' : ''}}" autofocus placeholder="Mật khẩu gồm chữ và số">

                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="{{$errors->first('phone') ? 'text-danger': ''}}">Số Điện Thoại (*)
                                </label>
                                <input type="text" name="phone" id="text"
                                       class="form-control {{$errors->first('phone') ? 'is-invalid' : ''}}" autofocus placeholder="Ví dụ: xxx.xxxx.xxx">

                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black">Bạn muốn:</label>
                                <br>
                                <input type="radio" name="role" value="1"> Cho thuê / Bán
                                <br>
                                <input type="radio" name="role" value="2"> Thuê nhà
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="{{$errors->first('address') ? 'text-danger': ''}}">Địa Chỉ</label>
                                <textarea name="address" id="message" cols="30" rows="5"
                                          class="form-control {{$errors->first('address') ? 'is-invalid' : ''}}"></textarea>
                            </div>

                        </div>
                        <div>
                            <p>Ghi chú: Những mục tích dấu (*) là bắt buộc</p>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Đăng ký" class="btn btn-primary btn-md text-white">
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
