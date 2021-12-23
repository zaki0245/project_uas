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

                    <table class='table table-responsive table-striped'>
                        <form action="/members/{{$member->id}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$member->id}}"></br>
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" required="required" name="nim" value="{{$member->nim}}"></br>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" required="required" name="name" value="{{$member->name}}"></br>
                            </div>
                            <div class="form-group">
                            <label for="class">Class</label>
                            <input type="text" class="form-control" required="required" name="class" value="{{$member->class}}"></br>
                            </div>
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" required="required" name="department" value="{{$member->department}}"></br>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" class="form-control" required="required" name="phone_number" value="{{$member->phone_number}}"></br>
                            </div>
                            <div class="form-group">
                                <label for="photo">Feature Image</label>
                                <input type="file" class="form-control" required="required" name="photo" value="{{$member->photo}}"></br>
                                <img width="150px" src="{{asset('storage/'.$member->photo)}}">
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