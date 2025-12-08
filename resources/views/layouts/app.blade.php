<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EatJoy - {{ $title ?? 'Diet & Nutrition' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #2196F3;
            --premium-color: #FF9800;
            --premium-plus-color: #9C27B0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--primary-color) !important;
        }

        .premium-badge {
            background: linear-gradient(45deg, var(--premium-color), #FFC107);
            color: white;
            font-weight: bold;
        }

        .premium-plus-badge {
            background: linear-gradient(45deg, var(--premium-plus-color), #E91E63);
            color: white;
            font-weight: bold;
        }

        .menu-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .calorie-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(76, 175, 80, 0.9);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.7);
            display: none;
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .popup-content {
            background: white;
            border-radius: 15px;
            max-width: 500px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            animation: popupIn 0.3s ease-out;
        }

        @keyframes popupIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        .gradient-bg {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
    </style>
    @stack('styles')
</head>
<body>
    @include('partials.navbar')

    <main class="py-4">
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Popup system
        function showPopup(html) {
            $('#popup-container').html(html).fadeIn();
        }

        function closePopup() {
            $('#popup-container').fadeOut();
        }

        $(document).ready(function() {
            // Close popup when clicking outside
            $('#popup-container').click(function(e) {
                if ($(e.target).hasClass('popup-overlay')) {
                    closePopup();
                }
            });

            // Close with ESC key
            $(document).keyup(function(e) {
                if (e.key === "Escape") closePopup();
            });
        });
    </script>

    <!-- Popup Container -->
    <div id="popup-container" class="popup-overlay"></div>

    @stack('scripts')
</body>
</html>
