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

                    <table class='table table-responsive table-striped'>
                        <form action="/actifity/{{$actifity->id}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$actifity->id}}"></br>
                            <div class="form-group">
                                <label for="actifity_name">Activity Name</label>
                                <input type="text" class="form-control" required="required" name="actifity_name" value="{{$actifity->actifity_name}}"></br>
                            </div>
                            <div class="form-group">
                                <label for="place">Place</label>
                                <input type="text" class="form-control" required="required" name="place" value="{{$actifity->place}}"></br>
                            </div>
                            <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" required="required" name="date" value="{{$actifity->date}}"></br>
                            </div>  
                            <!-- <div class="form-group">
                                <label for="photo">Feature Image</label>
                                <input type="file" class="form-control" required="required" name="photo" value="{{$actifity->photo}}"></br>
                                <img width="150px" src="{{asset('storage/'.$actifity->photo)}}">
                            </div> -->

                            <button type="submit" name="edit" class="btn btn-primary float-right">Save Changes</button>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection