<?php include __DIR__ . '/partials/header.php'; ?>

<!-- The main container needs to grow to fill the screen below the header -->
<main class="flex-1 flex overflow-hidden bg-white">
    <!-- LEFT SIDEBAR: Context & Navigation -->
    <aside class="w-64 bg-slate-50 border-r border-slate-200 flex flex-col hidden lg:flex">
        <div class="p-6">
            <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">Workspace</h3>
            <nav class="space-y-1">
                <a href="index.php?action=profile" class="flex items-center px-3 py-2 text-sm font-medium text-slate-700 bg-white rounded shadow-sm border border-slate-200">
                    My Profile
                </a>
                <a href="index.php?action=my_jobs" class="flex items-center px-3 py-2 text-sm font-medium text-slate-600 hover:bg-slate-200 transition rounded">
                    My Job Posts
                </a>
            </nav>
        </div>
    </aside>

    <!-- CENTER PANE: The Main Workspace -->
    <section class="flex-1 overflow-y-auto p-10 bg-white">
        <div class="w-full max-w-[1200px]"> <!-- Changed from max-w-4xl to allow more width -->
            <header class="mb-12">
                <div class="flex items-center gap-3 mb-3">
                    <span class="text-[11px] bg-slate-100 text-slate-500 px-3 py-0.5 rounded-full font-mono">ID: <?php echo $_SESSION['user_id']; ?></span>
                    <span class="text-[11px] bg-emerald-100 text-emerald-700 px-3 py-0.5 rounded-full font-mono uppercase font-bold"><?php echo $_SESSION['user_role']; ?></span>
                </div>
                <h1 class="text-5xl font-black text-slate-900 tracking-tight">Dashboard</h1>
                <p class="text-slate-600 text-lg">Welcome back to the <span class="font-bold">OpsCenter</span>.</p>
            </header>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-10"> <!-- Changed gap and added responsive grid -->
                <!-- Action Card: Hire -->
                <div class="group bg-slate-50 border border-slate-200 p-8 rounded-3xl hover:border-emerald-500 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-500 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-black text-slate-900 mb-4 tracking-tight uppercase">Hire an <span class="text-emerald-600">OpsNerd</span></h2>
                        <p class="text-slate-600 mb-8 text-lg leading-relaxed">Infrastructure broken? Post a triage request and get an expert connected instantly.</p>
                    </div>
                    <a href="index.php?action=post_job" class="inline-flex items-center justify-center gap-3 bg-emerald-600 text-white px-8 py-4 rounded-2xl font-black uppercase tracking-widest hover:bg-emerald-500 transition-all shadow-lg shadow-emerald-200 text-sm">Post New Ticket</a>
                </div>

                <!-- Action Card: Find Work -->
                <div class="group bg-slate-50 border border-slate-200 p-8 rounded-3xl hover:border-blue-500 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-blue-500 group-hover:text-white transition-all duration-500 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-black text-slate-900 mb-4 tracking-tight uppercase">Find <span class="text-blue-600">Work</span></h2>
                        <p class="text-slate-600 mb-8 text-lg leading-relaxed">Browse active infrastructure issues and put your engineering skills to work.</p>
                    </div>
                    <a href="index.php?action=browse_jobs" class="inline-flex items-center justify-center gap-3 bg-slate-900 text-white px-8 py-4 rounded-2xl font-black uppercase tracking-widest hover:bg-slate-800 transition-all shadow-lg shadow-slate-200 text-sm">Browse Workspace</a>
                </div>
            </div>
        </div>
    </section>

    <!-- RIGHT SIDEBAR: Utilities & AI -->
    <aside class="w-80 bg-slate-50 border-l border-slate-200 p-8 hidden xl:block">
        <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-6">System Assistant</h3>
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full bg-emerald-500"></div>
            <div class="flex items-center gap-2 text-emerald-600 mb-3">
                <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                <span class="text-[10px] font-black uppercase tracking-tight">AI Core Active</span>
            </div>
            <p class="text-xs text-slate-600 leading-relaxed">Ollama node is responding. Your resume data parsing services are ready for deployment in the profile section.</p>
        </div>
    </aside>
</main>

<!-- BOTTOM STATUS BAR -->
<footer class="bg-slate-900 text-slate-500 px-4 py-1 text-[10px] flex justify-between items-center border-t border-slate-800 z-50">
    <div class="flex gap-4">
        <span>BRANCH: <span class="text-emerald-500">main</span></span>
        <span>ENV: <span class="text-orange-400 uppercase">production</span></span>
    </div>
    <div class="flex gap-4 font-mono">
        <span>LATENCY: <span class="text-emerald-500">14ms</span></span>
        <span class="text-slate-700">|</span>
        <span>UTF-8</span>
    </div>
</footer>

</body>
</html>
