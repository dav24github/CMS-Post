<x-master.admin-master>
    @section('content')

        @if (Session::has('permission-updated'))
            <div class="alert alert-success">
                {{session('permission-updated')}}
            </div>
        @endif

         <div class="row">
            <div class="col-sm-6">
                <h1>Edit Permission: {{$permission->name}}</h1>

                <form method="POST" action="{{route('permissions.update', $permission->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$permission->name}}">
                    </div>

                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

    @endsection
</x-master.admin-master>
