
@extends('frontend.master.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="form-login">
                    <h2 class="text-center mt-5">Đăng nhập</h2>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                        <div>
                            <button  type="submit" class="btn btn-primary text-center">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



