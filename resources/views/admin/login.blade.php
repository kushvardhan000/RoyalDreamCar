<!doctype html>
<html lang="en" class="h-full bg-[#050505]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>System Authentication | Royal Dream Car</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&family=Syncopate:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-display {
            font-family: 'Syncopate', sans-serif;
            letter-spacing: 0.2em;
        }
    </style>
</head>
<body class="h-full text-white antialiased selection:bg-[#E10600] selection:text-white overflow-hidden bg-[#050505]">

    <div class="relative w-full h-screen max-h-screen min-h-[568px] overflow-hidden flex flex-col justify-between p-4 sm:p-6 md:p-10 lg:p-12 xl:p-16">
        
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center scale-100"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-[#050505]/70 via-[#050505]/50 to-[#050505]/85 lg:bg-gradient-to-r lg:from-[#050505]/80 lg:via-[#050505]/40 lg:to-[#050505]/75"></div>
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff_1px,transparent_1px),linear-gradient(to_bottom,#ffffff_1px,transparent_1px)] bg-[size:5rem_5rem] opacity-[0.02] pointer-events-none"></div>
        </div>

        <header class="relative z-10 w-full flex items-center justify-between">
            <div class="flex items-center space-x-3 tracking-[0.25em] text-[10px] sm:text-xs font-display text-white/90">
                <span>ROYAL <span class="text-[#E10600]">DREAM</span> CAR</span>
                <span class="w-1.5 h-1.5 bg-[#E10600] inline-block"></span>
                <span class="text-white/40 font-sans tracking-widest uppercase font-medium text-[9px] sm:text-[10px] hidden xs:inline-block">Operations</span>
            </div>
            <div class="text-[9px] tracking-widest text-white/40 font-light hidden sm:block">
                SECURE NODE // <span class="text-[#E10600]">ONLINE</span>
            </div>
        </header>

        <main class="relative z-10 w-full my-auto grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center py-4">
            
            <div class="hidden lg:flex lg:col-span-6 xl:col-span-7 flex-col justify-center">
                <p class="text-[#E10600] text-xs font-display uppercase tracking-[0.25em] mb-4 font-bold">Internal Network</p>
                <h1 class="text-2xl xl:text-4xl font-display font-bold uppercase tracking-wider text-white leading-tight">
                    Access the Private<br />Automotive Command Center.
                </h1>
                <div class="w-12 h-[2px] bg-[#E10600] my-6"></div>
                <p class="text-white/60 text-sm font-light tracking-wide max-w-md leading-relaxed">
                    Secure gateway for executive dealer operations, bespoke inventory management, and elite private client allocations.
                </p>
            </div>

            <div class="col-span-1 lg:col-span-6 xl:col-span-5 w-full max-w-md mx-auto lg:ml-auto lg:mr-0">
                
                <div class="w-full bg-[#090909]/60 backdrop-blur-xl border border-white/10 p-6 sm:p-8 relative">
                    <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-white/20 via-white/5 to-transparent"></div>
                    
                    <div class="mb-6 sm:mb-8">
                        <h2 class="text-[10px] sm:text-xs font-display uppercase tracking-[0.3em] text-white/50 mb-1">Gatekeeper Protocol</h2>
                        <p class="text-xs sm:text-sm text-white/70 font-light">Provide authorized credentials to initialize session.</p>
                    </div>

                    @if($errors->any())
                        <div class="mb-6 p-4 bg-[#1a0c0c]/90 border border-[#E10600]/40 rounded-none flex items-start space-x-3 backdrop-blur-sm animate-[fadeIn_0.3s_ease-out]">
                            <svg class="w-4 h-4 text-[#E10600] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <div class="flex-1">
                                <h4 class="text-[10px] font-display text-[#E10600] uppercase tracking-wider mb-0.5">Authentication Failure</h4>
                                <p class="text-xs text-white/80 font-light leading-relaxed">{{ $errors->first() }}</p>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-5 sm:space-y-6">
                        @csrf

                        <div class="relative group">
                            <label for="email" class="block text-[9px] font-display uppercase tracking-[0.2em] text-white/50 group-focus-within:text-[#E10600] transition-colors duration-300 mb-2">
                                Corporate Email
                            </label>
                            <div class="relative">
                                <input 
                                    type="email" 
                                    id="email"
                                    name="email" 
                                    value="{{ old('email') }}"
                                    required 
                                    autofocus
                                    autocomplete="email"
                                    class="w-full h-12 sm:h-14 bg-black/60 border border-white/10 rounded-none px-4 text-xs sm:text-sm font-light text-white tracking-wide placeholder-white/20 focus:outline-none focus:border-[#E10600] focus:ring-0 transition-all duration-300"
                                    placeholder="name@royaldreamcar.com"
                                />
                                <div class="absolute bottom-0 left-0 w-0 h-[1px] bg-[#E10600] group-focus-within:w-full transition-all duration-500"></div>
                            </div>
                        </div>

                        <div class="relative group" id="passwordContainer">
                            <label for="password" class="block text-[9px] font-display uppercase tracking-[0.2em] text-white/50 group-focus-within:text-[#E10600] transition-colors duration-300 mb-2">
                                Security Cryptokey
                            </label>
                            <div class="relative">
                                <input 
                                    type="password" 
                                    id="password"
                                    name="password" 
                                    required 
                                    autocomplete="current-password"
                                    class="w-full h-12 sm:h-14 bg-black/60 border border-white/10 rounded-none pl-4 pr-12 text-xs sm:text-sm font-light text-white tracking-widest placeholder-white/20 focus:outline-none focus:border-[#E10600] focus:ring-0 transition-all duration-300"
                                    placeholder="••••••••••••"
                                />
                                <button 
                                    type="button"
                                    onclick="togglePasswordVisibility()"
                                    class="absolute right-0 top-0 h-full w-12 flex items-center justify-center text-white/30 hover:text-white transition-colors duration-200 focus:outline-none"
                                    title="Toggle visibility"
                                >
                                    <svg id="eyeIconOpen" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg id="eyeIconClosed" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                    </svg>
                                </button>
                                <div class="absolute bottom-0 left-0 w-0 h-[1px] bg-[#E10600] group-focus-within:w-full transition-all duration-500"></div>
                            </div>
                        </div>

                        <div class="pt-2">
                            <button 
                                type="submit" 
                                class="relative w-full h-12 sm:h-14 bg-white text-black font-display font-bold text-[10px] sm:text-xs uppercase tracking-[0.25em] rounded-none overflow-hidden transition-all duration-300 before:absolute before:inset-0 before:w-full before:h-full before:bg-[#E10600] before:scale-x-0 before:origin-right hover:before:scale-x-100 before:transition-transform before:duration-500 before:ease-out hover:text-white active:scale-[0.99] focus:outline-none focus:ring-1 focus:ring-[#E10600]"
                            >
                                <span class="relative z-10 flex items-center justify-center space-x-2">
                                    <span>LOGIN</span>
                                    <svg class="w-3 h-3 shift-right transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="transform: translateX(0px);">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </main>

        <footer class="relative z-10 w-full flex items-center justify-between text-[9px] text-white/40 tracking-widest font-light border-t border-white/[0.08] pt-4">
            <p>&copy; {{ date('Y') }} ROYAL DREAM CAR</p>
            <div class="flex space-x-4">
                <span class="hover:text-white/60 cursor-help transition-colors duration-200">v4.8.2-SECURE</span>
            </div>
        </footer>

    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('eyeIconOpen');
            const eyeClosed = document.getElementById('eyeIconClosed');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }

        // Luxurious CTA Button Hover Shift Adjustment Configuration
        const btn = document.querySelector('form button[type="submit"]');
        const arrow = document.querySelector('.shift-right');
        if(btn && arrow) {
            btn.addEventListener('mouseenter', () => { arrow.style.transform = 'translateX(4px)'; });
            btn.addEventListener('mouseleave', () => { arrow.style.transform = 'translateX(0px)'; });
        }
    </script>
</body>
</html>