@extends('layouts.home')
@section('title') 
    List of All Posts 
@endsection
@section('content') 
   <div class="card mt-3">
    <div class="card-header bg-success text-light">
        <h3 class="text-center">
            List of All Posts 
        </h3>
        
    </div>
    <div class="card-body">

        <a href="/posts/create" title="Create new Post" class="btn btn-primary mb-4">Add New Post</a>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    {{-- <th>Serial</th> --}}
                    <th>Title</th>
                    <th>Status</th>
                    <th>Visit</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Option</th>                    
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->visit }}</td>
                        <td>
                            {{-- {{ $post->created_at }} --}}
                            {{-- {{ $post->created_at->diffForHumans() }} --}}
                            {{-- {{ Carbon\Carbon::parse($post->created_at)->format('F d, Y') }} --}}
                            {{-- {{ $post->created_at->format('M/d/Y') }} --}}
                            {{-- {{ $post->created_at->format('m/d/y') }} --}}
                            {{ $post->created_at->format('F d, Y (D)') }} / {{ $post->created_at->diffForHumans() }}


                        </td>
                        <td>{{ $post->updated_at }}</td>
                        <td>
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                @csrf()
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">X</button>
                            </form>
                        </td>
                    </tr>
                @empty 
                    <tr class="table-danger text-center">
                        <td colspan="5">No Post Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $posts->links() }}

    </div>
   </div>
@endsection