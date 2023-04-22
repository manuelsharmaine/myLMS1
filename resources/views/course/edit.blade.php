@extends('layout.master')

@section('content')

    <div class="card">
        <div class="card-header">
            Edit Course
        </div>
        <div class="card-body">
                <form action="/courses/{{$course->id}}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label>Name </label>
                        <input type="text" name="name" value="{{$course->name}}" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label>Description </label>
                        <textarea name="description" class="form-control" cols="30" rows="10">{{$course->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Save </button>
                </form>
        </div>
    </div>
    
@endsection