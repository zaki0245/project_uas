@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('JOIN DATA') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-respponsive table-striped">
                        <thead>
                            <tr><th>Activity Name</th><th>:</th><td>{{ $join->actifity->actifity_name }}</td></tr>
                            <tr><th>Name</th><th>:</th><td>{{ $join->member->name }}</td></tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection