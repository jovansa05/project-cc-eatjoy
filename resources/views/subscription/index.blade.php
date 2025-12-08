@extends('layouts.app')

@section('title', 'Subscription Plans - EatJoy')

@push('styles')
<style>
    .pricing-section {
        padding: 4rem 0;
    }

    .plan-card {
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s;
        border: 2px solid transparent;
        position: relative;
    }

    .plan-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .plan-card.popular {
        border-color: #9C27B0;
        transform: scale(1.05);
    }

    .plan-card.popular:hover {
        transform: scale(1.05) translateY(-10px);
    }

    .plan-header {
        padding: 2rem;
        text-align: center;
        color: white;
    }

    .free-plan .plan-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .starter-plan .plan-header {
        background: linear-gradient(135deg, #FF9800 0%, #FF5722 100%);
    }

    .starter-plus-plan .plan-header {
        background: linear-gradient(135deg, #9C27B0 0%, #673AB7 100%);
    }

    .popular-badge {
        position: absolute;
        top: -10px;
        right: 20px;
        background: #9C27B0;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
    }

    .price {
        font-size: 3rem;
        font-weight: bold;
    }

    .price-period {
        color: rgba(255,255,255,0.8);
        font-size: 0.9rem;
    }

    .plan-features {
        padding: 2rem;
        background: white;
    }

    .feature-item {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .feature-item i {
        width: 20px;
        margin-right: 10px;
        color: #4CAF50;
    }

    .feature-item.disabled i {
        color: #ccc;
    }

    .feature-item.disabled span {
        color: #999;
        text-decoration: line-through;
    }

    .btn-subscribe {
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 10px;
        font-weight: bold;
        font-size: 1.1rem;
        transition: all 0.3s;
    }

    .comparison-table {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .feature-name {
        font-weight: 600;
        color: #333;
    }

    .checkmark {
        color: #4CAF50;
        font-size: 1.2rem;
    }

    .crossmark {
        color: #f44336;
        font-size: 1.2rem;
    }
</style>
@endpush

@section('content')
<div class="pricing-section">
    <div class="container">
        @if(session('show_welcome') || $show_welcome)
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-gift fa-3x me-3"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h4 class="alert-heading mb-2">Welcome to EatJoy, {{ $user->nickname }}! 🎉</h4>
                            <p class="mb-0">Choose a subscription plan to unlock premium features and accelerate your health journey.</p>
                            <p class="mb-0 mt-2"><strong>Special Offer:</strong> Get 30% off on annual plans!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h1 class="fw-bold mb-3">Choose Your Perfect Plan</h1>
                <p class="lead text-muted">Select the plan that best fits your health goals and budget</p>
            </div>
        </div>

        <!-- Pricing Cards -->
        <div class="row justify-content-center g-4">
            <!-- Free Plan -->
            <div class="col-md-4">
                <div class="plan-card free-plan h-100">
                    <div class="plan-header">
                        <h4 class="mb-3">Free</h4>
                        <div class="price mb-2">Rp 0</div>
                        <div class="price-period mb-3">forever</div>
                        @if($user->role === 'user')
                        <span class="badge bg-white text-primary">Current Plan</span>
                        @endif
                    </div>
                    <div class="plan-features">
                        <h5 class="text-center mb-4">Basic Features</h5>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Access to 8 Diet Menus</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Weight Tracking</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Basic Articles</span>
                        </div>

                        <div class="feature-item disabled">
                            <i class="fas fa-times"></i>
                            <span>Create Menu User</span>
                        </div>

                        <div class="feature-item disabled">
                            <i class="fas fa-times"></i>
                            <span>Daily Personalized Menu</span>
                        </div>

                        <div class="feature-item disabled">
                            <i class="fas fa-times"></i>
                            <span>Daily Planner</span>
                        </div>

                        <div class="feature-item disabled">
                            <i class="fas fa-times"></i>
                            <span>Premium Dishes</span>
                        </div>

                        <div class="feature-item disabled">
                            <i class="fas fa-times"></i>
                            <span>AI Chat Support</span>
                        </div>

                        <div class="text-center mt-4">
                            @if($user->role === 'user')
                            <button class="btn btn-outline-primary btn-lg" disabled>
                                Current Plan
                            </button>
                            @else
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-lg">
                                Continue Free
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Starter Plan -->
            <div class="col-md-4">
                <div class="plan-card starter-plan h-100">
                    @if($user->role !== 'premium_starter_plus')
                    <div class="popular-badge">MOST POPULAR</div>
                    @endif

                    <div class="plan-header">
                        <h4 class="mb-3">EatJoy Starter</h4>
                        <div class="price mb-2">Rp 49K</div>
                        <div class="price-period mb-3">per month</div>
                        @if($user->role === 'premium_starter')
                        <span class="badge bg-white text-warning">Current Plan</span>
                        @endif
                    </div>
                    <div class="plan-features">
                        <h5 class="text-center mb-4">Premium Features</h5>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>All Free Features</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Access to 25+ Diet Menus</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Create Menu User</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Daily Personalized Menu</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Daily Planner</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Unlocked Premium Dishes</span>
                        </div>

                        <div class="feature-item disabled">
                            <i class="fas fa-times"></i>
                            <span>AI Chat Support</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Priority Support</span>
                        </div>

                        <div class="text-center mt-4">
                            @if($user->role === 'premium_starter')
                            <button class="btn btn-warning btn-lg" disabled>
                                Current Plan
                            </button>
                            @else
                            <form action="{{ route('subscription.choose') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="plan" value="starter">
                                <button type="submit" class="btn btn-warning btn-lg">
                                    <i class="fas fa-gem me-2"></i>Choose Starter
                                </button>
                                  </form>
                            @endif
                        </div>

                        <div class="text-center mt-3">
                            <small class="text-muted">Try free for 7 days</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Starter+ Plan -->
            <div class="col-md-4">
                <div class="plan-card starter-plus-plan h-100">
                    @if($user->role === 'premium_starter_plus')
                    <div class="popular-badge">YOUR PLAN</div>
                    @endif

                    <div class="plan-header">
                        <h4 class="mb-3">EatJoy Starter+</h4>
                        <div class="price mb-2">Rp 79K</div>
                        <div class="price-period mb-3">per month</div>
                        @if($user->role === 'premium_starter_plus')
                        <span class="badge bg-white text-purple">Current Plan</span>
                        @endif
                    </div>
                    <div class="plan-features">
                        <h5 class="text-center mb-4">Ultimate Features</h5>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>All Starter Features</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>AI Chat Support</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Personal Nutritionist Access</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Advanced Analytics</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Custom Meal Plans</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Monthly Health Reports</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>Exclusive Recipes</span>
                        </div>

                        <div class="feature-item">
                            <i class="fas fa-check"></i>
                            <span>24/7 VIP Support</span>
                        </div>

                        <div class="text-center mt-4">
                            @if($user->role === 'premium_starter_plus')
                            <button class="btn btn-purple btn-lg" disabled style="background: #9C27B0; color: white;">
                                Current Plan
                            </button>
                            @else
                            <form action="{{ route('subscription.choose') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="plan" value="starter_plus">
                                <button type="submit" class="btn btn-purple btn-lg" style="background: #9C27B0; color: white;">
                                    <i class="fas fa-crown me-2"></i>Choose Starter+
                                </button>
                            </form>
                            @endif
                        </div>

                        <div class="text-center mt-3">
                            <small class="text-muted">Save 20% with annual billing</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature Comparison Table -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="comparison-table mt-5">
                    <h3 class="text-center mb-4">Feature Comparison</h3>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="feature-name">Features</th>
                                    <th class="text-center">Free</th>
                                    <th class="text-center">Starter</th>
                                    <th class="text-center">Starter+</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="feature-name">Diet Menus Access</td>
                                    <td class="text-center">8 menus</td>
                                    <td class="text-center"><i class="fas fa-check checkmark"></i> 25+ menus</td>
                                    <td class="text-center"><i class="fas fa-check checkmark"></i> 50+ menus</td>
                                </tr>
                                <tr>
                                    <td class="feature-name">Create Menu User</td>
                                    <td class="text-center"><i class="fas fa-times crossmark"></i></td>
                                    <td class="text-center"><i class="fas fa-check checkmark"></i></td>
                                    <td class="text-center"><i class="fas fa-check checkmark"></i></td>
                                </tr>
                                <tr>
                                    <td class="feature-name">Daily Personalized Menu</td>
                                    <td class="text-center"><i class="fas fa-times crossmark"></i></td>
                                    <td class="text-center"><i class="fas fa-check checkmark"></i></td>
                                    <td class="text-center"><i class="fas fa-check checkmark"></i></td>
                                </tr>
                                <tr>
                                    <td class="feature-name">Daily Planner</td>
                                    <td class="text-center"><i class="fas fa-times crossmark"></i></td>
                                    <td class="text-center"><i class="fas fa-check checkmark"></i></td>
                                    <td class="text-center"><i class="fas fa-check checkmark"></i></td>
                                </tr>
                                <tr>
                                    <td class="feature-name">Premium Dishes</td>
                                    <td class="text-center"><i class="fas fa-times crossmark"></i></td>
                                    <td class="text-center"><i class="fas fa-check checkmark"></i> 10+ dishes</td>
                                    <td class="text-center"><i class="fas fa-check checkmark"></i> 25+ dishes</td>
                                </tr>
                                <tr>
                                    <td class="feature-name">AI Chat Support</td>
                                    <td class="text-center"><i class="fas fa-times crossmark"></i></td>
                                    <td class="text-center"><i class="fas fa-times crossmark"></i></td>
                                    <td class="text-center"><i class="fas fa-check checkmark"></i></td>
                                </tr>
                                <tr>
                                    <td class="feature-name">Weight Analytics</td>
                                    <td class="text-center">Basic</td>
                                    <td class="text-center">Advanced</td>
                                    <td class="text-center"><i class="fas fa-check checkmark"></i> Premium</td>
                                </tr>
                                <tr>
                                    <td class="feature-name">Support</td>
                                    <td class="text-center">Email</td>
                                    <td class="text-center">Priority Email</td>
                                    <td class="text-center"><i class="fas fa-check checkmark"></i> 24/7 VIP</td>
                                </tr>
                                <tr>
                                    <td class="feature-name">Monthly Health Report</td>
                                    <td class="text-center"><i class="fas fa-times crossmark"></i></td>
                                    <td class="text-center"><i class="fas fa-times crossmark"></i></td>
                                    <td class="text-center"><i class="fas fa-check checkmark"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <h3 class="text-center mb-4">Frequently Asked Questions</h3>

                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Can I switch plans later?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! You can upgrade or downgrade your plan at any time. When upgrading, you'll get immediate access to new features. When downgrading, changes take effect at the start of your next billing cycle.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Is there a free trial?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! All new users get a 7-day free trial of the Starter plan features when they first register. No credit card required for the trial.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Can I cancel anytime?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Absolutely! You can cancel your subscription at any time from your account settings. You'll continue to have access to premium features until the end of your billing period.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                What payment methods do you accept?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We accept all major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers for Indonesian users.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Need Help Section -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="card border-0 bg-light">
                    <div class="card-body py-4">
                        <h4 class="mb-3">Need help choosing a plan?</h4>
                        <p class="text-muted mb-4">Contact our support team for personalized recommendations</p>
                        <a href="mailto:support@eatjoy.com" class="btn btn-primary">
                            <i class="fas fa-envelope me-2"></i>Contact Support
                        </a>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary ms-2">
                            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Plan selection animation
document.querySelectorAll('.plan-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        if (!this.classList.contains('popular')) {
            this.style.zIndex = '10';
        }
    });

    card.addEventListener('mouseleave', function() {
        if (!this.classList.contains('popular')) {
            this.style.zIndex = '1';
        }
    });
});

// Smooth scroll for FAQ
document.querySelectorAll('.accordion-button').forEach(button => {
    button.addEventListener('click', function() {
        this.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    });
});
</script>
@endsection
