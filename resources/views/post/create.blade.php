@extends('layouts.home')
@section('title') 
    Creating New Post
@endsection
@section('content') 
   <div class="card mt-3">
    <div class="card-header bg-success text-light">
        <h3 class="text-center">
            Create New Post 
        </h3>
        
    </div>
    <div class="card-body">

       <div class="container">
        <form action="/posts" method="POST" enctype="multipart/form-data">

            @csrf()            

            <div class="form-group mb-3">
                <input type="text" name="title" class="form-control" placeholder="Enter Post Title">
            </div>

            <div class="form-group mb-3">
                <label for="image">Upload a Cover Photo</label>
                <input type="file" name="image" class="form-control">
            </div>
    
            <div class="form-group mb-3">
                <label for="body">Enter Content of the Post</label>
                {{-- <input type="text" name="body" class="form-control" placeholder="Enter Post Body"> --}}
                <textarea name="body" class="form-control ckeditor"></textarea>
            </div>
    
            <input type="submit" value="Save Post" class="btn btn-primary w-100">
    
           </form>
       </div>

       

    </div>
   </div>
@endsection