@extends('layout.master')

@section('content')

    <div class="card">
        <div class="card-header">
            Create Content
        </div>
        <div class="card-body">
                <form action="/contents" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Name </label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Courses </label>
                        <select class="form-control" name="course_id">
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}"> {{$course->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label>Description </label>
                        <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Save </button>
                </form>
        </div>
    </div>
    
@endsection