@extends('layouts.admin')
@section('title') New Product @endsection
    

@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header  bg-light">
                            <b>New Product</b>
                        </div>
                        @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{route('adminStoreProducts')}}" enctype="multipart/form-data">@csrf
                        <div class="card-body">
                        <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="normal-input" class="form-control-label"> Thumbnail</label>
                                        <input type="file" id="normal-input" name="thumbnail" class="form-control" placeholder="Thumbnail">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label"> Title</label>
                                            <input type="text" id="normal-input" name="title" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                        </div>
                        
                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-control-label">Description</label>
                                        <textarea name="desc" class="form-control"  cols="40" rows="10" placeholder="Post Content"></textarea>
                                    </div>
                                </div>  
                            </div>
                            <div class="row ">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-control-label">Price</label>
                                            <input  id="normal-input" name="price" class="form-control" placeholder="10.00">
                                        </div>
                                    </div>  
                            </div>
                        <button class="btn btn-success" type="submit">Create Product</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection