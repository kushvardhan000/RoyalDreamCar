@extends('layouts.app')

@section('title', $seo->meta_title ?? 'Contact Us - Royal Dream Car')
@section('meta_description', $seo->meta_description ?? '')
@section('meta_keywords', $seo->meta_keywords ?? '')

@section('content')

<!-- Custom Futuristic Styles -->
<style>
    :root {
        --rdc-red: #dc2626;
        --rdc-dark: #050505;
    }
    body {
        background-color: var(--rdc-dark);
        color: #ffffff;
        scroll-behavior: smooth;
    }
    .glass-panel {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.05);
    }
    .input-futuristic {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .input-futuristic:focus {
        border-color: var(--rdc-red);
        background: rgba(220, 38, 38, 0.05);
        box-shadow: 0 0 20px rgba(220, 38, 38, 0.15);
        outline: none;
    }
    .map-dark-mode {
        filter: invert(100%) hue-rotate(180deg) contrast(1.1) grayscale(0.7);
        opacity: 0.8;
        transition: opacity 0.5s ease;
    }
    .map-wrapper:hover .map-dark-mode {
        opacity: 1;
        filter: invert(100%) hue-rotate(180deg) contrast(1.2) grayscale(0.5);
    }
    /* FAQ Accordion Styling */
    details > summary {
        list-style: none;
    }
    details > summary::-webkit-details-marker {
        display: none;
    }
    /* Simple Entrance Animation */
    .fade-up {
        animation: fadeUp 0.8s ease-out forwards;
        opacity: 0;
        transform: translateY(20px);
    }
    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .delay-100 { animation-delay: 100ms; }
    .delay-200 { animation-delay: 200ms; }
</style>

<!-- 1. Hero Section -->
<section class="relative w-full h-[60vh] min-h-[500px] flex items-center justify-center overflow-hidden">
    <!-- Futuristic Car Background -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat scale-105 transform origin-center" 
         style="background-image: url('https://images.unsplash.com/photo-1583121274602-3e2820c69888?q=80&w=1920&auto=format&fit=crop');">
    </div>
    <!-- Heavy Dark & Red Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/90 via-black/70 to-[#050505]"></div>
    
    <div class="relative z-10 text-center px-6 max-w-5xl mx-auto fade-up">
        <div class="inline-flex items-center gap-3 mb-6">
            <span class="w-8 h-[1px] bg-red-600"></span>
            <span class="text-xs font-mono uppercase tracking-[0.3em] text-red-500">Secure Comm Link</span>
            <span class="w-8 h-[1px] bg-red-600"></span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black uppercase tracking-tighter text-white mb-6 drop-shadow-lg">
            Initiate <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-red-800">Contact</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-400 font-light max-w-2xl mx-auto">
            Engage with our luxury automotive specialists. Your journey towards uncompromising performance begins here.
        </p>
    </div>
</section>

<!-- Main Workspace Hub -->
<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 relative z-20 pb-20">
    
    <!-- System Alerts -->
    @if(session('success'))
        <div class="mb-8 p-4 bg-green-500/10 border border-green-500/20 text-green-400 text-sm rounded-lg glass-panel flex items-center gap-3 fade-up">
            <div class="w-2 h-2 rounded-full bg-green-500 animate-ping"></div>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-8 p-4 bg-red-500/10 border border-red-500/20 text-red-400 text-sm rounded-lg glass-panel flex items-center gap-3 fade-up">
            <div class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></div>
            {{ session('error') }}
        </div>
    @endif

    <!-- 2. Interface Grid: Form & Telemetry -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
        
        <!-- Left: Transmission Form (7 Columns) -->
        <div class="lg:col-span-7 glass-panel p-8 sm:p-12 rounded-2xl shadow-2xl fade-up delay-100 relative overflow-hidden">
            <!-- Decorative accent -->
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-600 to-transparent"></div>
            
            <div class="mb-10">
                <h2 class="text-3xl font-bold uppercase tracking-tight text-white">Transmit Data</h2>
                <p class="text-sm text-gray-500 mt-2 font-mono">Fill out the parameters below to connect.</p>
            </div>

            <form method="POST" action="{{ url('/contact') }}" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div class="space-y-2 group">
                        <label for="name" class="text-[10px] uppercase tracking-widest text-gray-400 group-focus-within:text-red-500 transition-colors">Client Identity</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                               class="w-full px-5 py-4 rounded-xl text-white placeholder-gray-600 font-light text-sm input-futuristic" 
                               placeholder="Enter your full name" required maxlength="255">
                        @if($errors->has('name'))
                            <p class="text-xs text-red-500 mt-1">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <!-- Phone -->
                    <div class="space-y-2 group">
                        <label for="phone" class="text-[10px] uppercase tracking-widest text-gray-400 group-focus-within:text-red-500 transition-colors">Direct Comm Line</label>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" 
                               class="w-full px-5 py-4 rounded-xl text-white placeholder-gray-600 font-light text-sm input-futuristic" 
                               placeholder="Phone number" required maxlength="50">
                        @if($errors->has('phone'))
                            <p class="text-xs text-red-500 mt-1">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>
                </div>

                <!-- Email -->
                <div class="space-y-2 group">
                    <label for="email" class="text-[10px] uppercase tracking-widest text-gray-400 group-focus-within:text-red-500 transition-colors">Digital Signature (Optional)</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" 
                           class="w-full px-5 py-4 rounded-xl text-white placeholder-gray-600 font-light text-sm input-futuristic" 
                           placeholder="your.email@domain.com" maxlength="255">
                    @if($errors->has('email'))
                        <p class="text-xs text-red-500 mt-1">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <!-- Message -->
                <div class="space-y-2 group">
                    <label for="message" class="text-[10px] uppercase tracking-widest text-gray-400 group-focus-within:text-red-500 transition-colors">Inquiry Payload</label>
                    <textarea name="message" id="message" rows="5" 
                              class="w-full px-5 py-4 rounded-xl text-white placeholder-gray-600 font-light text-sm input-futuristic resize-none" 
                              placeholder="Specify your target vehicle or requirements..." required maxlength="5000">{{ old('message') }}</textarea>
                    @if($errors->has('message'))
                        <p class="text-xs text-red-500 mt-1">{{ $errors->first('message') }}</p>
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit" 
                        class="w-full relative overflow-hidden group px-8 py-4 bg-red-600 text-white font-bold uppercase text-sm tracking-[0.2em] rounded-xl transition-all duration-300 hover:bg-red-500 hover:shadow-[0_0_30px_rgba(220,38,38,0.4)]">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        Execute Transmission
                        <svg class="w-4 h-4 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                </button>
            </form>
        </div>

        <!-- Right: Operations Data (5 Columns) -->
        <div class="lg:col-span-5 flex flex-col gap-8 fade-up delay-200">
            <div class="glass-panel p-8 rounded-2xl shadow-xl h-full relative overflow-hidden">
                <div class="absolute right-0 top-0 w-32 h-32 bg-red-600/10 rounded-full blur-3xl"></div>
                
                <h3 class="text-2xl font-bold uppercase text-white mb-8 border-b border-white/10 pb-4">HQ Telemetry</h3>
                
                <div class="space-y-8 text-sm">
                    <!-- Address -->
                    <div class="flex items-start gap-5 group">
                        <div class="w-12 h-12 rounded-full bg-white/5 border border-white/10 flex items-center justify-center shrink-0 group-hover:bg-red-600/20 group-hover:border-red-500/50 transition-all duration-300">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-mono uppercase tracking-widest text-gray-400 mb-1">Physical Coordinates</p>
                            <p class="text-gray-200 leading-relaxed">{{ $settings['address'] ?? 'Main Road, Lalpur, Ranchi, Jharkhand 834001' }}</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start gap-5 group">
                        <div class="w-12 h-12 rounded-full bg-white/5 border border-white/10 flex items-center justify-center shrink-0 group-hover:bg-red-600/20 group-hover:border-red-500/50 transition-all duration-300">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-mono uppercase tracking-widest text-gray-400 mb-1">Voice Protocol</p>
                            <p class="text-white text-lg font-light tracking-wide">{{ $settings['phone'] ?? '+91 (651) 234-5678' }}</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-5 group">
                        <div class="w-12 h-12 rounded-full bg-white/5 border border-white/10 flex items-center justify-center shrink-0 group-hover:bg-red-600/20 group-hover:border-red-500/50 transition-all duration-300">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-mono uppercase tracking-widest text-gray-400 mb-1">Network Hub</p>
                            <p class="text-gray-200">{{ $settings['email'] ?? 'contact@royaldreamcar.com' }}</p>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="flex items-start gap-5 group">
                        <div class="w-12 h-12 rounded-full bg-white/5 border border-white/10 flex items-center justify-center shrink-0 group-hover:bg-red-600/20 group-hover:border-red-500/50 transition-all duration-300">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-mono uppercase tracking-widest text-gray-400 mb-1">Operational Window</p>
                            <p class="text-gray-200">{{ $settings['hours'] ?? 'Mon - Sat: 09:00 AM - 08:00 PM' }}<br><span class="text-gray-500">Sunday: By Appointment</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 3. Full-Width FAQ Section -->
<section class="w-full bg-gradient-to-b from-[#0a0a0a] to-black py-24 border-t border-white/5">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-16 fade-up">
            <span class="text-xs font-mono uppercase tracking-[0.3em] text-red-500 block mb-3">// KNOWLEDGE BASE</span>
            <h2 class="text-3xl md:text-5xl font-black uppercase tracking-tight text-white">Frequently Asked Questions</h2>
        </div>

        <div class="space-y-4 fade-up delay-100">
            <!-- FAQ 1 -->
            <details class="group bg-white/5 border border-white/5 rounded-xl transition-all duration-300 hover:border-white/20">
                <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-6 text-sm sm:text-base uppercase tracking-wide text-gray-200">
                    <span>1. What types of luxury and exotic vehicles do you carry?</span>
                    <span class="transition-transform duration-300 group-open:rotate-45 text-red-500 text-2xl font-light">+</span>
                </summary>
                <div class="text-gray-400 font-light px-6 pb-6 text-sm leading-relaxed border-t border-white/5 pt-4 mt-2">
                    We specialize in a curated selection of ultra-luxury, exotic, and hyper-performance vehicles. Our matrix frequently includes models from Rolls-Royce, Bentley, Ferrari, Lamborghini, Porsche, and bespoke custom builds.
                </div>
            </details>

            <!-- FAQ 2 -->
            <details class="group bg-white/5 border border-white/5 rounded-xl transition-all duration-300 hover:border-white/20">
                <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-6 text-sm sm:text-base uppercase tracking-wide text-gray-200">
                    <span>2. Do you offer personalized financing or leasing options?</span>
                    <span class="transition-transform duration-300 group-open:rotate-45 text-red-500 text-2xl font-light">+</span>
                </summary>
                <div class="text-gray-400 font-light px-6 pb-6 text-sm leading-relaxed border-t border-white/5 pt-4 mt-2">
                    Absolutely. We partner with elite financial institutions to provide highly competitive, bespoke financing and closed-end leasing structures tailored specifically to the unique profiles of high-net-worth individuals.
                </div>
            </details>

            <!-- FAQ 3 -->
            <details class="group bg-white/5 border border-white/5 rounded-xl transition-all duration-300 hover:border-white/20">
                <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-6 text-sm sm:text-base uppercase tracking-wide text-gray-200">
                    <span>3. Can I trade in my current exotic or luxury vehicle?</span>
                    <span class="transition-transform duration-300 group-open:rotate-45 text-red-500 text-2xl font-light">+</span>
                </summary>
                <div class="text-gray-400 font-light px-6 pb-6 text-sm leading-relaxed border-t border-white/5 pt-4 mt-2">
                    Yes, we welcome premium trade-ins. Our appraisal protocol leverages real-time global market data to ensure you receive maximum capital credit for your current asset toward your new acquisition.
                </div>
            </details>

            <!-- FAQ 4 -->
            <details class="group bg-white/5 border border-white/5 rounded-xl transition-all duration-300 hover:border-white/20">
                <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-6 text-sm sm:text-base uppercase tracking-wide text-gray-200">
                    <span>4. Is it possible to arrange a private viewing or test drive?</span>
                    <span class="transition-transform duration-300 group-open:rotate-45 text-red-500 text-2xl font-light">+</span>
                </summary>
                <div class="text-gray-400 font-light px-6 pb-6 text-sm leading-relaxed border-t border-white/5 pt-4 mt-2">
                    We offer strictly confidential, private showroom viewings by appointment. Test drives are available for qualified buyers and can be arranged through your dedicated concierge associate.
                </div>
            </details>

            <!-- FAQ 5 -->
            <details class="group bg-white/5 border border-white/5 rounded-xl transition-all duration-300 hover:border-white/20">
                <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-6 text-sm sm:text-base uppercase tracking-wide text-gray-200">
                    <span>5. Do you offer nationwide or international vehicle delivery?</span>
                    <span class="transition-transform duration-300 group-open:rotate-45 text-red-500 text-2xl font-light">+</span>
                </summary>
                <div class="text-gray-400 font-light px-6 pb-6 text-sm leading-relaxed border-t border-white/5 pt-4 mt-2">
                    Yes. We utilize fully enclosed, climate-controlled transport units for nationwide delivery. For international clients, we handle all export logistics, customs documentation, and secure ocean or air freight.
                </div>
            </details>

            <!-- FAQ 6 -->
            <details class="group bg-white/5 border border-white/5 rounded-xl transition-all duration-300 hover:border-white/20">
                <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-6 text-sm sm:text-base uppercase tracking-wide text-gray-200">
                    <span>6. What kind of warranty or after-sales support is provided?</span>
                    <span class="transition-transform duration-300 group-open:rotate-45 text-red-500 text-2xl font-light">+</span>
                </summary>
                <div class="text-gray-400 font-light px-6 pb-6 text-sm leading-relaxed border-t border-white/5 pt-4 mt-2">
                    Many of our late-model vehicles carry the balance of their factory warranty. For older exotic assets, we offer comprehensive extended warranty programs and direct access to specialized service facilities.
                </div>
            </details>

            <!-- FAQ 7 -->
            <details class="group bg-white/5 border border-white/5 rounded-xl transition-all duration-300 hover:border-white/20">
                <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-6 text-sm sm:text-base uppercase tracking-wide text-gray-200">
                    <span>7. Can you source a specific rare vehicle if it's not in inventory?</span>
                    <span class="transition-transform duration-300 group-open:rotate-45 text-red-500 text-2xl font-light">+</span>
                </summary>
                <div class="text-gray-400 font-light px-6 pb-6 text-sm leading-relaxed border-t border-white/5 pt-4 mt-2">
                    Our procurement team commands an extensive global network. If your desired configuration is not in our current portfolio, we can source off-market vehicles globally to meet your exact specifications.
                </div>
            </details>
        </div>
    </div>
</section>

<!-- 4. Full-Width Map Section (Ranchi, Jharkhand) -->
<section class="w-full relative h-[450px] md:h-[600px] p-12 border-t border-b border-red-900/30 rounded-md map-wrapper overflow-hidden bg-black">
    <div class="absolute inset-0 pointer-events-none z-10 shadow-[inset_0_0_100px_rgba(0,0,0,1)]"></div>
    <div class="absolute top-6 left-6 z-20 glass-panel px-4 py-2 rounded-lg border border-red-500/30">
        <span class="flex items-center gap-2 text-xs font-mono tracking-widest text-white uppercase">
            <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
            SYS_LOC: RANCHI, JHARKHAND
        </span>
    </div>
    
    <!-- Google Map Embed - Styled with CSS Filters for Dark/Red Aesthetic -->
    <iframe class="w-full h-full map-dark-mode border-0" 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117223.77906806502!2d85.23963471018868!3d23.343204803923947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f4e104aa5db7dd%3A0xdc09d49518922857!2sRanchi%2C%20Jharkhand!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" 
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section>

<!-- 5. CTA Section -->
<section class="py-24 px-6 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-neutral-900 via-[#050505] to-black">
    <div class="max-w-3xl mx-auto text-center fade-up">
        <h2 class="text-4xl md:text-5xl font-black uppercase tracking-tight mb-8">Access The <span class="text-red-500">Showroom</span></h2>
        <div class="flex flex-col sm:flex-row justify-center gap-6">
            <a href="{{ url('/cars') }}" class="group relative px-10 py-5 bg-white text-black font-bold uppercase tracking-widest text-sm rounded-none overflow-hidden transition-all hover:scale-105">
                <span class="relative z-10">Browse Inventory</span>
                <div class="absolute inset-0 bg-gray-200 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out"></div>
            </a>
            <a href="tel:{{ $settings['phone'] ?? '+916512345678' }}" class="group relative px-10 py-5 border border-red-600 text-red-500 font-bold uppercase tracking-widest text-sm rounded-none overflow-hidden transition-all hover:scale-105 hover:shadow-[0_0_25px_rgba(220,38,38,0.3)]">
                <span class="relative z-10 group-hover:text-white transition-colors">Initialize Call</span>
                <div class="absolute inset-0 bg-red-600 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out"></div>
            </a>
        </div>
    </div>
</section>

@endsection