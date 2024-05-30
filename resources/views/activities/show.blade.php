@extends('templates.template')

@section('title', 'Dettagli Attività')

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <h1 class="text-center">{{ $activity->name }}</h1>
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
                            @auth
                                <form method="POST" action="{{ route('courses.book', $course->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary"
                                        {{ in_array($course->id, $bookedCourses) ? 'disabled' : '' }}>
                                        {{ in_array($course->id, $bookedCourses) ? 'Già Prenotato' : 'Prenota' }}
                                    </button>
                                </form>
                            @endauth
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
                            @auth
                                <form method="POST" action="{{ route('courses.book', $course->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary"
                                        {{ in_array($course->id, $bookedCourses) ? 'disabled' : '' }}>
                                        {{ in_array($course->id, $bookedCourses) ? 'Già Prenotato' : 'Prenota' }}
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('activities.index') }}" class="btn btn-secondary">Back to Activities</a>
            </div>
        </div>
    </div>
@endsection
