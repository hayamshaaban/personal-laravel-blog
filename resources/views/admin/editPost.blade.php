@extends('layouts.admin')
@section('title')
Edit {{$post->title}}
@endsection
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header  bg-light">
                            <b>Edit {{$post->title}}</b>
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
                    <form method="POST" action="{{route('adminUpdatePost',$post->id)}}">@csrf
                        <div class="card-body">
                        <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="normal-input" class="form-control-label"> Title</label>
                                    <input id="normal-input" value="{{$post->title}}" name="title" class="form-control" placeholder="Post Title">
                                    </div>
                                </div>
                        </div>
                        
                            <div class="row mt-4">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-control-label">Post Content</label>
                                        <textarea name="content"  class="form-control"  cols="40" rows="10" placeholder="Post Content">{{$post->content}}</textarea>
                                    </div>
                                </div>  
                            </div>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection

    
