<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Personalized Menu - EatJoy</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .menu-container {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-top: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .meal-card {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }
        
        .meal-card:hover {
            border-color: #667eea;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.1);
        }
        
        .meal-time {
            font-weight: bold;
            color: #667eea;
            font-size: 1.1rem;
        }
        
        .meal-name {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2d3748;
            margin: 10px 0;
        }
        
        .nutrition-info {
            color: #666;
            font-size: 0.9rem;
        }
        
        .generate-btn {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            border: none;
            color: white;
            padding: 15px 30px;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1.1rem;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }
        
        .generate-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(34, 197, 94, 0.3);
            color: white;
        }
        
        .status-badge {
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
        }
        
        .status-completed {
            background: rgba(34, 197, 94, 0.1);
            color: #16a34a;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }
        
        .status-pending {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }
        
        .status-upcoming {
            background: rgba(156, 163, 175, 0.1);
            color: #6b7280;
            border: 1px solid rgba(156, 163, 175, 0.3);
        }
        
        .totals-box {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
        }
        
        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #16a34a;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="menu-container">
                    <!-- Header -->
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bold mb-3" style="color: #2d3748;">
                            <i class="fas fa-utensils me-3" style="color: #667eea;"></i>
                            Daily Personalized Menu
                        </h1>
                        <p class="lead text-muted mb-0">
                            Your Menu for Today
                        </p>
                        <p class="text-muted">
                            Generated based on your goals and preferences
                        </p>
                    </div>
                    
                    <!-- Success Message -->
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    <!-- Menu Cards -->
                    <div class="row mb-4">
                        @foreach($dailyMenu as $meal)
                        <div class="col-md-6 mb-3">
                            <div class="meal-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="meal-time">
                                        <i class="fas fa-clock me-2"></i>{{ $meal['time'] }}
                                    </span>
                                    <span class="status-badge status-{{ strtolower($meal['status']) }}">
                                        {{ $meal['status'] }}
                                    </span>
                                </div>
                                
                                <h4 class="meal-name">{{ $meal['name'] }}</h4>
                                
                                <div class="nutrition-info">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-fire text-danger me-2"></i>
                                        <span class="me-3"><strong>{{ $meal['calories'] }}</strong> cal</span>
                                        
                                        <i class="fas fa-drumstick-bite text-primary me-2"></i>
                                        <span class="me-3"><strong>{{ $meal['protein'] }}g</strong> protein</span>
                                    </div>
                                    
                                    <div class="d-flex">
                                        <span class="me-3">
                                            <i class="fas fa-bread-slice text-success me-1"></i>
                                            <strong>{{ $meal['carbs'] }}g</strong> carbs
                                        </span>
                                        
                                        <span>
                                            <i class="fas fa-oil-can text-warning me-1"></i>
                                            <strong>{{ $meal['fat'] }}g</strong> fat
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Totals Box -->
                    <div class="totals-box">
                        <h5 class="fw-bold mb-3">
                            <i class="fas fa-calculator me-2"></i>Daily Totals
                        </h5>
                        <div class="row text-center">
                            <div class="col-3">
                                <div class="display-6 fw-bold text-danger">{{ $totals['calories'] }}</div>
                                <small class="text-muted">Calories</small>
                            </div>
                            <div class="col-3">
                                <div class="display-6 fw-bold text-primary">{{ $totals['protein'] }}g</div>
                                <small class="text-muted">Protein</small>
                            </div>
                            <div class="col-3">
                                <div class="display-6 fw-bold text-success">{{ $totals['carbs'] }}g</div>
                                <small class="text-muted">Carbs</small>
                            </div>
                            <div class="col-3">
                                <div class="display-6 fw-bold text-warning">{{ $totals['fat'] }}g</div>
                                <small class="text-muted">Fat</small>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Generate Button -->
                    <div class="text-center mt-5">
                        <a href="{{ route('daily-planner.generate') }}" class="generate-btn">
                            <i class="fas fa-redo me-2"></i>Regenerate Menu
                        </a>
                        
                        <div class="mt-3">
                            <a href="/dashboard" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                            </a>
                        </div>
                        
                        <p class="text-muted mt-3 small">
                            <i class="fas fa-lightbulb me-1"></i>
                            Click "Regenerate Menu" to get a new random menu based on your preferences
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Simple animation for meal cards
        document.addEventListener('DOMContentLoaded', function() {
            const mealCards = document.querySelectorAll('.meal-card');
            mealCards.forEach((card, index) => {
                // Add delay for animation
                card.style.animationDelay = `${index * 0.1}s`;
                
                // Add click effect
                card.addEventListener('click', function() {
                    this.style.transform = 'scale(0.98)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 200);
                });
            });
            
            // Auto-dismiss alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });
    </script>
</body>
</html>