@extends('layouts.app')

@section('title', 'Login - EatJoy')

@push('styles')
<style>
    .login-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
        overflow: hidden;
        max-width: 1000px;
        width: 100%;
    }

    .login-left {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-right {
        padding: 3rem;
    }

    .feature-list {
        list-style: none;
        padding: 0;
    }

    .feature-list li {
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }

    .feature-list i {
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .animated-input {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .animated-input input {
        width: 100%;
        padding: 15px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 16px;
        transition: all 0.3s;
    }

    .animated-input input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .animated-input label {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        transition: all 0.3s;
        pointer-events: none;
    }

    .animated-input input:focus + label,
    .animated-input input:not(:placeholder-shown) + label {
        top: -10px;
        left: 10px;
        font-size: 12px;
        color: #667eea;
        background: white;
        padding: 0 5px;
    }

    .login-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        padding: 15px;
        border-radius: 10px;
        font-size: 16px;
        font-weight: bold;
        width: 100%;
        transition: transform 0.3s;
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
    }

    .social-login {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 2rem;
    }

    .social-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        transition: transform 0.3s;
    }

    .social-btn:hover {
        transform: translateY(-3px);
    }

    .google-btn { background: #DB4437; }
    .facebook-btn { background: #4267B2; }
    .twitter-btn { background: #1DA1F2; }
</style>
@endpush

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="row g-0">
            <!-- Left Side - Features & Info -->
            <div class="col-md-6 d-none d-md-block">
                <div class="login-left">
                    <h2 class="mb-4">Welcome Back to <span class="fw-bold">EatJoy</span></h2>
                    <p class="mb-4">Continue your health journey with personalized diet plans and premium features.</p>

                    <ul class="feature-list">
                        <li><i class="fas fa-check-circle"></i> Access to 25+ Diet Menus</li>
                        <li><i class="fas fa-check-circle"></i> Track Your Weight Progress</li>
                        <li><i class="fas fa-check-circle"></i> Personalized Recommendations</li>
                        <li><i class="fas fa-check-circle"></i> Premium Recipes (with subscription)</li>
                        <li><i class="fas fa-check-circle"></i> Daily Meal Planner</li>
                    </ul>

                    <div class="mt-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3">
                                <i class="fas fa-user-md fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Expert Nutrition</h5>
                                <p class="small mb-0">Designed by certified nutritionists</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-chart-line fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Track Progress</h5>
                                <p class="small mb-0">Monitor your health journey</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="col-md-6">
                <div class="login-right">
                    <div class="text-center mb-5">
                        <h3 class="fw-bold">Login to Your Account</h3>
                        <p class="text-muted">Enter your credentials to continue</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="animated-input">
                            <input type="text" id="username" name="username" placeholder=" "
                                   value="{{ old('username') }}" required autofocus>
                            <label for="username">Username</label>
                            @error('username')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="animated-input">
                            <input type="password" id="password" name="password" placeholder=" " required>
                            <label for="password">Password</label>
                            @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                        <button type="submit" class="login-btn mb-4">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>

                        <div class="text-center mb-4">
                            <a href="{{ route('password.request') }}" class="text-decoration-none">
                                Forgot your password?
                            </a>
                        </div>

                        <div class="text-center">
                            <p class="text-muted">Don't have an account?</p>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary">
                                <i class="fas fa-user-plus me-2"></i>Create New Account
                            </a>
                        </div>
                    </form>

                    <div class="social-login">
                        <a href="#" class="social-btn google-btn">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-btn facebook-btn">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-btn twitter-btn">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Animate input labels
document.querySelectorAll('.animated-input input').forEach(input => {
    input.addEventListener('focus', function() {
        this.parentElement.classList.add('focused');
    });

    input.addEventListener('blur', function() {
        if (!this.value) {
            this.parentElement.classList.remove('focused');
        }
    });

    // Initialize on page load
    if (input.value) {
        input.parentElement.classList.add('focused');
    }
});
</script>
@endsection
