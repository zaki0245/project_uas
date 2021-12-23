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
                    <form action="/actifity" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label for="actifity_name">Activity Name</label>
                        <input type="text" class="form-control" 
                        required="required" name="actifity_name"></br>
                        </div>

                        <div class="form-group">
                        <label for="place">Place</label>
                        <input type="text" class="form-control" 
                        required="required" name="place"></br>
                        </div>

                        <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" 
                        required="required" name="date"></br>
                        </div>
                        
                        <!-- <div class="form-group">
                        <label for="photo">Profile Photo</label>
                        <input type="file" class="form-control" required="required" 
                        name="photo"></br>
                        </div> -->

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