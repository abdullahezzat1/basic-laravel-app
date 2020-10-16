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


    @if ($warning ?? '')
    <div class="alert alert-warning">
      <ul>
        @foreach ($warning as $one)
        <li>{{ $one }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    @switch($additional ?? '')

    @case("resendLink")
    <a href="javascript:window.location.href=window.location.href" class="btn btn-primary">Resend link</a>
    @break

    @case("retry")
    <a href="javascript:window.location.href=window.location.href" class="btn btn-primary">Retry</a>
    @break

    @default

    @endswitch

  </div>
</div>
@endsection

@section('extra')
@endsection
