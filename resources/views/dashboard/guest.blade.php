<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EatJoy - Transform Your Health</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #45a049;
            --light-green: #e8f5e9;
        }

        /* NAVBAR FIXED - IMPROVED */
        .navbar-fixed {
            background: white;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo {
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 20px;
        }

        .brand-name {
            font-size: 32px;
            font-weight: bold;
            color: var(--primary-color);
            line-height: 1;
            margin: 0;
        }

        /* HILANGKAN TAGLINE */
        .brand-tagline {
            display: none;
        }

        .auth-buttons {
            display: flex;
            gap: 15px;
            align-items: center;
            padding: 0;
            margin: 0;
        }

        .btn-nav {
            padding: 10px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            display: inline-block;
            text-align: center;
            transition: all 0.3s;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-login {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-login:hover {
            background: var(--primary-color);
            color: white;
        }

        .btn-register {
            background: var(--primary-color);
            color: white;
        }

        .btn-register:hover {
            background: var(--secondary-color);
        }

        /* HERO SECTION - Adjust for fixed navbar */
        .hero-section {
            text-align: center;
            padding: 140px 20px 100px;
            background: linear-gradient(to right, #f0f9f0, #e8f5e8);
            margin-top: 80px;
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .hero-btn {
            padding: 15px 40px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
        }

        .hero-btn-primary {
            background: var(--primary-color);
            color: white;
            border: none;
        }

        .hero-btn-primary:hover {
            background: var(--secondary-color);
            color: white;
        }

        /* PREMIUM FEATURES - IMPROVED */
        .features-section {
            padding: 80px 0;
        }

        .feature-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            padding: 30px 20px;
            text-align: center;
            background: white;
            position: relative;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }

        .ai-feature-card {
            background: linear-gradient(135deg, var(--light-green) 0%, #c8e6c9 100%) !important;
            border: 2px solid var(--primary-color) !important;
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: var(--light-green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
        }

        .feature-icon i {
            font-size: 28px;
            color: var(--primary-color);
        }

        .feature-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--primary-color);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        /* MENU SECTION - IMPROVED */
        .menu-section {
            padding: 80px 0;
            background: #f8f9fa;
        }

        .menu-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
            background: white;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .menu-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 25px !important;
        }

        .card-title {
            text-align: center;
            margin-bottom: 15px;
            font-size: 1.25rem;
        }

        .calorie-info {
            text-align: center;
            margin-bottom: 15px;
        }

        .menu-description {
            text-align: center;
            color: #666;
            flex-grow: 1;
            margin-bottom: 20px;
        }

        .view-recipe-btn {
            padding: 12px;
            border-radius: 8px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-color);
            color: white;
            border: none;
            transition: all 0.3s;
            width: 100%;
        }

        .view-recipe-btn:hover {
            background: var(--secondary-color);
            color: white;
        }

        /* MODAL STYLES - IMPROVED */
        .modal-recipe-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .modal-recipe-title {
            text-align: center;
            margin-bottom: 25px;
        }

        .recipe-info-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .access-recipe-btn {
            padding: 15px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 16px;
            background: var(--primary-color);
            color: white;
            border: none;
            transition: all 0.3s;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .access-recipe-btn:hover {
            background: var(--secondary-color);
            color: white;
        }
    </style>
</head>
<body>
    <!-- NAVBAR BARU -->
    <nav class="navbar-fixed" id="mainNavbar">
        <div class="navbar-container">
            <div class="logo-section">
                <div class="logo">EJ</div>
                <div>
                    <div class="brand-name">EatJoy</div>
                    <!-- TAGLINE DIHILANGKAN -->
                </div>
            </div>

            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="btn-nav btn-login">Login</a>
                <a href="{{ route('register') }}" class="btn-nav btn-register">Register</a>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <div class="hero-section">
        <div class="container">
            <h1 class="display-5 fw-bold mb-4">Transform Your Health with <span style="color: var(--primary-color);">EatJoy</span></h1>
            <p class="lead mb-4">Personalized diet plans, premium recipes, and AI-powered nutrition guidance to help you achieve your weight goals.</p>

            <!-- HANYA SATU BUTTON DI TENGAH -->
            <div class="hero-buttons">
                <a href="{{ route('register') }}" class="hero-btn hero-btn-primary">Start Free</a>
                <!-- BUTTON LEARN MORE DIHILANGKAN -->
            </div>
        </div>
    </div>

    <!-- PREMIUM FEATURES SECTION -->
    <div class="features-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="fw-bold mb-3">Premium Features</h2>
                    <p class="text-muted">Unlock exclusive features with our subscription plans</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Feature 1: Create Menu -->
                <div class="col-md-3">
                    <div class="feature-card">
                        <span class="feature-badge">STARTER</span>
                        <div class="feature-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h4 class="mb-3">Create Menu</h4>
                        <p class="text-muted mb-3">Design your own personalized diet menu</p>
                        <p class="text-primary small mb-0">
                            <i class="fas fa-check-circle me-1"></i> Available in Starter Plan
                        </p>
                    </div>
                </div>

                <!-- Feature 2: Daily Personalize -->
                <div class="col-md-3">
                    <div class="feature-card">
                        <span class="feature-badge">STARTER</span>
                        <div class="feature-icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <h4 class="mb-3">Daily Personalize</h4>
                        <p class="text-muted mb-3">Get daily customized meal recommendations</p>
                        <p class="text-primary small mb-0">
                            <i class="fas fa-check-circle me-1"></i> Available in Starter Plan
                        </p>
                    </div>
                </div>

                <!-- Feature 3: Daily Planner -->
                <div class="row mb-5">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">Daily Personalized Menu</h2>
                        <p class="text-muted mb-0">Your Menu for Today • Generated based on your goals and preferences</p>
                    </div>
                    <button id="generateMenuBtn" class="btn btn-success">
                        <i class="fas fa-redo me-2"></i>Regenerate Menu
                    </button>
                </div>
                
                <div class="row" id="menuContainer">
                    <!-- Breakfast -->
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 border">
                            <div class="card-body">
                                <h5 class="text-muted mb-2">Breakfast</h5>
                                <h4 class="fw-bold mb-3" id="breakfastName">{{ $dailyMenu['breakfast']['name'] }}</h4>
                                <div class="text-primary fw-bold mb-2" id="breakfastCalories">
                                    <i class="fas fa-fire me-1"></i>{{ $dailyMenu['breakfast']['calories'] }} calories
                                </div>
                                <div class="small text-muted">
                                    <span class="badge bg-primary me-1" id="breakfastProtein">{{ $dailyMenu['breakfast']['protein'] }}g protein</span>
                                    <span class="badge bg-success me-1" id="breakfastCarbs">{{ $dailyMenu['breakfast']['carbs'] }}g carbs</span>
                                    <span class="badge bg-warning" id="breakfastFat">{{ $dailyMenu['breakfast']['fat'] }}g fat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Lunch -->
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 border">
                            <div class="card-body">
                                <h5 class="text-muted mb-2">Lunch</h5>
                                <h4 class="fw-bold mb-3" id="lunchName">{{ $dailyMenu['lunch']['name'] }}</h4>
                                <div class="text-primary fw-bold mb-2" id="lunchCalories">
                                    <i class="fas fa-fire me-1"></i>{{ $dailyMenu['lunch']['calories'] }} calories
                                </div>
                                <div class="small text-muted">
                                    <span class="badge bg-primary me-1" id="lunchProtein">{{ $dailyMenu['lunch']['protein'] }}g protein</span>
                                    <span class="badge bg-success me-1" id="lunchCarbs">{{ $dailyMenu['lunch']['carbs'] }}g carbs</span>
                                    <span class="badge bg-warning" id="lunchFat">{{ $dailyMenu['lunch']['fat'] }}g fat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dinner -->
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 border">
                            <div class="card-body">
                                <h5 class="text-muted mb-2">Dinner</h5>
                                <h4 class="fw-bold mb-3" id="dinnerName">{{ $dailyMenu['dinner']['name'] }}</h4>
                                <div class="text-primary fw-bold mb-2" id="dinnerCalories">
                                    <i class="fas fa-fire me-1"></i>{{ $dailyMenu['dinner']['calories'] }} calories
                                </div>
                                <div class="small text-muted">
                                    <span class="badge bg-primary me-1" id="dinnerProtein">{{ $dailyMenu['dinner']['protein'] }}g protein</span>
                                    <span class="badge bg-success me-1" id="dinnerCarbs">{{ $dailyMenu['dinner']['carbs'] }}g carbs</span>
                                    <span class="badge bg-warning" id="dinnerFat">{{ $dailyMenu['dinner']['fat'] }}g fat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Daily Totals -->
                <div class="mt-4 p-3 bg-light rounded">
                    <h6 class="fw-bold mb-3">
                        <i class="fas fa-chart-bar me-2"></i>Daily Nutrition Totals
                    </h6>
                    <div class="row text-center">
                        <div class="col-3">
                            <div class="h4 fw-bold text-danger" id="totalCalories">{{ $totals['calories'] }}</div>
                            <small class="text-muted">Calories</small>
                        </div>
                        <div class="col-3">
                            <div class="h4 fw-bold text-primary" id="totalProtein">{{ $totals['protein'] }}g</div>
                            <small class="text-muted">Protein</small>
                        </div>
                        <div class="col-3">
                            <div class="h4 fw-bold text-success" id="totalCarbs">{{ $totals['carbs'] }}g</div>
                            <small class="text-muted">Carbs</small>
                        </div>
                        <div class="col-3">
                            <div class="h4 fw-bold text-warning" id="totalFat">{{ $totals['fat'] }}g</div>
                            <small class="text-muted">Fat</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Latest Articles Section (TETAP SAMA) -->
    <div class="col-lg-4">
        <!-- Kode Latest Articles kamu tetap sama -->
        <!-- ... -->
    </div>
</div>

                <!-- Feature 4: AI Chat -->
                <div class="col-md-3">
                    <div class="feature-card ai-feature-card">
                        <span class="feature-badge" style="background: #2E7D32;">STARTER+</span>
                        <div class="feature-icon">
                            <i class="fas fa-robot"></i>
                        </div>
                        <h4 class="mb-3">AI Chat</h4>
                        <p class="text-muted mb-3">Get instant nutrition advice from AI</p>
                        <p class="text-primary small mb-0">
                            <i class="fas fa-star me-1"></i> Available in Starter+ Plan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DIET MENUS SECTION -->
    <div class="menu-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="fw-bold mb-3">25+ Popular Diet Menus</h2>
                    <p class="text-muted">Discover our collection of healthy and delicious recipes</p>
                </div>
            </div>

            @php
                $menus = [
                    [
                        'id' => 1,
                        'title' => 'Mediterranean Salad Bowl',
                        'calories' => '250',
                        'description' => 'Fresh Mediterranean ingredients with olive oil dressing',
                        'category' => 'Healthy • Mediterranean',
                        'image' => 'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                    ],
                    [
                        'id' => 2,
                        'title' => 'Protein Power Smoothie',
                        'calories' => '240',
                        'description' => 'High-protein smoothie with fruits and almond milk',
                        'category' => 'High-Protein • Breakfast',
                        'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                    ],
                    [
                        'id' => 3,
                        'title' => 'Quinoa Veggie Bowl',
                        'calories' => '350',
                        'description' => 'Nutrient-packed quinoa with seasonal vegetables',
                        'category' => 'Vegetarian • Gluten-Free',
                        'image' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                    ],
                    [
                        'id' => 4,
                        'title' => 'Grilled Chicken & Greens',
                        'calories' => '420',
                        'description' => 'Lean grilled chicken with mixed greens',
                        'category' => 'High-Protein • Low-Carb',
                        'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                    ],
                    [
                        'id' => 5,
                        'title' => 'Vegan Buddha Bowl',
                        'calories' => '350',
                        'description' => 'Plant-based bowl with tofu and fresh veggies',
                        'category' => 'Vegan • Balanced',
                        'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                    ],
                    [
                        'id' => 6,
                        'title' => 'Low-Carb Avocado Toast',
                        'calories' => '290',
                        'description' => 'Cloud bread topped with avocado and eggs',
                        'category' => 'Low-Carb • Keto',
                        'image' => 'https://images.unsplash.com/photo-1525351484163-7529414344d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                    ]
                ];
            @endphp

            <div class="row g-4">
                @foreach($menus as $menu)
                <div class="col-md-4">
                    <div class="card menu-card h-100">
                        <img src="{{ $menu['image'] }}" class="menu-image" alt="{{ $menu['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu['title'] }}</h5>
                            <div class="calorie-info">
                                <span class="badge bg-success fs-6">
                                    {{ $menu['calories'] }} Calories
                                </span>
                                <span class="text-muted ms-2">Healthy</span>
                            </div>
                            <p class="menu-description">{{ $menu['description'] }}</p>
                            <button class="view-recipe-btn" onclick="showRecipeModal({{ json_encode($menu) }})">
                                <i class="fas fa-eye me-2"></i>View Full Recipe
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>25+ more menus available!</strong> Register now to access all recipes with complete ingredients and instructions.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL FOR RECIPE DETAILS - IMPROVED -->
    <div id="recipeModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body pt-0">
                    <!-- Recipe Title -->
                    <h3 class="modal-recipe-title fw-bold" id="modalTitle"></h3>

                    <!-- Recipe Image -->
                    <div class="text-center mb-4">
                        <img id="modalImage" src="" class="modal-recipe-image" alt="Recipe Image">
                    </div>

                    <!-- Warning Message -->
                    <div class="alert alert-warning mb-4">
                        <i class="fas fa-lock me-2"></i>
                        Please login to view full recipe details including ingredients and instructions.
                    </div>

                    <!-- Recipe Info -->
                    <div class="recipe-info-card">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-fire text-danger me-3 fs-4"></i>
                                    <div>
                                        <p class="mb-1 text-muted">Calories</p>
                                        <h5 class="mb-0 fw-bold" id="modalCalories"></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-tag text-primary me-3 fs-4"></i>
                                    <div>
                                        <p class="mb-1 text-muted">Category</p>
                                        <h5 class="mb-0 fw-bold" id="modalCategory"></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recipe Description -->
                    <div class="mb-4">
                        <h6 class="mb-3 text-muted">Description</h6>
                        <p class="fs-5" id="modalDescription"></p>
                    </div>

                    <!-- Single Access Button -->
                    <div class="text-center mt-4">
                        <button class="access-recipe-btn" onclick="redirectToRegister()">
                            <i class="fas fa-unlock me-2"></i>Access Full Recipe
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    function showRecipeModal(menu) {
        // Set modal content
        document.getElementById('modalTitle').textContent = menu.title;
        document.getElementById('modalImage').src = menu.image;
        document.getElementById('modalCalories').textContent = menu.calories + ' Calories';
        document.getElementById('modalCategory').textContent = menu.category;
        document.getElementById('modalDescription').textContent = menu.description;

        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('recipeModal'));
        modal.show();
    }

    function redirectToRegister() {
        window.location.href = "{{ route('register') }}";
    }

    // Script untuk navbar tetap terlihat saat scroll
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('mainNavbar');

        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            // Navbar tetap terlihat, hanya menambahkan shadow saat scroll
            if (scrollTop > 50) {
                navbar.style.boxShadow = '0 4px 20px rgba(0,0,0,0.1)';
            } else {
                navbar.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
            }
        });
    });
    </script>
</body>
</html>
