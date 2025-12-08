@extends('layouts.app')

@section('title', 'Dashboard - EatJoy')

@push('styles')
<style>
    .welcome-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px;
    }

    .progress-circle {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: conic-gradient(#4CAF50 var(--progress), #e0e0e0 0deg);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .progress-circle::before {
        content: '';
        position: absolute;
        width: 100px;
        height: 100px;
        background: white;
        border-radius: 50%;
    }

    .progress-text {
        position: relative;
        z-index: 1;
        font-weight: bold;
    }

    .user-stats {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
</style>
@endpush

@section('content')
<div class="container">
    <!-- Welcome Message Popup -->
    @if(session('show_welcome'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <i class="fas fa-trophy fa-2x me-3"></i>
            </div>
            <div class="flex-grow-1">
                <h4 class="alert-heading mb-2">{{ $motivationalQuotes['title'] }} {{ $motivationalQuotes['icon'] }}</h4>
                <p class="mb-0">{{ $motivationalQuotes['message'] }}</p>
                @if($profile)
                <hr>
                <p class="mb-0">
                    <strong>Progress:</strong> {{ $profile->current_weight }}kg → {{ $profile->target_weight }}kg
                    ({{ $profile->weight_difference > 0 ? 'Turun' : 'Naik' }} {{ abs($profile->weight_difference) }}kg)
                </p>
                @endif
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- User Stats -->
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="welcome-card p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-2">Welcome back, {{ $user->nickname }}!</h2>
                        <p class="mb-0">You're on the {{ $user->getPlanName() }} plan</p>
                    </div>
                    @if($user->isPremium())
                    <span class="badge {{ $user->isPremiumStarterPlus() ? 'premium-plus-badge' : 'premium-badge' }} fs-6">
                        {{ $user->getPlanName() }}
                    </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="user-stats">
                <h5><i class="fas fa-weight me-2"></i>Weight Progress</h5>
                @if($profile)
                <div class="text-center my-3">
                    @php
                        $maxWeight = max($profile->current_weight, $profile->target_weight) + 10;
                        $progress = (($maxWeight - $profile->current_weight) / $maxWeight) * 100;
                    @endphp
                    <div class="progress-circle mx-auto mb-3" style="--progress: {{ $progress }}%">
                        <div class="progress-text text-center">
                            <div class="fs-4">{{ number_format($progress, 1) }}%</div>
                            <div class="small">Progress</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="text-success">
                                <div class="fs-5">{{ $profile->current_weight }}kg</div>
                                <small>Current</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-primary">
                                <div class="fs-5">{{ $profile->target_weight }}kg</div>
                                <small>Target</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Diet Menus Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold mb-0">
                    <i class="fas fa-utensils me-2"></i>Diet Menus
                </h3>
                <span class="badge bg-primary">{{ $menus->count() }}+ Menus Available</span>
            </div>
        </div>

        @foreach($menus->take(12) as $menu)
        <div class="col-md-3 mb-4">
            <div class="card menu-card h-100" onclick="showMenuDetails({{ $menu->id }})">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1490818387583-1baba5e638af?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                         class="card-img-top" alt="{{ $menu->name }}" style="height: 150px; object-fit: cover;">
                    <span class="calorie-badge">{{ $menu->calories }} cal</span>
                    @if($menu->is_premium && !$user->isPremium())
                    <span class="position-absolute top-0 start-0 m-2 badge premium-badge">
                        <i class="fas fa-crown me-1"></i>Premium
                    </span>
                    @endif
                </div>
                <div class="card-body">
                    <h6 class="card-title">{{ $menu->name }}</h6>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        @if($menu->is_premium && !$user->isPremium())
                        <span class="badge bg-warning text-dark">Upgrade Required</span>
                        @else
                        <span class="badge bg-success">View Details</span>
                        @endif
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Personalized Menu Section (for premium) -->
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-calendar-day me-2"></i>Daily Personalized Menu
                    </h5>
                </div>
                <div class="card-body">
                    @if($user->isPremium())
                    <div class="text-center py-3">
                        <i class="fas fa-utensils fa-3x text-primary mb-3"></i>
                        <h5>Your Menu for Today</h5>
                        <p class="text-muted">Generated based on your goals and preferences</p>

                        <div class="list-group mt-3">
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Breakfast</span>
                                    <span class="badge bg-success">Oatmeal Bowl</span>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Lunch</span>
                                    <span class="badge bg-info">Grilled Chicken</span>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <span>Dinner</span>
                                    <span class="badge bg-warning">Vegetable Stir Fry</span>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary mt-3">
                            <i class="fas fa-redo me-2"></i>Regenerate Menu
                        </button>
                    </div>
                    @else
                    <div class="text-center py-5">
                        <i class="fas fa-lock fa-3x text-muted mb-3"></i>
                        <h5>Premium Feature</h5>
                        <p class="text-muted">Get daily personalized menu recommendations</p>
                        <a href="{{ route('subscription') }}" class="btn btn-primary">
                            <i class="fas fa-gem me-2"></i>Upgrade Now
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-newspaper me-2"></i>Latest Articles
                    </h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @for($i = 1; $i <= 4; $i++)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Healthy Eating Tip #{{ $i }}</h6>
                                <small>{{ $i }} days ago</small>
                            </div>
                            <p class="mb-1 small text-muted">Discover the best practices for maintaining a healthy diet...</p>
                        </a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">Quick Actions</h5>
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('diet-menus.premium') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-crown me-2"></i>Premium Dishes
                            </a>
                        </div>
                        @if($user->isPremium())
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('daily-planner') }}" class="btn btn-outline-success w-100">
                                <i class="fas fa-calendar-alt me-2"></i>Daily Planner
                            </a>
                        </div>
                        @endif
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('subscription') }}" class="btn btn-outline-warning w-100">
                                <i class="fas fa-gem me-2"></i>Subscription
                            </a>
                        </div>
                        @if($user->isPremiumStarterPlus())
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('ai-chat') }}" class="btn btn-outline-danger w-100">
                                <i class="fas fa-robot me-2"></i>AI Chat
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showMenuDetails(menuId) {
    $.ajax({
        url: '/diet-menus/' + menuId,
        method: 'GET',
        success: function(response) {
            let popupContent = '';

            if (response.requires_login) {
                popupContent = `
                    <div class="popup-content">
                        <div class="card border-0">
                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">${response.name}</h5>
                                <button onclick="closePopup()" class="btn btn-sm btn-light">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <i class="fas fa-lock fa-3x text-warning mb-3"></i>
                                    <h4>Login Required</h4>
                                    <p>Please login to view full recipe details.</p>
                                    <div class="d-flex justify-content-center gap-3 mt-4">
                                        <a href="{{ route('login') }}" class="btn btn-primary">
                                            <i class="fas fa-sign-in-alt me-2"></i>Login
                                        </a>
                                        <a href="{{ route('register') }}" class="btn btn-success">
                                            <i class="fas fa-user-plus me-2"></i>Register
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p><strong>Calories:</strong> ${response.calories}</p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Category:</strong> Healthy</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            } else if (response.requires_premium) {
                popupContent = `
                    <div class="popup-content">
                        <div class="card border-0">
                            <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">${response.name} <span class="badge premium-badge ms-2">Premium</span></h5>
                                <button onclick="closePopup()" class="btn btn-sm btn-light">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <i class="fas fa-crown fa-3x text-warning mb-3"></i>
                                    <h4>Premium Content</h4>
                                    <p>Upgrade to premium to view full recipe details.</p>
                                    <a href="{{ route('subscription') }}" class="btn btn-warning mt-3">
                                        <i class="fas fa-gem me-2"></i>Upgrade Now
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p><strong>Calories:</strong> ${response.calories}</p>
                                    </div>
                                    <div class="col-6">
                                        <p><strong>Category:</strong> Premium Dish</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                popupContent = `
                    <div class="popup-content">
                        <div class="card border-0">
                            <div class="card-header ${response.is_premium ? 'bg-warning text-dark' : 'bg-primary text-white'} d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">${response.name} ${response.is_premium ? '<span class="badge bg-dark ms-2">Premium</span>' : ''}</h5>
                                <button onclick="closePopup()" class="btn btn-sm btn-light">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="alert alert-info">
                                            <i class="fas fa-fire me-2"></i>
                                            <strong>${response.calories} Calories</strong>
                                        </div>
                                    </div>
                                </div>

                                <h6><i class="fas fa-info-circle me-2"></i>Description</h6>
                                <p>${response.description}</p>

                                <h6 class="mt-4"><i class="fas fa-shopping-basket me-2"></i>Ingredients</h6>
                                <p>${response.ingredients}</p>

                                <h6 class="mt-4"><i class="fas fa-list-ol me-2"></i>Instructions</h6>
                                <p>${response.instructions}</p>
                            </div>
                            <div class="card-footer">
                                <button onclick="closePopup()" class="btn btn-secondary">Close</button>
                            </div>
                        </div>
                    </div>
                `;
            }

            showPopup(popupContent);
        },
        error: function() {
            showPopup(`
                <div class="popup-content">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <i class="fas fa-exclamation-triangle fa-3x text-danger mb-3"></i>
                            <h4>Error Loading Menu</h4>
                            <p>Sorry, we couldn't load the menu details. Please try again.</p>
                            <button onclick="closePopup()" class="btn btn-primary">Close</button>
                        </div>
                    </div>
                </div>
            `);
        }
    });
}
</script>
@endsection
