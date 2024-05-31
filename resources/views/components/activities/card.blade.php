@props(['activity'])
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
