@extends('layouts.admin')
@section('title')
    Admin products
@endsection

@section('content')
<div class="content">
        <div class="card">
                <div class="card-header bg-light">
                        Admin Products
                        <a href="{{route('adminNewProducts')}}" class="btn btn-primary rounded ml-1">New Product</a>

                    </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>price</th>
                                <th>Actions</th>
                            </tr>
                          
                            </thead>
                            <tbody>
                        
                         @foreach($products as $product)
                                    <tr>
                                   <td>{{$product->id}}</td>
                                    <td><img src="{{asset($product->thumbnail)}}" width="100"/></td>
                                    <td class="text-nowrap"><a href="{{route('adminEditProduct',$product->id)}}">{{$product->title}}</a></td>
                                    <td>{{$product->desc }}</td>
                                    <td>{{$product->price }}L.E</td>
                                    <td>
                                    <a href="{{route('adminEditProduct',$product->id)}}" class="btn btn-warning mb-2">Edit</a>
                                    <form  method="Post" id="deleteProduct--{{$product->id}}" action="{{route('adminDeleteProduct',$product->id)}}" class="">
                                    
                                            <a href="#" data-toggle="modal" data-target="#deleteProductModel--{{$product->id}}" class="btn btn-danger">Delete</a>
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
@foreach($products  as $product)
<!-- Modal -->
<div class="modal fade" id="deleteProductModel--{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title " id="myModalLabel">You are about delete {{$product->title}}</h4>
            </div>
            <div class="modal-body">
              Are you sure?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">No,Keep it</button>
              <form  method="Post" id="deleteProductModel--{{$product->id}}" action="{{route('adminDeleteProduct',$product->id)}}" class="">
                    @csrf
              <button type="submit" class="btn btn-primary">Yes,delete it</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach


@endsection