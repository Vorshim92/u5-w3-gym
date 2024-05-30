@extends('templates.template')

@section('title', 'Attività')

@section('content')
    <div class="row justify-content-center my-5 gap-3">
        <h1 class="text-center">Attività</h1>

        @foreach ($activities as $activity)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $activity->name }}</h5>
                    <div class="d-flex">
                        <p class="card-text">{{ $activity->description }}</p>
                        <a href="{{ route('activities.show', $activity->id) }}" class="btn btn-primary ms-auto">View
                            Details</a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
