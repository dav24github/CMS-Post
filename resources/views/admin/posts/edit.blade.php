<x-master.admin-master>
    @section('content')
        <h1>Edit a Post</h1>
        <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"
                    name="title"
                    class="form-control"
                    id="title"
                    aria-describedby=""
                    placeholder="Enter title"
                    value="{{$post->title}}">
            </div>
            <div class="form-group">
                <div><img height="100px" src="{{$post->post_image}}" alt=""></div>
                <label for="file">File</label>
                <input type="file"
                    name="post_image"
                    class="form-control-file"
                    id="post_image">
            </div>
            <div class="form-group">
                <textarea name="body"
                    id="body"
                    cols="30"
                    rows="10"
                    class="form-control">
                    {{$post->body}}
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endsection
</x-master.admin-master>
