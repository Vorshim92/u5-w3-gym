@extends('templates.template')

@section('title', 'Attività')

@section('content')
    <div class="row justify-content-center my-5 gap-3">
        <h1 class="text-center">Attività</h1>

        @foreach ($activities as $activity)
            <x-activities.card :activity="$activity" />
        @endforeach
    </div>
@endsection
