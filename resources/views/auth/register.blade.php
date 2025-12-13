<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - EatJoy | Start Your Health Journey</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            overflow-y: auto;
            background: linear-gradient(135deg, #1a5d1a 0%, #166534 50%, #14532d 100%);
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
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
            border-color: #22c55e;
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
            box-shadow: 0 10px 25px rgba(34, 197, 94, 0.3);
        }

        .pulse-ring {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7);
            }
            70% {
                box-shadow: 0 0 0 20px rgba(34, 197, 94, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0);
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
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(34, 197, 94, 0.05));
            border-left: 4px solid #22c55e;
        }

        .progress-ring {
            width: 120px;
            height: 120px;
        }

        .progress-ring-circle {
            stroke: #22c55e;
            stroke-width: 8;
            fill: transparent;
            stroke-linecap: round;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
            transition: stroke-dashoffset 0.5s ease;
        }

        .password-strength-bar {
            display: none; /* DISEMBUNYIKAN SEPERTI PERMINTAAN */
        }

        .requirement-item {
            transition: all 0.3s ease;
            color: #86efac; /* WARNA HIJAU TERANG UNTUK TERLIHAT */
        }

        .requirement-item.valid {
            color: #22c55e;
        }

        .requirement-item.invalid {
            color: #86efac; /* GANTI DARI MERAH KE HIJAU TERANG */
        }
    </style>
