@extends('layouts/layout')

@section('title')
<title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Fruits & Vegetables :: w3layouts</title>
@endsection

@section('breadcrumbs')
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
  <div class="container">
    <ul>
      <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>|</span></li>
      <li>Fruits & Vegetables</li>
    </ul>
  </div>
</div>
<!-- //products-breadcrumb -->
@endsection

@section('banner_nav_right')
<div class="w3l_banner_nav_right">
  <div class="w3l_banner_nav_right_banner5" style="background-image: url('images/{{ $current->img }}');">
    <h3>Best Deals For New Products<span class="blink_me"></span></h3>
  </div>
  @if($subsections)
  <div class="w3l_banner_nav_right_banner3_btm">
    @foreach($subsections as $subsection)
    <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
      <div class="view view-tenth">
        <img src="images/{{ $subsection->img }}" alt=" " class="img-responsive" />
        <div class="mask">
          <h4>Grocery Store</h4>
          <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
        </div>
      </div>
      <h4> {{ $subsection->title }} </h4>
      <ol>
        <li>sunt in culpa qui officia</li>
        <li>commodo consequat</li>
        <li>sed do eiusmod tempor incididunt</li>
      </ol>
    </div>
    @endforeach
    <div class="clearfix"> </div>
  </div>
  @endif
  <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">

    <h3 class="w3l_fruit">{{ $current->title }}</h3>
    <div class="w3ls_w3l_banner_nav_right_grid1 w3ls_w3l_banner_nav_right_grid1_veg">
      @if($products)
      @foreach($products as $product)
      <div class="col-md-3 w3ls_w3l_banner_left" style="margin-bottom:2rem;">
        <div class="hover14 column">
          <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
            @if($product->offer ?? null)
            <div class="agile_top_brand_left_grid_pos">
              <img src="images/offer.png" alt=" " class="img-responsive" />
            </div>
            @endif
            @if($product->gift ?? false)
            <div class="tag"><img src="images/tag.png" alt=" " class="img-responsive" /></div>
            @endif
            <div class="agile_top_brand_left_grid1">
              <figure>
                <div class="snipcart-item block">
                  <div class="snipcart-thumb">
                    <a href="single.html"><img src="images/{{ $product->img }}" alt=" " class="img-responsive" /></a>
                    <p>{{ $product->title }}</p>
                    <h4>${{ $product->price_after }} <span>${{ $product->price_before }}</span></h4>
                  </div>
                  <div class="snipcart-details">
                    <form action="#" method="post">
                      <fieldset>
                        <input type="hidden" name="cmd" value="_cart" />
                        <input type="hidden" name="add" value="1" />
                        <input type="hidden" name="business" value=" " />
                        <input type="hidden" name="item_name" value="fresh cauliflower" />
                        <input type="hidden" name="amount" value="5.00" />
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
      @endif
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
@endsection

@section('extra')
@endsection
