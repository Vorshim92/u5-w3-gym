@props(['course', 'user'])
<div class="card mt-2 col-3 ">
    <div class="card-body">
        <h5 class="card-title">{{ $course->name }}</h5>
        <p class="card-text">{{ $course->description }}</p>
        <p class="card-text"><small class="text-muted">Location: {{ $course->location }}</small></p>
        <p class="card-text"><small class="text-muted">Status: {{ $course->pivot->status }}</small></p>
        <form method="POST" action="{{ route('admin.users.destroy', ['user' => $user->id, 'course' => $course->id]) }}">
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
