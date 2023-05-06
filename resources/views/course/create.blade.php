@extends('layout.master')

@section('content')

    <div class="card">
        <div class="card-header">
            Create Course
        </div>
        <div class="card-body">
                <form action="/courses" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label>Name </label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label>Description </label>
                        <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Upload Thumbnail </label>
                        <input type="file" name="thumbnail" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success">Save </button>
                </form>
        </div>
    </div>
    
@endsection