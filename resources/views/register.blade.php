@extends('authMaster')
@section('auth')

<form class="form-detail" action="{{ route('create.user') }}" enctype="multipart/form-data"
    method="post">
    @csrf
    <h2>{{trans('main_trans.Register Account Form')}}</h2>
    <input type="hidden" name="is_admin" value="0" id="is_admin">
    <div class="form-row">
        <label for="full-name">{{trans('main_trans.Full Name')}}</label>
        <input type="text" name="name" id="full-name" class="input-text" placeholder="{{trans('main_trans.Full Name')}}" required>
        <i class="fas fa-user"></i>
    </div>
    <div class="form-row">
        <label for="your-email">{{trans('main_trans.Your Email')}}</label>
        <input type="text" name="email" id="your-email" class="input-text" placeholder="{{trans('main_trans.Your Email')}}" required
            pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
        <i class="fas fa-envelope"></i>
    </div>
    <div class="form-row">
        <label for="phone">{{trans('main_trans.Phone')}}</label>
        <input type="text" name="phone" id="phone" class="input-text" placeholder="{{trans('main_trans.Phone')}}" required>
        <i class="fas fa-phone"></i>
    </div>
    <div class="form-row">
        <label for="phone">{{trans('main_trans.Photo')}}</label>
        <input type="file" id="photo" accept="image/*" name="photo" class="input-text">
        <i class="fas fa-camera"></i>
    </div>
    <div class="form-row">
        <label for="password">{{trans('main_trans.Password')}}</label>
        <input type="password" name="password" id="password" class="input-text" placeholder="{{trans('main_trans.Password')}}" required>
        <i class="fas fa-lock"></i>
    </div>
    <div class="form-row-last">
        <input type="submit" class="register">
    </div>
    <div class="form-row-last">
        <a href="{{ ROUTE ('login.form') }}" class="register">{{trans('main_trans.login')}}</a>
    </div>
</form>

@endsection
