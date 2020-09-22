
@extends('frontend.master.master')

@section('content')
<div id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="form-login">
                    <h2 class="text-center">Đăng nhập</h2>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Email hoặc password của bạn không đúng!</strong>
                    </div>
                     @endif
                    <form action="" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value={{ old('email') }}>
                            @if ($errors->has('email'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" value={{ old('password') }}>

                            @if ($errors->has('password'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                            @endif

                        </div>
                        <div class="form-group form-check text-center">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                        <div class="text-center">
                            <button  type="submit" class="btn btn-primary text-center">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



