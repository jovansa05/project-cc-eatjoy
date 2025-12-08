@extends('layouts.app')

@section('title', 'Daily Planner - EatJoy')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="fw-bold">
                <i class="fas fa-calendar-alt me-2"></i>Daily Planner
            </h1>
            <p class="text-muted">Plan your meals and track your daily nutrition</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Today's Schedule</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Meal</th>
                                    <th>Menu</th>
                                    <th>Calories</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>07:00 AM</td>
                                    <td>Breakfast</td>
                                    <td>Oatmeal with Berries</td>
                                    <td>350 cal</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>12:00 PM</td>
                                    <td>Lunch</td>
                                    <td>Grilled Chicken Salad</td>
                                    <td>420 cal</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>03:00 PM</td>
                                    <td>Snack</td>
                                    <td>Greek Yogurt</td>
                                    <td>150 cal</td>
                                    <td><span class="badge bg-secondary">Upcoming</span></td>
                                </tr>
                                <tr>
                                    <td>07:00 PM</td>
                                    <td>Dinner</td>
                                    <td>Vegetable Stir Fry</td>
                                    <td>320 cal</td>
                                    <td><span class="badge bg-secondary">Upcoming</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Daily Summary</h5>
                    <div class="text-center py-3">
                        <div class="display-4 fw-bold text-primary">1240</div>
                        <div class="text-muted">Calories Today</div>
                        <div class="progress mt-3">
                            <div class="progress-bar bg-success" style="width: 62%"></div>
                        </div>
                        <small class="text-muted">62% of daily goal (2000 cal)</small>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Quick Actions</h5>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Add Custom Meal
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-redo me-2"></i>Regenerate Plan
                        </button>
                        <a href="{{ route('personalized-menu') }}" class="btn btn-outline-success">
                            <i class="fas fa-utensils me-2"></i>View Personalized Menu
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection