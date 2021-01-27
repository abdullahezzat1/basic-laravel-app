@extends('layouts/layout')

@section('title')
<title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Contact Us :: w3layouts</title>
@endsection

@section('banner_nav_right')
<div class="w3l_banner_nav_right">
  <div class="typo">
    <h2 class="mb-2">Account Settings</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif


    @if ($success ?? '')
    <div class="alert alert-success">
      <ul>
        @foreach ($success as $one)
        <li>{{ $one }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <h4 class="mb-1">Change your email: </h4>
    <form action="account/forms/change-email" class="d-flex mb-2" method="POST">
      @csrf
      <div class="form-element">
        <input type="email" name="email" class="form-control" placeholder="Enter new Email Address" value="{{ $logged_in_email }}">
      </div>
      <div class="form-element">
        <button class="btn btn-default" type="submit">Change</button>
      </div>
    </form>
    <h4 class="mb-1">Change your password: </h4>
    <form action="account/forms/change-password" class="d-flex mb-2" method="POST">
      @csrf
      <div class="form-element">
        <input type="password" name="password" class="form-control" placeholder="Enter new password">
      </div>
      <div class="form-element">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password">
      </div>
      <div class="form-element">
        <button class="btn btn-default" type="submit">Submit</button>
      </div>
    </form>
    <h4 class="mb-1">Delete your Account: </h4>
    <form action="account/forms/delete-account" class="d-flex mb-2" method="POST">
      @csrf
      <div class="form-element">
        <input type="password" name="password" class="form-control" placeholder="Confirm new password">
      </div>
      <div class="form-element">
        <button class="btn btn-default btn-danger" type="submit">Delete Account</button>
      </div>
    </form>

  </div>
</div>
@endsection

@section('extra')
@endsection
