<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-apple-alt me-2"></i>EatJoy
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i>Home
                    </a>
                </li>
                
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                        </a>
                    </li>
                    
                    <!-- TAMBAHAN FITUR PREMIUM: My Menus Dropdown -->
                    @if(auth()->user()->isPremium())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="myMenusDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-utensils me-1"></i>My Menus
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->routeIs('user-menus.index') ? 'active' : '' }}" href="{{ route('user-menus.index') }}">
                                <i class="fas fa-list me-2"></i>My Created Menus
                            </a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('user-menus.create') ? 'active' : '' }}" href="{{ route('user-menus.create') }}">
                                <i class="fas fa-plus-circle me-2"></i>Create New Menu
                            </a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('user-menus.explore') ? 'active' : '' }}" href="{{ route('user-menus.explore') }}">
                                <i class="fas fa-compass me-2"></i>Explore Public Menus
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('personalized-menu') }}">
                                <i class="fas fa-magic me-2"></i>Personalized Menu
                            </a></li>
                        </ul>
                    </li>
                    @endif
                    
                    @if(auth()->user()->isPremium())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('daily-planner') ? 'active' : '' }}" href="{{ route('daily-planner') }}">
                                <i class="fas fa-calendar-alt me-1"></i>Daily Planner
                            </a>
                        </li>
                        
                        <!-- Personalize Menu dipindah ke dropdown My Menus -->
                        <!-- Jadi dihapus dari sini -->
                    @endif
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('diet-menus.premium') ? 'active' : '' }}" href="{{ route('diet-menus.premium') }}">
                            <i class="fas fa-crown me-1"></i>Premium Dish
                        </a>
                    </li>
                    
                    <!-- TAMBAHAN: AI Chat untuk Premium Starter+ -->
                    @if(auth()->check() && auth()->user()->isPremiumStarterPlus())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('ai-chat') ? 'active' : '' }}" href="{{ route('ai-chat') }}">
                            <i class="fas fa-robot me-1"></i>AI Chat
                        </a>
                    </li>
                    @endif
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('subscription') ? 'active' : '' }}" href="{{ route('subscription') }}">
                            <i class="fas fa-gem me-1"></i>Subscription
                        </a>
                    </li>
                @endauth
            </ul>
            
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i>
                            {{ auth()->user()->nickname }}
                            @if(auth()->user()->isPremium())
                                <span class="badge {{ auth()->user()->isPremiumStarterPlus() ? 'premium-plus-badge' : 'premium-badge' }} ms-1">
                                    {{ auth()->user()->getPlanName() }}
                                </span>
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('subscription') }}"><i class="fas fa-gem me-2"></i>Subscription</a></li>
                            
                            <!-- TAMBAHAN: Link ke My Menus di dropdown user -->
                            @if(auth()->user()->isPremium())
                            <li><a class="dropdown-item" href="{{ route('user-menus.index') }}"><i class="fas fa-utensils me-2"></i>My Created Menus</a></li>
                            @endif
                            
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-1"></i>Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>