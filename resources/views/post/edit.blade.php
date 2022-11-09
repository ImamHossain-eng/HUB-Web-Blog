@extends('layouts.app')
@section('title') 
    Editing an Existing Post
@endsection
@section('content') 
   <div class="card mt-3">
    <div class="card-header bg-success text-light">
        <h3 class="text-center">
            Edit form of {{ $post->title }}
        </h3>
        
    </div>
    <div class="card-body">

       <div class="container">
        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">

            @csrf()  
            
            @method('PUT')

            <div class="form-group mb-3">
                <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Enter Post Title">
            </div>


            <div class="form-group mb-3">
                <label for="image">Select an Image:</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="status">Choose Status</label>
                <select name="status" class="form-control">
                    <option value="{{ $post->status }}">
                        Current status: @if($post->status == true) Active @else Inactive @endif
                    </option>
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                </select>
            </div>
    
            <div class="form-group mb-3">
                <label for="body">Enter Content of the Post</label>
                {{-- <input type="text" name="body" class="form-control" placeholder="Enter Post Body"> --}}
                <textarea name="body" class="form-control ckeditor">{{ $post->body }}</textarea>
            </div>
    
            <input type="submit" value="Save Post" class="btn btn-primary w-100">
    
           </form>
       </div>
    </div>
   </div>
@endsection