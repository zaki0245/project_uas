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
                    
                    <table class="table table-respponsive table-striped">
                        <thead>
                            <tr><th>ID</th><th>:</th><td>{{ $actifity->id }}</td></tr>
                            <tr><th>Activity Name</th><th>:</th><td>{{ $actifity->actifity_name }}</td></tr>
                            <tr><th>Place</th><th>:</th><td>{{ $actifity->place }}</td></tr>
                            <tr><th>Date</th><th>:</th><td>{{ $actifity->date }}</td></tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection