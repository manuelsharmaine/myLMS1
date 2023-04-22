@extends('layout.master')

@section('content')

    <h1>Courses</h1>
    
    <a href="/courses/create" class="btn btn-success btn-sm m-2"> Create Course </a>
    <a href="/contents/create" class="btn btn-success btn-sm m-2"> Create Contents </a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{ $course->id }}</th>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->is_draft ? 'Draft' : 'Published' }}</td>
                    <td>
                        <div class="d-flex justify-content-start">

                            @if(!$course->is_draft)
                                <a href="/courses/{{$course->id}}" class="btn btn-info btn-xs m-2"> View</a>
                            @endif
                            <a href="/courses/{{$course->id}}/edit" class="btn btn-warning btn-xs m-2">Edit</a>
                            
                            <form action="/courses/{{$course->id}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-xs m-2">Delete </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection