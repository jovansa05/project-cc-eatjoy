@extends('layouts.app')

@section('title', 'AI Chat - EatJoy')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="fw-bold">
                <i class="fas fa-robot me-2"></i>AI Nutrition Assistant
            </h1>
            <p class="text-muted">Get instant nutrition advice from our AI</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Chat with EatJoy AI</h5>
                </div>
                <div class="card-body" style="height: 400px; overflow-y: auto;">
                    <div class="chat-messages">
                        <div class="message ai-message mb-3">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="avatar ai-avatar">
                                        <i class="fas fa-robot"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="message-content bg-light p-3 rounded">
                                        <p class="mb-0">Hello! I'm your EatJoy AI assistant. How can I help you with your nutrition today?</p>
                                    </div>
                                    <small class="text-muted">Just now</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type your question about nutrition...">
                        <button class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Suggested Questions</h5>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary text-start">
                            <i class="fas fa-question-circle me-2"></i>What should I eat for breakfast?
                        </button>
                        <button class="btn btn-outline-primary text-start">
                            <i class="fas fa-question-circle me-2"></i>How many calories should I consume?
                        </button>
                        <button class="btn btn-outline-primary text-start">
                            <i class="fas fa-question-circle me-2"></i>Suggest a low-carb dinner
                        </button>
                        <button class="btn btn-outline-primary text-start">
                            <i class="fas fa-question-circle me-2"></i>Help with meal planning
                        </button>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">AI Features</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item border-0">
                            <i class="fas fa-check text-success me-2"></i>24/7 Nutrition Advice
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check text-success me-2"></i>Personalized Recommendations
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check text-success me-2"></i>Meal Planning Assistance
                        </li>
                        <li class="list-group-item border-0">
                            <i class="fas fa-check text-success me-2"></i>Ingredient Analysis
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.chat-messages {
    padding: 10px;
}
.message {
    margin-bottom: 15px;
}
.ai-avatar {
    width: 40px;
    height: 40px;
    background: #007bff;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.user-avatar {
    width: 40px;
    height: 40px;
    background: #28a745;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.message-content {
    max-width: 80%;
}
.ai-message .message-content {
    background: #f8f9fa;
    border: 1px solid #dee2e6;
}
.user-message {
    flex-direction: row-reverse;
}
.user-message .message-content {
    background: #007bff;
    color: white;
}
</style>
@endsection