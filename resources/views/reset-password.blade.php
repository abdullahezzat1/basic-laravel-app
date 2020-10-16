@extends('layouts/layout')

@section('title')
<title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Contact Us :: w3layouts</title>
@endsection

@section('banner_nav_right')
<div class="w3l_banner_nav_right">
  <div class="typo">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="module form-module">
      <div class="toggle d-none"><i class="fa fa-times fa-pencil"></i>
        <div class="tooltip">Click Me</div>
      </div>
      <div class="form">
        <h2>Enter Your New Password</h2>
        <form action="account/forms/reset-password" method="POST" class="flex-col">
          @csrf
          <input type="password" name="password" placeholder="Enter your new password">
          <input type="password" name="password_confirmation" placeholder="Confirm your new password">
          <input type="submit">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('extra')
@endsection
