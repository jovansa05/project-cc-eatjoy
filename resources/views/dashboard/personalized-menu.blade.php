@extends('layouts.app')

@section('title', 'Personalized Menu - EatJoy')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="fw-bold">
                <i class="fas fa-user-md me-2"></i>Personalized Menu
            </h1>
            <p class="text-muted">Custom menu tailored specifically for your goals and preferences</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Menu dari session atau generate baru -->
            @php
                // Jika ada menu di session, gunakan itu
                $dailyMenu = session('daily_menu') ?? [
                    'breakfast' => ['name' => 'Oatmeal Bowl', 'calories' => 350, 'protein' => 12, 'carbs' => 65, 'fat' => 8],
                    'lunch' => ['name' => 'Grilled Chicken', 'calories' => 420, 'protein' => 35, 'carbs' => 20, 'fat' => 15],
                    'dinner' => ['name' => 'Vegetable Stir Fry', 'calories' => 320, 'protein' => 15, 'carbs' => 45, 'fat' => 10],
                ];
                
                $totals = [
                    'calories' => $dailyMenu['breakfast']['calories'] + $dailyMenu['lunch']['calories'] + $dailyMenu['dinner']['calories'],
                    'protein' => $dailyMenu['breakfast']['protein'] + $dailyMenu['lunch']['protein'] + $dailyMenu['dinner']['protein'],
                    'carbs' => $dailyMenu['breakfast']['carbs'] + $dailyMenu['lunch']['carbs'] + $dailyMenu['dinner']['carbs'],
                    'fat' => $dailyMenu['breakfast']['fat'] + $dailyMenu['lunch']['fat'] + $dailyMenu['dinner']['fat'],
                ];
            @endphp

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h2 class="fw-bold mb-1">Your Personalized Menu</h2>
                            <p class="text-muted mb-0">Based on your weight goals and dietary preferences</p>
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
        
        <!-- User Goals & Info -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">
                        <i class="fas fa-bullseye me-2"></i>Your Goals
                    </h5>
                    
                    @php
                        $user = auth()->user();
                        $currentWeight = $user->current_weight ?? 70;
                        $targetWeight = $user->target_weight ?? 65;
                        $weightDiff = $currentWeight - $targetWeight;
                    @endphp
                    
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Current Weight</span>
                            <span class="fw-bold">{{ $currentWeight }} kg</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Target Weight</span>
                            <span class="fw-bold">{{ $targetWeight }} kg</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Difference</span>
                            <span class="fw-bold {{ $weightDiff > 0 ? 'text-danger' : ($weightDiff < 0 ? 'text-primary' : 'text-success') }}">
                                {{ $weightDiff > 0 ? '+' : '' }}{{ $weightDiff }} kg
                            </span>
                        </div>
                    </div>
                    
                    <div class="progress mb-3" style="height: 10px;">
                        @php
                            $progress = $weightDiff > 0 ? 
                                (($currentWeight - $targetWeight) / ($currentWeight - 50)) * 100 :
                                (($targetWeight - $currentWeight) / ($targetWeight - 50)) * 100;
                            $progress = min(max($progress, 0), 100);
                        @endphp
                        <div class="progress-bar bg-success" style="width: {{ $progress }}%"></div>
                    </div>
                    <small class="text-muted d-block text-center">
                        @if($weightDiff > 0)
                            {{ number_format($weightDiff, 1) }}kg to lose
                        @elseif($weightDiff < 0)
                            {{ number_format(abs($weightDiff), 1) }}kg to gain
                        @else
                            At goal weight! 🎉
                        @endif
                    </small>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">
                        <i class="fas fa-cogs me-2"></i>Menu Preferences
                    </h5>
                    
                    <div class="mb-3">
                        <label class="form-label">Diet Type</label>
                        <select class="form-select" id="dietType">
                            <option value="balanced" selected>Balanced</option>
                            <option value="high-protein">High Protein</option>
                            <option value="low-carb">Low Carb</option>
                            <option value="vegetarian">Vegetarian</option>
                            <option value="mediterranean">Mediterranean</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Calorie Goal</label>
                        <input type="range" class="form-range" id="calorieRange" min="1200" max="3000" step="100" value="2000">
                        <div class="text-center">
                            <span id="calorieValue">2000</span> calories/day
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Allergies & Restrictions</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="noNuts">
                            <label class="form-check-label" for="noNuts">No Nuts</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="noDairy">
                            <label class="form-check-label" for="noDairy">No Dairy</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="noGluten">
                            <label class="form-check-label" for="noGluten">No Gluten</label>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary w-100" id="savePreferences">
                        <i class="fas fa-save me-2"></i>Save Preferences
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const generateBtn = document.getElementById('generateMenuBtn');
    const calorieRange = document.getElementById('calorieRange');
    const calorieValue = document.getElementById('calorieValue');
    const savePreferencesBtn = document.getElementById('savePreferences');
    
    // Update calorie value display
    if (calorieRange && calorieValue) {
        calorieRange.addEventListener('input', function() {
            calorieValue.textContent = this.value;
        });
    }
    
    // Generate new menu
    if (generateBtn) {
        generateBtn.addEventListener('click', function() {
            const originalText = generateBtn.innerHTML;
            generateBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Generating...';
            generateBtn.disabled = true;
            
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
            
            fetch('/dashboard/generate-menu', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateMenuItems(data.menu);
                    updateTotals(data.totals);
                    showNotification('Menu regenerated successfully!', 'success');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Failed to generate menu. Please try again.', 'error');
            })
            .finally(() => {
                generateBtn.innerHTML = originalText;
                generateBtn.disabled = false;
            });
        });
    }
    
    // Save preferences
    if (savePreferencesBtn) {
        savePreferencesBtn.addEventListener('click', function() {
            showNotification('Preferences saved successfully!', 'success');
        });
    }
    
    function updateMenuItems(menu) {
        if (menu.breakfast) {
            document.getElementById('breakfastName').textContent = menu.breakfast.name;
            document.getElementById('breakfastCalories').innerHTML = `<i class="fas fa-fire me-1"></i>${menu.breakfast.calories} calories`;
            document.getElementById('breakfastProtein').textContent = `${menu.breakfast.protein}g protein`;
            document.getElementById('breakfastCarbs').textContent = `${menu.breakfast.carbs}g carbs`;
            document.getElementById('breakfastFat').textContent = `${menu.breakfast.fat}g fat`;
        }
        
        if (menu.lunch) {
            document.getElementById('lunchName').textContent = menu.lunch.name;
            document.getElementById('lunchCalories').innerHTML = `<i class="fas fa-fire me-1"></i>${menu.lunch.calories} calories`;
            document.getElementById('lunchProtein').textContent = `${menu.lunch.protein}g protein`;
            document.getElementById('lunchCarbs').textContent = `${menu.lunch.carbs}g carbs`;
            document.getElementById('lunchFat').textContent = `${menu.lunch.fat}g fat`;
        }
        
        if (menu.dinner) {
            document.getElementById('dinnerName').textContent = menu.dinner.name;
            document.getElementById('dinnerCalories').innerHTML = `<i class="fas fa-fire me-1"></i>${menu.dinner.calories} calories`;
            document.getElementById('dinnerProtein').textContent = `${menu.dinner.protein}g protein`;
            document.getElementById('dinnerCarbs').textContent = `${menu.dinner.carbs}g carbs`;
            document.getElementById('dinnerFat').textContent = `${menu.dinner.fat}g fat`;
        }
    }
    
    function updateTotals(totals) {
        if (totals.calories) {
            document.getElementById('totalCalories').textContent = totals.calories;
        }
        if (totals.protein) {
            document.getElementById('totalProtein').textContent = `${totals.protein}g`;
        }
        if (totals.carbs) {
            document.getElementById('totalCarbs').textContent = `${totals.carbs}g`;
        }
        if (totals.fat) {
            document.getElementById('totalFat').textContent = `${totals.fat}g`;
        }
    }
    
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        
        notification.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 5000);
    }
});
</script>
@endpush

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">