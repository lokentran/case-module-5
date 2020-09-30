@extends('frontend.master.master')

@section('content')
<div class="reset-password">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                    <div class="box-reset-pass">
                    <div class="card-header">
                        <h4>Thay đổi password</h4>
                    </div>
                    <br><br>
                    <form method="post" action="">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Mật khẩu cũ</label>
                            <input name="current-password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @if($errors->has('current-password'))
                                <p class="text-danger">{{$errors->first('current-password')}}</p>
                            @endif
                        </div>
                    <hr>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mật khẩu mới</label>
                            <input name="new-password" type="password" class="form-control" id="exampleInputPassword1">
                            @if($errors->has('new-password'))
                                <p class="text-danger">{{$errors->first('new-password')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Xác nhận lại mật khẩu mới</label>
                            <input name="new-password_confirmation" type="password" class="form-control" id="exampleInputPassword1">
                            @if($errors->has('new-password_confirmation'))
                                <p class="text-danger">{{$errors->first('new-password_confirmation')}}</p>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                        <button id="back-add" class="btn btn-secondary" onclick="window.history.go(-1); return false;">Quay lại</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
</div>




@endsection
