@extends('layouts.home')
@section('title'){{ $post->title }} @endsection
@section('content')
    <div class="card mt-3">
        <div class="card-header bg-success">
            <h3 class="text-center text-light">Show Details of {{ $post->title }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('images/post/'.$post->image) }}" class="img img-thumbnails" alt="">
                    <strong>Status: </strong> 
                        @if($post->status == true) 
                            Active 
                        @else 
                            Inactive 
                        @endif 
                    <br>
                    <strong>Visits: </strong> {{ $post->visit }} <br>
                    <strong>Inserted: </strong> {{ $post->created_at }} <br>
                </div>
                <div class="col-md-8">
                    <strong>Title: </strong> {{ $post->title }} <br>
                    <strong>Content</strong> <br>
                    {!! $post->body !!}                    
                </div>
            </div>
        </div>
    </div>
@endsection