</head>
<body class="h-full overflow-y-auto">
    <div class="min-h-screen flex items-start justify-center p-4 py-8">
        <div class="w-full max-w-2xl">
            <div class="glass-effect rounded-3xl p-8 shadow-2xl">

                <!-- Brand Header -->
                <div class="text-center mb-8">
                    <div class="flex justify-center mb-4">
                        <div class="relative">
                            <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-green-500 rounded-2xl flex items-center justify-center shadow-xl floating">
                                <i class="fas fa-heartbeat text-white text-3xl"></i>
                            </div>
                            <div class="absolute -inset-2 border-2 border-emerald-300 rounded-3xl pulse-ring"></div>
                        </div>
                    </div>
                    <h1 class="brand-font text-4xl text-white font-black mb-2">Join <span class="gradient-text">EatJoy</span></h1>
                    <p class="text-emerald-200">Start your health transformation today</p>
                </div>

                @if($errors->any())
                <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-2xl backdrop-blur-sm">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center mr-3">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold">Registration Error</h4>
                            @foreach($errors->all() as $error)
                            <p class="text-red-200 text-sm">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}" id="registrationForm">
                    @csrf

                    <!-- Personal Information -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                            <i class="fas fa-user-circle text-emerald-300 mr-2"></i> Personal Information
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-emerald-100 mb-2">Nickname *</label>
                                <input type="text"
                                       name="nickname"
                                       value="{{ old('nickname') }}"
                                       placeholder="What should we call you?"
                                       class="w-full px-4 py-3 bg-white/10 border border-emerald-300/30 rounded-xl text-white placeholder-emerald-200 focus:outline-none input-glow"
                                       required>
                            </div>

                            <div>
                                <label class="block text-emerald-100 mb-2">Username *</label>
                                <input type="text"
                                       name="username"
                                       value="{{ old('username') }}"
                                       placeholder="For login (unique)"
                                       class="w-full px-4 py-3 bg-white/10 border border-emerald-300/30 rounded-xl text-white placeholder-emerald-200 focus:outline-none input-glow"
                                       required>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="block text-emerald-100 mb-2">Email Address *</label>
                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="your@email.com"
                                   class="w-full px-4 py-3 bg-white/10 border border-emerald-300/30 rounded-xl text-white placeholder-emerald-200 focus:outline-none input-glow"
                                   required>
                        </div>
                    </div>

                    <!-- Account Security -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                            <i class="fas fa-shield-alt text-emerald-300 mr-2"></i> Account Security
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-emerald-100 mb-2">Password *</label>
                                <input type="password"
                                       name="password"
                                       id="password"
                                       placeholder="Create a strong password"
                                       class="w-full px-4 py-3 bg-white/10 border border-emerald-300/30 rounded-xl text-white placeholder-emerald-200 focus:outline-none input-glow"
                                       required>
                            </div>

                            <div>
                                <label class="block text-emerald-100 mb-2">Confirm Password *</label>
                                <input type="password"
                                       name="password_confirmation"
                                       id="passwordConfirm"
                                       placeholder="Repeat your password"
                                       class="w-full px-4 py-3 bg-white/10 border border-emerald-300/30 rounded-xl text-white placeholder-emerald-200 focus:outline-none input-glow"
                                       required>
                                <!-- Password Match Indicator -->
                                <div class="mt-2">
                                    <div class="flex items-center">
                                        <i class="fas fa-times text-red-400 mr-2 text-sm" id="match-icon"></i>
                                        <span class="text-emerald-200 text-sm" id="match-text">Password Match</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Password Requirements -->
                        <div class="mt-4 p-4 bg-emerald-900/30 rounded-xl border border-emerald-500/30">
                            <h5 class="text-emerald-100 font-medium mb-3 flex items-center">
                                <i class="fas fa-key mr-2"></i> Password Requirements:
                            </h5>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="requirement-item invalid flex items-center" id="req-length">
                                    <i class="fas fa-circle text-xs mr-2"></i>
                                    <span class="text-sm">8+ characters</span>
                                </div>
                                <div class="requirement-item invalid flex items-center" id="req-upper">
                                    <i class="fas fa-circle text-xs mr-2"></i>
                                    <span class="text-sm">Uppercase letter</span>
                                </div>
                                <div class="requirement-item invalid flex items-center" id="req-number">
                                    <i class="fas fa-circle text-xs mr-2"></i>
                                    <span class="text-sm">Number</span>
                                </div>
                                <div class="requirement-item invalid flex items-center" id="req-special">
                                    <i class="fas fa-circle text-xs mr-2"></i>
                                    <span class="text-sm">Special character</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Weight Goals - REAL-TIME UPDATE BAGIAN INI! -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                            <i class="fas fa-weight-scale text-emerald-300 mr-2"></i> Your Weight Goals
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Current Weight -->
                            <div>
                                <label class="block text-emerald-100 mb-2">Current Weight (kg) *</label>
                                <input type="number"
                                       name="current_weight"
                                       id="currentWeight"
                                       value="{{ old('current_weight') }}"
                                       min="30"
                                       max="200"
                                       step="0.5"
                                       class="w-full px-4 py-3 bg-white/10 border border-emerald-300/30 rounded-xl text-white focus:outline-none input-glow"
                                       required>
                            </div>

                            <!-- Target Weight -->
                            <div>
                                <label class="block text-emerald-100 mb-2">Target Weight (kg) *</label>
                                <input type="number"
                                       name="target_weight"
                                       id="targetWeight"
                                       value="{{ old('target_weight') }}"
                                       min="30"
                                       max="200"
                                       step="0.5"
                                       class="w-full px-4 py-3 bg-white/10 border border-emerald-300/30 rounded-xl text-white focus:outline-none input-glow"
                                       required>
                            </div>
                        </div>
                    </div>

                    <!-- Weight Analysis Section - INI YANG UPDATE REAL-TIME! -->
                    <div id="weightAnalysis" class="mb-8 transition-all duration-500">
                        <h3 class="text-lg font-semibold text-white mb-6 flex items-center">
                            <i class="fas fa-chart-line text-emerald-300 mr-2"></i> Your Journey Analysis
                        </h3>

                        <!-- Progress Visualization -->
                        <div class="mb-8">
                            <div class="flex flex-col md:flex-row items-center justify-between mb-6">
                                <div class="text-center mb-6 md:mb-0">
                                    <div class="text-4xl font-bold text-white mb-2" id="currentWeightDisplay">70</div>
                                    <div class="text-emerald-300">Current Weight</div>
                                </div>

                                <div class="relative mb-6 md:mb-0">
                                    <svg class="progress-ring" viewBox="0 0 120 120">
                                        <circle class="progress-ring-circle"
                                                cx="60"
                                                cy="60"
                                                r="50"
                                                stroke-dasharray="314"
                                                stroke-dashoffset="0"
                                                id="progressCircle" />
                                    </svg>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="text-center">
                                            <div class="text-2xl font-bold text-white" id="weightDifferenceDisplay">kg</div>
                                            <div class="text-emerald-300 text-sm">Goal</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <div class="text-4xl font-bold text-white mb-2" id="targetWeightDisplay">65</div>
                                    <div class="text-emerald-300">Target Weight</div>
                                </div>
                            </div>

                            <!-- Progress Bar -->
                            <div class="mb-4">
                                <div class="flex justify-between text-emerald-200 mb-2">
                                    <span id="progressCurrent">Current 70kg</span>
                                    <span id="progressPercentage">92.9% to goal</span>
                                    <span id="progressTarget">Target 65kg</span>
                                </div>
                                <div class="h-3 bg-emerald-900/50 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-emerald-500 to-green-500 rounded-full transition-all duration-500"
                                         id="progressBar" style="width: 92.9%"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Stats Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                            <div class="stats-card p-5 rounded-2xl">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-sm text-emerald-300">Weekly Target</div>
                                        <div class="text-2xl font-bold text-white" id="weeklyTarget">0.4 kg</div>
                                    </div>
                                    <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-calendar-week text-blue-300"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="text-xs text-emerald-200" id="weeklyTargetDesc">Healthy pace for sustainable results</div>
                                </div>
                            </div>

                            <div class="stats-card p-5 rounded-2xl">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-sm text-emerald-300">Est. Timeline</div>
                                        <div class="text-2xl font-bold text-white" id="timeline">12 weeks</div>
                                    </div>
                                    <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-clock text-purple-300"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="text-xs text-emerald-200" id="timelineDescription">Consistent effort needed</div>
                                </div>
                            </div>

                            <div class="stats-card p-5 rounded-2xl">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-sm text-emerald-300">Calories/Day</div>
                                        <div class="text-2xl font-bold text-white" id="calories">~1800</div>
                                    </div>
                                    <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-fire text-red-300"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="text-xs text-emerald-200" id="caloriesDescription">Estimated daily intake</div>
                                </div>
                            </div>
                        </div>

                        <!-- Motivation Section -->
                        <div id="motivationSection" class="transition-all duration-500">
                            <div class="motivation-card p-6 rounded-2xl mb-4">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mr-4">
                                        <i class="fas fa-trophy text-emerald-300 text-xl" id="motivationIcon"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-semibold mb-2" id="motivationTitle">Great Starting Point! 🎯</h4>
                                        <p class="text-emerald-200" id="motivationText">
                                            You're aiming for a healthy 5kg reduction. This is an achievable goal with consistent effort!
                                        </p>
                                        <div class="flex items-center mt-3">
                                            <div id="difficultyStars">
                                                <i class="fas fa-star text-yellow-300"></i>
                                                <i class="fas fa-star text-yellow-300"></i>
                                                <i class="fas fa-star text-yellow-300"></i>
                                                <i class="fas fa-star text-yellow-300"></i>
                                                <i class="fas fa-star-half-alt text-yellow-300"></i>
                                            </div>
                                            <span class="text-emerald-300 text-sm ml-2" id="difficultyLevel">Difficulty: Moderate</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tips -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="p-4 bg-emerald-900/30 rounded-xl border border-emerald-500/20">
                                    <div class="flex items-center mb-2">
                                        <i class="fas fa-utensils text-emerald-300 mr-2"></i>
                                        <span class="text-white font-medium" id="dietTip">Balanced Nutrition</span>
                                    </div>
                                    <p class="text-emerald-200 text-sm" id="dietDescription">
                                        Focus on protein-rich foods and fiber to stay full longer.
                                    </p>
                                </div>
                                <div class="p-4 bg-emerald-900/30 rounded-xl border border-emerald-500/20">
                                    <div class="flex items-center mb-2">
                                        <i class="fas fa-running text-emerald-300 mr-2"></i>
                                        <span class="text-white font-medium" id="exerciseTip">Regular Exercise</span>
                                    </div>
                                    <p class="text-emerald-200 text-sm" id="exerciseDescription">
                                        30 minutes of moderate activity daily will accelerate results.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Terms & Submit -->
                    <div class="mb-8">
                        <div class="flex items-start mb-6">
                            <input type="checkbox"
                                   name="terms"
                                   id="terms"
                                   class="mt-1 mr-3 w-5 h-5 text-emerald-500 bg-white/10 border-emerald-300 rounded focus:ring-emerald-500"
                                   required>
                            <label for="terms" class="text-emerald-200 text-sm">
                                I agree to the <a href="#" class="text-white hover:text-emerald-300 font-medium">Terms of Service</a> and <a href="#" class="text-white hover:text-emerald-300 font-medium">Privacy Policy</a>.
                            </label>
                        </div>

                        <button type="submit"
                                class="btn-hover-effect w-full py-4 bg-gradient-to-r from-emerald-500 to-green-500 text-white font-semibold rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 animate-pulse-slow">
                            <i class="fas fa-rocket mr-2"></i> Start My Journey
                        </button>
                    </div>
                </form>

                <!-- Login Link -->
                <div class="text-center pt-6 border-t border-emerald-500/30">
                    <p class="text-emerald-300">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-white font-semibold hover:text-emerald-300 transition-colors">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // REAL-TIME Password Requirements Checker - SUDAH DIPERBAIKI
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;

            // Check length
            if (password.length >= 8) {
                document.getElementById('req-length').classList.remove('invalid');
                document.getElementById('req-length').classList.add('valid');
                document.querySelector('#req-length i').className = 'fas fa-check text-xs mr-2 text-green-400';
            } else {
                document.getElementById('req-length').classList.remove('valid');
                document.getElementById('req-length').classList.add('invalid');
                document.querySelector('#req-length i').className = 'fas fa-times text-xs mr-2 text-emerald-300';
            }

            // Check uppercase
            if (/[A-Z]/.test(password)) {
                document.getElementById('req-upper').classList.remove('invalid');
                document.getElementById('req-upper').classList.add('valid');
                document.querySelector('#req-upper i').className = 'fas fa-check text-xs mr-2 text-green-400';
            } else {
                document.getElementById('req-upper').classList.remove('valid');
                document.getElementById('req-upper').classList.add('invalid');
                document.querySelector('#req-upper i').className = 'fas fa-times text-xs mr-2 text-emerald-300';
            }

            // Check number
            if (/[0-9]/.test(password)) {
                document.getElementById('req-number').classList.remove('invalid');
                document.getElementById('req-number').classList.add('valid');
                document.querySelector('#req-number i').className = 'fas fa-check text-xs mr-2 text-green-400';
            } else {
                document.getElementById('req-number').classList.remove('valid');
                document.getElementById('req-number').classList.add('invalid');
                document.querySelector('#req-number i').className = 'fas fa-times text-xs mr-2 text-emerald-300';
            }

            // Check special character
            if (/[^A-Za-z0-9]/.test(password)) {
                document.getElementById('req-special').classList.remove('invalid');
                document.getElementById('req-special').classList.add('valid');
                document.querySelector('#req-special i').className = 'fas fa-check text-xs mr-2 text-green-400';
            } else {
                document.getElementById('req-special').classList.remove('valid');
                document.getElementById('req-special').classList.add('invalid');
                document.querySelector('#req-special i').className = 'fas fa-times text-xs mr-2 text-emerald-300';
            }
        });

        // REAL-TIME Password Match Checker
        document.getElementById('passwordConfirm').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirm = this.value;
            const matchIcon = document.getElementById('match-icon');
            const matchText = document.getElementById('match-text');

            if (confirm.length === 0) {
                matchIcon.className = 'fas fa-times text-emerald-300 mr-2 text-sm';
                matchText.textContent = 'Enter password confirmation';
                matchText.className = 'text-emerald-200 text-sm';
            } else if (password !== confirm) {
                matchIcon.className = 'fas fa-times text-red-400 mr-2 text-sm';
                matchText.textContent = 'Passwords don\'t match';
                matchText.className = 'text-red-400 text-sm';
            } else {
                matchIcon.className = 'fas fa-check text-green-400 mr-2 text-sm';
                matchText.textContent = 'Passwords match!';
                matchText.className = 'text-green-400 text-sm';
            }
        });

        // REAL-TIME WEIGHT CALCULATION - INI YANG DIPERBAIKI!
        function calculateWeightGoals() {
            const currentWeight = parseFloat(document.getElementById('currentWeight').value) || 70;
            const targetWeight = parseFloat(document.getElementById('targetWeight').value) || 65;

            // Update weight displays
            document.getElementById('currentWeightDisplay').textContent = currentWeight;
            document.getElementById('targetWeightDisplay').textContent = targetWeight;
            document.getElementById('progressCurrent').textContent = Current ${currentWeight}kg;
            document.getElementById('progressTarget').textContent = Target ${targetWeight}kg;

            const difference = targetWeight - currentWeight;
            const absDifference = Math.abs(difference);
            const isWeightLoss = difference < 0;

            // Update weight difference display
            const diffText = ${difference > 0 ? '+' : ''}${difference.toFixed(1)}kg;
            document.getElementById('weightDifferenceDisplay').textContent = diffText;

            // Calculate progress
            const maxWeight = Math.max(currentWeight, targetWeight);
            const minWeight = Math.min(currentWeight, targetWeight);
            const progress = maxWeight === minWeight ? 100 : ((currentWeight - minWeight) / (maxWeight - minWeight)) * 100;
            const progressPercentage = isWeightLoss ? 100 - progress : progress;

            // Update progress bar and percentage
            document.getElementById('progressBar').style.width = progressPercentage + '%';
            document.getElementById('progressPercentage').textContent =
                ${progressPercentage.toFixed(1)}% ${isWeightLoss ? 'to goal' : 'progress'};

            // Update progress circle
            const progressCircle = document.getElementById('progressCircle');
            const circumference = 314;
            const offset = circumference - (progressPercentage / 100 * circumference);
            progressCircle.style.strokeDashoffset = offset;

            // Calculate timeline and weekly target
            let weeklyTarget = 0.4;
            if (absDifference > 30) {
                weeklyTarget = 0.7;
                document.getElementById('weeklyTargetDesc').textContent = 'Aggressive but achievable pace';
            } else if (absDifference > 20) {
                weeklyTarget = 0.6;
                document.getElementById('weeklyTargetDesc').textContent = 'Challenging but doable pace';
            } else if (absDifference > 10) {
                weeklyTarget = 0.5;
                document.getElementById('weeklyTargetDesc').textContent = 'Steady progress pace';
            } else if (absDifference > 5) {
                weeklyTarget = 0.4;
                document.getElementById('weeklyTargetDesc').textContent = 'Healthy sustainable pace';
            } else {
                weeklyTarget = 0.3;
                document.getElementById('weeklyTargetDesc').textContent = 'Gentle maintenance pace';
            }

            // Adjust timeline
            let timeline = Math.ceil(absDifference / weeklyTarget);
            if (timeline < 4) timeline = 4;
            if (timeline > 52) timeline = 52;

            // Update stats
            document.getElementById('weeklyTarget').textContent = ${weeklyTarget.toFixed(1)} kg;
            document.getElementById('timeline').textContent = ${timeline} weeks;
            document.getElementById('timelineDescription').textContent =
                ${timeline} weeks of ${isWeightLoss ? 'dedication' : 'consistent effort'};

            // Calculate calories
            const baseCalories = isWeightLoss ? 1800 : 2200;
            const calorieAdjustment = absDifference > 30 ? 300 : absDifference > 20 ? 200 : absDifference > 10 ? 100 : 0;
            const calories = isWeightLoss ? baseCalories - calorieAdjustment : baseCalories + calorieAdjustment;
            document.getElementById('calories').textContent = ~${calories};
            document.getElementById('caloriesDescription').textContent =
                isWeightLoss ? 'Calorie deficit for weight loss' : 'Calorie surplus for weight gain';

            // Update motivation
            updateMotivation(absDifference, isWeightLoss, difference);
        }

        // REAL-TIME Motivation System
        function updateMotivation(absDifference, isWeightLoss, difference) {
            let title = '';
            let text = '';
            let difficulty = '';
            let dietTip = '';
            let dietDescription = '';
            let exerciseTip = '';
            let exerciseDescription = '';
            let icon = 'fa-trophy';
            let starsHTML = '';

            if (isWeightLoss) {
                // Weight Loss Motivations
                if (absDifference <= 5) {
                    title = 'Perfect Starting Point! 🎯';
                    text = Losing ${absDifference.toFixed(1)}kg is perfect! Small, consistent changes lead to amazing results. You've got this! 💪;
                    difficulty = 'Easy';
                    dietTip = 'Mindful Eating';
                    dietDescription = 'Focus on portion control and eat slowly to recognize fullness cues.';
                    exerciseTip = 'Daily Movement';
                    exerciseDescription = 'Start with 20-30 minutes of walking or light activity daily.';
                    icon = 'fa-bullseye';
                } else if (absDifference <= 10) {
                    title = 'Achievable Goal! 🚀';
                    text = ${absDifference.toFixed(1)}kg reduction is very achievable! Stay consistent and you'll see amazing changes in 2-3 months!;
                    difficulty = 'Moderate';
                    dietTip = 'Calorie Deficit';
                    dietDescription = 'Reduce daily intake by 300-500 calories for steady, healthy weight loss.';
                    exerciseTip = 'Cardio Routine';
                    exerciseDescription = 'Include 3-4 cardio sessions per week for best fat-burning results.';
                    icon = 'fa-rocket';
                } else if (absDifference <= 20) {
                    title = 'Transformational Journey! 🔥';
                    text = Losing ${absDifference.toFixed(1)}kg will transform your health and confidence! This journey will change your life forever!;
                    difficulty = 'Challenging';
                    dietTip = 'Structured Meal Plan';
                    dietDescription = 'Follow a structured plan with protein focus and controlled carbs for optimal results.';
                    exerciseTip = 'Mixed Training';
                    exerciseDescription = 'Combine cardio with strength training 4-5 times weekly for best results.';
                    icon = 'fa-fire';
                } else if (absDifference <= 30) {
                    title = 'Life-Changing Achievement! 🌟';
                    text = ${absDifference.toFixed(1)}kg is a major achievement! Your dedication will inspire others. This is your time to shine!;
                    difficulty = 'Very Challenging';
                    dietTip = 'Strict Nutrition';
                    dietDescription = 'Professional guidance recommended for optimal results and sustained health.';
                    exerciseTip = 'Intensive Training';
                    exerciseDescription = 'Daily exercise with professional supervision for maximum transformation.';
                    icon = 'fa-crown';
                } else {
                    title = 'Extraordinary Transformation! 💫';
                    text = ${absDifference.toFixed(1)}kg is extraordinary! Your commitment will lead to the best version of yourself. We believe in you!;
                    difficulty = 'Extreme';
                    dietTip = 'Medical Supervision';
                    dietDescription = 'Consider consulting professionals for personalized, safe guidance throughout.';
                    exerciseTip = 'Professional Program';
                    exerciseDescription = 'Custom program with trainer supervision for safe, effective transformation.';
                    icon = 'fa-medal';
                }
            } else {
                // Weight Gain Motivations
                if (absDifference <= 5) {
                    title = 'Healthy Gain Goal! 📈';
                    text = Gaining ${absDifference.toFixed(1)}kg of quality weight is perfect for boosting strength and vitality!;
                    difficulty = 'Easy';
                    dietTip = 'Calorie Surplus';
                    dietDescription = 'Increase daily calories by 300-500 with nutrient-dense, healthy foods.';
                    exerciseTip = 'Strength Training';
                    exerciseDescription = 'Focus on compound movements 3 times weekly for solid foundation.';
                    icon = 'fa-chart-line';
                } else if (absDifference <= 10) {
                    title = 'Muscle Building Mission! 💪';
                    text = Adding ${absDifference.toFixed(1)}kg of muscle will dramatically improve your physique and metabolism!;
                    difficulty = 'Moderate';
                    dietTip = 'High Protein Diet';
                    dietDescription = 'Consume 1.6-2g of protein per kg of body weight daily for muscle growth.';
                    exerciseTip = 'Progressive Overload';
                    exerciseDescription = 'Gradually increase weights and intensity each week for continuous gains.';
                    icon = 'fa-dumbbell';
                } else if (absDifference <= 20) {
                    title = 'Major Physique Transformation! 🔥';
                    text = ${absDifference.toFixed(1)}kg of quality mass requires dedication but the results will be extraordinary!;
                    difficulty = 'Challenging';
                    dietTip = 'Structured Meal Timing';
                    dietDescription = 'Eat every 3-4 hours to ensure constant nutrient supply for muscle growth.';
                    exerciseTip = 'Split Routine';
                    exerciseDescription = 'Train different muscle groups on separate days for optimal growth.';
                    icon = 'fa-fire';
                } else {
                    title = 'Elite Level Transformation! 🚀';
                    text = Your ${absDifference.toFixed(1)}kg goal requires serious commitment, but the transformation will be absolutely remarkable!;
                    difficulty = 'Very Challenging';
                    dietTip = 'Professional Nutrition Plan';
                    dietDescription = 'Consider working with a sports nutritionist for optimal muscle-building results.';
                    exerciseTip = 'Advanced Training Split';
                    exerciseDescription = 'Advanced programming with focus on weak points and recovery for elite gains.';
                    icon = 'fa-rocket';
                }
            }

            // Update motivation elements
            document.getElementById('motivationTitle').textContent = title;
            document.getElementById('motivationText').textContent = text;
            document.getElementById('motivationIcon').className = fas ${icon} text-emerald-300 text-xl;
            document.getElementById('difficultyLevel').textContent = Difficulty: ${difficulty};
            document.getElementById('dietTip').textContent = dietTip;
            document.getElementById('dietDescription').textContent = dietDescription;
            document.getElementById('exerciseTip').textContent = exerciseTip;
            document.getElementById('exerciseDescription').textContent = exerciseDescription;

            // Update stars based on difficulty
            const starsContainer = document.getElementById('difficultyStars');
            starsContainer.innerHTML = '';
            const starCount = difficulty === 'Easy' ? 2 :
                  difficulty === 'Moderate' ? 3 :
                  difficulty === 'Challenging' ? 4 : 5;