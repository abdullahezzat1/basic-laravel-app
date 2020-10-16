@extends('layouts/layout')

@section('title')
<title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Sign In & Sign Up :: w3layouts</title>
@endsection

@section('breadcrumbs')
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
  <div class="container">
    <ul>
      <li><i class="fa fa-home" aria-hidden="true"></i><a href="">Home</a><span>|</span></li>
      <li>Sign In & Sign Up</li>
    </ul>
  </div>
</div>
<!-- //products-breadcrumb -->
@endsection

@section('banner_nav_right')
<div class="w3l_banner_nav_right">
  <!-- login -->
  <div class="w3_login">
    <h3>Sign In & Sign Up</h3>
    <br>


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


    <div class="w3_login_module">
      <div class="module form-module">
        <div class="toggle"><i class="fa fa-times fa-pencil"></i>
          <div class="tooltip">Click Me</div>
        </div>
        <div class="form">
          <h2>Login to your account</h2>
          <form action="account/forms/login" method="post">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
          </form>
        </div>
        <div class="form">
          <h2>Create an account</h2>
          <form action="account/forms/register" method="post">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email Address" required>
            {{-- <input type="text" name="phone" placeholder="Phone Number" required> --}}
            <input type="submit" value="register">
          </form>
        </div>
        <div class="cta">
          <a href="#" class="formToggler">Forgot your password?</a>
          <div class="form d-none">
            <form action="account/forms/forgot-password" method="post">
              @csrf
              <input type="email" name="email" placeholder="Email Address" required>
              <input type="submit" value="Reset Password">
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      $('.toggle').click(function() {
        // Switches the Icon
        $(this).children('i').toggleClass('fa-pencil');
        // Switches the forms
        $('.form').animate({
          height: "toggle"
          , 'padding-top': 'toggle'
          , 'padding-bottom': 'toggle'
          , opacity: "toggle"
        }, "slow");
      });

      let formToggler = document.querySelector('.formToggler');
      formToggler.addEventListener('click', function(e) {
        e.preventDefault();
        formToggler.nextElementSibling.classList.toggle('d-none');
      })

    </script>
  </div>
  <!-- //login -->
</div>
@endsection

@section('extra')
<!-- newsletter-top-serv-btm -->
<div class="newsletter-top-serv-btm">
  <div class="container">
    <div class="col-md-4 wthree_news_top_serv_btm_grid">
      <div class="wthree_news_top_serv_btm_grid_icon">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
      </div>
      <h3>Nam libero tempore</h3>
      <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
        saepe eveniet ut et voluptates repudiandae sint et.</p>
    </div>
    <div class="col-md-4 wthree_news_top_serv_btm_grid">
      <div class="wthree_news_top_serv_btm_grid_icon">
        <i class="fa fa-bar-chart" aria-hidden="true"></i>
      </div>
      <h3>officiis debitis aut rerum</h3>
      <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
        saepe eveniet ut et voluptates repudiandae sint et.</p>
    </div>
    <div class="col-md-4 wthree_news_top_serv_btm_grid">
      <div class="wthree_news_top_serv_btm_grid_icon">
        <i class="fa fa-truck" aria-hidden="true"></i>
      </div>
      <h3>eveniet ut et voluptates</h3>
      <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
        saepe eveniet ut et voluptates repudiandae sint et.</p>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>
<!-- //newsletter-top-serv-btm -->
@endsection
