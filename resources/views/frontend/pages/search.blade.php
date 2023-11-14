@extends('layouts.app')
@section('title',"Search")
@section('content')
<div class="py-5 bg-white">
        <div class="container">
            <div class="row">

            <div class="col-md-12">
                    <h3 class="mb-4">Search Results</h3>
                    </div>

                    @if(session('message'))
                         <div class="alert alert-success">{{session('message')}}</div>
                        @endif
        <div class="owl-carousel owl-theme category-carousel">
        
                @forelse($searchproducts as $postitem)
                 <div class="item">
                        <div class="product-card ">
                            <div class="product-card-img">
                              <label class="badge bg-danger">new</label>                 
                                 <img src="{{ asset('uploads/post/'.$postitem->image)}}" class="rounded mx-auto " alt="img">
                            </div>
                        <div class="product-card-body">

                                <h5 class="product-name">
                                   <a href="{{url('product/'.$postitem->category->slug.'/'.$postitem->slug)}}">
                                   {{$postitem->name}} 
                                   </a>
                                </h5>
                            <div>
                                    <span class="selling-price">Rs:{{$postitem->selling_price}}</span>
                                    <span class="original-price">Rs:{{$postitem->original_price}}</span>
                            </div>

                                <small>
                                Rating:
                                @for($i=1;$i<=5;$i++)
                                <i class="fa fa-star text-warning"></i>
                                 @endfor
                                </small>

                                <div class="float-end">
                                    <a href="{{url('product/'.$postitem->category->slug.'/'.$postitem->slug)}}" class="btn btn2 "> View </a>
                                </div>

                            </div>
                        </div>
                    </div>
               
                    @empty
                    <div class="col-md-12">
                           <div class="mb-4">
                            <h2 >No Result Found </h2>
                           </div>   
                      </div>
                    @endforelse
                 </div>    
            
                    
             
            </div>
     </div>      
</div> 
@endsection



   