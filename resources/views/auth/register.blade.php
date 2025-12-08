@extends('layouts.app')

@section('title', 'Register - EatJoy')

@push('styles')
<style>
    .register-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 0;
    }

    .register-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
        overflow: hidden;
        max-width: 1200px;
        width: 100%;
    }

    .register-left {
        background: linear-gradient(135deg, #4CAF50 0%, #2196F3 100%);
        color: white;
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .register-left::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 50px 50px;
        animation: float 20s linear infinite;
    }

    @keyframes float {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .register-right {
        padding: 3rem;
    }

    .form-step {
        display: none;
    }

    .form-step.active {
        display: block;
        animation: fadeIn 0.5s;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .step-indicator {
        display: flex;
        justify-content: space-between;
        margin-bottom: 2rem;
        position: relative;
    }

    .step-indicator::before {
        content: '';
        position: absolute;
        top: 15px;
        left: 0;
        right: 0;
        height: 2px;
        background: #e0e0e0;
        z-index: 1;
    }

    .step {
        position: relative;
        z-index: 2;
        background: white;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #e0e0e0;
        color: #999;
        font-weight: bold;
    }

    .step.active {
        background: #4CAF50;
        border-color: #4CAF50;
        color: white;
    }

    .step.completed {
        background: #4CAF50;
        border-color: #4CAF50;
        color: white;
    }

    .form-input {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .form-input input,
    .form-input select {
        width: 100%;
        padding: 15px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 16px;
        transition: all 0.3s;
    }

    .form-input input:focus,
    .form-input select:focus {
        border-color: #4CAF50;
        box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        outline: none;
    }

    .form-input label {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        transition: all 0.3s;
        pointer-events: none;
        background: white;
        padding: 0 5px;
    }

    .form-input input:focus + label,
    .form-input input:not(:placeholder-shown) + label,
    .form-input select:focus + label,
    .form-input select:not(:placeholder-shown) + label {
        top: -10px;
        left: 10px;
        font-size: 12px;
        color: #4CAF50;
    }

    .weight-slider {
        width: 100%;
        margin: 20px 0;
    }

    .weight-display {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .weight-box {
        text-align: center;
        padding: 10px;
        border-radius: 10px;
        background: #f8f9fa;
        flex: 1;
        margin: 0 5px;
    }

    .weight-box.current {
        border: 2px solid #4CAF50;
    }

    .weight-box.target {
        border: 2px solid #2196F3;
    }

    .btn-register {
        background: linear-gradient(135deg, #4CAF50 0%, #2196F3 100%);
        border: none;
        color: white;
        padding: 15px 30px;
        border-radius: 10px;
        font-size: 16px;
        font-weight: bold;
        transition: transform 0.3s;
        width: 100%;
    }

    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
    }

    .btn-step {
        background: #6c757d;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        font-size: 14px;
        transition: all 0.3s;
    }

    .btn-step:hover {
        background: #5a6268;
    }

    .feature-highlight {
        background: rgba(255, 255, 255, 0.1);
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 15px;
        backdrop-filter: blur(10px);
    }
</style>
@endpush

@section('content')
<div class="register-container">
    <div class="register-card">
        <div class="row g-0">
            <!-- Left Side - Features -->
            <div class="col-md-5 d-none d-md-block">
                <div class="register-left">
                    <h2 class="fw-bold mb-4">Start Your Health Journey</h2>
                    <p class="mb-4">Join thousands of users transforming their lives with EatJoy's personalized nutrition plans.</p>

                    <div class="feature-highlight">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-bolt fa-2x me-3"></i>
                            <div>
                                <h5 class="mb-1">Instant Access</h5>
                                <p class="small mb-0">Get immediate access to 25+ diet menus</p>
                            </div>
                        </div>
                    </div>

                    <div class="feature-highlight">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-chart-line fa-2x me-3"></i>
                            <div>
                                <h5 class="mb-1">Track Progress</h5>
                                <p class="small mb-0">Monitor weight changes and achievements</p>
                            </div>
                        </div>
                    </div>

                    <div class="feature-highlight">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-user-md fa-2x me-3"></i>
                            <div>
                                <h5 class="mb-1">Expert Guidance</h5>
                                <p class="small mb-0">Nutritionist-designed meal plans</p>
                            </div>
                        </div>
                    </div>

                    <div class="feature-highlight">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-mobile-alt fa-2x me-3"></i>
                            <div>
                                <h5 class="mb-1">Mobile Friendly</h5>
                                <p class="small mb-0">Access from any device, anywhere</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <img src="https://ui-avatars.com/api/?name=EatJoy&background=4CAF50&color=fff"
                                     class="rounded-circle" width="50" alt="User">
                            </div>
                            <div>
                                <p class="small mb-0"><i>"EatJoy helped me lose 15kg in 3 months!"</i></p>
                                <p class="small mb-0"><strong>- Sarah, Premium User</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Registration Form -->
            <div class="col-md-7">
                <div class="register-right">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-primary">Create Your Account</h3>
                        <p class="text-muted">Join EatJoy in just a few steps</p>
                    </div>

                    <!-- Step Indicator -->
                    <div class="step-indicator">
                        <div class="step active" data-step="1">1</div>
                        <div class="step" data-step="2">2</div>
                        <div class="step" data-step="3">3</div>
                        <div class="step" data-step="4">4</div>
                    </div>

                    <form method="POST" action="{{ route('register') }}" id="registrationForm">
                        @csrf

                        <!-- Step 1: Basic Info -->
                        <div class="form-step active" id="step1">
                            <h5 class="mb-4">Basic Information</h5>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-input">
                                        <input type="text" id="nickname" name="nickname"
                                               value="{{ old('nickname') }}"
                                               placeholder="John Doe" required>
                                        <label for="nickname">Nickname *</label>
                                        @error('nickname')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                        <small class="form-text text-muted">This will be displayed to other users</small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-input">
                                        <input type="email" id="email" name="email"
                                               value="{{ old('email') }}"
                                               placeholder="john@example.com" required>
                                        <label for="email">Email Address *</label>
                                        @error('email')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-step next-step" data-next="2">
                                    Next <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Account Credentials -->
                        <div class="form-step" id="step2">
                            <h5 class="mb-4">Account Credentials</h5>

                            <div class="form-input">
                                <input type="text" id="username" name="username"
                                       value="{{ old('username') }}"
                                       placeholder="johndoe123" required>
                                <label for="username">Username *</label>
                                @error('username')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">Used for login (cannot be changed)</small>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-input">
                                        <input type="password" id="password" name="password"
                                               placeholder=" " required>
                                        <label for="password">Password *</label>
                                        @error('password')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-input">
                                        <input type="password" id="password-confirm" name="password_confirmation"
                                               placeholder=" " required>
                                        <label for="password-confirm">Confirm Password *</label>
                                    </div>
                                </div>
                            </div>

                            <div class="progress mt-3">
                                <div class="progress-bar" id="passwordStrength" role="progressbar"
                                     style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small class="text-muted" id="passwordHint">Password strength</small>

                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-step prev-step" data-prev="1">
                                    <i class="fas fa-arrow-left me-2"></i> Back
                                </button>
                                <button type="button" class="btn btn-step next-step" data-next="3">
                                    Next <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Health Goals -->
                        <div class="form-step" id="step3">
                            <h5 class="mb-4">Your Health Goals</h5>
                            <p class="text-muted mb-4">Tell us about your weight goals for personalized recommendations</p>

                            <div class="form-input">
                                <input type="number" id="current_weight" name="current_weight"
                                       value="{{ old('current_weight', 70) }}"
                                       min="30" max="300" step="0.1" required>
                                <label for="current_weight">Current Weight (kg) *</label>
                                @error('current_weight')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <input type="range" class="weight-slider" id="currentWeightSlider"
                                   min="30" max="300" value="70">

                            <div class="form-input mt-4">
                                <input type="number" id="target_weight" name="target_weight"
                                       value="{{ old('target_weight', 65) }}"
                                       min="30" max="300" step="0.1" required>
                                <label for="target_weight">Target Weight (kg) *</label>
                                @error('target_weight')
                                <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <input type="range" class="weight-slider" id="targetWeightSlider"
                                   min="30" max="300" value="65">

                            <div class="weight-display mt-3">
                                <div class="weight-box current">
                                    <div class="fw-bold" id="currentWeightDisplay">70 kg</div>
                                    <small>Current</small>
                                </div>
                                <div class="text-center my-auto">
                                    <i class="fas fa-arrow-right text-primary fa-2x"></i>
                                </div>
                                <div class="weight-box target">
                                    <div class="fw-bold" id="targetWeightDisplay">65 kg</div>
                                    <small>Target</small>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <span id="weightMessage">You want to lose 5 kg</span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-step prev-step" data-prev="2">
                                    <i class="fas fa-arrow-left me-2"></i> Back
                                </button>
                                <button type="button" class="btn btn-step next-step" data-next="4">
                                    Next <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 4: Terms & Submit -->
                        <div class="form-step" id="step4">
                            <h5 class="mb-4">Terms & Conditions</h5>

                            <div class="card border-0 bg-light mb-4">
                                <div class="card-body">
                                    <h6>By creating an account, you agree to:</h6>
                                    <ul class="small">
                                        <li>Receive personalized diet recommendations</li>
                                        <li>Allow us to store your health data for improvement purposes</li>
                                        <li>Receive occasional promotional emails (you can opt-out anytime)</li>
                                        <li>Our <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a></li>
                                    </ul>

                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            I agree to the terms and conditions *
                                        </label>
                                    </div>

                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter" checked>
                                        <label class="form-check-label" for="newsletter">
                                            Send me health tips and updates via email
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mb-4">
                                <div class="alert alert-success">
                                    <i class="fas fa-gift me-2"></i>
                                    <strong>Free Bonus:</strong> Get 7-day trial of Premium features!
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-step prev-step" data-prev="3">
                                    <i class="fas fa-arrow-left me-2"></i> Back
                                </button>
                                <button type="submit" class="btn-register">
                                    <i class="fas fa-user-plus me-2"></i> Create Account
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="text-muted">Already have an account?
                            <a href="{{ route('login') }}" class="text-primary">Login here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Multi-step form functionality
let currentStep = 1;
const totalSteps = 4;

function updateStepIndicator() {
    document.querySelectorAll('.step').forEach((step, index) => {
        if (index + 1 < currentStep) {
            step.classList.remove('active');
            step.classList.add('completed');
        } else if (index + 1 === currentStep) {
            step.classList.add('active');
            step.classList.remove('completed');
        } else {
            step.classList.remove('active', 'completed');
        }
    });
}

function showStep(stepNumber) {
    document.querySelectorAll('.form-step').forEach(step => {
        step.classList.remove('active');
    });
    document.getElementById(`step${stepNumber}`).classList.add('active');
    currentStep = stepNumber;
    updateStepIndicator();
}

// Next button click
document.querySelectorAll('.next-step').forEach(button => {
    button.addEventListener('click', function() {
        const nextStep = parseInt(this.getAttribute('data-next'));

        // Validate current step before proceeding
        if (validateStep(currentStep)) {
            showStep(nextStep);
        }
    });
});

// Previous button click
document.querySelectorAll('.prev-step').forEach(button => {
    button.addEventListener('click', function() {
        const prevStep = parseInt(this.getAttribute('data-prev'));
        showStep(prevStep);
    });
});

function validateStep(step) {
    let isValid = true;

    if (step === 1) {
        const nickname = document.getElementById('nickname').value;
        const email = document.getElementById('email').value;

        if (!nickname.trim()) {
            alert('Please enter your nickname');
            isValid = false;
        }

        if (!email.trim() || !email.includes('@')) {
            alert('Please enter a valid email address');
            isValid = false;
        }
    }

    if (step === 2) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password-confirm').value;

        if (password.length < 8) {
            alert('Password must be at least 8 characters long');
            isValid = false;
        }

        if (password !== confirmPassword) {
            alert('Passwords do not match');
            isValid = false;
        }
    }

    return isValid;
}

// Weight sliders functionality
const currentWeightInput = document.getElementById('current_weight');
const targetWeightInput = document.getElementById('target_weight');
const currentWeightSlider = document.getElementById('currentWeightSlider');
const targetWeightSlider = document.getElementById('targetWeightSlider');
const currentWeightDisplay = document.getElementById('currentWeightDisplay');
const targetWeightDisplay = document.getElementById('targetWeightDisplay');
const weightMessage = document.getElementById('weightMessage');

function updateWeightDisplay() {
    const current = parseFloat(currentWeightInput.value);
    const target = parseFloat(targetWeightInput.value);
    const difference = current - target;

    currentWeightDisplay.textContent = `${current} kg`;
    targetWeightDisplay.textContent = `${target} kg`;

    if (difference > 0) {
        weightMessage.textContent = `You want to lose ${difference.toFixed(1)} kg`;
        weightMessage.parentElement.className = 'alert alert-info';
    } else if (difference < 0) {
        weightMessage.textContent = `You want to gain ${Math.abs(difference).toFixed(1)} kg`;
        weightMessage.parentElement.className = 'alert alert-warning';
    } else {
        weightMessage.textContent = 'You want to maintain your current weight';
        weightMessage.parentElement.className = 'alert alert-success';
    }
}

currentWeightInput.addEventListener('input', function() {
    currentWeightSlider.value = this.value;
    updateWeightDisplay();
});

targetWeightInput.addEventListener('input', function() {
    targetWeightSlider.value = this.value;
    updateWeightDisplay();
});

currentWeightSlider.addEventListener('input', function() {
    currentWeightInput.value = this.value;
    updateWeightDisplay();
});

targetWeightSlider.addEventListener('input', function() {
    targetWeightInput.value = this.value;
    updateWeightDisplay();
});

// Password strength indicator
const passwordInput = document.getElementById('password');
const passwordStrength = document.getElementById('passwordStrength');
const passwordHint = document.getElementById('passwordHint');

passwordInput.addEventListener('input', function() {
    const password = this.value;
    let strength = 0;
    let hint = '';

    if (password.length >= 8) strength += 25;
    if (/[A-Z]/.test(password)) strength += 25;
    if (/[0-9]/.test(password)) strength += 25;
    if (/[^A-Za-z0-9]/.test(password)) strength += 25;

    passwordStrength.style.width = `${strength}%`;

    if (strength < 50) {
        passwordStrength.className = 'progress-bar bg-danger';
        hint = 'Weak password';
    } else if (strength < 75) {
        passwordStrength.className = 'progress-bar bg-warning';
        hint = 'Moderate password';
    } else {
        passwordStrength.className = 'progress-bar bg-success';
        hint = 'Strong password';
    }

    passwordHint.textContent = hint;
});

// Initialize
updateWeightDisplay();
updateStepIndicator();

// Animate input labels
document.querySelectorAll('.form-input input, .form-input select').forEach(input => {
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
