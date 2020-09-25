@extends('frontend.master.master')

@section('content')

<div class="user-profile">
    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-12">
                <div class="box-profile">
                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img src="storage/images/{{ $user->image }}"
                                        alt="" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="profile-head">
                                    <h5>
                                        {{ $user->name }}
                                    </h5>
                                    {{-- <h6>
                                        Web Developer and Designer
                                    </h6> --}}

                                    <p class=""></p>
                                    <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                                aria-controls="home" aria-selected="true">Thông tin</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                                aria-controls="profile" aria-selected="false">Thay đổi thông tin</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"  href="{{ route('user.showPass', $user->id) }}">Thay đổi password</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-8 offset-md-4">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Name:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{ $user->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Email:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{ $user->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Số điện thoại:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{ $user->phone }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Địa chỉ:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{{ $user->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="number" hidden  value="{{ $user->role }}" name="role">
                                            <input type="text" hidden value="{{ $user->email }}" name="email">
                                            <input type="text" hidden value="{{ $user->password }}" name="password">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="mt-2">Avata</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="file" id="avatar" name="avatar"
                                                        class="form-control"
                                                        value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="mt-2">Họ và tên</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="mt-2">Số điện thoại</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" name="phone" value="{{ $user->phone }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="mt-2">Địa chỉ</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="" cols="30" rows="3" name="address">{{ $user->address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-success">Cập nhật</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection
