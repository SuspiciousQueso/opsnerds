<?php include __DIR__ . '/partials/header.php'; ?>

<main class="min-h-screen flex flex-col bg-slate-950 text-white overflow-x-hidden">
    <!-- HERO SECTION -->
    <section class="relative py-20 md:py-32 px-6 flex items-center justify-center border-b border-slate-900">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#10b981 0.5px, transparent 0.5px); background-size: 24px 24px;"></div>
        
        <div class="max-w-5xl w-full text-center z-10">
            <div class="inline-flex items-center gap-2 bg-emerald-500/10 border border-emerald-500/20 px-3 py-1 rounded-full mb-8">
                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                <span class="text-[10px] font-black font-mono text-emerald-500 tracking-[0.3em] uppercase">OpsNerds Intelligence v1.0</span>
            </div>

            <h1 class="text-6xl md:text-9xl font-black tracking-tighter mb-6 leading-[0.85] uppercase">
                OPS<span class="text-emerald-500">NERDS</span>
            </h1>
            
            <p class="text-xl md:text-3xl text-slate-400 mb-12 max-w-3xl mx-auto leading-tight font-light">
                Infrastructure problems solved by people who <span class="text-white font-bold italic underline decoration-emerald-500">actually run infrastructure.</span>
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-16">
                <a href="index.php?action=register" class="bg-emerald-600 hover:bg-emerald-500 text-white px-10 py-5 rounded-md font-black uppercase tracking-widest text-sm shadow-2xl shadow-emerald-900/40 transition-all hover:-translate-y-1 text-center">Find an Operator</a>
                <a href="index.php?action=post_job" class="bg-slate-800 hover:bg-slate-700 text-white px-10 py-5 rounded-md font-black uppercase tracking-widest text-sm border border-slate-700 transition text-center">Post an Ops Job</a>
            </div>

            <p class="text-xs font-mono text-slate-500 uppercase tracking-widest">This is infrastructure work &mdash;&gt;</p>
        </div>
    </section>

    <!-- THE "DIFFERENCE" SECTION -->
    <section class="py-24 px-6 bg-slate-900 border-b border-slate-800">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-black mb-6 uppercase tracking-tight">Most platforms are built for <span class="text-slate-500">projects.</span><br>OpsNerds is built for <span class="text-emerald-500">operations.</span></h2>
                <p class="text-lg text-slate-400 leading-relaxed">If you need an app built, go to Freelancer or Upwork. They are great resources for that! However, If you need that app to <span class="text-white font-bold italic">work as designed</span>, you're in the right place. Keep reading.</p>
            </div>
            
            <div class="grid grid-cols-2 gap-4 font-mono text-xs">
                <div class="bg-slate-950 p-6 border border-slate-800 rounded-lg">
                    <p class="text-red-500 mb-4 font-bold uppercase tracking-widest">We Don't:</p>
                    <ul class="space-y-2 text-slate-500">
                        <li>- Design logos</li>
                        <li>- Pitch MVPs</li>
                        <li>- Sell buzzwords</li>
                    </ul>
                </div>
                <div class="bg-slate-950 p-6 border border-emerald-900/30 rounded-lg">
                    <p class="text-emerald-500 mb-4 font-bold uppercase tracking-widest">We Do:</p>
                    <ul class="space-y-2 text-slate-300">
                        <li>+ Fix broken systems</li>
                        <li>+ Stabilize infrastructure</li>
                        <li>+ Keep things online</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- LIVE TRIAGE FEED (Your favorite part) -->
    <section class="bg-slate-950 border-t border-slate-900 flex flex-col md:flex-row divide-y md:divide-y-0 md:divide-x divide-slate-800">
        <div class="flex-1 p-10">
            <h3 class="text-[10px] font-bold text-emerald-500 uppercase tracking-[0.3em] mb-8 flex items-center gap-2">
                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-ping"></span>
                Triage Scope
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 font-mono text-xs text-slate-400">
                <div class="hover:text-white transition">/ Networking & BGP</div>
                <div class="hover:text-white transition">/ Server Admin (Linux/Win)</div>
                <div class="hover:text-white transition">/ Hybrid & Cloud Ops</div>
                <div class="hover:text-white transition">/ Recovery & Cleanup</div>
                <div class="hover:text-white transition">/ Incident Response</div>
                <div class="hover:text-white transition">/ Home Lab & IoT Chaos</div>
            </div>
        </div>
        
        <div class="w-full md:w-96 p-10 bg-slate-900/50">
            <h3 class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.3em] mb-8">Part of the Ecosystem</h3>
            <p class="text-xs text-slate-400 leading-relaxed mb-4 italic">OpsNerds runs standalone — but it’s also part of the <span class="text-emerald-500 font-bold">MSPGuild</span> ecosystem.</p>
            <p class="text-[10px] text-slate-500 font-mono tracking-tighter uppercase leading-tight">One identity. Shared reputation. Real operational history.</p>
        </div>
    </section>

    <footer class="bg-slate-950 text-slate-600 px-8 py-4 text-[10px] flex justify-between items-center border-t border-slate-900 mt-auto">
        <div>// No noise. No filler work. Just infrastructure.</div>
        <div class="font-mono text-emerald-900 uppercase">Status: system_ready</div>
    </footer>
</main>
</body>
</html>
