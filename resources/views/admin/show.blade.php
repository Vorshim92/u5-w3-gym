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
            <div class="row gap-3">
                @foreach ($courses as $course)
                    <x-admin.coursecard :course="$course" :user="$user" />
                @endforeach
            </div>
        @endif

        <div class="mt-4 text-center">
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Back to Admin Dashboard</a>
        </div>
    </div>
@endsection
