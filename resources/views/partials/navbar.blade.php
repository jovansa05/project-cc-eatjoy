<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <!-- Logo EatJoy -->
        <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">
            EatJoy
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <!-- Premium Features Dropdown -->
                    @if(auth()->user()->isPremium())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="premiumDropdown" role="button" data-bs-toggle="dropdown">
                            Premium Features
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->routeIs('user-menus.index') ? 'active' : '' }}" href="{{ route('user-menus.index') }}">
                                My Created Menus
                            </a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('user-menus.create') ? 'active' : '' }}" href="{{ route('user-menus.create') }}">
                                Create New Menu
                            </a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('daily-planner') ? 'active' : '' }}" href="{{ route('daily-planner') }}">
                                Daily Planner
                            </a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('personalized-menu') ? 'active' : '' }}" href="{{ route('personalized-menu') }}">
                                Personalized Menu
                            </a></li>

                            <!-- AI Chat hanya untuk Starter+ -->
                            @if(auth()->user()->isPremiumStarterPlus())
                            <li><a class="dropdown-item {{ request()->routeIs('ai-chat') ? 'active' : '' }}" href="{{ route('ai-chat') }}">
                                AI Chat
                            </a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    <!-- Premium Dish (accessible untuk semua user) -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('diet-menus.premium') ? 'active' : '' }}" href="{{ route('diet-menus.premium') }}">
                            Premium Dish
                        </a>
                    </li>

                    <!-- Subscription -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('subscription') ? 'active' : '' }}" href="{{ route('subscription') }}">
                            Subscription
                        </a>
                    </li>
                @endauth
            </ul>

            <!-- Right Side: Auth Buttons -->
            <ul class="navbar-nav">
                @auth
                    <!-- User Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <div class="me-2">{{ auth()->user()->nickname }}</div>
                            @if(auth()->user()->isPremium())
                                <span class="badge {{ auth()->user()->isPremiumStarterPlus() ? 'premium-plus-badge' : 'premium-badge' }}">
                                    {{ auth()->user()->getPlanName() }}
                                </span>
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('subscription') }}">Subscription</a></li>

                            @if(auth()->user()->isPremium())
                            <li><a class="dropdown-item" href="{{ route('user-menus.index') }}">My Created Menus</a></li>
                            @endif

                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- Login & Register Buttons (tanpa icon) -->
                    <li class="nav-item">
                        <a class="nav-link px-3" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-2 px-4" href="{{ route('register') }}">
                            Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<style>
/* Styling untuk badges premium */
.premium-badge {
    background: linear-gradient(45deg, #FF9800, #FFC107);
    color: white;
    font-size: 0.7rem;
    padding: 0.25rem 0.5rem;
    font-weight: 600;
}

.premium-plus-badge {
    background: linear-gradient(45deg, #9C27B0, #E91E63);
    color: white;
    font-size: 0.7rem;
    padding: 0.25rem 0.5rem;
    font-weight: 600;
}

/* Navbar styling */
.navbar-brand {
    color: #4CAF50 !important;
    letter-spacing: 0.5px;
}

.nav-link {
    font-weight: 500;
    padding: 0.5rem 1rem !important;
}

.nav-link.active {
    color: #4CAF50 !important;
    font-weight: 600;
}

/* Button styling */
.btn-primary {
    background-color: #4CAF50;
    border-color: #4CAF50;
    font-weight: 500;
}

.btn-primary:hover {
    background-color: #45a049;
    border-color: #45a049;
}

/* Dropdown styling */
.dropdown-menu {
    border: none;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    border-radius: 8px;
}

.dropdown-item {
    padding: 0.5rem 1rem;
}

.dropdown-item.active {
    background-color: #4CAF50;
}
</style>