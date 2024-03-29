@extends('layouts.admin')


@section('title')Admin users @endsection
@section('content')
<div class="content">
        <div class="card">
                <div class="card-header bg-light">
                    Admin users
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Posts</th>
                                <th>Comments</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                          
                            </thead>
                            <tbody>
                 @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                            <td class="text-nowrap">{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->posts->count()}}</td>
                                <td>{{$user->comments->count()}}</td>
                                <td>{{($user->created_at)->diffForHumans()}}</td>
                                <td>{{($user->updated_at)->diffForHumans()}}</td>
                                
                                <td>
                                <a href="{{route('adminEditUser',$user->id)}}" class="btn btn-warning"><i class="icon icon-pencil"></i></a>
                                <form style="display:none" id="deleteUser-{{$user->id}}" method="POST" action="{{route('adminDeleteUser',$user->id)}}">@csrf</form>
                                    <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteUser-{{$user->id}}').submit()">X</button>
                                    
                                </td>
                            </tr>
                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>
@endsection