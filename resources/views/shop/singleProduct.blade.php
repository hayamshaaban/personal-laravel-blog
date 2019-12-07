
@extends('layouts.master')

@section('content')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{asset('asset/img/home-bg.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
          <h1>{{$product->title}}</h1>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
        <div class="row">
            <div class="col-md-6">
                    <img src="{{asset($product->thumbnail)}}" alt="">
            </div>
            <div class="col-md-6">
            <h2>{{$product->title}}</h2>
                <hr>
                {{$product->desc}}
                <hr>
                <b>{{$product->price}} L.E<b>
                    <br>
                    <a href="#" class="btn btn-primary mt-2">CheckOut With PayPal</a>
            </div>
    </div>
  </div>
  @endsection