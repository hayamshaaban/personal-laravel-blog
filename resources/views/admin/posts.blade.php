@extends('layouts.admin')
@section('title')
    Admin Posts
@endsection

@section('content')
<div class="content">
        <div class="card">
                <div class="card-header bg-light">
                        Admin Posts
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Comments</th>
                                <th>Actions</th>
                            </tr>
                          
                            </thead>
                            <tbody>
                        
                         @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                    <td class="text-nowrap"><a href="{{route('singlePost',$post->id)}}">{{$post->title}}</a></td>
                                    <td>{{($post->created_at)->diffForHumans() }}</td>
                                    <td>{{($post->updated_at)->diffForHumans() }}</td>
                                    <td>{{$post->comments->count()}}</td>
                                    <td>
                                    <a href="{{route('adminEditPost',$post->id)}}" class="btn btn-warning mb-2">Edit</a>
                                    
                                    
                                    <a href="#" data-toggle="modal" data-target="#deletePostModel--{{$post->id}}" class="btn btn-danger">Delete</a>
                                    </form>
                                    </td>
                                      
                                       
                                    </tr>
                        @endforeach
                                    
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>
@foreach($posts  as $post)
<!-- Modal -->
<div class="modal fade" id="deletePostModel--{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title " id="myModalLabel">You are about delete {{$post->title}}</h4>
            </div>
            <div class="modal-body">
              Are you sure?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">No,Keep it</button>
              <form  method="Post" id="deletePost--{{$post->id}}" action="{{route('adminDeletePost',$post->id)}}" class="">
                    @csrf
              <button type="submit" class="btn btn-primary">Yes,delete it</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach
@endsection