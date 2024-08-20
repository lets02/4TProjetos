@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Courses</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Create New Course</a>
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <a href="{{ route('courses.show', $course) }}" class="btn btn-primary">View</a>
                        @can('update', $course)
                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">Edit</a>
                        @endcan
                        @can('delete', $course)
                            <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
