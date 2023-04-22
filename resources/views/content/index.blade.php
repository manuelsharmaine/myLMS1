@extends('layout.master')


@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Course</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($contents as $content)
            <tr>
                <th scope="row">{{ $content->id }}</th>
                <td>{{ $content->name }}</td>
                <td>{{ $content->description }}</td>
                <td><a href="/courses/{{ $content->course->id }}"> {{ $content->course->name }} </a></td>
                <td>{{ $content->is_draft ? 'Draft' : 'Published' }}</td>
                <td>
                    <div class="d-flex justify-content-start">

                        @if(!$content->is_draft)
                            <a href="/contents/{{$content->id}}" class="btn btn-info btn-xs m-2"> View</a>
                        @endif
                        <a href="/contents/{{$content->id}}/edit" class="btn btn-warning btn-xs m-2">Edit</a>
                        
                        <form action="/contents/{{$content->id}}" method="POST">
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