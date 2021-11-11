<x-master.admin-master>
    @section('content')

        @if (Auth::user()->userHasRole('Admin'))
            <h1 class="mb-4 text-gray-800">Dashborad</h1>
        @endif

    @endsection
</x-master.admin-master>
