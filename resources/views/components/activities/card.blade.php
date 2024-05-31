@props(['activity'])

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $activity->name }}</h5>
        <div class="d-flex">
            <p class="card-text">{{ $activity->description }}</p>
            <a href="{{ route('activities.show', $activity->id) }}" class="btn btn-primary ms-auto">View
                Details</a>

            @if (Auth::check() && Auth::user()->role === 'admin')
                <form method="POST" action="{{ route('admin.activity.destroy', ['id' => $activity->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ms-2 ">DELETE</button>
                    {{-- @dd($activity) --}}
                </form>
            @endif
        </div>

    </div>
</div>
