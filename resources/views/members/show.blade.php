@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('MEMBER DATA') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-respponsive table-striped">
                        <thead>
                            <img width="150px" src="{{asset('storage/'.$member->photo)}}"><br><br>
                            <tr><th>ID</th><th>:</th><td>{{ $member->id }}</td></tr>
                            <tr><th>NIM</th><th>:</th><td>{{ $member->nim }}</td></tr>
                            <tr><th>Name</th><th>:</th><td>{{ $member->name }}</td></tr>
                            <tr><th>Class</th><th>:</th><td>{{ $member->class }}</td></tr>
                            <tr><th>Department</th><th>:</th><td>{{ $member->department }}</td></tr>
                            <tr><th>Phone Number</th><th>:</th><td>{{ $member->phone_number }}</td></tr>
                        </thead>
                    </table>
                    <a href="/members/{{$member->id}}/report" class="btn btn-primary" target="_blank">Print PDF</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection