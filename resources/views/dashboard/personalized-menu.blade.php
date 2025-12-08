@extends('layouts.app')

@section('title', 'Personalized Menu - EatJoy')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="fw-bold">
                <i class="fas fa-utensils me-2"></i>Personalized Menu
            </h1>
            <p class="text-muted">Menu recommendations tailored for your goals</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title text-primary">Breakfast</h5>
                    <div class="text-center py-3">
                        <i class="fas fa-sun fa-3x text-warning mb-3"></i>
                        <h4>Oatmeal Power Bowl</h4>
                        <p class="text-muted">High fiber, keeps you full longer</p>
                        <span class="badge bg-primary">350 cal</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title text-success">Lunch</h5>
                    <div class="text-center py-3">
                        <i class="fas fa-cloud-sun fa-3x text-success mb-3"></i>
                        <h4>Grilled Chicken Salad</h4>
                        <p class="text-muted">High protein, low carb</p>
                        <span class="badge bg-success">420 cal</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title text-info">Dinner</h5>
                    <div class="text-center py-3">
                        <i class="fas fa-moon fa-3x text-info mb-3"></i>
                        <h4>Vegetable Stir Fry</h4>
                        <p class="text-muted">Light, easy to digest</p>
                        <span class="badge bg-info">320 cal</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Nutrition Summary</h5>
                    <div class="row text-center">
                        <div class="col-md-3">
                            <div class="display-6 fw-bold text-primary">1090</div>
                            <div class="text-muted">Total Calories</div>
                        </div>
                        <div class="col-md-3">
                            <div class="display-6 fw-bold text-success">65g</div>
                            <div class="text-muted">Protein</div>
                        </div>
                        <div class="col-md-3">
                            <div class="display-6 fw-bold text-warning">45g</div>
                            <div class="text-muted">Carbs</div>
                        </div>
                        <div class="col-md-3">
                            <div class="display-6 fw-bold text-info">30g</div>
                            <div class="text-muted">Fat</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection