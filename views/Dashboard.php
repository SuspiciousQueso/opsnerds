<?php include __DIR__ . '/partials/header.php'; ?>

<!-- Main must be w-full and flex-1 to push the footer down -->
<main class="w-full flex-1 flex overflow-hidden bg-slate-900">
    <!-- LEFT SIDEBAR -->
    <aside class="w-64 bg-slate-900 border-r border-slate-800 flex flex-col hidden lg:flex shrink-0">
        <div class="p-8">
            <h3 class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] mb-6">Directory</h3>
            <nav class="space-y-2">
                <a href="index.php?action=profile" class="flex items-center px-4 py-3 text-xs font-bold text-slate-300 bg-slate-800 border border-slate-700 rounded-lg hover:border-emerald-500 transition-all">
                    ~/profile
                </a>
                <a href="index.php?action=my_jobs" class="flex items-center px-4 py-3 text-xs font-bold text-slate-500 hover:text-slate-200 transition">
                    ~/my-posts
                </a>
            </nav>
        </div>
    </aside>

    <!-- CENTER PANE: The Workspace -->
    <section class="flex-1 overflow-y-auto bg-white rounded-tl-[2rem] shadow-inner">
        <div class="p-12 max-w-[1400px] mx-auto">
            <header class="mb-16">
                <div class="flex items-center gap-3 mb-4">
                    <span class="px-2 py-1 bg-slate-900 text-emerald-400 font-mono text-[10px] rounded">STATUS: CONNECTED</span>
                    <span class="text-slate-300">/</span>
                    <span class="text-slate-400 font-mono text-[10px] uppercase"><?php echo $_SESSION['user_role']; ?></span>
                </div>
                <h1 class="text-6xl font-black text-slate-900 tracking-tighter uppercase">Ops<span class="text-emerald-600">Center</span></h1>
            </header>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
                <!-- Hire Card -->
                <div class="group relative bg-slate-50 border border-slate-200 p-10 rounded-[2rem] hover:shadow-2xl transition-all duration-500 overflow-hidden">
                    <div class="absolute top-0 right-0 p-8 opacity-5 text-slate-900">
                        <svg class="w-32 h-32" fill="currentColor" viewbox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </div>
                    <h2 class="text-4xl font-black text-slate-900 mb-4 tracking-tight">POST TICKET</h2>
                    <p class="text-slate-600 text-lg mb-10 max-w-sm leading-relaxed">Infrastructure critical failure? Initialize a support request and get an engineer on the line.</p>
                    <a href="index.php?action=post_job" class="inline-block bg-emerald-600 text-white font-black uppercase tracking-widest px-10 py-5 rounded-2xl hover:bg-emerald-500 transition-all shadow-xl shadow-emerald-200">Execute _init</a>
                </div>

                <!-- Work Card -->
                <div class="group bg-slate-900 border border-slate-800 p-10 rounded-[2rem] hover:shadow-2xl transition-all duration-500">
                    <h2 class="text-4xl font-black text-white mb-4 tracking-tight">BROWSE FEED</h2>
                    <p class="text-slate-400 text-lg mb-10 max-w-sm leading-relaxed">Put your hardware and network expertise to work. View active infrastructure incidents.</p>
                    <a href="index.php?action=browse_jobs" class="inline-block bg-white text-slate-900 font-black uppercase tracking-widest px-10 py-5 rounded-2xl hover:bg-emerald-400 transition-all shadow-xl shadow-emerald-500/10">Scan Workspace</a>
                </div>
            </div>
        </div>
    </section>

    <!-- RIGHT SIDEBAR -->
    <aside class="w-80 bg-slate-900 border-l border-slate-800 p-10 hidden xl:flex flex-col shrink-0">
        <h3 class="text-[10px] font-black text-slate-600 uppercase tracking-[0.3em] mb-8">Intelligence</h3>
        <div class="space-y-6">
            <div class="bg-slate-800/50 border border-slate-700 p-6 rounded-2xl">
                <div class="flex items-center gap-2 text-emerald-500 mb-4">
                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-ping"></span>
                    <span class="text-[10px] font-black uppercase tracking-widest">Ollama Online</span>
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed font-mono">Neural node 10.0.42.1 responded in 4ms. Resume parsing subroutines stand by.</p>
            </div>
        </div>
    </aside>
</main>

<!-- FOOTER -->
<footer class="w-full bg-slate-950 text-slate-600 px-6 py-2 text-[10px] flex justify-between items-center border-t border-slate-800 z-50">
    <div class="flex gap-6 font-mono">
        <span>LOC: <span class="text-emerald-600">PRODUCTION</span></span>
        <span>BR: <span class="text-slate-400 underline">main</span></span>
    </div>
    <div class="font-mono">SYS_READY_V1.0.42</div>
</footer>

</body>
</html>
