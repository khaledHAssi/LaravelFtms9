@extends('user_dash.doctor.master')

@section('title', 'All AvailableTimes')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="card-body">

                    @if (session('msg'))
                        <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
                    @endif

                    <h1>All times</h1>

                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th>ID</th>
                                <th>Expert & id</th>
                                <th>Price</th>
                                <th>Meet Link</th>
                                <th>Date</th>
                                <th>status</th>
                                <th>Hour From</th>
                                <th>Hour to</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($times as $time)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $time->expert->id }} - {{ $time->expert->name }}</td>
                                    <td>{{ $time->price }}</td>
                                    <td>
                                        @if ($time->link != null)
                                            <a href="{{ $time->link }}">{{ $time->link }}</a>
                                        @else
                                            Your meet is face to face in the company
                                        @endif
                                    </td>
                                    <td>{{ $time->date }}</td>
                                    @if($time->status == '1')
                                    <td class="text-danger">
                                        Booked</td>
                                    @else
                                   <td class="text-success">Available</td>
                                    @endif
                                    <td>{{ $time->hour_from }}</td>
                                    <td>{{ $time->hour_to }}</td>
                                        @if($time->status =='0')
                                    <td>
                                        <a href="{{ route('user_dash.doctor.dash.AvailableTimeEdit', $time) }}"
                                            class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                        <form class="d-inline"
                                            action="{{ route('user_dash.doctor.dash.availableTimeDestroy', $time->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Are you sure!?')"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                    @else
                                    <td class="text-danger">Booked Time</td>

                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No Data Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
