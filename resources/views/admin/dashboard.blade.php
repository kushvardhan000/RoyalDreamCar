<!doctype html>
<html lang="en" class="h-full antialiased bg-[#050505] text-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Content Studio | Royal Dream Car</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Syncopate:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Syncopate', sans-serif; letter-spacing: 0.1em; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #222; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #444; }
        [x-cloak] { display: none !important; }
        .glass-panel { background: rgba(14, 14, 14, 0.7); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.05); }
    </style>
</head>
<body x-data="{ sidebarOpen: false, userMenuOpen: false, logoutModalOpen: false, cmdKOpen: false }" class="h-full overflow-hidden flex" @keydown.window.prevent.cmd.k="cmdKOpen = true" @keydown.window.prevent.ctrl.k="cmdKOpen = true" @keydown.escape="cmdKOpen = false; logoutModalOpen = false; userMenuOpen = false;">

    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-40 bg-black/80 backdrop-blur-sm lg:hidden" @click="sidebarOpen = false" x-cloak></div>

<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-64 bg-[#050505] border-r border-white/5 transition-transform duration-300 lg:static lg:translate-x-0 flex flex-col h-screen overflow-hidden">
    
    <div class="h-14 flex items-center px-4 border-b border-white/5 group cursor-pointer hover:bg-white/[0.02] transition-colors shrink-0">
        <div class="w-6 h-6 rounded bg-[#E10600] flex items-center justify-center mr-3 shadow-[0_0_10px_rgba(225,6,0,0.2)]">
            <span class="text-[10px] font-display font-bold text-white">R</span>
        </div>
        <div class="flex-1 overflow-hidden">
            <h1 class="text-xs font-medium text-white truncate">Royal Dream Car</h1>
            <p class="text-[10px] text-white/40 truncate">Production Content</p>
        </div>
        <svg class="w-4 h-4 text-white/30 group-hover:text-white/70 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/></svg>
    </div>

    <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-6">
        
        <div>
            <div class="px-3 mb-2 text-[10px] font-medium text-white/40 uppercase tracking-widest">Studio</div>
            <div class="space-y-0.5">
                <a href="#" class="flex items-center px-3 py-1.5 text-sm font-medium bg-white/5 text-white rounded-md transition-colors">
                    <svg class="w-4 h-4 mr-3 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Overview
                </a>
                <a href="#" class="flex items-center px-3 py-1.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.03] rounded-md transition-colors group">
                    <svg class="w-4 h-4 mr-3 text-white/30 group-hover:text-white/70 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    Website Content
                </a>
                <a href="#" class="flex items-center px-3 py-1.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.03] rounded-md transition-colors group">
                    <svg class="w-4 h-4 mr-3 text-white/30 group-hover:text-white/70 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Media Library
                </a>
            </div>
        </div>

        <div>
            <div class="px-3 mb-2 text-[10px] font-medium text-white/40 uppercase tracking-widest flex justify-between items-center">
                Inventory
                <button class="text-white/30 hover:text-white"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg></button>
            </div>
            <div class="space-y-0.5">
                <a href="#" class="flex items-center justify-between px-3 py-1.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.03] rounded-md transition-colors group">
                    <div class="flex items-center">
                        <span class="w-1.5 h-1.5 rounded-full bg-white/20 mr-4 group-hover:bg-[#E10600] transition-colors"></span>
                        Vehicles
                    </div>
                    <span class="text-[10px] bg-white/5 px-1.5 py-0.5 rounded text-white/40 group-hover:text-white/70">124</span>
                </a>
                <a href="#" class="flex items-center px-3 py-1.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.03] rounded-md transition-colors group">
                    <span class="w-1.5 h-1.5 rounded-full bg-white/20 mr-4 group-hover:bg-white/70 transition-colors"></span>
                    Services
                </a>
                <a href="#" class="flex items-center px-3 py-1.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.03] rounded-md transition-colors group">
                    <span class="w-1.5 h-1.5 rounded-full bg-white/20 mr-4 group-hover:bg-white/70 transition-colors"></span>
                    Testimonials
                </a>
            </div>
        </div>

        <div>
            <div class="px-3 mb-2 text-[10px] font-medium text-white/40 uppercase tracking-widest">Growth</div>
            <div class="space-y-0.5">
                <a href="#" class="flex items-center justify-between px-3 py-1.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.03] rounded-md transition-colors group">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-3 text-white/30 group-hover:text-[#E10600] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                        Inquiries
                    </div>
                    <span class="text-[10px] bg-[#E10600]/20 text-[#E10600] px-1.5 py-0.5 rounded-full font-semibold">12</span>
                </a>
                <a href="#" class="flex items-center px-3 py-1.5 text-sm font-medium text-white/50 hover:text-white hover:bg-white/[0.03] rounded-md transition-colors group">
                    <svg class="w-4 h-4 mr-3 text-white/30 group-hover:text-white/70 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    SEO & Meta
                </a>
            </div>
        </div>
    </nav>
    
    <div class="p-3 border-t border-white/5 bg-[#080808] shrink-0 relative">
        <div class="relative">
            
            <div x-show="userMenuOpen" 
                 x-transition:enter="transition ease-out duration-200" 
                 x-transition:enter-start="opacity-0 translate-y-2 scale-98" 
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100" 
                 x-transition:leave="transition ease-in duration-150" 
                 x-transition:leave-start="opacity-100 translate-y-0 scale-100" 
                 x-transition:leave-end="opacity-0 translate-y-2 scale-98" 
                 @click.away="userMenuOpen = false" 
                 class="absolute bottom-full left-0 mb-2 w-full bg-[#0D0D0D]/95 backdrop-blur-xl border border-white/10 rounded-none shadow-2xl overflow-hidden z-50" 
                 x-cloak>
                
                <div class="px-4 py-3 bg-white/[0.02] border-b border-white/5">
                    <p class="text-xs font-semibold text-white tracking-wide truncate">{{ auth()->user()->name ?? 'Executive Admin' }}</p>
                    <p class="text-[10px] text-white/40 truncate mt-0.5">{{ auth()->user()->email ?? 'admin@royaldreamcar.com' }}</p>
                </div>
                
                <div class="p-1.5 space-y-0.5">
                    <a href="#" class="flex items-center px-3 py-2 text-xs text-white/70 hover:text-white hover:bg-white/5 rounded transition-colors">
                        <svg class="w-3.5 h-3.5 mr-2.5 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Account Profile
                    </a>
                </div>
                
                <div class="p-2 border-t border-white/5 bg-black/40 flex justify-center">
                    <button
                        @click="logoutModalOpen = true; userMenuOpen = false"
                        class="group inline-flex items-center justify-center gap-2 w-full px-3 py-2 text-[11px] font-medium tracking-wider text-[#E10600] border border-[#E10600]/20 bg-[#E10600]/5 hover:bg-[#E10600] hover:text-white hover:border-[#E10600] transition-all duration-300 rounded-none uppercase">
                        <svg class="w-3 h-3 transition-transform duration-300 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H9m4 8H7a2 2 0 01-2-2V6a2 2 0 012-2h6"/>
                        </svg>
                        <span>Terminate Session</span>
                    </button>
                </div>
            </div>

            <button @click="userMenuOpen = !userMenuOpen" 
                    class="w-full flex items-center p-2 border border-white/5 bg-black/40 hover:bg-white/[0.02] hover:border-white/10 transition-all duration-200 group">
                <div class="w-7 h-7 rounded-none bg-gradient-to-tr from-[#111] to-[#222] border border-white/10 overflow-hidden flex items-center justify-center shrink-0 group-hover:border-white/30 transition-colors">
                    <span class="text-xs font-mono font-bold text-white/80 group-hover:text-white">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</span>
                </div>
                <div class="flex-1 min-w-0 text-left ml-3">
                    <p class="text-xs font-medium text-white/80 truncate group-hover:text-white transition-colors">{{ auth()->user()->name ?? 'Executive Admin' }}</p>
                    <p class="text-[9px] text-white/30 uppercase tracking-widest truncate">System Controller</p>
                </div>
                <svg class="w-3.5 h-3.5 text-white/20 group-hover:text-white/60 transition-transform duration-300 transform" :class="userMenuOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 15l7-7 7 7"/>
                </svg>
            </button>

        </div>
    </div>
</aside>

    <main class="flex-1 flex flex-col min-w-0 bg-[#0A0A0A]">
        
        <header class="h-14 border-b border-white/5 flex items-center justify-between px-4 lg:px-8 shrink-0 bg-[#050505]">
            <button @click="sidebarOpen = true" class="lg:hidden text-white/50 hover:text-white mr-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>

            <div class="flex-1 max-w-md">
                <button @click="cmdKOpen = true" class="w-full flex items-center justify-between bg-white/[0.03] border border-white/10 hover:border-white/20 hover:bg-white/[0.05] rounded-md px-3 py-1.5 text-sm text-white/40 transition-colors">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        Search contents, vehicles, settings...
                    </span>
                    <kbd class="hidden sm:inline-block border border-white/10 rounded bg-white/5 px-1.5 text-[10px] font-medium text-white/50">⌘K</kbd>
                </button>
            </div>

            <div class="flex items-center space-x-4 ml-4">
                <button class="hidden sm:flex items-center px-3 py-1.5 bg-white text-black hover:bg-white/90 text-sm font-medium rounded-md transition-colors shadow-[0_0_15px_rgba(255,255,255,0.1)]">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Create
                </button>
                
                <button class="text-white/50 hover:text-white transition-colors relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span class="absolute top-0 right-0 w-1.5 h-1.5 bg-[#E10600] rounded-full ring-2 ring-[#050505]"></span>
                </button>


                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-4 md:p-8 lg:p-10 lg:max-w-7xl mx-auto w-full">
            
            <div class="mb-8 md:mb-12">
                <h2 class="text-2xl font-semibold tracking-tight text-white mb-1">Content Studio</h2>
                <p class="text-sm text-white/50 font-light">Manage digital assets, inventory, and global configurations.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
                <div class="p-4 rounded-xl border border-white/10 bg-white/[0.02] hover:bg-white/[0.04] transition-colors">
                    <p class="text-xs font-medium text-white/50 mb-1">Published Content</p>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-semibold text-white">48</span>
                        <span class="text-xs text-green-500 flex items-center"><svg class="w-3 h-3 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>2</span>
                    </div>
                </div>
                <div class="p-4 rounded-xl border border-white/10 bg-white/[0.02] hover:bg-white/[0.04] transition-colors">
                    <p class="text-xs font-medium text-white/50 mb-1">Drafts & Revisions</p>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-semibold text-white">12</span>
                    </div>
                </div>
                <div class="p-4 rounded-xl border border-[#E10600]/30 bg-[#E10600]/[0.02] hover:bg-[#E10600]/[0.05] transition-colors">
                    <p class="text-xs font-medium text-[#E10600] mb-1">Action Required</p>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-semibold text-white">4</span>
                        <span class="text-xs text-white/40">VIP Inquiries</span>
                    </div>
                </div>
                <div class="p-4 rounded-xl border border-white/10 bg-white/[0.02] hover:bg-white/[0.04] transition-colors">
                    <p class="text-xs font-medium text-white/50 mb-1">SEO Health</p>
                    <div class="flex items-baseline space-x-2">
                        <span class="text-2xl font-semibold text-white">94%</span>
                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <h3 class="text-sm font-medium text-white/80 mb-4 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Recent Content Updates
                        </h3>
                        
                        <div class="border border-white/10 rounded-xl overflow-hidden bg-white/[0.01]">
                            <div class="flex items-center justify-between p-4 border-b border-white/5 hover:bg-white/[0.03] transition-colors group cursor-pointer">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-white/50 group-hover:bg-white/10 group-hover:text-white transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-white">Homepage Hero Section</h4>
                                        <p class="text-xs text-white/40">Updated 2 hours ago by You</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-green-500/10 text-green-400 border border-green-500/20">Live</span>
                                    <button class="text-white/20 hover:text-white transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"/></svg></button>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between p-4 border-b border-white/5 hover:bg-white/[0.03] transition-colors group cursor-pointer">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-white/50 group-hover:bg-white/10 group-hover:text-white transition-all">
                                        <span class="w-1.5 h-1.5 rounded-full bg-white/50 group-hover:bg-white"></span>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-white">Ferrari SF90 Stradale</h4>
                                        <p class="text-xs text-white/40">Vehicle Inventory • Draft saved</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-white/5 text-white/60 border border-white/10">Draft</span>
                                    <button class="text-white/20 hover:text-white transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"/></svg></button>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 hover:bg-white/[0.03] transition-colors group cursor-pointer">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-white/50 group-hover:bg-white/10 group-hover:text-white transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-white">Client Testimonial: J. Smith</h4>
                                        <p class="text-xs text-white/40">Updated yesterday by System Admin</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-green-500/10 text-green-400 border border-green-500/20">Live</span>
                                    <button class="text-white/20 hover:text-white transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"/></svg></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <h3 class="text-sm font-medium text-white/80 mb-4">Quick Studio Actions</h3>
                        <div class="space-y-2">
                            <button class="w-full flex items-center justify-between p-3 rounded-lg border border-white/5 hover:border-white/20 bg-white/[0.02] hover:bg-white/[0.05] transition-all text-sm font-medium text-white/80 hover:text-white group">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-3 text-[#E10600]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    Add Vehicle
                                </span>
                            </button>
                            <button class="w-full flex items-center justify-between p-3 rounded-lg border border-white/5 hover:border-white/20 bg-white/[0.02] hover:bg-white/[0.05] transition-all text-sm font-medium text-white/80 hover:text-white group">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-3 text-white/40 group-hover:text-white/80 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                    Upload Media
                                </span>
                            </button>
                            <button class="w-full flex items-center justify-between p-3 rounded-lg border border-white/5 hover:border-white/20 bg-white/[0.02] hover:bg-white/[0.05] transition-all text-sm font-medium text-white/80 hover:text-white group">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-3 text-white/40 group-hover:text-white/80 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    Edit Homepage
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="border border-[#E10600]/20 rounded-xl bg-gradient-to-b from-[#E10600]/[0.05] to-transparent p-5">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-sm font-medium text-white flex items-center">
                                <span class="w-2 h-2 rounded-full bg-[#E10600] animate-pulse mr-2"></span>
                                Priority Inquiries
                            </h3>
                            <a href="#" class="text-xs text-white/50 hover:text-white">View All</a>
                        </div>
                        <div class="space-y-4">
                            <div class="group cursor-pointer">
                                <p class="text-sm text-white font-medium group-hover:text-[#E10600] transition-colors">Interest: Rolls-Royce Ghost</p>
                                <p class="text-xs text-white/40 truncate">"Looking to secure an allocation for..."</p>
                                <p class="text-[10px] text-white/30 mt-1 uppercase tracking-widest">10 mins ago</p>
                            </div>
                            <div class="h-px w-full bg-white/5"></div>
                            <div class="group cursor-pointer">
                                <p class="text-sm text-white font-medium group-hover:text-[#E10600] transition-colors">Private Viewing Request</p>
                                <p class="text-xs text-white/40 truncate">"Available this Thursday afternoon..."</p>
                                <p class="text-[10px] text-white/30 mt-1 uppercase tracking-widest">1 hour ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="h-20"></div>
        </div>
    </main>

    <div x-show="cmdKOpen" class="fixed inset-0 z-[100] flex items-start justify-center pt-20 sm:pt-32 px-4" x-cloak>
        <div x-show="cmdKOpen" x-transition.opacity class="fixed inset-0 bg-black/60 backdrop-blur-sm" @click="cmdKOpen = false"></div>
        <div x-show="cmdKOpen" 
             x-transition:enter="ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="relative w-full max-w-xl glass-panel rounded-xl shadow-2xl overflow-hidden border border-white/10 bg-[#111]">
            <div class="flex items-center px-4 py-3 border-b border-white/10">
                <svg class="w-5 h-5 text-white/40 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" placeholder="Search pages, vehicles, or actions..." class="w-full bg-transparent border-0 text-white placeholder-white/40 focus:ring-0 sm:text-sm font-light outline-none" autofocus>
                <kbd class="hidden sm:inline-block border border-white/10 rounded bg-white/5 px-1.5 py-0.5 text-[10px] font-medium text-white/40 ml-3">ESC</kbd>
            </div>
            <div class="max-h-80 overflow-y-auto py-2">
                <div class="px-4 py-1 text-[10px] uppercase tracking-widest text-white/30">Suggestions</div>
                <a href="#" class="flex items-center px-4 py-2 hover:bg-white/[0.05] transition-colors group">
                    <svg class="w-4 h-4 text-white/40 mr-3 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span class="text-sm text-white/80 group-hover:text-white">Create new Vehicle entry</span>
                </a>
                <a href="#" class="flex items-center px-4 py-2 hover:bg-white/[0.05] transition-colors group">
                    <svg class="w-4 h-4 text-white/40 mr-3 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                    <span class="text-sm text-white/80 group-hover:text-white">Media Library</span>
                </a>
            </div>
        </div>
    </div>

    <div x-show="logoutModalOpen" class="fixed inset-0 z-[100] flex items-center justify-center px-4" x-cloak>
        <div x-show="logoutModalOpen" x-transition.opacity class="fixed inset-0 bg-black/80 backdrop-blur-md" @click="logoutModalOpen = false"></div>
        <div x-show="logoutModalOpen" 
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-4"
             class="relative w-full max-w-sm glass-panel rounded-2xl p-6 border border-white/10 shadow-2xl bg-[#0A0A0A]">
            
            <div class="w-12 h-12 rounded-full bg-[#E10600]/10 flex items-center justify-center mb-5 border border-[#E10600]/20">
                <svg class="w-6 h-6 text-[#E10600]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            </div>
            
            <h3 class="text-lg font-medium text-white mb-2">End Session?</h3>
            <p class="text-sm text-white/50 mb-6 font-light">Are you sure you want to securely log out of the Royal Dream Car administrative command center? Unsaved draft changes may be lost.</p>
            
            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3">
                <button @click="logoutModalOpen = false" class="flex-1 px-4 py-2.5 rounded-lg border border-white/10 text-white text-sm font-medium hover:bg-white/5 transition-colors focus:outline-none focus:ring-2 focus:ring-white/20">
                    Cancel
                </button>
                <form method="POST" action="{{ route('admin.logout') }}" class="flex-1 m-0" x-ref="logoutForm">
                    @csrf
                    <button type="button" @click="if(confirm('Are you sure you want to log out? This will end your administrative session.')) { $refs.logoutForm.submit(); }" class="w-full px-4 py-2.5 rounded-lg bg-[#E10600] hover:bg-[#c20500] text-white text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-[#E10600]/50 shadow-[0_0_15px_rgba(225,6,0,0.2)]">
                        Confirm Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>