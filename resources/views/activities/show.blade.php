@extends('templates.template')

@section('title', 'Dettagli Attività')

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-md-8">

            <h1 class="text-center ">{{ $activity->name }} </h1>
            <p class="text-center">{{ $activity->description }}</p>


            <h2>Morning Courses</h2>
            @if ($morningCourses->isEmpty())
                <p>No morning courses available.</p>
            @else
                @foreach ($morningCourses as $course)
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->name }}</h5>
                            <p class="card-text">{{ $course->description }}</p>
                            <p class="card-text"><small class="text-muted">Location: {{ $course->location }}</small></p>
                        </div>
                    </div>
                @endforeach
            @endif

            <h2 class="mt-4">Afternoon Courses</h2>
            @if ($afternoonCourses->isEmpty())
                <p>No afternoon courses available.</p>
            @else
                @foreach ($afternoonCourses as $course)
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->name }}</h5>
                            <p class="card-text">{{ $course->description }}</p>
                            <p class="card-text"><small class="text-muted">Location: {{ $course->location }}</small></p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-center my-5">
            <a href="{{ route('activities.index') }}" class="btn btn-secondary mb-4">Back to Activities</a>
        </div>
    </div>
@endsection
