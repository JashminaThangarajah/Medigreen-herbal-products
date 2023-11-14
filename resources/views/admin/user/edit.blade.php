@extends('layouts.master')
@section('title','Edit User')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">

      
        <div class="card-header">
            <h4>Edit User
                <a href ="{{url('admin/users')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

        @if($errors->any())
         @foreach($errors->all() as $error)
         <div>{{$error}}</div>
         @endforeach
         </div>
        @endif

        <div class="mb-3">
            <label >First Name</label>
            <p class="form-control">{{($user->fname)}}</p>
           </div>

           <div class="mb-3">
            <label >Last Name</label>
            <p class="form-control">{{($user->lname)}}</p>
           </div>

           <div class="mb-3">
            <label >Email Id</label>
            <p class="form-control">{{($user->email)}}</p>
           </div>

           <div class="mb-3">
            <label >Address</label>
            <p class="form-control">{{($user->address)}}</p>
           </div>

           <div class="mb-3">
            <label >Phone No</label>
            <p class="form-control">{{($user->phone_no)}}</p>
           </div>

           <div class="mb-3">
            <label >Created At</label>
            <p class="form-control">{{($user->created_at->format('d/m/Y'))}}</p>
           </div>

        <form action="{{url('admin/update-user/'.$user->id)}}" method="POST"  >
               @csrf
               @method('PUT')
           
               <div class="mb-3">
            <label >Role As</label>
           <select name="role_as" class="form-control">
            <option value="1" {{$user->role_as == '1' ? 'selected':'' }}>Admin</option>
            <option value="0" {{$user->role_as == '0' ? 'selected':'' }}>User</option>
            <option value="2" {{$user->role_as == '2' ? 'selected':'' }}>Blogger</option>
           </select>
           </div>
        
       
        <div class="col-md-8">
        <div class="col-3">
            <button type="submit" class="btn btn-success float-end">Update Role </button>
           </div>
           </div>

        </form>
    </div>
</div>
</div>
@endsection