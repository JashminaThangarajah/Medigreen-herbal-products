@extends('layouts.app')
@section('title',"Write Review")
@section('content')

<div class="content">
<div class="container py-5">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                            @if(session('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif

                        @if($verified_purchase->count()>0)
                        <h5>You are writing a review for {{$post->name}}</h5>
                        <form action="{{url('/add_reviews')}}" method="POST">
                         @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}" >
                        <textarea type="text" name="user_review" id="mySummernote" class="form-control" placeholder="Write a review" rows="5"></textarea>
                       <button type="submit" class="btn btn-success mt-3 float-end">Submit Review</button>
                       </form>
                        @else
                         <div class="alert alert-danger">
                            <h5>You are not eligible to review this product</h5>
                            <p>
                                For the trusthworthiness of the reviews, only customers who purchased the product can write a review about the product.
                            </p>
                            <a href="{{url('/')}}" class="btn btn-success mt-3" >Go to home page</a>
                         </div>
                        @endif


            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

