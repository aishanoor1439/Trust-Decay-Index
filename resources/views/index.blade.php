<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="theme-color" content="#6366f1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    
    <!-- Primary Meta Tags -->
    <title>Quantify Enterprise • Trust Intelligence Platform</title>
    <meta name="title" content="Quantify - Pakistan's #1 Trust Intelligence Platform">
    <meta name="description" content="Real-time trust scores for ride-hailing services. Anonymous, verified, unbiased. Trust, quantified.">
    
    <!-- Fonts & Icons -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* ========== ENTERPRISE DESIGN SYSTEM ========== */
        :root {
            --primary: #6366f1;
            --primary-dark: #4f52e0;
            --primary-light: #8183f5;
            --secondary: #8b5cf6;
            --accent: #ec4899;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #0a0a0f;
            --dark-card: rgba(15, 15, 25, 0.95);
            --border-glow: rgba(99, 102, 241, 0.4);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: radial-gradient(circle at 20% 30%, #0f0f1a, #0a0a0f);
            color: white;
            overflow-x: hidden;
            width: 100%;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* ===== PROFESSIONAL RESPONSIVE CONTAINER ===== */
        .container-fluid {
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        @media (min-width: 640px) { .container-fluid { padding: 0 1.5rem; } }
        @media (min-width: 768px) { .container-fluid { padding: 0 2rem; } }
        @media (min-width: 1024px) { .container-fluid { padding: 0 2.5rem; } }
        @media (min-width: 1280px) { .container-fluid { padding: 0 3rem; } }

        /* ===== ENTERPRISE GLASS MORPHISM ===== */
        .glass-enterprise {
            background: linear-gradient(145deg, rgba(20, 25, 40, 0.8), rgba(10, 12, 20, 0.95));
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.03);
            border-bottom: 1px solid rgba(99, 102, 241, 0.2);
            box-shadow: 0 25px 40px -15px rgba(0, 0, 0, 0.5);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .glass-enterprise:hover {
            border-color: rgba(99, 102, 241, 0.3);
            background: linear-gradient(145deg, rgba(25, 30, 45, 0.85), rgba(15, 17, 25, 0.98));
            transform: translateY(-2px);
            box-shadow: 0 30px 50px -15px rgba(99, 102, 241, 0.2);
        }

        /* ===== RESPONSIVE GRID SYSTEM ===== */
        .grid-dashboard {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 768px) { .grid-dashboard { grid-template-columns: repeat(2, 1fr); } }
        @media (min-width: 1024px) { .grid-dashboard { grid-template-columns: 2fr 1fr; } }

        .grid-services {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 1024px) { .grid-services { grid-template-columns: repeat(2, 1fr); } }

        /* ===== RESPONSIVE TYPOGRAPHY ===== */
        .h1-hero { font-size: 2.5rem; line-height: 1.2; font-weight: 800; letter-spacing: -0.02em; }
        .h2-section { font-size: 1.5rem; font-weight: 700; }
        .h3-card { font-size: 1.25rem; font-weight: 600; }
        
        @media (min-width: 640px) { .h1-hero { font-size: 3rem; } }
        @media (min-width: 768px) { .h1-hero { font-size: 3.5rem; } .h2-section { font-size: 1.75rem; } }
        @media (min-width: 1024px) { .h1-hero { font-size: 4rem; } .h2-section { font-size: 2rem; } }
        @media (min-width: 1280px) { .h1-hero { font-size: 4.5rem; } }

        /* ===== PROFESSIONAL SCROLLBAR ===== */
        .scrollbar-pro::-webkit-scrollbar { width: 5px; height: 5px; }
        .scrollbar-pro::-webkit-scrollbar-track { background: rgba(255, 255, 255, 0.03); border-radius: 10px; }
        .scrollbar-pro::-webkit-scrollbar-thumb { 
            background: linear-gradient(180deg, var(--primary), var(--secondary)); 
            border-radius: 10px; 
        }

        /* ===== ENTERPRISE ANIMATIONS ===== */
        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-enter {
            animation: fadeSlideUp 0.5s cubic-bezier(0.23, 1, 0.32, 1) forwards;
        }

        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.4); }
            50% { box-shadow: 0 0 0 8px rgba(99, 102, 241, 0); }
        }

        .pulse-primary {
            animation: pulseGlow 2s infinite;
        }

        /* ===== RESPONSIVE CHATBOT ===== */
        #chatbotContainer {
            width: calc(100% - 2rem);
            max-width: 420px;
            height: min(650px, 85vh);
            right: 1rem;
            bottom: 6rem;
            transition: all 0.3s ease;
        }

        @media (min-width: 640px) { #chatbotContainer { right: 1.5rem; width: 400px; } }
        @media (min-width: 1024px) { #chatbotContainer { right: 2rem; width: 420px; } }

        /* ===== MOBILE OPTIMIZATIONS ===== */
        @media (max-width: 640px) {
            .hide-mobile { display: none; }
            .show-mobile { display: flex; }
            .touch-target { min-height: 48px; min-width: 48px; }
            .font-mobile-sm { font-size: 0.875rem; }
        }

        /* ===== LOADING SKELETON ===== */
        .skeleton {
            background: linear-gradient(90deg, rgba(255,255,255,0.03) 25%, rgba(255,255,255,0.08) 50%, rgba(255,255,255,0.03) 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }

        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>
</head>
<body class="antialiased overflow-x-hidden">

    <!-- ===== PROFESSIONAL HEADER ===== -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-enterprise border-b border-white/5 safe-top">
        <div class="container-fluid py-3 md:py-4">
            <div class="flex items-center justify-between">
                
                <!-- Enterprise Logo -->
                <div class="flex items-center space-x-2 md:space-x-3">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-[#6366f1] via-[#8b5cf6] to-[#ec4899] rounded-xl md:rounded-2xl flex items-center justify-center shadow-2xl flex-shrink-0 pulse-primary">
                        <span class="text-white font-black text-xl md:text-2xl">Q</span>
                    </div>
                    <div>
                        <div class="flex items-center">
                            <span class="font-black text-xl md:text-2xl lg:text-3xl tracking-tight bg-gradient-to-r from-white to-white/90 bg-clip-text text-transparent">Quantify</span>
                            <span class="hidden xs:inline ml-2 text-[8px] md:text-[10px] lg:text-xs bg-white/10 px-2 md:px-3 py-1 rounded-full text-white/90 border border-white/20 uppercase tracking-wider">Trust Intelligence™</span>
                        </div>
                        <p class="text-[10px] md:text-xs text-white/40 mt-0.5 hidden sm:block">Pakistan's #1 Trust Platform</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-1 bg-white/5 p-1 rounded-2xl backdrop-blur border border-white/5">
                    <button class="module-btn px-5 py-2.5 rounded-xl text-sm font-bold bg-gradient-to-r from-[#6366f1] to-[#8b5cf6] text-white shadow-lg flex items-center space-x-2">
                        <i class="fas fa-car"></i>
                        <span>Carpool</span>
                        <span class="bg-white/30 px-1.5 py-0.5 rounded-full text-[10px]">LIVE</span>
                    </button>
                    <button class="module-btn px-5 py-2.5 rounded-xl text-sm font-medium text-white/50 hover:text-white transition-all flex items-center space-x-2" disabled>
                        <i class="fas fa-shopping-cart"></i>
                        <span>E-Commerce</span>
                        <span class="bg-white/10 px-1.5 py-0.5 rounded-full text-[9px] uppercase">Q2 2024</span>
                    </button>
                    <button class="module-btn px-5 py-2.5 rounded-xl text-sm font-medium text-white/50 hover:text-white transition-all flex items-center space-x-2" disabled>
                        <i class="fas fa-university"></i>
                        <span>Institutions</span>
                        <span class="bg-white/10 px-1.5 py-0.5 rounded-full text-[9px] uppercase">Q3 2024</span>
                    </button>
                    <button class="module-btn px-5 py-2.5 rounded-xl text-sm font-medium text-white/50 hover:text-white transition-all flex items-center space-x-2" disabled>
                        <i class="fas fa-coins"></i>
                        <span>Financial</span>
                        <span class="bg-white/10 px-1.5 py-0.5 rounded-full text-[9px] uppercase">Q4 2024</span>
                    </button>
                </nav>

                <!-- Tablet Navigation -->
                <nav class="hidden md:flex lg:hidden items-center space-x-1 bg-white/5 p-1 rounded-xl">
                    <button class="module-btn px-3 py-2 rounded-lg text-xs font-bold bg-gradient-to-r from-[#6366f1] to-[#8b5cf6] text-white">🚗</button>
                    <button class="module-btn px-3 py-2 rounded-lg text-xs text-white/50">🛒<span class="ml-1 text-[8px]">Beta</span></button>
                    <button class="module-btn px-3 py-2 rounded-lg text-xs text-white/50">🏛️</button>
                    <button class="module-btn px-3 py-2 rounded-lg text-xs text-white/50">💳</button>
                </nav>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="md:hidden w-10 h-10 bg-white/5 rounded-xl flex items-center justify-center border border-white/10 touch-target">
                    <i class="fas fa-bars text-white text-lg"></i>
                </button>

                <!-- Status Badge -->
                <div class="hidden md:flex items-center">
                    <div class="text-xs font-bold text-[#6366f1] bg-[#6366f1]/10 px-4 py-2 rounded-full border border-[#6366f1]/30">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse inline-block"></span>
                        <span>CARPOOL • PRODUCTION</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu Dropdown -->
    <div id="mobileMenu" class="fixed top-20 left-4 right-4 z-40 glass-enterprise rounded-2xl border border-white/10 hidden flex-col p-2 animate-enter">
        <button class="w-full px-4 py-4 bg-gradient-to-r from-[#6366f1] to-[#8b5cf6] rounded-xl text-white font-bold flex items-center space-x-3 mb-2">
            <i class="fas fa-car w-5"></i>
            <span>Carpool Module • Live Now</span>
            <span class="ml-auto bg-white/30 px-2 py-1 rounded-full text-[10px]">ACTIVE</span>
        </button>
        <button class="w-full px-4 py-4 bg-white/5 rounded-xl text-white/80 font-medium flex items-center space-x-3 mb-2" disabled>
            <i class="fas fa-shopping-cart w-5"></i>
            <span>E-Commerce • Coming Q2 2024</span>
            <span class="ml-auto text-[10px] bg-white/10 px-2 py-1 rounded-full">BETA</span>
        </button>
        <button class="w-full px-4 py-4 bg-white/5 rounded-xl text-white/80 font-medium flex items-center space-x-3 mb-2" disabled>
            <i class="fas fa-university w-5"></i>
            <span>Institutions • Coming Q3 2024</span>
        </button>
        <button class="w-full px-4 py-4 bg-white/5 rounded-xl text-white/80 font-medium flex items-center space-x-3" disabled>
            <i class="fas fa-coins w-5"></i>
            <span>Financial • Coming Q4 2024</span>
        </button>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="relative z-10 pt-28 md:pt-32 lg:pt-36 pb-12 md:pb-16">
        <div class="container-fluid">

            <!-- ===== HERO SECTION ===== -->
            <div class="text-center mb-10 md:mb-16 animate-enter">
                <div class="inline-flex items-center space-x-2 bg-white/5 backdrop-blur px-4 py-2 rounded-full mb-6 border border-white/10">
                    <span class="w-2.5 h-2.5 bg-gradient-to-r from-[#6366f1] to-[#8b5cf6] rounded-full animate-pulse"></span>
                    <span class="text-xs md:text-sm font-semibold text-white/90 uppercase tracking-wider">Phase 1: Carpool Module • Live Now</span>
                </div>
                
                <h1 class="h1-hero mb-4 md:mb-6 px-2">
                    <span class="bg-gradient-to-r from-white via-white to-white/80 bg-clip-text text-transparent">Trust,</span>
                    <br class="sm:hidden">
                    <span class="bg-gradient-to-r from-[#6366f1] via-[#8b5cf6] to-[#ec4899] bg-clip-text text-transparent"> Quantified.</span>
                </h1>
                
                <p class="text-sm md:text-base lg:text-lg xl:text-xl text-white/60 max-w-3xl mx-auto font-light leading-relaxed px-4">
                    Real-time trust intelligence for Pakistan's ride-hailing ecosystem.
                    <span class="block mt-3 text-white/80 font-medium">One standard. Every service. Unbiased. Anonymous. Verifiable.</span>
                </p>

                <!-- Trust Badges -->
                <div class="flex flex-wrap items-center justify-center gap-3 mt-8">
                    <div class="flex items-center space-x-2 bg-white/5 px-4 py-2 rounded-full backdrop-blur border border-white/5">
                        <i class="fas fa-check-circle text-[#10b981] text-sm"></i>
                        <span class="text-xs md:text-sm font-medium">6,444+ Verified Ratings</span>
                    </div>
                    <div class="flex items-center space-x-2 bg-white/5 px-4 py-2 rounded-full backdrop-blur border border-white/5">
                        <i class="fas fa-shield-alt text-[#6366f1] text-sm"></i>
                        <span class="text-xs md:text-sm font-medium">100% Anonymous</span>
                    </div>
                    <div class="flex items-center space-x-2 bg-white/5 px-4 py-2 rounded-full backdrop-blur border border-white/5">
                        <i class="fas fa-bolt text-[#f59e0b] text-sm"></i>
                        <span class="text-xs md:text-sm font-medium">Real-time AI</span>
                    </div>
                </div>
            </div>

            <!-- ===== DASHBOARD GRID ===== -->
            <div class="grid-dashboard gap-6 md:gap-8 mb-8 md:mb-12">

                <!-- LIVE TRUST SCORES CARD -->
                <div class="glass-enterprise rounded-2xl md:rounded-3xl p-5 md:p-6 lg:p-8">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-[#6366f1]/20 to-[#8b5cf6]/20 rounded-xl md:rounded-2xl flex items-center justify-center">
                                <i class="fas fa-chart-line text-[#6366f1] text-lg md:text-xl"></i>
                            </div>
                            <h2 class="h2-section">Live Trust Scores</h2>
                        </div>
                        <div class="flex items-center space-x-2 bg-black/40 px-3 py-1.5 rounded-full border border-white/5 self-start sm:self-auto">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                            <span class="text-xs text-white/80 font-medium">Synchronized</span>
                        </div>
                    </div>

                    <!-- Services Container -->
                    <div id="services-container" class="space-y-3"></div>

                    <!-- Footer -->
                    <div class="mt-6 flex flex-col xs:flex-row justify-between items-start xs:items-center gap-2">
                        <div class="flex items-center space-x-2 text-[10px] md:text-xs text-white/40">
                            <i class="fas fa-sync-alt"></i>
                            <span id="last-updated">Updating live...</span>
                        </div>
                        <span class="text-[9px] md:text-xs font-mono bg-white/5 px-3 py-1.5 rounded-full border border-white/5">
                            <i class="fas fa-microchip mr-1 text-[#6366f1]"></i> Quantify Neural v2.5.0
                        </span>
                    </div>
                </div>

                <!-- INTELLIGENCE METRICS CARD -->
                <div class="glass-enterprise rounded-2xl md:rounded-3xl p-5 md:p-6 lg:p-8">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-[#f59e0b]/20 to-[#f97316]/20 rounded-xl md:rounded-2xl flex items-center justify-center">
                            <i class="fas fa-database text-[#f59e0b] text-lg md:text-xl"></i>
                        </div>
                        <h3 class="h2-section">Platform Intelligence</h3>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-2 gap-3 md:gap-4">
                        <div class="bg-white/5 rounded-xl p-4 backdrop-blur border border-white/5">
                            <span class="text-white/40 text-[10px] md:text-xs uppercase tracking-wider">Total Ratings</span>
                            <div class="text-2xl md:text-3xl lg:text-4xl font-bold text-white" id="total-feedback">0</div>
                            <div class="w-full bg-white/10 h-1.5 rounded-full mt-3 overflow-hidden">
                                <div class="bg-gradient-to-r from-[#6366f1] to-[#8b5cf6] h-1.5 rounded-full" style="width: 78%"></div>
                            </div>
                        </div>
                        
                        <div class="bg-white/5 rounded-xl p-4 backdrop-blur border border-white/5">
                            <span class="text-white/40 text-[10px] md:text-xs uppercase tracking-wider">Average Trust</span>
                            <div class="text-2xl md:text-3xl lg:text-4xl font-bold bg-gradient-to-r from-white to-white/80 bg-clip-text text-transparent" id="avg-score">0.0</div>
                            <div class="mt-2 flex items-center text-[#10b981] text-[10px] md:text-xs">
                                <i class="fas fa-arrow-up mr-1"></i> +2.3% vs Q1
                            </div>
                        </div>
                        
                        <div class="bg-white/5 rounded-xl p-4 backdrop-blur border border-white/5">
                            <span class="text-white/40 text-[10px] md:text-xs uppercase tracking-wider">Market Leader</span>
                            <div class="text-xl md:text-2xl font-bold text-[#10b981]" id="highest-score">0.0</div>
                            <span class="text-white/60 text-xs" id="highest-name">Uber</span>
                        </div>
                        
                        <div class="bg-white/5 rounded-xl p-4 backdrop-blur border border-white/5">
                            <span class="text-white/40 text-[10px] md:text-xs uppercase tracking-wider">Daily Activity</span>
                            <div class="text-xl md:text-2xl font-bold text-[#f59e0b]">47</div>
                            <span class="text-white/60 text-xs">avg ratings</span>
                        </div>
                    </div>

                    <!-- Roadmap Preview -->
                    <div class="mt-6 pt-6 border-t border-white/10">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-xs md:text-sm font-semibold uppercase tracking-wider text-white/50 flex items-center">
                                <i class="fas fa-calendar-alt mr-2 text-[#6366f1]"></i> Expansion Roadmap
                            </h4>
                            <span class="text-[9px] md:text-xs bg-[#6366f1]/20 px-2 py-1 rounded-full text-[#6366f1] border border-[#6366f1]/30">
                                4 Modules
                            </span>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                            <div class="bg-white/5 rounded-lg p-2 md:p-3">
                                <span class="text-[10px] md:text-xs font-medium block">🛒 E‑Commerce</span>
                                <span class="text-[8px] md:text-[10px] text-white/40">Q2 2024</span>
                            </div>
                            <div class="bg-white/5 rounded-lg p-2 md:p-3">
                                <span class="text-[10px] md:text-xs font-medium block">🏛️ Institutions</span>
                                <span class="text-[8px] md:text-[10px] text-white/40">Q3 2024</span>
                            </div>
                            <div class="bg-white/5 rounded-lg p-2 md:p-3">
                                <span class="text-[10px] md:text-xs font-medium block">💳 Financial</span>
                                <span class="text-[8px] md:text-[10px] text-white/40">Q4 2024</span>
                            </div>
                            <div class="bg-white/5 rounded-lg p-2 md:p-3">
                                <span class="text-[10px] md:text-xs font-medium block">🌍 Global</span>
                                <span class="text-[8px] md:text-[10px] text-white/40">2025</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== FEEDBACK & ANALYTICS GRID ===== -->
            <div class="grid md:grid-cols-2 gap-6 md:gap-8">

                <!-- RATING FORM -->
                <div class="glass-enterprise rounded-2xl md:rounded-3xl p-5 md:p-6 lg:p-8">
                    <div class="flex items-start space-x-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#6366f1]/30 to-[#8b5cf6]/30 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-star text-[#6366f1] text-xl"></i>
                        </div>
                        <div>
                            <h3 class="h2-section">Rate Your Experience</h3>
                            <p class="text-xs md:text-sm text-white/50">Your feedback builds trust for 10,000+ riders</p>
                        </div>
                    </div>

                    <form id="feedbackForm" class="space-y-5">
                        <!-- Service Select -->
                        <div class="bg-white/5 rounded-xl p-4 backdrop-blur border border-white/5">
                            <label class="block text-xs md:text-sm font-semibold text-white/80 mb-3">
                                <i class="fas fa-taxi mr-2 text-[#6366f1]"></i>Select Service
                            </label>
                            <select id="serviceSelect" class="w-full bg-black/40 border border-white/10 rounded-lg px-4 py-3.5 text-sm md:text-base text-white focus:border-[#6366f1] focus:ring-2 focus:ring-[#6366f1]/30 outline-none">
                                <option value="" class="bg-[#0a0a0f]">✨ Select a service to rate...</option>
                            </select>
                            
                            <div id="serviceInfo" class="hidden mt-4 p-4 bg-gradient-to-r from-[#6366f1]/10 to-[#8b5cf6]/10 rounded-lg border border-[#6366f1]/30">
                                <div class="flex justify-between items-center">
                                    <span class="text-white/70 text-xs md:text-sm">Current Trust:</span>
                                    <span id="currentScore" class="font-bold text-white"></span>
                                </div>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-white/70 text-xs md:text-sm">Total Ratings:</span>
                                    <span id="feedbackCount" class="font-bold text-white"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Sliders -->
                        <div class="space-y-4">
                            <div class="bg-white/5 rounded-xl p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <label class="text-xs md:text-sm font-semibold text-white/90">
                                        <i class="fas fa-user-tie mr-2 text-[#6366f1]"></i>Driver Behavior
                                    </label>
                                    <span id="behaviorValue" class="bg-[#6366f1]/20 px-3 py-1 rounded-full text-[#6366f1] font-bold text-xs">5/10</span>
                                </div>
                                <input type="range" id="behaviorScore" min="1" max="10" value="5" class="w-full h-2 bg-white/10 rounded-lg appearance-none cursor-pointer accent-[#6366f1]">
                                <div class="flex justify-between text-[8px] md:text-xs text-white/40 mt-1">
                                    <span>Poor</span>
                                    <span>Excellent</span>
                                </div>
                            </div>

                            <div class="bg-white/5 rounded-xl p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <label class="text-xs md:text-sm font-semibold text-white/90">
                                        <i class="fas fa-clock mr-2 text-[#f59e0b]"></i>Wait Time
                                    </label>
                                    <span id="delayValue" class="bg-[#f59e0b]/20 px-3 py-1 rounded-full text-[#f59e0b] font-bold text-xs">5/10</span>
                                </div>
                                <input type="range" id="delayScore" min="1" max="10" value="5" class="w-full h-2 bg-white/10 rounded-lg appearance-none cursor-pointer accent-[#f59e0b]">
                                <div class="flex justify-between text-[8px] md:text-xs text-white/40 mt-1">
                                    <span>Very Slow</span>
                                    <span>Very Fast</span>
                                </div>
                            </div>

                            <div class="bg-white/5 rounded-xl p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <label class="text-xs md:text-sm font-semibold text-white/90">
                                        <i class="fas fa-hand-holding-usd mr-2 text-[#10b981]"></i>Fare Transparency
                                    </label>
                                    <span id="transparencyValue" class="bg-[#10b981]/20 px-3 py-1 rounded-full text-[#10b981] font-bold text-xs">5/10</span>
                                </div>
                                <input type="range" id="transparencyScore" min="1" max="10" value="5" class="w-full h-2 bg-white/10 rounded-lg appearance-none cursor-pointer accent-[#10b981]">
                                <div class="flex justify-between text-[8px] md:text-xs text-white/40 mt-1">
                                    <span>Hidden Fees</span>
                                    <span>Clear Pricing</span>
                                </div>
                            </div>
                        </div>

                        <!-- Impact Preview -->
                        <div class="bg-gradient-to-r from-[#6366f1]/10 to-[#8b5cf6]/10 rounded-xl p-5 border border-[#6366f1]/30">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-xs md:text-sm font-semibold text-white/90">
                                    <i class="fas fa-chart-simple mr-2"></i>Trust Impact Preview
                                </span>
                                <span id="scorePreview" class="text-2xl md:text-3xl font-black bg-gradient-to-r from-[#6366f1] to-[#8b5cf6] bg-clip-text text-transparent">50</span>
                            </div>
                            <div class="score-bar h-2.5 bg-white/10 rounded-full overflow-hidden">
                                <div id="previewBar" class="score-fill h-full rounded-full bg-gradient-to-r from-[#6366f1] to-[#8b5cf6]" style="width: 50%"></div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="w-full bg-gradient-to-r from-[#6366f1] via-[#8b5cf6] to-[#ec4899] text-white font-bold py-4 px-4 rounded-xl hover:opacity-90 transition-all duration-300 disabled:opacity-50 text-sm md:text-base flex items-center justify-center space-x-3">
                            <span id="submitText"><i class="fas fa-paper-plane mr-2"></i>Submit Anonymous Rating</span>
                            <span id="submitLoading" class="hidden"><i class="fas fa-spinner fa-spin mr-2"></i>Processing...</span>
                        </button>

                        <p class="text-[9px] md:text-xs text-center text-white/30 flex items-center justify-center space-x-2">
                            <i class="fas fa-shield-alt"></i>
                            <span>No personal data • Rate limited • 100% anonymous</span>
                        </p>
                    </form>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="space-y-6 md:space-y-8">

                    <!-- Trust Chart -->
                    <div class="glass-enterprise rounded-2xl md:rounded-3xl p-5 md:p-6 lg:p-8">
                        <div class="flex flex-col xs:flex-row xs:items-center justify-between gap-3 mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-[#f59e0b]/20 to-[#f97316]/20 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-chart-pie text-[#f59e0b] text-lg"></i>
                                </div>
                                <h3 class="h2-section">Trust Distribution</h3>
                            </div>
                            <span class="text-[9px] md:text-xs bg-white/5 px-3 py-1.5 rounded-full border border-white/5 self-start xs:self-auto">
                                <i class="fas fa-circle text-[#10b981] mr-1 text-[6px]"></i> Live
                            </span>
                        </div>
                        <div class="relative w-full h-[200px] md:h-[220px]">
                            <canvas id="trustChart" class="w-full h-full"></canvas>
                        </div>
                    </div>

                    <!-- Live Activity -->
                    <div class="glass-enterprise rounded-2xl md:rounded-3xl p-5 md:p-6 lg:p-8">
                        <div class="flex flex-col xs:flex-row xs:items-center justify-between gap-3 mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-[#ec4899]/20 to-[#d946ef]/20 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-bolt text-[#ec4899] text-lg"></i>
                                </div>
                                <h3 class="h2-section">Live Activity</h3>
                            </div>
                            <span class="flex items-center space-x-1 text-[9px] md:text-xs bg-white/5 px-3 py-1.5 rounded-full border border-white/5 self-start xs:self-auto">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                <span>Real-time feed</span>
                            </span>
                        </div>
                        
                        <div id="recentActivity" class="space-y-3 max-h-[240px] overflow-y-auto scrollbar-pro pr-2">
                            <div class="flex items-center space-x-3 p-3 bg-white/5 rounded-lg border border-white/5">
                                <div class="w-2 h-2 bg-[#6366f1] rounded-full animate-pulse"></div>
                                <div class="text-xs md:text-sm flex-1 text-white/90">🚀 Quantify Neural initialized</div>
                                <div class="text-[9px] md:text-xs text-white/30">now</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- ===== ENTERPRISE AI CHATBOT ===== -->
    
    <!-- Chatbot Toggle -->
    <button id="chatbotToggle" class="fixed bottom-5 md:bottom-6 right-5 md:right-6 w-14 h-14 md:w-16 md:h-16 bg-gradient-to-r from-[#6366f1] via-[#8b5cf6] to-[#ec4899] rounded-2xl shadow-2xl flex items-center justify-center z-50 hover:scale-110 transition-all duration-300 pulse-primary">
        <i id="chatIcon" class="fas fa-robot text-white text-xl md:text-2xl"></i>
        <i id="closeIcon" class="fas fa-times text-white text-xl md:text-2xl hidden"></i>
        <span class="absolute -top-1 -right-1 w-4 h-4 bg-green-500 border-2 border-[#0a0a0f] rounded-full animate-pulse"></span>
    </button>

    <!-- Chatbot Container -->
    <div id="chatbotContainer" class="fixed bottom-24 right-5 md:right-6 glass-enterprise rounded-2xl md:rounded-3xl border border-white/10 flex flex-col overflow-hidden z-50 hidden animate-enter shadow-2xl">
        
        <!-- Header -->
        <div class="bg-gradient-to-r from-[#6366f1] via-[#8b5cf6] to-[#ec4899] p-4 md:p-5 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white/20 backdrop-blur-xl rounded-xl flex items-center justify-center border border-white/30">
                    <i class="fas fa-brain text-white text-lg"></i>
                </div>
                <div>
                    <div class="flex items-center space-x-2">
                        <h3 class="font-bold text-white text-sm md:text-base">Quantify Neural</h3>
                        <span class="text-[8px] md:text-[10px] bg-white/30 px-2 py-1 rounded-full text-white font-bold">AI 2.0</span>
                    </div>
                    <p class="text-[9px] md:text-xs text-white/80 flex items-center mt-0.5">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5 animate-pulse"></span>
                        70+ domains • Real-time
                    </p>
                </div>
            </div>
            <button id="clearChat" class="p-2 hover:bg-white/20 rounded-lg transition-all">
                <i class="fas fa-trash-alt text-white/80 text-xs md:text-sm"></i>
            </button>
        </div>

        <!-- Messages -->
        <div id="chatMessages" class="flex-1 overflow-y-auto p-4 space-y-4 scrollbar-pro"></div>

        <!-- Quick Prompts -->
        <div class="px-4 pb-2">
            <div class="flex items-center justify-between mb-2">
                <span class="text-[9px] md:text-xs text-white/40 uppercase tracking-wider font-semibold">
                    <i class="fas fa-bolt mr-1 text-[#6366f1]"></i> INTELLIGENT PROMPTS
                </span>
                <span class="text-[8px] md:text-[10px] bg-white/5 px-2 py-1 rounded-full text-white/50">70+ commands</span>
            </div>
            <div class="flex items-center space-x-2 overflow-x-auto pb-2 scrollbar-pro">
                <button onclick="chatbot.setSuggestedQuestion('🚗 What is Indrive current trust score and analysis?')" class="text-[9px] md:text-xs bg-white/5 hover:bg-[#6366f1]/20 px-3 py-2 rounded-full text-white/80 hover:text-white whitespace-nowrap border border-white/10 hover:border-[#6366f1]/50 flex items-center">
                    <i class="fas fa-car mr-1 text-[#6366f1]"></i> Indrive
                </button>
                <button onclick="chatbot.setSuggestedQuestion('🏆 Which service has the highest trust score?')" class="text-[9px] md:text-xs bg-white/5 hover:bg-[#6366f1]/20 px-3 py-2 rounded-full text-white/80 hover:text-white whitespace-nowrap border border-white/10 hover:border-[#6366f1]/50 flex items-center">
                    <i class="fas fa-trophy mr-1 text-[#f59e0b]"></i> Top Performer
                </button>
                <button onclick="chatbot.setSuggestedQuestion('📊 Compare all ride-hailing services')" class="text-[9px] md:text-xs bg-white/5 hover:bg-[#6366f1]/20 px-3 py-2 rounded-full text-white/80 hover:text-white whitespace-nowrap border border-white/10 hover:border-[#6366f1]/50 flex items-center">
                    <i class="fas fa-scale-balanced mr-1 text-[#10b981]"></i> Compare All
                </button>
                <button onclick="chatbot.setSuggestedQuestion('🧮 How is trust score calculated?')" class="text-[9px] md:text-xs bg-white/5 hover:bg-[#6366f1]/20 px-3 py-2 rounded-full text-white/80 hover:text-white whitespace-nowrap border border-white/10 hover:border-[#6366f1]/50 flex items-center">
                    <i class="fas fa-calculator mr-1 text-[#8b5cf6]"></i> Algorithm
                </button>
                <button onclick="chatbot.setSuggestedQuestion('🔮 Complete product roadmap 2024-2025')" class="text-[9px] md:text-xs bg-white/5 hover:bg-[#6366f1]/20 px-3 py-2 rounded-full text-white/80 hover:text-white whitespace-nowrap border border-white/10 hover:border-[#6366f1]/50 flex items-center">
                    <i class="fas fa-road mr-1 text-[#ec4899]"></i> Roadmap
                </button>
                <button onclick="chatbot.setSuggestedQuestion('🔒 How does Quantify protect privacy?')" class="text-[9px] md:text-xs bg-white/5 hover:bg-[#6366f1]/20 px-3 py-2 rounded-full text-white/80 hover:text-white whitespace-nowrap border border-white/10 hover:border-[#6366f1]/50 flex items-center">
                    <i class="fas fa-shield mr-1 text-[#6366f1]"></i> Privacy
                </button>
            </div>
        </div>

        <!-- Input -->
        <div class="p-4 border-t border-white/10">
            <form id="chatbotForm" onsubmit="event.preventDefault(); chatbot.sendMessage();" class="flex items-center space-x-2">
                <div class="flex-1 relative">
                    <textarea 
                        id="chatbotInput"
                        rows="1"
                        class="w-full bg-white/5 backdrop-blur border border-white/10 rounded-xl px-4 py-3.5 text-white placeholder-white/30 focus:outline-none focus:border-[#6366f1] focus:ring-2 focus:ring-[#6366f1]/30 transition-all resize-none text-xs md:text-sm scrollbar-pro"
                        placeholder="Ask Quantify Neural anything..."
                    ></textarea>
                </div>
                <button type="submit" id="chatbotSendBtn" class="w-12 h-12 bg-gradient-to-r from-[#6366f1] to-[#8b5cf6] rounded-xl flex items-center justify-center hover:opacity-90 transition-all disabled:opacity-50 flex-shrink-0">
                    <i class="fas fa-paper-plane text-white"></i>
                </button>
            </form>
            <p class="text-[8px] md:text-[10px] text-white/20 mt-3 text-center">
                <i class="fas fa-microchip mr-1"></i> Quantify Neural AI • 70+ domains • Real-time intelligence • 24/7
            </p>
        </div>
    </div>

    <!-- ===== ENTERPRISE JAVASCRIPT ===== -->
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Close on click outside
            document.addEventListener('click', (e) => {
                if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });
        }

        // ========== QUANTIFY CORE ENGINE ==========
        class Quantify {
            constructor() {
                this.sessionToken = 'demo-' + Date.now();
                this.currentModule = 'carpool';
                this.chart = null;
                this.services = [];
                this.stats = {};
                this.initialize();
            }

            async initialize() {
                await this.loadServices();
                await this.loadAnalytics();
                this.setupEventListeners();
                this.startLiveUpdates();
                this.addActivity('🚀 Quantify Neural AI initialized');
            }

            async loadServices() {
                const demoData = [
                    { id: 1, name: 'Indrive', trust_score: 76, feedback_count: 1542, trend: '+2.3%', reliability: 'High' },
                    { id: 2, name: 'Uber', trust_score: 82, feedback_count: 2103, trend: '+1.8%', reliability: 'Very High' },
                    { id: 3, name: 'Careem', trust_score: 79, feedback_count: 1876, trend: '+0.5%', reliability: 'High' },
                    { id: 4, name: 'Bykea', trust_score: 68, feedback_count: 923, trend: '-1.2%', reliability: 'Medium' }
                ];
                this.services = demoData;
                this.renderServices(demoData);
                this.updateServiceSelect(demoData);
            }

            renderServices(services) {
                const container = document.getElementById('services-container');
                if (!container) return;
                
                container.innerHTML = '';

                services.forEach(service => {
                    const trendColor = service.trend?.startsWith('+') ? 'text-[#10b981]' : 'text-[#ef4444]';
                    
                    const el = document.createElement('div');
                    el.className = 'flex items-center justify-between p-3 md:p-4 bg-white/5 hover:bg-white/10 rounded-xl transition-all border border-white/5 hover:border-[#6366f1]/40';
                    el.innerHTML = `
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-[#6366f1]/20 to-[#8b5cf6]/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-car text-[#6366f1]"></i>
                            </div>
                            <div>
                                <div class="font-bold text-white text-sm md:text-base">${service.name}</div>
                                <div class="flex items-center space-x-2 mt-0.5">
                                    <span class="text-[10px] md:text-xs text-white/50"><i class="fas fa-star mr-1 text-[#f59e0b]"></i>${service.feedback_count.toLocaleString()}</span>
                                    <span class="text-[10px] md:text-xs ${trendColor}"><i class="fas ${service.trend?.startsWith('+') ? 'fa-arrow-up' : 'fa-arrow-down'} mr-1"></i>${service.trend}</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-xl md:text-2xl font-black ${this.getScoreColor(service.trust_score)}">${service.trust_score}</div>
                            <div class="text-[10px] md:text-xs text-white/50 mt-0.5">${this.getStatusText(service.trust_score)}</div>
                        </div>
                    `;
                    container.appendChild(el);
                });

                const lastUpdated = document.getElementById('last-updated');
                if (lastUpdated) {
                    lastUpdated.innerHTML = `<i class="fas fa-sync-alt mr-1 text-[#6366f1]"></i> Updated ${new Date().toLocaleTimeString()}`;
                }
            }

            updateServiceSelect(services) {
                const select = document.getElementById('serviceSelect');
                if (!select) return;
                
                select.innerHTML = '<option value="">✨ Select a service to rate...</option>';
                
                services.forEach(service => {
                    const option = document.createElement('option');
                    option.value = service.id;
                    option.textContent = `${service.name} • ${service.trust_score}/100 • ${service.feedback_count.toLocaleString()} ratings`;
                    option.dataset.score = service.trust_score;
                    option.dataset.count = service.feedback_count;
                    select.appendChild(option);
                });
            }

            async loadAnalytics() {
                const stats = {
                    total_feedback: 6444,
                    average_trust_score: 76.3,
                    highest_score: { name: 'Uber', trust_score: 82 },
                    lowest_score: { name: 'Bykea', trust_score: 68 }
                };
                this.stats = stats;
                this.updateStats(stats);
                
                const analytics = this.services.map(s => ({
                    name: s.name,
                    trust_score: s.trust_score
                }));
                this.updateChart(analytics);
            }

            updateStats(stats) {
                const totalFeedback = document.getElementById('total-feedback');
                const avgScore = document.getElementById('avg-score');
                const highestScore = document.getElementById('highest-score');
                const highestName = document.getElementById('highest-name');
                
                if (totalFeedback) totalFeedback.textContent = (stats.total_feedback || 0).toLocaleString();
                if (avgScore) avgScore.textContent = stats.average_trust_score?.toFixed(1) || '0.0';
                if (highestScore) highestScore.textContent = stats.highest_score?.trust_score || '0.0';
                if (highestName) highestName.textContent = stats.highest_score?.name || 'Uber';
            }

            updateChart(analytics) {
                const canvas = document.getElementById('trustChart');
                if (!canvas) return;
                
                const ctx = canvas.getContext('2d');
                if (this.chart) this.chart.destroy();

                this.chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: analytics.map(a => a.name),
                        datasets: [{
                            data: analytics.map(a => a.trust_score),
                            backgroundColor: ['#3b82f6', '#10b981', '#8b5cf6', '#f59e0b'],
                            borderWidth: 0,
                            hoverOffset: 10
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        cutout: '70%',
                        plugins: {
                            legend: { 
                                position: 'bottom', 
                                labels: { 
                                    color: '#94a3b8', 
                                    font: { size: window.innerWidth < 768 ? 10 : 12 },
                                    boxWidth: window.innerWidth < 768 ? 8 : 12
                                } 
                            }
                        }
                    }
                });
            }

            setupEventListeners() {
                ['behavior', 'delay', 'transparency'].forEach(type => {
                    const slider = document.getElementById(`${type}Score`);
                    const value = document.getElementById(`${type}Value`);
                    if (slider && value) {
                        slider.addEventListener('input', (e) => {
                            value.textContent = `${e.target.value}/10`;
                            this.updateScorePreview();
                        });
                    }
                });

                const serviceSelect = document.getElementById('serviceSelect');
                if (serviceSelect) {
                    serviceSelect.addEventListener('change', (e) => {
                        const selected = e.target.options[e.target.selectedIndex];
                        const info = document.getElementById('serviceInfo');
                        if (selected.value) {
                            info.classList.remove('hidden');
                            document.getElementById('currentScore').textContent = selected.dataset.score;
                            document.getElementById('feedbackCount').textContent = selected.dataset.count;
                        } else {
                            info.classList.add('hidden');
                        }
                        this.updateScorePreview();
                    });
                }

                const feedbackForm = document.getElementById('feedbackForm');
                if (feedbackForm) {
                    feedbackForm.addEventListener('submit', (e) => {
                        e.preventDefault();
                        this.submitFeedback();
                    });
                }
            }

            updateScorePreview() {
                const behavior = parseInt(document.getElementById('behaviorScore')?.value || 5);
                const delay = parseInt(document.getElementById('delayScore')?.value || 5);
                const transparency = parseInt(document.getElementById('transparencyScore')?.value || 5);
                const preview = Math.round((behavior * 0.4 + delay * 0.35 + transparency * 0.25) * 10);
                
                const scorePreview = document.getElementById('scorePreview');
                const previewBar = document.getElementById('previewBar');
                
                if (scorePreview) scorePreview.textContent = preview;
                if (previewBar) previewBar.style.width = `${preview}%`;
            }

            async submitFeedback() {
                const serviceId = document.getElementById('serviceSelect')?.value;
                if (!serviceId) {
                    alert('Please select a service');
                    return;
                }

                const submitBtn = document.querySelector('#feedbackForm button[type="submit"]');
                const submitText = document.getElementById('submitText');
                const submitLoading = document.getElementById('submitLoading');
                
                submitBtn.disabled = true;
                submitText.classList.add('hidden');
                submitLoading.classList.remove('hidden');

                await new Promise(resolve => setTimeout(resolve, 1000));
                
                this.addActivity('⭐ New rating submitted • +2.3 trust impact');
                
                document.getElementById('behaviorScore').value = 5;
                document.getElementById('delayScore').value = 5;
                document.getElementById('transparencyScore').value = 5;
                document.getElementById('behaviorValue').textContent = '5/10';
                document.getElementById('delayValue').textContent = '5/10';
                document.getElementById('transparencyValue').textContent = '5/10';
                document.getElementById('serviceSelect').value = '';
                document.getElementById('serviceInfo').classList.add('hidden');
                
                this.updateScorePreview();
                
                submitBtn.disabled = false;
                submitText.classList.remove('hidden');
                submitLoading.classList.add('hidden');
            }

            addActivity(message) {
                const container = document.getElementById('recentActivity');
                if (!container) return;
                
                const activity = document.createElement('div');
                activity.className = 'flex items-center space-x-3 p-3 bg-white/5 rounded-lg border border-white/5 animate-enter';
                activity.innerHTML = `
                    <div class="w-2 h-2 bg-gradient-to-r from-[#6366f1] to-[#8b5cf6] rounded-full"></div>
                    <div class="text-xs md:text-sm flex-1 text-white/90">${message}</div>
                    <div class="text-[9px] md:text-xs text-white/30">${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</div>
                `;
                
                container.insertBefore(activity, container.firstChild);
                while (container.children.length > 5) container.removeChild(container.lastChild);
            }

            startLiveUpdates() {
                setInterval(() => {
                    this.loadServices();
                    this.addActivity('🔄 Intelligence sync complete');
                }, 45000);
            }

            getScoreColor(score) {
                if (score >= 80) return 'text-[#10b981]';
                if (score >= 70) return 'text-[#3b82f6]';
                if (score >= 60) return 'text-[#f59e0b]';
                return 'text-[#ef4444]';
            }

            getStatusText(score) {
                if (score >= 80) return 'Excellent';
                if (score >= 70) return 'Good';
                if (score >= 60) return 'Fair';
                return 'Needs Work';
            }
            
            getServiceByName(name) {
                return this.services?.find(s => s.name.toLowerCase().includes(name.toLowerCase()));
            }
            
            getAllServices() { return this.services || []; }
            getStats() { return this.stats || {}; }
        }

        // ========== QUANTIFY CHATBOT ==========
        class QuantifyChatbot {
            constructor(quantifyInstance) {
                this.quantify = quantifyInstance;
                this.isOpen = false;
                this.initialize();
            }

            initialize() {
                const toggleBtn = document.getElementById('chatbotToggle');
                const clearBtn = document.getElementById('clearChat');
                const input = document.getElementById('chatbotInput');

                if (toggleBtn) toggleBtn.addEventListener('click', () => this.toggleChatbot());
                if (clearBtn) clearBtn.addEventListener('click', () => this.clearChat());
                
                if (input) {
                    input.addEventListener('keydown', (e) => {
                        if (e.key === 'Enter' && !e.shiftKey) {
                            e.preventDefault();
                            this.sendMessage();
                        }
                    });
                }
                
                this.addWelcomeMessage();
            }

            toggleChatbot() {
                this.isOpen = !this.isOpen;
                const container = document.getElementById('chatbotContainer');
                const chatIcon = document.getElementById('chatIcon');
                const closeIcon = document.getElementById('closeIcon');
                
                if (container && chatIcon && closeIcon) {
                    container.classList.toggle('hidden');
                    chatIcon.classList.toggle('hidden');
                    closeIcon.classList.toggle('hidden');
                    if (this.isOpen) document.getElementById('chatbotInput')?.focus();
                }
            }

            async sendMessage() {
                const input = document.getElementById('chatbotInput');
                const sendBtn = document.getElementById('chatbotSendBtn');
                
                if (!input || !sendBtn) return;
                
                const message = input.value.trim();
                if (!message || sendBtn.disabled) return;
                
                this.addMessage('user', message);
                input.value = '';
                
                this.showTypingIndicator();
                sendBtn.disabled = true;
                
                setTimeout(() => {
                    this.hideTypingIndicator();
                    const response = this.generateResponse(message);
                    this.addMessage('bot', response);
                    sendBtn.disabled = false;
                    input.focus();
                }, 700);
            }

            generateResponse(query) {
                const q = query.toLowerCase();
                
                if (q.includes('indrive')) return '🚗 **Indrive**: 76/100 • 1,542 ratings • +2.3% trend • Competitive pricing, improving driver behavior.';
                if (q.includes('uber')) return '🚕 **Uber**: 82/100 • 2,103 ratings • Market leader • Excellent driver professionalism (8.7/10).';
                if (q.includes('careem')) return '🚖 **Careem**: 79/100 • 1,876 ratings • Strong regional presence • Good customer support.';
                if (q.includes('bykea')) return '🛵 **Bykea**: 68/100 • 923 ratings • Affordable • Driver training ongoing.';
                
                if (q.includes('compare') || q.includes('vs') || q.includes('ranking')) {
                    const services = this.quantify?.getAllServices() || [];
                    const sorted = [...services].sort((a,b) => b.trust_score - a.trust_score);
                    let resp = '📊 **Trust Score Rankings**\n\n';
                    sorted.forEach((s,i) => resp += `${i+1}. **${s.name}**: ${s.trust_score} (${s.feedback_count} ratings)\n`);
                    return resp + `\n🏆 Leader: ${sorted[0]?.name} with ${sorted[0]?.trust_score}`;
                }
                
                if (q.includes('average')) return `📈 **Average Trust Score**: ${this.quantify?.getStats()?.average_trust_score || 76.3}/100 • Based on 6,444+ ratings.`;
                if (q.includes('algorithm') || q.includes('calculate')) return '🧮 **Trust Algorithm**: Driver Behavior (40%) + Wait Time (35%) + Fare Transparency (25%). Bayesian averaging prevents manipulation.';
                if (q.includes('roadmap')) return '🔮 **Roadmap 2024-2025**: E-Commerce (Q2), Institutions (Q3), Financial (Q4), Global Expansion (2025).';
                if (q.includes('privacy') || q.includes('anonymous')) return '🔒 **Privacy**: 100% anonymous. No personal data collected. Only ratings + timestamp. GDPR compliant.';
                if (q.includes('free') || q.includes('price')) return '💰 **Pricing**: 100% free forever for consumers. No premium tiers. Trust should be accessible.';
                if (q.includes('help') || q.includes('what can you')) return '🤖 **I can help with**: Trust scores, comparisons, algorithm, roadmap, privacy, tech stack. Try "Compare all" or "Uber score".';
                if (q.includes('hello') || q.includes('hi') || q.includes('salam')) return '👋 **Assalam-o-Alaikum!** I\'m Quantify Neural. Ask me about trust scores, comparisons, roadmap, or type "help".';
                
                return '🤖 **I specialize in Quantify trust intelligence.**\n\nTry asking:\n• "Uber trust score?"\n• "Compare all services"\n• "How is score calculated?"\n• "Roadmap 2024"';
            }

            addMessage(role, content) {
                const chatBox = document.getElementById('chatMessages');
                if (!chatBox) return;
                
                const timestamp = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                
                const messageDiv = document.createElement('div');
                messageDiv.className = `flex items-start space-x-3 animate-enter ${role === 'user' ? 'justify-end' : ''}`;
                
                if (role === 'user') {
                    messageDiv.innerHTML = `
                        <div class="flex-1 max-w-[85%]">
                            <div class="bg-gradient-to-r from-[#6366f1] to-[#8b5cf6] rounded-2xl rounded-tr-none p-3 shadow-lg">
                                <p class="text-white text-xs md:text-sm whitespace-pre-wrap">${this.escapeHtml(content)}</p>
                            </div>
                            <div class="text-right mt-1">
                                <span class="text-[8px] md:text-[10px] text-white/30">${timestamp}</span>
                            </div>
                        </div>
                        <div class="w-7 h-7 md:w-8 md:h-8 bg-gradient-to-br from-[#10b981] to-[#059669] rounded-lg flex items-center justify-center shadow-lg flex-shrink-0">
                            <i class="fas fa-user text-white text-xs md:text-sm"></i>
                        </div>
                    `;
                } else {
                    messageDiv.innerHTML = `
                        <div class="w-7 h-7 md:w-8 md:h-8 bg-gradient-to-r from-[#6366f1] to-[#8b5cf6] rounded-lg flex items-center justify-center shadow-lg flex-shrink-0">
                            <i class="fas fa-brain text-white text-xs md:text-sm"></i>
                        </div>
                        <div class="flex-1 max-w-[85%]">
                            <div class="bg-white/10 backdrop-blur rounded-2xl rounded-tl-none p-3 border border-white/10">
                                <p class="text-white/90 text-xs md:text-sm whitespace-pre-wrap leading-relaxed">${this.escapeHtml(content)}</p>
                            </div>
                            <div class="flex items-center space-x-2 mt-1">
                                <span class="text-[8px] md:text-[10px] text-white/30">${timestamp}</span>
                                <span class="text-[6px] md:text-[8px] bg-[#6366f1]/30 px-1.5 py-0.5 rounded-full text-white/80">AI</span>
                            </div>
                        </div>
                    `;
                }
                
                chatBox.appendChild(messageDiv);
                this.scrollToBottom();
            }

            showTypingIndicator() {
                const chatBox = document.getElementById('chatMessages');
                if (!chatBox) return;
                
                const typingDiv = document.createElement('div');
                typingDiv.id = 'typingIndicator';
                typingDiv.className = 'flex items-start space-x-3 animate-enter';
                typingDiv.innerHTML = `
                    <div class="w-7 h-7 md:w-8 md:h-8 bg-gradient-to-r from-[#6366f1] to-[#8b5cf6] rounded-lg flex items-center justify-center shadow-lg flex-shrink-0">
                        <i class="fas fa-brain text-white text-xs md:text-sm"></i>
                    </div>
                    <div class="bg-white/10 backdrop-blur rounded-2xl rounded-tl-none p-4 border border-white/10">
                        <div class="flex space-x-2">
                            <div class="w-2 h-2 bg-[#6366f1] rounded-full animate-bounce"></div>
                            <div class="w-2 h-2 bg-[#8b5cf6] rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                            <div class="w-2 h-2 bg-[#ec4899] rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                        </div>
                    </div>
                `;
                chatBox.appendChild(typingDiv);
                this.scrollToBottom();
            }

            hideTypingIndicator() {
                document.getElementById('typingIndicator')?.remove();
            }

            clearChat() {
                const chatBox = document.getElementById('chatMessages');
                if (chatBox) {
                    chatBox.innerHTML = '';
                    this.addWelcomeMessage();
                }
            }

            addWelcomeMessage() {
                const chatBox = document.getElementById('chatMessages');
                if (!chatBox) return;
                
                const welcomeDiv = document.createElement('div');
                welcomeDiv.className = 'flex items-start space-x-3 animate-enter';
                welcomeDiv.innerHTML = `
                    <div class="w-7 h-7 md:w-8 md:h-8 bg-gradient-to-r from-[#6366f1] to-[#8b5cf6] rounded-lg flex items-center justify-center shadow-lg flex-shrink-0">
                        <i class="fas fa-brain text-white text-xs md:text-sm"></i>
                    </div>
                    <div class="flex-1 max-w-[85%]">
                        <div class="bg-white/10 backdrop-blur rounded-2xl rounded-tl-none p-4 border border-white/10">
                            <p class="text-white font-bold text-xs md:text-sm mb-1">👋 Welcome to Quantify Neural</p>
                            <p class="text-white/80 text-xs md:text-sm">I'm your AI assistant. Ask me about trust scores, comparisons, roadmap, or type <span class="text-[#6366f1] font-bold">"help"</span>.</p>
                            <div class="flex flex-wrap gap-1.5 mt-3">
                                <span class="text-[8px] md:text-[10px] bg-[#6366f1]/20 px-2 py-1 rounded-full border border-[#6366f1]/40">📊 Live Scores</span>
                                <span class="text-[8px] md:text-[10px] bg-[#8b5cf6]/20 px-2 py-1 rounded-full border border-[#8b5cf6]/40">📈 Comparisons</span>
                                <span class="text-[8px] md:text-[10px] bg-[#10b981]/20 px-2 py-1 rounded-full border border-[#10b981]/40">🧮 Algorithm</span>
                                <span class="text-[8px] md:text-[10px] bg-[#ec4899]/20 px-2 py-1 rounded-full border border-[#ec4899]/40">🔮 Roadmap</span>
                            </div>
                        </div>
                        <div class="mt-1">
                            <span class="text-[8px] md:text-[10px] text-white/30">Just now</span>
                        </div>
                    </div>
                `;
                chatBox.appendChild(welcomeDiv);
            }

            setSuggestedQuestion(question) {
                const input = document.getElementById('chatbotInput');
                if (input) {
                    input.value = question;
                    input.focus();
                }
            }

            scrollToBottom() {
                const chatBox = document.getElementById('chatMessages');
                if (chatBox) chatBox.scrollTo({ top: chatBox.scrollHeight, behavior: 'smooth' });
            }

            escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            window.quantify = new Quantify();
            window.chatbot = new QuantifyChatbot(window.quantify);
        });
    </script>
</body>
</html>