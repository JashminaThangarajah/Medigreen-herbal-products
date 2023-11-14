@extends('layouts.app')
@section('title',"$category->meta_title")
@section('content')
  
@if(session('message'))
                         <div class="alert alert-success">{{session('message')}}</div>
                        @endif
<div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row product-data">

                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>
  
                  <div class="row ">
                    @forelse($post as $postitem)
                    <div class="col-md-3 product-data">
                        <div class="product-card ">
                            <div class="product-card-img">
                              <div >
                            @if($postitem->qty>0)
                              <label class="badge bg-success">In Stock</label>
                            @else
                              <label class="badge bg-danger">Out of Stock</label>
                            @endif
                             </div>                        
                                
                                <img src="{{ asset('uploads/post/'.$postitem->image)}}" class="rounded mx-auto " alt="img" width="80px" height="100px">
                            </div>
                            <div class="product-card-body">

                                <h5 class="product-name">
                                   <a href="{{url('product/'.$category->slug.'/'.$postitem->slug)}}">
                                   {{$postitem->name}} 
                                   </a>
                                </h5>
                                <div>
                                    <span class="selling-price">Rs:{{$postitem->selling_price}}</span>
                                    <span class="original-price">Rs:{{$postitem->original_price}}</span>
                                </div>

                                <!-- <small>
                                Rating:
                                @for($i=1;$i<=5;$i++)
                                <i class="fa fa-star text-warning"></i>
                                 @endfor
                                </small> -->

                     
                <div class="mt-2 product-data">
                    <!-- @guest
                   <input type="hidden" class="product_id" value="{{$postitem->id}}" >
                   <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class=" btn btn-warning">Add To Wishlist 
                     <i class="fa fa-heart"></i>
                   </button>
                   @else
                    
                     <button type="button" class="btn btn-warning addToWishlist" >Add to Wishlist
                         <i class="fa fa-heart"></i>
                        </button>
                    
                     @endguest -->
                               
                             <a href="{{url('product/'.$category->slug.'/'.$postitem->slug)}}" class="btn btn2 "> View </a>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    @empty
                    <div class="col-md-3 mb-3">
                           <div class="card">
                            <h2 >No Post Available  </h2>
                           </div>   
                      </div>
                    @endforelse
    
                    <div class="your-paginate mt-1">
                              {{ $post->links()}}
                       </div>
    
   
    
  
 
                </div>
        </div>
        </div>
    </div>
@endsection