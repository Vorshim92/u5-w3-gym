@props(['course', 'bookedCourses'])

<div class="card mt-2">
    <div class="card-body">
        <h5 class="card-title">{{ $course->name }}</h5>
        <p class="card-text">{{ $course->description }}</p>
        <p class="card-text"><small class="text-muted">Location: {{ $course->location }}</small></p>
        @auth
            <form method="POST" action="{{ route('courses.book', $course->id) }}">
                @csrf
                <button type="submit" class="btn btn-primary" {{ in_array($course->id, $bookedCourses) ? 'disabled' : '' }}>
                    {{ in_array($course->id, $bookedCourses) ? 'Già Prenotato' : 'Prenota' }}
                </button>
            </form>
        @endauth
    </div>
</div>
