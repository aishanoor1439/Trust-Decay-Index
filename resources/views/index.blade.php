<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trust Decay Index | Live Prototype</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Poppins:wght@300;400;500;600&family=Oswald:wght@500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            deep: '#0a0a0f',
                            surface: '#12121a',
                            accent: '#00f2ff',
                            muted: '#94a3b8',
                            danger: '#ff2e63',
                            warning: '#ffb74d',
                            success: '#4caf50'
                        }
                    },
                    fontFamily: {
                        display: ['Montserrat', 'sans-serif'],
                        body: ['Poppins', 'sans-serif'],
                        accent: ['Oswald', 'sans-serif'],
                    },
                    backgroundImage: {
                        'glass-gradient': 'linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0) 100%)',
                        'accent-gradient': 'linear-gradient(90deg, #00f2ff 0%, #0066ff 100%)',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #0a0a0f;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s ease;
        }
        .glass-card:hover {
            border-color: #00f2ff;
            background: rgba(255, 255, 255, 0.05);
            transform: translateY(-4px);
        }
        .score-bar {
            height: 8px;
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.1);
            overflow: hidden;
        }
        .score-fill {
            height: 100%;
            border-radius: 4px;
            transition: width 1s ease;
        }
        .score-excellent { background: linear-gradient(90deg, #4caf50, #8bc34a); }
        .score-good { background: linear-gradient(90deg, #2196f3, #00f2ff); }
        .score-warning { background: linear-gradient(90deg, #ff9800, #ffb74d); }
        .score-critical { background: linear-gradient(90deg, #f44336, #ff2e63); }
    </style>
</head>
<body class="antialiased">

    <!-- Header -->
    <header class="fixed top-0 w-full z-50 bg-brand-deep/80 backdrop-blur-lg border-b border-white/5">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-accent-gradient rounded-sm transform rotate-45"></div>
                <span class="font-display font-extrabold text-xl tracking-tighter uppercase">Trust<span class="text-brand-accent">Decay</span></span>
            </div>
            <nav class="hidden md:flex space-x-8 text-sm font-accent tracking-widest uppercase text-brand-muted">
                <a href="#problem" class="hover:text-brand-accent transition-colors">Problem</a>
                <a href="#solution" class="hover:text-brand-accent transition-colors">Solution</a>
                <a href="#live-demo" class="hover:text-brand-accent transition-colors">Live Demo</a>
                <a href="#analytics" class="hover:text-brand-accent transition-colors">Analytics</a>
            </nav>
            <div class="text-xs font-accent tracking-widest text-brand-accent border border-brand-accent/30 px-3 py-1 rounded">
                LIVE PROTOTYPE
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="min-h-screen flex flex-col justify-center items-center relative px-6 pt-20">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20 pointer-events-none"></div>
        <div class="max-w-4xl text-center z-10">
            <h2 class="text-brand-accent font-accent tracking-[0.3em] uppercase mb-6 text-sm md:text-base">IBA Shark Tank Datathon 2024</h2>
            <h1 class="text-5xl md:text-8xl font-display font-extrabold leading-tight mb-8">
                Trust Decay <span class="bg-clip-text text-transparent bg-accent-gradient">Index</span>
            </h1>
            <p class="text-lg md:text-xl text-brand-muted max-w-2xl mx-auto mb-10 leading-relaxed">
                A real-time institutional trust scoring system. Submit anonymous feedback and watch the algorithm calculate live trust scores.
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="#live-demo" class="bg-accent-gradient text-brand-deep font-display font-bold px-8 py-4 rounded-full hover:scale-105 transition-transform duration-300 shadow-[0_0_30px_rgba(0,242,255,0.3)]">
                    TRY LIVE DEMO
                </a>
                <a href="#analytics" class="flex items-center justify-center space-x-3 px-6 py-3 rounded-full border border-white/10 glass-card hover:border-brand-accent">
                    <span class="w-3 h-3 bg-brand-accent rounded-full animate-pulse"></span>
                    <span class="text-xs font-accent tracking-widest uppercase">Live Analytics</span>
                </a>
            </div>
        </div>
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 scroll-indicator">
            <svg class="w-6 h-6 text-brand-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
        </div>
    </section>

    <!-- Live Demo Section -->
    <section id="live-demo" class="py-24 px-6 bg-brand-surface relative">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-brand-accent font-accent tracking-widest uppercase mb-4">Live Prototype</h2>
                <h3 class="text-4xl md:text-5xl font-display font-bold mb-6">Submit Anonymous Feedback</h3>
                <p class="text-brand-muted max-w-2xl mx-auto text-lg">Your feedback contributes to real-time trust scoring. No personal data is stored.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <!-- Feedback Form -->
                <div class="glass-card p-8 rounded-3xl">
                    <h4 class="text-2xl font-bold mb-6">Rate an Institution</h4>
                    
                    <form id="feedbackForm">
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-brand-muted mb-2">Select Department</label>
                            <select id="institutionSelect" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-brand-accent">
                                <option value="">Loading institutions...</option>
                            </select>
                            <div id="institutionInfo" class="mt-2 text-sm text-brand-muted hidden">
                                <p>Trust Score: <span id="currentScore" class="font-bold"></span></p>
                                <p>Feedback Count: <span id="feedbackCount" class="font-bold"></span></p>
                            </div>
                        </div>

                        <!-- Behavior Score -->
                        <div class="mb-8">
                            <div class="flex justify-between mb-2">
                                <label class="text-sm font-medium text-white">Behavior (Staff Conduct)</label>
                                <span id="behaviorValue" class="text-brand-accent font-bold">5</span>
                            </div>
                            <input type="range" id="behaviorScore" min="1" max="10" value="5" 
                                   class="w-full h-2 bg-white/10 rounded-lg appearance-none cursor-pointer [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-brand-accent">
                            <div class="flex justify-between text-xs text-brand-muted mt-1">
                                <span>Very Poor</span>
                                <span>Excellent</span>
                            </div>
                        </div>

                        <!-- Delay Score -->
                        <div class="mb-8">
                            <div class="flex justify-between mb-2">
                                <label class="text-sm font-medium text-white">Delay (Service Time)</label>
                                <span id="delayValue" class="text-brand-accent font-bold">5</span>
                            </div>
                            <input type="range" id="delayScore" min="1" max="10" value="5" 
                                   class="w-full h-2 bg-white/10 rounded-lg appearance-none cursor-pointer [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-brand-accent">
                            <div class="flex justify-between text-xs text-brand-muted mt-1">
                                <span>Very Slow</span>
                                <span>Very Fast</span>
                            </div>
                        </div>

                        <!-- Transparency Score -->
                        <div class="mb-8">
                            <div class="flex justify-between mb-2">
                                <label class="text-sm font-medium text-white">Transparency</label>
                                <span id="transparencyValue" class="text-brand-accent font-bold">5</span>
                            </div>
                            <input type="range" id="transparencyScore" min="1" max="10" value="5" 
                                   class="w-full h-2 bg-white/10 rounded-lg appearance-none cursor-pointer [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-brand-accent">
                            <div class="flex justify-between text-xs text-brand-muted mt-1">
                                <span>Opaque</span>
                                <span>Transparent</span>
                            </div>
                        </div>

                        <!-- TDI Preview -->
                        <div class="mb-8 p-4 bg-white/5 rounded-xl">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium">Estimated Trust Impact</span>
                                <span id="tdiPreview" class="text-2xl font-bold text-brand-accent">--</span>
                            </div>
                            <div class="score-bar">
                                <div id="tdiBar" class="score-fill" style="width: 0%"></div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full bg-accent-gradient text-brand-deep font-display font-bold py-4 rounded-lg hover:opacity-90 transition-opacity disabled:opacity-50"
                                disabled>
                            <span id="submitText">Submit Anonymous Feedback</span>
                            <span id="submitLoading" class="hidden">Processing...</span>
                        </button>

                        <!-- Session Info -->
                        <div class="mt-4 text-center text-xs text-brand-muted">
                            <p>Session secured with token-based rate limiting</p>
                            <p class="mt-1">No IP addresses or personal data stored</p>
                        </div>
                    </form>
                </div>

                <!-- Algorithm Explanation -->
                <div class="space-y-6">
                    <div class="glass-card p-8 rounded-3xl">
                        <h4 class="text-xl font-bold mb-4">How It Works</h4>
                        <p class="text-brand-muted mb-4">The Trust Decay Index uses a proprietary algorithm to calculate institutional trust:</p>
                        <div class="space-y-4">
                            <div class="p-4 bg-white/5 rounded-lg">
                                <code class="text-sm text-brand-accent">
                                    TDI = Σ(B·w₁ + D·w₂ + T·w₃) / e^(λ·t)
                                </code>
                                <p class="text-xs text-brand-muted mt-2">Where B=Behavior, D=Delay, T=Transparency, t=time since last feedback</p>
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="text-center p-3 bg-white/5 rounded-lg">
                                    <div class="text-2xl font-bold text-brand-accent">0.4</div>
                                    <div class="text-xs text-brand-muted">Behavior Weight</div>
                                </div>
                                <div class="text-center p-3 bg-white/5 rounded-lg">
                                    <div class="text-2xl font-bold text-brand-accent">0.35</div>
                                    <div class="text-xs text-brand-muted">Delay Weight</div>
                                </div>
                                <div class="text-center p-3 bg-white/5 rounded-lg">
                                    <div class="text-2xl font-bold text-brand-accent">0.25</div>
                                    <div class="text-xs text-brand-muted">Transparency Weight</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Updates -->
                    <div class="glass-card p-8 rounded-3xl">
                        <h4 class="text-xl font-bold mb-4">Live Updates</h4>
                        <div id="recentUpdates" class="space-y-3">
                            <div class="flex items-center space-x-3 p-3 bg-white/5 rounded-lg">
                                <div class="w-2 h-2 bg-brand-accent rounded-full"></div>
                                <div class="text-sm">System initialized</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Live Analytics Section -->
    <section id="analytics" class="py-24 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-brand-accent font-accent tracking-widest uppercase mb-4">Live Analytics</h2>
                <h3 class="text-4xl md:text-5xl font-display font-bold mb-6">Real-time Trust Dashboard</h3>
                <p class="text-brand-muted max-w-2xl mx-auto text-lg">Watch trust scores evolve in real-time as feedback is submitted.</p>
            </div>

            <!-- Overall Stats -->
            <div class="grid md:grid-cols-4 gap-6 mb-12">
                <div class="glass-card p-6 rounded-2xl">
                    <div class="text-3xl font-bold text-brand-accent" id="avgScore">--</div>
                    <div class="text-sm text-brand-muted uppercase tracking-widest mt-1">Avg Trust Score</div>
                </div>
                <div class="glass-card p-6 rounded-2xl">
                    <div class="text-3xl font-bold text-success" id="totalFeedback">--</div>
                    <div class="text-sm text-brand-muted uppercase tracking-widest mt-1">Total Feedback</div>
                </div>
                <div class="glass-card p-6 rounded-2xl">
                    <div class="text-3xl font-bold text-brand-warning" id="worstScore">--</div>
                    <div class="text-sm text-brand-muted uppercase tracking-widest mt-1">Lowest Score</div>
                </div>
                <div class="glass-card p-6 rounded-2xl">
                    <div class="text-3xl font-bold text-brand-accent" id="bestScore">--</div>
                    <div class="text-sm text-brand-muted uppercase tracking-widest mt-1">Highest Score</div>
                </div>
            </div>

            <!-- Institutions Table -->
            <div class="glass-card rounded-3xl overflow-hidden mb-12">
                <div class="p-6 border-b border-white/10">
                    <h4 class="text-xl font-bold">Institutional Trust Scores</h4>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-sm text-brand-muted border-b border-white/10">
                                <th class="p-4">Institution</th>
                                <th class="p-4">Category</th>
                                <th class="p-4">Trust Score</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Feedback</th>
                                <th class="p-4">Last Updated</th>
                            </tr>
                        </thead>
                        <tbody id="institutionsTable">
                            <tr>
                                <td colspan="6" class="p-8 text-center text-brand-muted">Loading analytics...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Trust Score Chart -->
            <div class="glass-card p-8 rounded-3xl">
                <h4 class="text-xl font-bold mb-6">Trust Score Distribution</h4>
                <canvas id="trustChart" height="100"></canvas>
            </div>
        </div>
    </section>

    <!-- JavaScript Implementation -->
    <script>
        class TrustDecayIndex {
            constructor() {
                this.sessionToken = null;
                this.chart = null;
                this.initialize();
            }

            async initialize() {
                await this.generateSessionToken();
                await this.loadInstitutions();
                await this.loadAnalytics();
                this.setupEventListeners();
                this.startLiveUpdates();
            }

            async generateSessionToken() {
                try {
                    const response = await fetch('/api/session-token');
                    const data = await response.json();
                    if (data.success) {
                        this.sessionToken = data.session_token;
                        this.addUpdate('Session token generated');
                    }
                } catch (error) {
                    console.error('Error generating session token:', error);
                }
            }

            async loadInstitutions() {
                try {
                    const response = await fetch('/api/institutions');
                    const data = await response.json();
                    
                    if (data.success) {
                        const select = document.getElementById('institutionSelect');
                        select.innerHTML = '<option value="">Select an institution...</option>';
                        
                        data.data.forEach(institution => {
                            const option = document.createElement('option');
                            option.value = institution.id;
                            option.textContent = `${institution.name} (${institution.trust_score})`;
                            option.dataset.score = institution.trust_score;
                            option.dataset.count = institution.feedback_count;
                            select.appendChild(option);
                        });
                        
                        select.disabled = false;
                        this.addUpdate('Loaded institutions data');
                    }
                } catch (error) {
                    console.error('Error loading institutions:', error);
                }
            }

            async loadAnalytics() {
                try {
                    const response = await fetch('/api/analytics');
                    const data = await response.json();
                    
                    if (data.success) {
                        this.updateStats(data.statistics);
                        this.updateTable(data.analytics);
                        this.updateChart(data.analytics);
                    }
                } catch (error) {
                    console.error('Error loading analytics:', error);
                }
            }

            updateStats(stats) {
                document.getElementById('avgScore').textContent = stats.average_trust_score || '--';
                document.getElementById('totalFeedback').textContent = stats.total_feedback || '--';
                document.getElementById('worstScore').textContent = stats.worst_performer?.trust_score || '--';
                document.getElementById('bestScore').textContent = stats.best_performer?.trust_score || '--';
            }

            updateTable(institutions) {
                const table = document.getElementById('institutionsTable');
                table.innerHTML = '';
                
                institutions.forEach(inst => {
                    const row = document.createElement('tr');
                    row.className = 'border-b border-white/5 hover:bg-white/5';
                    
                    const scoreClass = this.getScoreClass(inst.trust_score);
                    const trendIcon = inst.trend > 0 ? '↗' : inst.trend < 0 ? '↘' : '→';
                    const trendColor = inst.trend > 0 ? 'text-success' : inst.trend < 0 ? 'text-brand-danger' : 'text-brand-muted';
                    
                    row.innerHTML = `
                        <td class="p-4">
                            <div class="font-medium">${inst.name}</div>
                            <div class="text-xs text-brand-muted">${inst.description || ''}</div>
                        </td>
                        <td class="p-4">
                            <span class="px-3 py-1 bg-white/10 rounded-full text-xs uppercase">${inst.category}</span>
                        </td>
                        <td class="p-4">
                            <div class="text-2xl font-bold ${this.getScoreColor(inst.trust_score)}">${inst.trust_score}</div>
                            <div class="text-xs ${trendColor}">${trendIcon} ${Math.abs(inst.trend)}%</div>
                        </td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium ${this.getStatusClass(inst.status)}">${inst.status}</span>
                        </td>
                        <td class="p-4">
                            <div class="text-lg font-bold">${inst.feedback_count}</div>
                            <div class="score-bar mt-1">
                                <div class="score-fill ${scoreClass}" style="width: ${inst.trust_score}%"></div>
                            </div>
                        </td>
                        <td class="p-4 text-sm text-brand-muted">
                            ${inst.last_feedback_at ? this.timeAgo(new Date(inst.last_feedback_at)) : 'Never'}
                        </td>
                    `;
                    
                    table.appendChild(row);
                });
            }

            updateChart(institutions) {
                const ctx = document.getElementById('trustChart').getContext('2d');
                
                if (this.chart) {
                    this.chart.destroy();
                }
                
                const scores = institutions.map(i => i.trust_score);
                const labels = institutions.map(i => i.name.substring(0, 15) + (i.name.length > 15 ? '...' : ''));
                const colors = institutions.map(i => this.getScoreColor(i.trust_score, true));
                
                this.chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Trust Score',
                            data: scores,
                            backgroundColor: colors,
                            borderColor: 'rgba(255, 255, 255, 0.1)',
                            borderWidth: 1,
                            borderRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: (context) => `Trust Score: ${context.parsed.y}`
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100,
                                grid: { color: 'rgba(255, 255, 255, 0.1)' },
                                ticks: { color: '#94a3b8' }
                            },
                            x: {
                                grid: { display: false },
                                ticks: { 
                                    color: '#94a3b8',
                                    maxRotation: 45
                                }
                            }
                        }
                    }
                });
            }

            setupEventListeners() {
                // Score sliders
                ['behavior', 'delay', 'transparency'].forEach(type => {
                    const slider = document.getElementById(`${type}Score`);
                    const value = document.getElementById(`${type}Value`);
                    
                    slider.addEventListener('input', (e) => {
                        value.textContent = e.target.value;
                        this.updateTDIPreview();
                    });
                });

                // Institution selection
                document.getElementById('institutionSelect').addEventListener('change', (e) => {
                    const selected = e.target.options[e.target.selectedIndex];
                    const info = document.getElementById('institutionInfo');
                    
                    if (selected.value) {
                        info.classList.remove('hidden');
                        document.getElementById('currentScore').textContent = selected.dataset.score;
                        document.getElementById('feedbackCount').textContent = selected.dataset.count;
                    } else {
                        info.classList.add('hidden');
                    }
                    
                    this.updateTDIPreview();
                });

                // Form submission
                document.getElementById('feedbackForm').addEventListener('submit', async (e) => {
                    e.preventDefault();
                    await this.submitFeedback();
                });
            }

            updateTDIPreview() {
                const behavior = parseInt(document.getElementById('behaviorScore').value);
                const delay = parseInt(document.getElementById('delayScore').value);
                const transparency = parseInt(document.getElementById('transparencyScore').value);
                
                // Simple preview calculation (without decay)
                const previewScore = (behavior * 0.4 + delay * 0.35 + transparency * 0.25) * 10;
                const rounded = Math.round(previewScore);
                
                document.getElementById('tdiPreview').textContent = rounded;
                document.getElementById('tdiBar').style.width = `${rounded}%`;
                document.getElementById('tdiBar').className = `score-fill ${this.getScoreClass(rounded)}`;
            }

            async submitFeedback() {
                const institutionId = document.getElementById('institutionSelect').value;
                const behavior = document.getElementById('behaviorScore').value;
                const delay = document.getElementById('delayScore').value;
                const transparency = document.getElementById('transparencyScore').value;
                
                if (!institutionId || !this.sessionToken) {
                    alert('Please select an institution');
                    return;
                }
                
                const submitBtn = document.querySelector('#feedbackForm button[type="submit"]');
                const submitText = document.getElementById('submitText');
                const submitLoading = document.getElementById('submitLoading');
                
                submitBtn.disabled = true;
                submitText.classList.add('hidden');
                submitLoading.classList.remove('hidden');
                
                try {
                    const response = await fetch('/api/feedback', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            institution_id: parseInt(institutionId),
                            behavior_score: parseInt(behavior),
                            delay_score: parseInt(delay),
                            transparency_score: parseInt(transparency),
                            session_token: this.sessionToken
                        })
                    });
                    
                    const data = await response.json();
                    
                    if (data.success) {
                        this.addUpdate(`Feedback submitted for institution #${institutionId}`);
                        this.showSuccessMessage(data.message, data.tdi_score);
                        
                        // Reset form
                        document.getElementById('behaviorScore').value = 5;
                        document.getElementById('delayScore').value = 5;
                        document.getElementById('transparencyScore').value = 5;
                        document.getElementById('behaviorValue').textContent = '5';
                        document.getElementById('delayValue').textContent = '5';
                        document.getElementById('transparencyValue').textContent = '5';
                        
                        // Reload data
                        await Promise.all([
                            this.loadInstitutions(),
                            this.loadAnalytics()
                        ]);
                    } else {
                        throw new Error(data.message || 'Submission failed');
                    }
                } catch (error) {
                    this.showErrorMessage(error.message);
                    console.error('Error submitting feedback:', error);
                } finally {
                    submitBtn.disabled = false;
                    submitText.classList.remove('hidden');
                    submitLoading.classList.add('hidden');
                }
            }

            showSuccessMessage(message, tdiScore) {
                const alert = document.createElement('div');
                alert.className = 'fixed top-24 right-6 glass-card p-4 rounded-xl border border-success/30 bg-success/10 z-50 animate-slide-in';
                alert.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full bg-success/20 flex items-center justify-center">
                            <svg class="w-4 h-4 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-bold">${message}</div>
                            <div class="text-xs text-brand-muted">TDI Impact: ${tdiScore}</div>
                        </div>
                    </div>
                `;
                document.body.appendChild(alert);
                
                setTimeout(() => {
                    alert.remove();
                }, 5000);
            }

            showErrorMessage(message) {
                const alert = document.createElement('div');
                alert.className = 'fixed top-24 right-6 glass-card p-4 rounded-xl border border-brand-danger/30 bg-brand-danger/10 z-50 animate-slide-in';
                alert.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full bg-brand-danger/20 flex items-center justify-center">
                            <svg class="w-4 h-4 text-brand-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-bold">Submission Failed</div>
                            <div class="text-xs text-brand-muted">${message}</div>
                        </div>
                    </div>
                `;
                document.body.appendChild(alert);
                
                setTimeout(() => {
                    alert.remove();
                }, 5000);
            }

            addUpdate(message) {
                const container = document.getElementById('recentUpdates');
                const update = document.createElement('div');
                update.className = 'flex items-center space-x-3 p-3 bg-white/5 rounded-lg';
                update.innerHTML = `
                    <div class="w-2 h-2 bg-brand-accent rounded-full animate-pulse"></div>
                    <div class="text-sm">${message}</div>
                    <div class="text-xs text-brand-muted ml-auto">${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</div>
                `;
                
                container.insertBefore(update, container.firstChild);
                
                // Keep only last 5 updates
                while (container.children.length > 5) {
                    container.removeChild(container.lastChild);
                }
            }

            startLiveUpdates() {
                // Refresh analytics every 30 seconds
                setInterval(async () => {
                    await this.loadAnalytics();
                    this.addUpdate('Live data refreshed');
                }, 30000);
            }

            // Helper methods
            getScoreClass(score) {
                if (score >= 70) return 'score-excellent';
                if (score >= 50) return 'score-good';
                if (score >= 30) return 'score-warning';
                return 'score-critical';
            }

            getScoreColor(score, forChart = false) {
                if (forChart) {
                    if (score >= 70) return '#4caf50';
                    if (score >= 50) return '#00f2ff';
                    if (score >= 30) return '#ffb74d';
                    return '#ff2e63';
                }
                if (score >= 70) return 'text-success';
                if (score >= 50) return 'text-brand-accent';
                if (score >= 30) return 'text-brand-warning';
                return 'text-brand-danger';
            }

            getStatusClass(status) {
                const classes = {
                    'excellent': 'bg-success/20 text-success',
                    'good': 'bg-brand-accent/20 text-brand-accent',
                    'warning': 'bg-brand-warning/20 text-brand-warning',
                    'critical': 'bg-brand-danger/20 text-brand-danger'
                };
                return classes[status] || 'bg-white/10 text-white';
            }

            timeAgo(date) {
                const seconds = Math.floor((new Date() - date) / 1000);
                
                let interval = seconds / 31536000;
                if (interval > 1) return Math.floor(interval) + " years ago";
                
                interval = seconds / 2592000;
                if (interval > 1) return Math.floor(interval) + " months ago";
                
                interval = seconds / 86400;
                if (interval > 1) return Math.floor(interval) + " days ago";
                
                interval = seconds / 3600;
                if (interval > 1) return Math.floor(interval) + " hours ago";
                
                interval = seconds / 60;
                if (interval > 1) return Math.floor(interval) + " minutes ago";
                
                return Math.floor(seconds) + " seconds ago";
            }
        }

        // Initialize the application when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            window.tdiApp = new TrustDecayIndex();
            
            // Smooth scrolling for navigation
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
        });
    </script>

</body>
</html>