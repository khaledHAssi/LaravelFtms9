@extends('admin.master')

@section('title', 'All Users')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">

            {{-- @if (session('msg')) --}}
                {{-- <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div> --}}
            {{-- @endif --}}

            <h1>All Users</h1>
            <table class="table table-bordered">
                <thead>
                    <tr  class="bg-dark text-white">
                        <th>ID</th>
                        <th>PersonalPhoto</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- @if ($users->count() > 0)
                        @foreach ($collection as $item)

                        @endforeach
                    @else

                    @endif --}}

                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
@if($user->image)
                        <td>
                        <img class="img-circle img-bordered-sm" height="65" width="65"
                                src="{{ Storage::url($user->image) }}" alt="user image">
                        </td>
@else
<td style="color:red;">No Pic</td>
@endif
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            {{-- <td><img width="80" src="{{ asset($user->image) }}" alt=""></td> --}}
                            <td>
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                <form class="d-inline" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Are you sure!?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>

@stop
