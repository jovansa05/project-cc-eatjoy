@extends('layouts.app')

@section('title', 'Create Menu - EatJoy')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-plus-circle me-2"></i>Create New Menu
                    </h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <form action="{{ route('user-menus.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Menu Name *</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="{{ old('name') }}" required>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="calories" class="form-label">Calories *</label>
                                <input type="number" class="form-control" id="calories" name="calories"
                                       value="{{ old('calories') }}" min="0" max="5000" required>
                            </div>
                            <div class="col-md-6">
                                <label for="meal_type" class="form-label">Meal Type *</label>
                                <select class="form-select" id="meal_type" name="meal_type" required>
                                    <option value="">Select meal type</option>
                                    <option value="breakfast" {{ old('meal_type') == 'breakfast' ? 'selected' : '' }}>Breakfast</option>
                                    <option value="lunch" {{ old('meal_type') == 'lunch' ? 'selected' : '' }}>Lunch</option>
                                    <option value="dinner" {{ old('meal_type') == 'dinner' ? 'selected' : '' }}>Dinner</option>
                                    <option value="snack" {{ old('meal_type') == 'snack' ? 'selected' : '' }}>Snack</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description *</label>
                            <textarea class="form-control" id="description" name="description" 
                                      rows="3" required>{{ old('description') }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="ingredients" class="form-label">Ingredients *</label>
                            <textarea class="form-control" id="ingredients" name="ingredients" 
                                      rows="4" required>{{ old('ingredients') }}</textarea>
                            <small class="text-muted">Enter each ingredient on a new line.</small>
                        </div>
                        
                        <div class="mb-3">
                            <label for="instructions" class="form-label">Instructions *</label>
                            <textarea class="form-control" id="instructions" name="instructions" 
                                      rows="4" required>{{ old('instructions') }}</textarea>
                            <small class="text-muted">Enter each step on a new line.</small>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="preparation_time" class="form-label">Preparation Time (minutes)</label>
                                <input type="number" class="form-control" id="preparation_time" 
                                       name="preparation_time" value="{{ old('preparation_time') }}"
                                       min="1" max="480">
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" 
                                           id="is_public" name="is_public" value="1"
                                           {{ old('is_public') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_public">
                                        Make this menu public
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('user-menus.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Create Menu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection