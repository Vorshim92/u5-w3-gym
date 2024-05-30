@extends('templates.template')

@section('title', 'Prenotazioni Utente')

@section('content')
    <div class="container my-5">

        <h2 class="text-center">Tutti i Corsi Prenotati</h2>
        <h1>Prenotazioni per {{ $user->name }}</h1>
        <p>Email: {{ $user->email }}</p>
        @if ($courses->isEmpty())
            <p class="text-center">L'utente non ha prenotazioni.</p>
        @else
            @foreach ($courses as $course)
                <div class="card mt-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->name }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <p class="card-text"><small class="text-muted">Location: {{ $course->location }}</small></p>
                        <p class="card-text"><small class="text-muted">Status: {{ $course->pivot->status }}</small></p>
                        <form method="POST"
                            action="{{ route('admin.users.destroy', ['user' => $user->id, 'course' => $course->id]) }}">
                            @csrf @method('DELETE') <button type="submit" class="btn btn-success">ELIMINA</button>
                        </form>
                        @if ($course->pivot->status === 'pending')
                            <form method="POST"
                                action="{{ route('admin.users.updateStatus', ['user' => $user->id, 'course' => $course->id, 'status' => 'accepted']) }}">
                                @csrf @method('PATCH') <button type="submit" class="btn btn-success">Accetta</button>
                            </form>
                            <form method="POST"
                                action="{{ route('admin.users.updateStatus', ['user' => $user->id, 'course' => $course->id, 'status' => 'rejected']) }}">
                                @csrf @method('PATCH') <button type="submit" class="btn btn-danger">Rifiuta</button>
                            </form>
                        @elseif ($course->pivot->status === 'accepted')
                            <form method="POST"
                                action="{{ route('admin.users.updateStatus', ['user' => $user->id, 'course' => $course->id, 'status' => 'rejected']) }}">
                                @csrf @method('PATCH') <button type="submit" class="btn btn-danger">Annulla</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif

        <div class="mt-4">
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Back to Admin Dashboard</a>
        </div>
    </div>
@endsection
