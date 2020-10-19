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


    @if ($success ?? '')
    <div class="alert alert-success">
      <ul>
        @foreach ($success as $one)
        <li>{{ $one }}</li>
        @endforeach
      </ul>
    </div>
    @endif






    <div class="alert alert-warning">
      <ul>
        <li>A verification link was sent to {{ $email }}. Please check your email and click on the link to reset your password</li>
      </ul>
    </div>


    <form action="account/forms/resend-password-reset-email" method="post">
      @csrf
      <input type="submit" value="Resend Email">
    </form>


  </div>
</div>
@endsection

@section('extra')
@endsection
