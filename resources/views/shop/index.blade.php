
@extends('layouts.master')

@section('content')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{asset('asset/img/home-bg.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Shop</h1>
            <span class="subheading">Shop Here</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          @foreach($products as $product)
          <div class="post-preview">
            <div class="row">
                  <div class="col-md-3">
                       <img src="{{asset($product->thumbnail)}}" width="100">
                    </div>
                    <div class="col-md-9">
                <a href="{{route('shop.singleProduct',$product->id)}}">
                  <h2 class="post-title">
                  {{$product->title}}
                  </h2>
                </a>
                <p class="post-meta">
                {{$product->price}} L.E
                
                </p>
              </div>
            </div>
          </div>
          <hr>
      @endforeach
  
        </div>
      </div>
    </div>
  @endsection