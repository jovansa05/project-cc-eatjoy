<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Personalized Menu - EatJoy</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .menu-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 20px;
        }
        
        .generate-btn {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            border: none;
            color: white;
            padding: 15px 30px;
            border-radius: 10px;
            font-weight: bold;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s;
            display: block;
            margin: 20px auto;
        }
        
        .generate-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(34, 197, 94, 0.3);
        }
        
        .generate-btn:active {
            transform: translateY(-1px);
        }
        
        .meal-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .meal-item:last-child {
            border-bottom: none;
        }
        
        .meal-time {
            font-weight: bold;
            color: #667eea;
        }
        
        .meal-name {
            font-size: 20px;
            font-weight: bold;
            margin: 5px 0;
        }
        
        .calories {
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="menu-card">
                    <h1 class="text-center mb-4">
                        <i class="fas fa-utensils me-2"></i>Daily Personalized Menu
                    </h1>
                    
                    <p class="text-center text-muted mb-4">
                        Your Menu for Today<br>
                        Generated based on your goals and preferences
                    </p>
                    
                    <div id="menuContainer">
                        @foreach($dailyMenu as $meal)
                        <div class="meal-item">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <span class="meal-time">{{ $meal['time'] }}</span>
                                </div>
                                <div class="col-6">
                                    <div class="meal-name">{{ $meal['menu'] }}</div>
                                    <div class="calories">
                                        <i class="fas fa-fire me-1"></i>{{ $meal['calories'] }} cal
                                        | Protein: {{ $meal['protein'] }}g
                                        | Carbs: {{ $meal['carbs'] }}g
                                        | Fat: {{ $meal['fat'] }}g
                                    </div>
                                </div>
                                <div class="col-3 text-end">
                                    <span class="badge 
                                        @if($meal['status'] == 'Completed') bg-success
                                        @elseif($meal['status'] == 'Pending') bg-warning
                                        @else bg-secondary @endif">
                                        {{ $meal['status'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="text-center mt-4">
                        <button id="generateBtn" class="generate-btn">
                            <i class="fas fa-redo me-2"></i>Regenerate Menu
                        </button>
                        
                        <div class="mt-3">
                            <small class="text-muted">
                                Total: {{ $totalCalories }} cal | 
                                Protein: {{ $totalProtein }}g | 
                                Carbs: {{ $totalCarbs }}g | 
                                Fat: {{ $totalFat }}g
                            </small>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="/dashboard" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const generateBtn = document.getElementById('generateBtn');
            
            generateBtn.addEventListener('click', function() {
                // Show loading
                const originalText = generateBtn.innerHTML;
                generateBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Generating...';
                generateBtn.disabled = true;
                
                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
                
                // Make AJAX request
                fetch('/generate-menu', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({})
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Update menu
                        updateMenu(data.menu, data.totals);
                        
                        // Show success message
                        showMessage('Menu regenerated successfully!', 'success');
                    } else {
                        showMessage('Failed to generate menu', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showMessage('Error: ' + error.message, 'error');
                })
                .finally(() => {
                    // Restore button
                    generateBtn.innerHTML = originalText;
                    generateBtn.disabled = false;
                });
            });
            
            function updateMenu(menu, totals) {
                const menuContainer = document.getElementById('menuContainer');
                menuContainer.innerHTML = '';
                
                // Sort menu by time
                menu.sort((a, b) => a.time_sort - b.time_sort);
                
                // Create new menu items
                menu.forEach(meal => {
                    const mealItem = document.createElement('div');
                    mealItem.className = 'meal-item';
                    
                    let badgeClass = 'bg-secondary';
                    if (meal.status === 'Completed') badgeClass = 'bg-success';
                    if (meal.status === 'Pending') badgeClass = 'bg-warning';
                    
                    mealItem.innerHTML = `
                        <div class="row align-items-center">
                            <div class="col-3">
                                <span class="meal-time">${meal.time}</span>
                            </div>
                            <div class="col-6">
                                <div class="meal-name">${meal.menu}</div>
                                <div class="calories">
                                    <i class="fas fa-fire me-1"></i>${meal.calories} cal
                                    | Protein: ${meal.protein}g
                                    | Carbs: ${meal.carbs}g
                                    | Fat: ${meal.fat}g
                                </div>
                            </div>
                            <div class="col-3 text-end">
                                <span class="badge ${badgeClass}">${meal.status}</span>
                            </div>
                        </div>
                    `;
                    
                    menuContainer.appendChild(mealItem);
                });
                
                // Update totals display
                const totalsElement = document.querySelector('.text-muted');
                if (totalsElement && totals) {
                    totalsElement.innerHTML = `
                        Total: ${totals.calories} cal | 
                        Protein: ${totals.protein}g | 
                        Carbs: ${totals.carbs}g | 
                        Fat: ${totals.fat}g
                    `;
                }
            }
            
            function showMessage(message, type) {
                // Create message element
                const alertDiv = document.createElement('div');
                alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
                alertDiv.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999;';
                
                alertDiv.innerHTML = `
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
                
                // Add to page
                document.body.appendChild(alertDiv);
                
                // Remove after 3 seconds
                setTimeout(() => {
                    alertDiv.remove();
                }, 3000);
            }
            
            // Add CSRF token meta tag if not exists
            if (!document.querySelector('meta[name="csrf-token"]')) {
                const meta = document.createElement('meta');
                meta.name = 'csrf-token';
                meta.content = '{{ csrf_token() }}';
                document.head.appendChild(meta);
            }
        });
    </script>
</body>
</html>