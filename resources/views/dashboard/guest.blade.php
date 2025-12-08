@extends('layouts.app')

@section('Diet Journey', 'EatJoy - Welcome')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="row align-items-center py-5">
        <div class="col-md-6">
            <h1 class="display-4 fw-bold mb-4">Transform Your Health with <span class="text-primary">EatJoy</span></h1>
            <p class="lead mb-4">Personalized diet plans, premium recipes, and AI-powered nutrition guidance to help you achieve your weight goals.</p>
            <div class="d-flex gap-3">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-rocket me-2"></i>Start Free
                </a>
                <a href="#features" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-info-circle me-2"></i>Learn More
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <img src="https://images.unsplash.com/photo-1490818387583-1baba5e638af?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                 alt="Healthy Food" class="img-fluid rounded shadow">
        </div>
    </div>

    <!-- Features -->
    <div id="features" class="row py-5">
        <div class="col-12 text-center mb-5">
            <h2 class="fw-bold">Premium Features</h2>
            <p class="text-muted">Unlock exclusive features with our subscription plans</p>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <div class="feature-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <h4>Create Menu</h4>
                <p>Design your own personalized diet menu</p>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <div class="feature-icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <h4>Daily Personalize</h4>
                <p>Get daily customized meal recommendations</p>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <div class="feature-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <h4>Daily Planner</h4>
                <p>Plan your meals and track progress</p>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <div class="feature-icon">
                    <i class="fas fa-robot"></i>
                </div>
                <h4>AI Chat</h4>
                <p>Get instant nutrition advice from AI</p>
                <span class="badge premium-plus-badge">Starter+ Only</span>
            </div>
        </div>
    </div>

    <!-- Diet Menus Section -->
    <div class="row py-5">
        <div class="col-12 mb-4">
            <h3 class="fw-bold">25+ Diet Menus</h3>
            <p class="text-muted">Explore our collection of healthy recipes</p>
        </div>

        @for($i = 1; $i <= 8; $i++)
        <div class="col-md-3 mb-4">
            <div class="card menu-card h-100" onclick="showMenuPopup({{ $i }})">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1490818387583-1baba5e638af?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                         class="card-img-top" alt="Menu {{ $i }}">
                    <span class="calorie-badge">{{ rand(300, 600) }} cal</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Diet Menu {{ $i }}</h5>
                    <p class="card-text text-muted small">Click to view details</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-success">Healthy</span>
                        <button class="btn btn-sm btn-outline-primary">View</button>
                    </div>
                </div>
            </div>
        </div>
        @endfor

        <div class="col-12 text-center mt-4">
            <a href="{{ route('register') }}" class="btn btn-primary">
                <i class="fas fa-lock me-2"></i>Login to View All 25+ Menus
            </a>
        </div>
    </div>

    <!-- Daily Personalize Menu (Placeholder for Premium) -->
    <div class="row py-5">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-star text-warning me-2"></i>Daily Personalized Menu</h4>
                    <p class="text-muted">Premium feature - Get custom menu recommendations based on your goals and preferences.</p>
                    <div class="text-center py-4">
                        <i class="fas fa-lock fa-3x text-muted mb-3"></i>
                        <p>Available for premium subscribers</p>
                        <a href="{{ route('register') }}" class="btn btn-primary">Upgrade Now</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h4 class="card-title"><i class="fas fa-newspaper me-2"></i>Health Articles & Blog</h4>
                    <div class="list-group list-group-flush">
                        @for($j = 1; $j <= 3; $j++)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">10 Tips for Healthy Eating {{ $j }}</h6>
                                <small>3 days ago</small>
                            </div>
                            <p class="mb-1 small text-muted">Learn the best practices for maintaining a healthy diet...</p>
                        </a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- More Info -->
    <div class="row py-4">
        <div class="col-12">
            <div class="card gradient-bg border-0">
                <div class="card-body text-center text-white">
                    <h3 class="card-title">Ready to Start Your Journey?</h3>
                    <p class="card-text">Join thousands of users who transformed their health with EatJoy</p>
                    <a href="{{ route('register') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-user-plus me-2"></i>Register Now - It's Free!
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showMenuPopup(menuId) {
    const popupContent = `
        <div class="popup-content">
            <div class="card border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Diet Menu ${menuId}</h5>
                    <button onclick="closePopup()" class="btn btn-sm btn-light">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-lock fa-3x text-warning mb-3"></i>
                        <h4>Content Locked</h4>
                        <p>Please login to view full recipe details including ingredients and instructions.</p>
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
                            <p><strong>Calories:</strong> ${300 + menuId * 20}</p>
                        </div>
                        <div class="col-6">
                            <p><strong>Category:</strong> Healthy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    showPopup(popupContent);
}
</script>
@endsection
