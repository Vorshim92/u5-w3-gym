@extends('templates.template')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="row justify-content-center my-5 gap-3">
        <h1 class="text-center">Admin Dashboard</h1>
        @foreach ($users as $user)
            <div class="card col-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">{{ $user->email }}</p>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit Profile</a>
                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary">Prenotazioni
                        @if ($user->pending_courses_count > 0)
                            <span class="badge bg-danger">{{ $user->pending_courses_count }}</span>
                        @endif
                    </a>
                </div>
            </div>
        @endforeach

        <a href="{{ route('admin.formActivity') }}" class="btn btn-primary">AGGIUNGI ATTIVITA'</a>
        <a href="" class="btn btn-primary">AGGIUNGI CORSO'</a>





    </div>
@endsection
