<x-master.admin-master>
    @section('content')
        <form method="POST" action="{{route('user.profile.test')}}">
            @csrf
          <select name="checkboxArray" id="">
              <option value="asd">Delete</option>
          </select>

          <input name="Bottun-input" type="submit">
          <br>
          @foreach ($users as $user)
            <input type="checkbox" name="checkBoxArray[]" value="{{$user->name}}">
            <label for="checkBoxArray[]">{{$user->name}}</label><br>
          @endforeach
        </form>
    @endsection

</x-master.admin-master>
