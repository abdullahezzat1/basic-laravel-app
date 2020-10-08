@extends('layouts/layout')

@section('title')
<title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Single :: w3layouts</title>
@endsection

@section('breadcrumbs')
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
  <div class="container">
    <ul>
      <li><i class="fa fa-home" aria-hidden="true"></i><a href="">Home</a><span>|</span></li>
      <li><a href="category/{{ $currentCategory->name }}">{{ $currentCategory->title }}</a><span>|</span></li>
      <li>{{ $currentProduct->title }}</li>
    </ul>
  </div>
</div>
<!-- //products-breadcrumb -->
@endsection

@section('banner_nav_right')
<div class="w3l_banner_nav_right">
  <div class="w3l_banner_nav_right_banner3">
    <h3>Best Deals For New Products<span class="blink_me"></span></h3>
  </div>
  <div class="agileinfo_single">
    <h5>{{ $currentProduct->title }}</h5>
    <div class="col-md-4 agileinfo_single_left">
      <img id="example" src="images/{{ $currentProduct->img }}" alt=" " class="img-responsive" />
    </div>
    <div class="col-md-8 agileinfo_single_right">
      <div class="rating1">
        <span class="starRating">
          <input id="rating5" type="radio" name="rating" value="5">
          <label for="rating5">5</label>
          <input id="rating4" type="radio" name="rating" value="4">
          <label for="rating4">4</label>
          <input id="rating3" type="radio" name="rating" value="3" checked>
          <label for="rating3">3</label>
          <input id="rating2" type="radio" name="rating" value="2">
          <label for="rating2">2</label>
          <input id="rating1" type="radio" name="rating" value="1">
          <label for="rating1">1</label>
        </span>
      </div>
      <div class="w3agile_description">
        <h4>Description :</h4>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
          officia deserunt mollit anim id est laborum.Duis aute irure dolor in
          reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur.</p>
      </div>
      <div class="snipcart-item block">
        <div class="snipcart-thumb agileinfo_single_right_snipcart">
          <h4>${{ $currentProduct->price_after }} <span>${{ $currentProduct->price_before }}</span></h4>
        </div>
        <div class="snipcart-details agileinfo_single_right_details">
          <form action="#" method="post">
            <fieldset>
              <input type="hidden" name="cmd" value="_cart" />
              <input type="hidden" name="add" value="1" />
              <input type="hidden" name="business" value=" " />
              <input type="hidden" name="item_name" value="pulao basmati rice" />
              <input type="hidden" name="amount" value="21.00" />
              <input type="hidden" name="discount_amount" value="1.00" />
              <input type="hidden" name="currency_code" value="USD" />
              <input type="hidden" name="return" value=" " />
              <input type="hidden" name="cancel_return" value=" " />
              <input type="submit" name="submit" value="Add to cart" class="button" />
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>
@endsection

@section('extra')
<!-- brands -->
<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
  <div class="container">
    <h3>More {{ $currentCategory->title }}</h3><br><br>
    @foreach($more as $product)
    <div class="col-md-3 top_brand_left">
      <div class="hover14 column">
        <div class="agile_top_brand_left_grid">
          @if($product->offer)
          <div class="agile_top_brand_left_grid_pos">
            <img src="images/offer.png" alt=" " class="img-responsive" />
          </div>
          @endif
          @if($product->gift)
          <div class="tag"><img src="images/tag.png" alt=" " class="img-responsive" /></div>
          @endif
          <div class="agile_top_brand_left_grid1">
            <figure>
              <div class="snipcart-item block">
                <div class="snipcart-thumb">
                  <a href="single/{{ $product->uuid }}"><img title=" " alt=" " src="images/{{ $product->img }}" /></a>
                  <p>{{ $product->title }}</p>
                  <h4>${{ $product->price_after }} <span>${{ $product->price_before }}</span></h4>
                </div>
                <div class="snipcart-details top_brand_home_details">
                  <form action="checkout" method="post">
                    <fieldset>
                      <input type="hidden" name="cmd" value="_cart" />
                      <input type="hidden" name="add" value="1" />
                      <input type="hidden" name="business" value=" " />
                      <input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
                      <input type="hidden" name="amount" value="7.99" />
                      <input type="hidden" name="discount_amount" value="1.00" />
                      <input type="hidden" name="currency_code" value="USD" />
                      <input type="hidden" name="return" value=" " />
                      <input type="hidden" name="cancel_return" value=" " />
                      <input type="submit" name="submit" value="Add to cart" class="button" />
                    </fieldset>

                  </form>

                </div>
              </div>
            </figure>
          </div>
        </div>
      </div>
    </div>

    @endforeach
  </div>
</div>
<!-- //brands -->
@endsection
