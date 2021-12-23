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

                    <table class='table table-responsive table-striped'>
                        <form action="/join/{{$join->id}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$join->id}}"></br>
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
                            <button type="submit" name="edit" class="btn btn-primary float-right">Save Changes</button>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection