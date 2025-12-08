@extends('layouts.app')

@section('title', $menu->name . ' - EatJoy')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user-menus.index') }}">My Menus</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $menu->name }}</li>
                </ol>
            </nav>
            
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="fw-bold">{{ $menu->name }}</h1>
                <div>
                    @if($menu->user_id == auth()->id())
                    <a href="{{ route('user-menus.edit', $menu->id) }}" class="btn btn-warning me-2">
                        <i class="fas fa-edit me-1"></i>Edit
                    </a>
                    @endif
                    <button onclick="window.print()" class="btn btn-outline-secondary">
                        <i class="fas fa-print me-1"></i>Print
                    </button>
                </div>
            </div>
            
            <div class="d-flex align-items-center gap-3 mt-2">
                <span class="badge bg-{{ $menu->is_public ? 'success' : 'secondary' }}">
                    <i class="fas {{ $menu->is_public ? 'fa-globe' : 'fa-lock' }} me-1"></i>
                    {{ $menu->is_public ? 'Public' : 'Private' }}
                </span>
                <span class="badge bg-info">
                    <i class="fas {{ $menu->meal_type_icon }} me-1"></i>
                    {{ ucfirst($menu->meal_type) }}
                </span>
                <span class="badge bg-primary">
                    <i class="fas fa-fire me-1"></i>{{ $menu->calories }} cal
                </span>
                @if($menu->preparation_time)
                <span class="badge bg-success">
                    <i class="fas fa-clock me-1"></i>{{ $menu->preparation_time_display }}
                </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Left Column: Recipe Details -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-info-circle me-2"></i>Description
                    </h4>
                    <p class="card-text">{{ $menu->description }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h4 class="card-title">
                                <i class="fas fa-shopping-basket me-2 text-danger"></i>Ingredients
                            </h4>
                            <div class="ingredients-list">
                                {!! nl2br(e($menu->ingredients)) !!}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h4 class="card-title">
                                <i class="fas fa-list-ol me-2 text-warning"></i>Instructions
                            </h4>
                            <div class="instructions-list">
                                {!! nl2br(e($menu->instructions)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Creator Info & Actions -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-user me-2"></i>Creator
                    </h4>
                    <div class="d-flex align-items-center mb-3">
                        <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 50px; height: 50px;">
                            <span class="fs-5">{{ strtoupper(substr($menu->user->nickname, 0, 1)) }}</span>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0">{{ $menu->user->nickname }}</h6>
                            <small class="text-muted">Created {{ $menu->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    
                    @if($menu->is_public)
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-heart text-danger me-2"></i>
                            <span id="likes-count">{{ $menu->likes }}</span> likes
                        </div>
                        <button id="like-btn" class="btn btn-sm btn-outline-danger"
                                onclick="toggleLike({{ $menu->id }})"
                                data-liked="{{ auth()->check() && $menu->likedByUsers->contains(auth()->id()) ? 'true' : 'false' }}">
                            <i class="fas fa-heart"></i>
                            <span id="like-text">
                                {{ auth()->check() && $menu->likedByUsers->contains(auth()->id()) ? 'Liked' : 'Like' }}
                            </span>
                        </button>
                    </div>
                    @endif
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-chart-bar me-2"></i>Nutrition Facts
                    </h4>
                    <div class="nutrition-facts">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Calories</span>
                            <strong>{{ $menu->calories }} cal</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Serving Size</span>
                            <strong>1 portion</strong>
                        </div>
                        @if($menu->preparation_time)
                        <div class="d-flex justify-content-between">
                            <span>Preparation Time</span>
                            <strong>{{ $menu->preparation_time_display }}</strong>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="fas fa-bolt me-2"></i>Quick Actions
                    </h4>
                    <div class="d-grid gap-2">
                        <a href="{{ route('daily-planner') }}" class="btn btn-success">
                            <i class="fas fa-calendar-plus me-2"></i>Add to Daily Planner
                        </a>
                        @if($menu->user_id == auth()->id())
                        <a href="{{ route('user-menus.edit', $menu->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit Menu
                        </a>
                        <form action="{{ route('user-menus.destroy', $menu->id) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100"
                                    onclick="return confirm('Delete this menu?')">
                                <i class="fas fa-trash me-2"></i>Delete Menu
                            </button>
                        </form>
                        @else
                        <button class="btn btn-primary" onclick="cloneMenu({{ $menu->id }})">
                            <i class="fas fa-copy me-2"></i>Clone to My Menus
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.ingredients-list, .instructions-list {
    white-space: pre-line;
    line-height: 1.8;
}

.avatar {
    font-weight: bold;
}
</style>

<script>
function toggleLike(menuId) {
    if (!{{ auth()->check() ? 'true' : 'false' }}) {
        window.location.href = '{{ route("login") }}';
        return;
    }
    
    fetch(`/user-menus/${menuId}/toggle-like`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
            return;
        }
        
        const likeBtn = document.getElementById('like-btn');
        const likeText = document.getElementById('like-text');
        const likesCount = document.getElementById('likes-count');
        
        if (data.liked) {
            likeBtn.classList.remove('btn-outline-danger');
            likeBtn.classList.add('btn-danger');
            likeText.textContent = 'Liked';
        } else {
            likeBtn.classList.remove('btn-danger');
            likeBtn.classList.add('btn-outline-danger');
            likeText.textContent = 'Like';
        }
        
        likesCount.textContent = data.likes_count;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function cloneMenu(menuId) {
    if (!confirm('Clone this menu to your collection?')) return;
    
    fetch(`/user-menus/${menuId}/clone`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Menu cloned successfully!');
            window.location.href = `/user-menus/${data.menu_id}`;
        } else {
            alert(data.error || 'Failed to clone menu');
        }
    });
}
</script>
@endsection