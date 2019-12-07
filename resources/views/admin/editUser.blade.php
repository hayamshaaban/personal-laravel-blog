@extends('layouts.admin')
@section('title')
Edit {{$user->name}}
@endsection
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header  bg-light">
                            <b>Edit {{$user->name}}</b>
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
                    <form method="POST" action="{{route('adminUpdateUser',$user->id)}}">@csrf
                        <div class="card-body">
                        <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="normal-input" class="form-control-label"> User Name</label>
                                    <input id="normal-input" value="{{$user->name}}" name="name" class="form-control" >
                                    </div>
                                </div>
                        </div>
                        
                            <div class="row mt-8">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-control-label">User Email</label>
                                        <input type="email" id="normal-input" value="{{$user->email}}" name="email" class="form-control" >
                                    </div>
                                </div>  
                            </div>
                         
                            <div class="col-md-4">
                               <div class="form-group">
                                <label class="form-control-label">Permissions</label>
                                    <input type="checkbox" class="form-control" name="author" value=1 {{$user->author == true ? 'checked' :''}}>Author
                                    
                                    <input type="checkbox" class="form-control" name="admin" value=1 {{$user->admin == true ? 'checked' :''}}>Admin

                               </div>
                            </div>  
                            
                        <button class="btn btn-success" type="submit">Update User</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection

    
