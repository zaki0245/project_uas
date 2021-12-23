@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ACTIVITY DATA') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif         
                    @can('manage-users')
                    <a href="/actifity/create" class="btn btn-primary">Add Data</a><br><br>
                    @endcan
                    <table class='table table-responsive table-striped'>
                        <thead>
                            <tr>
                                <th>Activity</th>
                                <th>Place</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($actifity as $a)
                        <tr>
                            <td>{{ $a->actifity_name }}</td>
                            <td>{{ $a->place }}</td>
                            <td>{{ $a->date }}</td>
                            <td>
                            <form action="/actifity/{{$a->id}}" method="post">
                                @csrf
                                <a href="/actifity/{{$a->id}}" class="btn btn-success">View</a>
                                @can('manage-users')
                                <a href="/actifity/{{$a->id}}/edit" class="btn btn-warning">Edit</a>
                                @endcan
                                @csrf
                                @method('DELETE')
                                @can('manage-users')
                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                @endcan
                                </form></td>
                            </tr>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection