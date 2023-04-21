@extends('authMaster')
@section('auth')
<form class="form-detail" action="{{ route('loginn') }}" method="POST">
    @csrf
    <h2>{{trans('main_trans.Login Form')}}</h2>
    <div class="form-row">
        <label for="your-email">{{trans('main_trans.Your Email or Phone Number')}}</label>
        <input type="text" name="email" id="your-email" class="input-text" placeholder="">
        <i class="fas fa-envelope"></i>
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
        <a href="{{ url ('/') }}" class="register">{{trans('main_trans.Register')}}</a>
    </div>
</form>
@endsection
