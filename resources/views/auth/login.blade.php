<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EatJoy | Your Health Journey Starts Here</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            overflow-y: auto;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
        }

        .brand-font {
            font-family: 'Montserrat', sans-serif;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .gradient-text {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            border-color: #667eea;
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .btn-hover-effect:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .pulse-ring {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7);
            }
            70% {
                box-shadow: 0 0 0 20px rgba(102, 126, 234, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(102, 126, 234, 0);
            }
        }

        .stats-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }

        .animate-pulse-slow {
            animation: pulse 2s infinite;
        }

        .motivation-card {
            transition: all 0.5s ease;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.05));
            border-left: 4px solid #667eea;
        }

        .progress-ring {
            width: 120px;
            height: 120px;
        }

        .progress-ring-circle {
            stroke: #667eea;
            stroke-width: 8;
            fill: transparent;
            stroke-linecap: round;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
            transition: stroke-dashoffset 0.5s ease;
        }

        .remember-checkbox {
            accent-color: #667eea;
        }

        .feature-list li {
            transition: all 0.3s ease;
        }

        .feature-list li:hover {
            transform: translateX(5px);
        }
    </style>
</head>
<body class="h-full overflow-y-auto">
    <div class="min-h-screen flex items-start justify-center p-4 py-8">
        <div class="w-full max-w-6xl">
            <div class="glass-effect rounded-3xl p-8 shadow-2xl">
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    
                    <!-- Left Side - Features & Motivation -->
                    <div class="pr-0 lg:pr-8 border-r-0 lg:border-r border-white/10">
                        
                        <!-- Brand Header -->
                        <div class="text-center mb-8">
                            <div class="flex justify-center mb-4">
                                <div class="relative">
                                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-xl floating">
                                        <i class="fas fa-heartbeat text-white text-3xl"></i>
                                    </div>
                                    <div class="absolute -inset-2 border-2 border-indigo-300 rounded-3xl pulse-ring"></div>
                                </div>
                            </div>
                            <h1 class="brand-font text-4xl text-white font-black mb-2">Welcome to <span class="gradient-text">EatJoy</span></h1>
                            <p class="text-indigo-200">Your personalized health journey awaits</p>
                        </div>

                        <!-- Features List -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                                <i class="fas fa-star text-indigo-300 mr-2"></i> Why Choose EatJoy?
                            </h3>
                            
                            <ul class="feature-list space-y-3">
                                <li class="flex items-center p-3 bg-white/5 rounded-xl">
                                    <div class="w-8 h-8 bg-indigo-500/20 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-check text-indigo-300"></i>
                                    </div>
                                    <div>
                                        <span class="text-white font-medium">25+ Diet Plans</span>
                                        <p class="text-indigo-200 text-sm">From Keto to Mediterranean</p>
                                    </div>
                                </li>
                                
                                <li class="flex items-center p-3 bg-white/5 rounded-xl">
                                    <div class="w-8 h-8 bg-purple-500/20 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-chart-line text-purple-300"></i>
                                    </div>
                                    <div>
                                        <span class="text-white font-medium">Progress Tracking</span>
                                        <p class="text-indigo-200 text-sm">Monitor weight, calories, and more</p>
                                    </div>
                                </li>
                                
                                <li class="flex items-center p-3 bg-white/5 rounded-xl">
                                    <div class="w-8 h-8 bg-blue-500/20 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-user-md text-blue-300"></i>
                                    </div>
                                    <div>
                                        <span class="text-white font-medium">Expert Nutrition</span>
                                        <p class="text-indigo-200 text-sm">Designed by certified nutritionists</p>
                                    </div>
                                </li>
                                
                                <li class="flex items-center p-3 bg-white/5 rounded-xl">
                                    <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-clock text-green-300"></i>
                                    </div>
                                    <div>
                                        <span class="text-white font-medium">Daily Planner</span>
                                        <p class="text-indigo-200 text-sm">Plan meals and workouts easily</p>
                                    </div>
                                </li>
                                
                                <li class="flex items-center p-3 bg-white/5 rounded-xl">
                                    <div class="w-8 h-8 bg-pink-500/20 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-robot text-pink-300"></i>
                                    </div>
                                    <div>
                                        <span class="text-white font-medium">AI Chat Assistant</span>
                                        <p class="text-indigo-200 text-sm">Get instant nutrition advice</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Stats Section -->
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            <div class="stats-card p-4 rounded-2xl text-center">
                                <div class="text-2xl font-bold text-white mb-1">10,000+</div>
                                <div class="text-indigo-300 text-sm">Happy Members</div>
                            </div>
                            
                            <div class="stats-card p-4 rounded-2xl text-center">
                                <div class="text-2xl font-bold text-white mb-1">95%</div>
                                <div class="text-indigo-300 text-sm">Success Rate</div>
                            </div>
                            
                            <div class="stats-card p-4 rounded-2xl text-center">
                                <div class="text-2xl font-bold text-white mb-1">25kg</div>
                                <div class="text-indigo-300 text-sm">Average Loss</div>
                            </div>
                            
                            <div class="stats-card p-4 rounded-2xl text-center">
                                <div class="text-2xl font-bold text-white mb-1">4.9★</div>
                                <div class="text-indigo-300 text-sm">User Rating</div>
                            </div>
                        </div>

                        <!-- Testimonial -->
                        <div class="motivation-card p-5 rounded-2xl">
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-quote-left text-white"></i>
                                </div>
                                <div>
                                    <p class="text-white italic mb-3">
                                        "EatJoy changed my life! I lost 15kg in 3 months and finally feel confident in my own skin."
                                    </p>
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-white rounded-full mr-3"></div>
                                        <div>
                                            <div class="text-white font-medium">Sarah Johnson</div>
                                            <div class="text-indigo-300 text-sm">Lost 15kg • Member for 6 months</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Right Side - Login Form -->
                    <div class="pl-0 lg:pl-8">
                        
                        <!-- Error Messages -->
                        @if($errors->any())
                        <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-2xl backdrop-blur-sm">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center mr-3">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold">Login Error</h4>
                                    @foreach($errors->all() as $error)
                                    <p class="text-red-200 text-sm">{{ $error }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Success Messages -->
                        @if(session('success'))
                        <div class="mb-6 p-4 bg-green-500/20 border border-green-500/50 rounded-2xl backdrop-blur-sm">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center mr-3">
                                    <i class="fas fa-check-circle text-white"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold">Success!</h4>
                                    <p class="text-green-200 text-sm">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Login Form -->
                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-white mb-2">Login to Your Account</h3>
                            <p class="text-indigo-300">Enter your credentials to continue your journey</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf

                            <!-- Username Field -->
                            <div class="mb-6">
                                <label class="block text-white mb-2 font-medium">Username *</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-indigo-400"></i>
                                    </div>
                                    <input type="text"
                                           name="username"
                                           value="{{ old('username') }}"
                                           placeholder="Enter your username"
                                           class="w-full pl-10 pr-4 py-3 bg-white/10 border border-indigo-300/30 rounded-xl text-white placeholder-indigo-200 focus:outline-none input-glow"
                                           required
                                           autofocus>
                                </div>
                                @error('username')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-6">
                                <label class="block text-white mb-2 font-medium">Password *</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-lock text-indigo-400"></i>
                                    </div>
                                    <input type="password"
                                           name="password"
                                           id="password"
                                           placeholder="Enter your password"
                                           class="w-full pl-10 pr-10 py-3 bg-white/10 border border-indigo-300/30 rounded-xl text-white placeholder-indigo-200 focus:outline-none input-glow"
                                           required>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <button type="button" 
                                                id="togglePassword" 
                                                class="text-indigo-300 hover:text-white focus:outline-none">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('password')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="flex items-center justify-between mb-8">
                                <div class="flex items-center">
                                    <input type="checkbox"
                                           name="remember"
                                           id="remember"
                                           class="w-4 h-4 text-indigo-600 bg-white/10 border-indigo-300 rounded focus:ring-indigo-500 remember-checkbox">
                                    <label for="remember" class="ml-2 text-white cursor-pointer">
                                        Remember me
                                    </label>
                                </div>
                                
                                <a href="{{ route('password.request') }}" class="text-indigo-300 hover:text-white transition-colors text-sm font-medium">
                                    Forgot Password?
                                </a>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                    class="btn-hover-effect w-full py-4 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 animate-pulse-slow mb-6">
                                <i class="fas fa-sign-in-alt mr-2"></i> Login to Dashboard
                            </button>

                            <!-- Divider -->
                            <div class="relative mb-6">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-white/10"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-4 bg-transparent text-indigo-300">Or continue with</span>
                                </div>
                            </div>

                            <!-- Social Login -->
                            <div class="grid grid-cols-3 gap-3 mb-8">
                                <a href="#" 
                                   class="flex items-center justify-center p-3 bg-white/10 border border-white/10 rounded-xl text-white hover:bg-white/20 transition-all duration-300">
                                    <i class="fab fa-google text-red-400"></i>
                                    <span class="ml-2 font-medium">Google</span>
                                </a>
                                
                                <a href="#" 
                                   class="flex items-center justify-center p-3 bg-white/10 border border-white/10 rounded-xl text-white hover:bg-white/20 transition-all duration-300">
                                    <i class="fab fa-facebook-f text-blue-400"></i>
                                    <span class="ml-2 font-medium">Facebook</span>
                                </a>
                                
                                <a href="#" 
                                   class="flex items-center justify-center p-3 bg-white/10 border border-white/10 rounded-xl text-white hover:bg-white/20 transition-all duration-300">
                                    <i class="fab fa-twitter text-sky-400"></i>
                                    <span class="ml-2 font-medium">Twitter</span>
                                </a>
                            </div>

                            <!-- Register Link -->
                            <div class="text-center pt-6 border-t border-white/10">
                                <p class="text-indigo-300">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="text-white font-semibold hover:text-indigo-300 transition-colors ml-1">
                                        Create one now
                                    </a>
                                </p>
                                <p class="text-indigo-300 text-sm mt-2">
                                    Join 10,000+ members transforming their health
                                </p>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>
        // Toggle Password Visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.className = 'fas fa-eye-slash';
            } else {
                passwordInput.type = 'password';
                icon.className = 'fas fa-eye';
            }
        });

        // Form Validation Animation
        const loginForm = document.getElementById('loginForm');
        const inputs = loginForm.querySelectorAll('input[required]');

        inputs.forEach(input => {
            input.addEventListener('invalid', function(e) {
                e.preventDefault();
                this.classList.add('border-red-500');
                
                const errorMessage = this.nextElementSibling;
                if (errorMessage && errorMessage.classList.contains('text-red-400')) {
                    errorMessage.textContent = 'This field is required';
                }
            });

            input.addEventListener('input', function() {
                this.classList.remove('border-red-500');
                
                const errorMessage = this.nextElementSibling;
                if (errorMessage && errorMessage.classList.contains('text-red-400')) {
                    errorMessage.textContent = '';
                }
            });
        });

        // Auto-focus username field if empty
        document.addEventListener('DOMContentLoaded', function() {
            const usernameInput = document.querySelector('input[name="username"]');
            if (usernameInput && !usernameInput.value) {
                usernameInput.focus();
            }
        });

        // Add floating animation to cards on hover
        const cards = document.querySelectorAll('.stats-card, .motivation-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Real-time input validation
        const passwordInput = document.getElementById('password');
        passwordInput.addEventListener('input', function() {
            const value = this.value;
            const toggleBtn = document.getElementById('togglePassword');
            
            if (value.length > 0) {
                toggleBtn.classList.remove('text-indigo-300');
                toggleBtn.classList.add('text-white');
            } else {
                toggleBtn.classList.remove('text-white');
                toggleBtn.classList.add('text-indigo-300');
            }
        });

        // Submit button loading state
        loginForm.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Logging in...';
            submitBtn.disabled = true;
            submitBtn.classList.remove('animate-pulse-slow');
            
            // Reset after 5 seconds (in case of error)
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                submitBtn.classList.add('animate-pulse-slow');
            }, 5000);
        });
    </script>
</body>
</html>