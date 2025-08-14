<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Cuniculture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Colors */
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #e0e7ff;
            --secondary: #8b5cf6;
            --secondary-light: #ede9fe;
            --success: #10b981;
            --success-light: #d1fae5;
            --danger: #ef4444;
            --danger-light: #fecaca;
            --warning: #f59e0b;
            --warning-light: #fed7aa;
            --info: #3b82f6;
            --info-light: #dbeafe;
            
            /* Grays */
            --dark: #111827;
            --dark-light: #1f2937;
            --gray-900: #111827;
            --gray-800: #1f2937;
            --gray-700: #374151;
            --gray-600: #4b5563;
            --gray-500: #6b7280;
            --gray-400: #9ca3af;
            --gray-300: #d1d5db;
            --gray-200: #e5e7eb;
            --gray-100: #f3f4f6;
            --gray-50: #f9fafb;
            
            /* Background */
            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --bg-tertiary: #f1f5f9;
            
            /* Spacing & Effects */
            --border-radius: 16px;
            --border-radius-sm: 8px;
            --border-radius-lg: 24px;
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-fast: all 0.15s ease-in-out;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: var(--gray-800);
            line-height: 1.7;
            min-height: 100vh;
            margin: 0;
            font-feature-settings: 'cv02', 'cv03', 'cv04', 'cv11';
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gray-400);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gray-500);
        }

        /* Navigation */
        .navbar {
            background: var(--bg-primary) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--gray-200);
            box-shadow: var(--shadow-sm);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--gray-800) !important;
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .navbar-brand:hover {
            color: var(--primary) !important;
            transform: translateY(-1px);
        }

        .navbar-brand i {
            font-size: 1.75rem;
            color: var(--primary);
            margin-right: 0.75rem;
            background: var(--primary-light);
            padding: 0.5rem;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
        }

        .navbar-brand:hover i {
            transform: rotate(10deg) scale(1.1);
            background: var(--primary);
            color: white;
        }

        .brand-text {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
        }

        /* Navigation Enhancement */
        .nav-container {
            position: relative;
        }

        .nav-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.02) 0%, rgba(139, 92, 246, 0.02) 100%);
            border-radius: var(--border-radius);
            opacity: 0;
            transition: var(--transition);
        }

        .navbar:hover .nav-container::before {
            opacity: 1;
        }

        /* Main Content */
        main {
            min-height: calc(100vh - 200px);
            padding: 2rem 0;
        }

        .dashboard-container {
            max-width: 1800px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Content Enhancement */
        .content-wrapper {
            background: var(--bg-primary);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-md);
            padding: 2rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .content-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 50%, var(--success) 100%);
        }

        /* Footer */
        footer {
            background: var(--dark) !important;
            color: white;
            padding: 3rem 0 2rem;
            margin-top: auto;
            position: relative;
            overflow: hidden;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, var(--dark) 0%, var(--dark-light) 100%);
            opacity: 0.9;
        }

        .footer-content {
            position: relative;
            z-index: 2;
        }

        .footer-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-brand i {
            color: var(--primary);
            margin-right: 0.5rem;
            font-size: 2rem;
        }

        .footer-text {
            color: var(--gray-400);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1.5rem;
        }

        .footer-link {
            color: var(--gray-400);
            text-decoration: none;
            transition: var(--transition);
            font-weight: 500;
        }

        .footer-link:hover {
            color: var(--primary);
            text-decoration: none;
        }

        .footer-social {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: var(--gray-700);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-400);
            text-decoration: none;
            transition: var(--transition);
            font-size: 1.2rem;
        }

        .social-icon:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            color: var(--gray-500);
            font-size: 0.9rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-700);
        }

        /* Loading Animation */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--bg-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .page-loader.active {
            opacity: 1;
            visibility: visible;
        }

        .loader-spinner {
            width: 40px;
            height: 40px;
            border: 3px solid var(--gray-200);
            border-top: 3px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .animate-slide-in {
            animation: slideInRight 0.6s ease-out forwards;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 0 1rem;
            }
            
            .content-wrapper {
                padding: 1.5rem;
                margin-bottom: 1rem;
                border-radius: var(--border-radius);
            }
            
            .navbar-brand {
                font-size: 1.25rem;
            }
            
            .navbar-brand i {
                font-size: 1.5rem;
                padding: 0.4rem;
            }
            
            main {
                padding: 1.5rem 0;
            }
            
            .footer-links {
                flex-wrap: wrap;
                gap: 1rem;
            }
            
            .footer-social {
                gap: 0.75rem;
            }
            
            .social-icon {
                width: 35px;
                height: 35px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            .content-wrapper {
                padding: 1rem;
            }
            
            .navbar-brand {
                font-size: 1.1rem;
            }
            
            footer {
                padding: 2rem 0 1.5rem;
            }
            
            .footer-brand {
                font-size: 1.25rem;
            }
        }

        /* Enhanced Utilities */
        .text-gradient-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .bg-gradient-soft {
            background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 100%);
        }

        .border-gradient {
            border: 2px solid transparent;
            background: linear-gradient(var(--bg-primary), var(--bg-primary)) padding-box,
                       linear-gradient(135deg, var(--primary), var(--secondary)) border-box;
        }

        /* Enhanced shadows for cards */
        .shadow-elegant {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08), 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .shadow-elegant:hover {
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12), 0 8px 20px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>
<body>
    <!-- Page Loader -->
    <div class="page-loader" id="pageLoader">
        <div class="loader-spinner"></div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container nav-container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-egg-fill"></i>
                <span class="brand-text">Cuniculture Pro</span>
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <div class="dashboard-container">
            <div class="content-wrapper animate-fade-in">
                @yield('content')
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <i class="bi bi-egg-fill"></i>
                    Cuniculture Pro
                </div>
                
                <p class="footer-text">
                    Solution professionnelle pour la gestion moderne d'élevage de lapins
                </p>
                
                <div class="footer-links">
                    <a href="#" class="footer-link">Accueil</a>
                    <a href="#" class="footer-link">Documentation</a>
                    <a href="#" class="footer-link">Support</a>
                    <a href="#" class="footer-link">Contact</a>
                </div>
                
                <div class="footer-social">
                    <a href="#" class="social-icon" title="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="social-icon" title="Twitter">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="social-icon" title="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="#" class="social-icon" title="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
                
                <div class="copyright">
                    &copy; {{ date('Y') }} Cuniculture Pro - Tous droits réservés. 
                    Développé avec ❤️ pour les éleveurs professionnels.
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Page Loading Animation
        document.addEventListener('DOMContentLoaded', function() {
            const loader = document.getElementById('pageLoader');
            
            // Simulate loading time
            setTimeout(() => {
                loader.classList.remove('active');
            }, 500);
            
            // Add smooth scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
            
            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);
            
            // Observe animated elements
            document.querySelectorAll('.animate-fade-in, .animate-slide-in').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'all 0.6s ease-out';
                observer.observe(el);
            });
        });
        
        // Enhanced navbar scroll effect
        let lastScrollY = window.scrollY;
        
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.backdropFilter = 'blur(20px)';
            } else {
                navbar.style.background = 'var(--bg-primary)';
                navbar.style.backdropFilter = 'blur(20px)';
            }
            
            lastScrollY = window.scrollY;
        });
        
        // Add ripple effect to clickable elements
        function createRipple(event) {
            const button = event.currentTarget;
            const circle = document.createElement('span');
            const diameter = Math.max(button.clientWidth, button.clientHeight);
            const radius = diameter / 2;
            
            circle.style.width = circle.style.height = `${diameter}px`;
            circle.style.left = `${event.clientX - button.offsetLeft - radius}px`;
            circle.style.top = `${event.clientY - button.offsetTop - radius}px`;
            circle.classList.add('ripple');
            
            const ripple = button.getElementsByClassName('ripple')[0];
            if (ripple) {
                ripple.remove();
            }
            
            button.appendChild(circle);
        }
        
        // Add ripple styles
        const style = document.createElement('style');
        style.textContent = `
            .ripple {
                position: absolute;
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                background-color: rgba(99, 102, 241, 0.3);
                pointer-events: none;
            }
            
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
        
        // Apply ripple to buttons
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('button, .btn, .navbar-brand').forEach(button => {
                button.addEventListener('click', createRipple);
                button.style.position = 'relative';
                button.style.overflow = 'hidden';
            });
        });
    </script>
</body>
</html>