@extends('templates.template')

@section('title', 'Admin Dashboard Create Activity')

@section('content')
    <div class="row justify-content-center my-5 gap-3">
        <h1 class="text-center">Admin Dashboard Create Activity</h1>

        <form method="POST" action="{{ route('admin.createActivity') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>

            <button type="submit" class="btn btn-primary">CREA</button>
        </form>

    </div>
@endsection
