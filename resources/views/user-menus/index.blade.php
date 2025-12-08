@extends('layouts.app')

@section('title', 'My Menus - EatJoy')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="fw-bold">
                    <i class="fas fa-utensils me-2"></i>My Created Menus
                </h1>
                <a href="{{ route('user-menus.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Create New Menu
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if($menus->isEmpty())
    <div class="card border-0 shadow-sm">
        <div class="card-body text-center py-5">
            <i class="fas fa-utensils fa-4x text-muted mb-3"></i>
            <h4>No menus created yet</h4>
            <p class="text-muted mb-4">Start creating your own custom diet menus!</p>
            <a href="{{ route('user-menus.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus me-2"></i>Create Your First Menu
            </a>
        </div>
    </div>
    @else
    <div class="row">
        @foreach($menus as $menu)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $menu->name }}</h5>
                    <p class="card-text text-muted small">{{ Str::limit($menu->description, 100) }}</p>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="text-center">
                                <div class="fw-bold text-primary">{{ $menu->calories }}</div>
                                <small class="text-muted">Calories</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center">
                                <div class="fw-bold text-success">{{ ucfirst($menu->meal_type) }}</div>
                                <small class="text-muted">Meal Type</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('user-menus.show', $menu->id) }}" class="btn btn-sm btn-outline-primary">
                        View Details
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="mt-4">
        {{ $menus->links() }}
    </div>
    @endif
</div>
@endsection