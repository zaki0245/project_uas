@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('MEMBER DATA') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif         
                    
                    <form class="form" method="get" action="{{ route('search') }}">
                    @csrf
                        <div class="form-group w-100 mb-3">
                            <label for="search" class="d-block mr-2">Pencarian</label>
                            <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan nama">
                            <button type="submit" class="btn btn-primary mb-1">Cari</button>
                        </div>
                    </form>

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @can('manage-users')
                    <a href="/members/create" class="btn btn-primary">Add Data</a><br><br>
                    @endcan
                    <table class='table table-responsive table-striped'>
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($member as $m)
                        <tr>
                            <td>{{ $m->nim }}</td>
                            <td>{{ $m->name }}</td>
                            <td>{{ $m->class }}</td>
                            <td>{{ $m->department }}</td>
                            <td>
                            <form action="/members/{{$m->id}}" method="post">
                                @csrf
                                <a href="/members/{{$m->id}}" class="btn btn-success">View</a>
                                @can('manage-users')
                                <a href="/members/{{$m->id}}/edit" class="btn btn-warning">Edit</a>
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