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
                    <form action="/join" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="actifity_id">Actifity Name</label>
                            <select class="form-control" name="actifity_id">
                                @foreach($actifity as $a)
                                    <option value="{{$a->id}}"> 
                                        {{ $a->actifity_name }} 
                                    </option>
                                @endforeach
                            </select></br>
                        </div>

                        <div class="form-group">
                            <label for="name_id">Name</label>
                            <select class="form-control" name="name_id">
                                @foreach($member as $a)
                                    <option value="{{$a->id}}"> 
                                        {{ $a->name }} 
                                    </option>
                                @endforeach
                            </select></br>
                        </div>

                        <button type="submit" name="add" class="btn btn-primary 
                        float-right">Add Data</button>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection