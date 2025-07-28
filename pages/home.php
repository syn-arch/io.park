<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPark - Solusi Parkir Pintar IoT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-dark {
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite alternate;
        }

        @keyframes pulse-glow {
            from {
                box-shadow: 0 0 20px rgba(102, 126, 234, 0.5);
            }

            to {
                box-shadow: 0 0 40px rgba(102, 126, 234, 0.8);
            }
        }

        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-10px);
        }

        .parallax-bg {
            background-image:
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 198, 255, 0.3) 0%, transparent 50%);
        }
    </style>
</head>

<body class="bg-gray-900 text-white overflow-x-hidden">
    <!-- Background Pattern -->
    <div class="fixed inset-0 parallax-bg"></div>

    <!-- Navigation -->
    <nav class="relative z-50 glass fixed w-full top-0">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 gradient-bg rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold gradient-text">SmartPark</h1>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="hover:text-purple-400 transition-colors">Fitur</a>
                    <a href="#how-it-works" class="hover:text-purple-400 transition-colors">Cara Kerja</a>
                    <a href="#pricing" class="hover:text-purple-400 transition-colors">Harga</a>
                    <a href="login.php" class="glass px-6 py-2 rounded-full hover:bg-white hover:bg-opacity-20 transition-all">
                        Masuk
                    </a>
                    <a href="register.php" class="glass px-6 py-2 rounded-full hover:bg-white hover:bg-opacity-20 transition-all">
                        Daftar
                    </a>
                </div>

                <button class="md:hidden glass p-2 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center pt-20">
        <div class="container mx-auto px-6 text-center">
            <div class="glass-dark rounded-3xl p-12 max-w-4xl mx-auto hover-lift">
                <div class="floating mb-8">
                    <div class="w-32 h-32 mx-auto gradient-bg rounded-full flex items-center justify-center pulse-glow">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>

                <h1 class="text-5xl md:text-7xl font-bold mb-6">
                    <span class="gradient-text">Smart Parking</span><br>
                    <span class="text-white">Masa Depan</span>
                </h1>

                <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto">
                    Solusi parkir pintar berbasis IoT dengan integrasi bot Telegram. Temukan, pesan, dan bayar tempat parkir dengan mudah.
                </p>

                <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                    <button class="glass px-8 py-4 rounded-full text-lg font-semibold hover:bg-purple-600 hover:bg-opacity-50 transition-all transform hover:scale-105">
                        🚀 Coba Gratis
                    </button>
                    <button class="glass-dark px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:bg-opacity-10 transition-all">
                        📱 Download Bot Telegram
                    </button>
                </div>
            </div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 floating" style="animation-delay: -1s;">
            <div class="w-4 h-4 bg-purple-400 rounded-full opacity-70"></div>
        </div>
        <div class="absolute top-40 right-20 floating" style="animation-delay: -2s;">
            <div class="w-6 h-6 bg-blue-400 rounded-full opacity-50"></div>
        </div>
        <div class="absolute bottom-40 left-20 floating">
            <div class="w-8 h-8 bg-pink-400 rounded-full opacity-60"></div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="gradient-text">Fitur Unggulan</span>
                </h2>
                <p class="text-xl text-gray-400">Teknologi terdepan untuk pengalaman parkir yang sempurna</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass rounded-2xl p-8 hover-lift">
                    <div class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Real-time Monitoring</h3>
                    <p class="text-gray-400">Pantau ketersediaan tempat parkir secara real-time dengan sensor IoT canggih.</p>
                </div>

                <div class="glass rounded-2xl p-8 hover-lift">
                    <div class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Bot Telegram</h3>
                    <p class="text-gray-400">Akses mudah melalui bot Telegram untuk booking, pembayaran, dan notifikasi.</p>
                </div>

                <div class="glass rounded-2xl p-8 hover-lift">
                    <div class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Keamanan Terjamin</h3>
                    <p class="text-gray-400">Sistem keamanan berlapis dengan enkripsi data dan monitoring 24/7.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-20 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="gradient-text">Cara Kerja</span>
                </h2>
                <p class="text-xl text-gray-400">Tiga langkah mudah untuk parkir pintar</p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="relative">
                    <!-- Connection Line -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-purple-500 to-blue-500 opacity-30 hidden md:block"></div>

                    <div class="space-y-12">
                        <div class="flex flex-col md:flex-row items-center gap-8">
                            <div class="flex-1 text-center md:text-right">
                                <div class="glass rounded-2xl p-8 hover-lift">
                                    <h3 class="text-2xl font-bold mb-4">1. Cari Tempat Parkir</h3>
                                    <p class="text-gray-400">Gunakan bot Telegram untuk mencari tempat parkir terdekat dengan ketersediaan real-time.</p>
                                </div>
                            </div>
                            <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center z-10 pulse-glow">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1"></div>
                        </div>

                        <div class="flex flex-col md:flex-row items-center gap-8">
                            <div class="flex-1"></div>
                            <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center z-10 pulse-glow">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="flex-1 text-center md:text-left">
                                <div class="glass rounded-2xl p-8 hover-lift">
                                    <h3 class="text-2xl font-bold mb-4">2. Reservasi & Bayar</h3>
                                    <p class="text-gray-400">Pesan tempat parkir dan lakukan pembayaran digital langsung melalui bot.</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row items-center gap-8">
                            <div class="flex-1 text-center md:text-right">
                                <div class="glass rounded-2xl p-8 hover-lift">
                                    <h3 class="text-2xl font-bold mb-4">3. Parkir & Nikmati</h3>
                                    <p class="text-gray-400">Datang ke lokasi, scan QR code, dan nikmati kemudahan parkir pintar.</p>
                                </div>
                            </div>
                            <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center z-10 pulse-glow">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div class="flex-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 relative">
        <div class="container mx-auto px-6">
            <div class="glass-dark rounded-3xl p-12">
                <div class="grid md:grid-cols-4 gap-8 text-center">
                    <div class="hover-lift">
                        <div class="text-4xl font-bold gradient-text mb-2">500+</div>
                        <div class="text-gray-400">Lokasi Parkir</div>
                    </div>
                    <div class="hover-lift">
                        <div class="text-4xl font-bold gradient-text mb-2">10K+</div>
                        <div class="text-gray-400">Pengguna Aktif</div>
                    </div>
                    <div class="hover-lift">
                        <div class="text-4xl font-bold gradient-text mb-2">98%</div>
                        <div class="text-gray-400">Tingkat Kepuasan</div>
                    </div>
                    <div class="hover-lift">
                        <div class="text-4xl font-bold gradient-text mb-2">24/7</div>
                        <div class="text-gray-400">Support</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 relative">
        <div class="container mx-auto px-6 text-center">
            <div class="glass rounded-3xl p-12 max-w-4xl mx-auto hover-lift">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Siap untuk <span class="gradient-text">Revolusi Parkir?</span>
                </h2>
                <p class="text-xl text-gray-300 mb-8">
                    Bergabunglah dengan ribuan pengguna yang sudah merasakan kemudahan parkir pintar
                </p>
                <div class="flex flex-col md:flex-row gap-4 justify-center">
                    <button class="glass px-12 py-4 rounded-full text-lg font-semibold hover:bg-purple-600 hover:bg-opacity-50 transition-all transform hover:scale-105">
                        🚀 Mulai Sekarang
                    </button>
                    <button class="glass-dark px-12 py-4 rounded-full text-lg font-semibold hover:bg-white hover:bg-opacity-10 transition-all">
                        📞 Hubungi Kami
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 relative">
        <div class="container mx-auto px-6">
            <div class="glass rounded-2xl p-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center space-x-3 mb-4 md:mb-0">
                        <div class="w-10 h-10 gradient-bg rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold gradient-text">SmartPark</h3>
                    </div>

                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition-colors">Privacy</a>
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition-colors">Terms</a>
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition-colors">Support</a>
                    </div>
                </div>

                <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2025 SmartPark. Semua hak cipta dilindungi.</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
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

        // Add parallax effect to background
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const bg = document.querySelector('.parallax-bg');
            if (bg) {
                bg.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });

        // Add intersection observer for animations
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

        // Observe all hover-lift elements
        document.querySelectorAll('.hover-lift').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>

</html>
