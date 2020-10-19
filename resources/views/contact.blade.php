@extends('layouts/layout')

@section('title')
<title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Contact Us :: w3layouts</title>
@endsection

@section('breadcrumbs')
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
  <div class="container">
    <ul>
      <li><i class="fa fa-home" aria-hidden="true"></i><a href="">Home</a><span>|</span></li>
      <li>Contact Us</li>
    </ul>
  </div>
</div>
<!-- //products-breadcrumb -->
@endsection

@section('banner_nav_right')
<div class="w3l_banner_nav_right">
  <!-- mail -->
  <div class="mail">
    <h3>Contact Us</h3>
    <div class="agileinfo_mail_grids">
      <div class="col-md-4 agileinfo_mail_grid_left">
        <ul>
          <li><i class="fa fa-home" aria-hidden="true"></i></li>
          <li>address<span>868 1st Avenue NYC.</span></li>
        </ul>
        <ul>
          <li><i class="fa fa-envelope" aria-hidden="true"></i></li>
          <li>email<span><a href="mailto:info@example.com">info@example.com</a></span></li>
        </ul>
        <ul>
          <li><i class="fa fa-phone" aria-hidden="true"></i></li>
          <li>call to us<span>(+123) 233 2362 826</span></li>
        </ul>
      </div>
      <div class="col-md-8 agileinfo_mail_grid_right">
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

        <form action="other/forms/contact" method="post">
          @csrf
          <div class="col-md-6 wthree_contact_left_grid">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
          </div>
          <div class="col-md-6 wthree_contact_left_grid">
            <input type="text" name="telephone" placeholder="Telephone" required>
            <input type="text" name="subject" placeholder="Subject" required>
          </div>
          <div class="clearfix"> </div>
          <textarea name="message" placeholder="Message..." required></textarea>
          <input type="submit" value="Submit">
          <input type="reset" value="Clear">
        </form>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
  <!-- //mail -->
</div>
@endsection

@section('extra')
<!-- map -->
<div class="map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d96748.15352429623!2d-74.25419879353115!3d40.731667701988506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sshopping+mall+in+New+York%2C+NY%2C+United+States!5e0!3m2!1sen!2sin!4v1467205237951" style="border:0"></iframe>
</div>
<!-- //map -->
@endsection
