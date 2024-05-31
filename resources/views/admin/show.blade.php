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
                <x-admin.coursecard :course="$course" :user="$user" />
            @endforeach
        @endif

        <div class="mt-4">
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Back to Admin Dashboard</a>
        </div>
    </div>
@endsection
