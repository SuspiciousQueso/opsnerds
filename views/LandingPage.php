<?php include __DIR__ . '/partials/header.php'; ?>

<main class="flex-1 flex flex-col overflow-hidden bg-slate-950">
    <!-- HERO SECTION: The Manifesto -->
    <section class="flex-1 flex items-center justify-center p-8 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#10b981 0.5px, transparent 0.5px); background-size: 24px 24px;"></div>
        
        <div class="max-w-5xl w-full text-center z-10">
            <h1 class="text-6xl md:text-8xl font-black text-white tracking-tighter mb-4">
                BUILT TO <span class="text-emerald-500">WORK.</span>
            </h1>
            <p class="text-xl md:text-2xl text-slate-400 mb-8 max-w-2xl mx-auto leading-tight font-light">
                If you need an app built, go to Upwork. If you need that app to <span class="text-white font-bold italic">actually function</span>, you're in the right place.
            </p>
            
            <div class="flex flex-wrap justify-center gap-4">
                <a href="index.php?action=register" class="bg-emerald-600 hover:bg-emerald-500 text-white px-8 py-4 rounded-md font-bold text-lg shadow-xl shadow-emerald-900/20 transition-all hover:-translate-y-1">Initialize Connection</a>
                <a href="index.php?action=about" class="bg-slate-800 hover:bg-slate-700 text-slate-300 px-8 py-4 rounded-md font-bold text-lg border border-slate-700 transition">View Protocol</a>
            </div>
        </div>
    </section>

    <!-- LIVE TRIAGE & SPECIALTIES: The IDE Footer Area -->
    <section class="h-64 bg-slate-900 border-t border-slate-800 flex flex-col md:flex-row divide-y md:divide-y-0 md:divide-x divide-slate-800">
        <!-- Live Triage Feed -->
        <div class="flex-1 p-6 flex flex-col">
            <h3 class="text-[10px] font-bold text-emerald-500 uppercase tracking-[0.2em] mb-4 flex items-center gap-2">
                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-ping"></span>
                Live Triage Feed
            </h3>
            <div class="font-mono text-xs space-y-2 text-slate-400 overflow-hidden">
                <p><span class="text-slate-600">[14:22:01]</span> <span class="text-blue-400">CRITICAL:</span> VPN Gateway unreachable (NYC-01) - <span class="text-emerald-400">Nerd Dispatched</span></p>
                <p><span class="text-slate-600">[14:19:45]</span> <span class="text-slate-500">INFO:</span> IoT Mesh Latency spike detected (Smart-Home-v2)</p>
                <p><span class="text-slate-600">[14:15:10]</span> <span class="text-emerald-500">SUCCESS:</span> BGP Route optimization complete (Enterprise-Global)</p>
                <p><span class="text-slate-600">[14:08:22]</span> <span class="text-orange-400">WARN:</span> Proximity sensor hardware failure (Home-Ops-Alpha)</p>
            </div>
        </div>

        <!-- Specialties Terminal -->
        <div class="w-full md:w-96 p-6 flex flex-col bg-slate-950/50">
            <h3 class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4">Core Specialties</h3>
            <div class="grid grid-cols-2 gap-y-2 font-mono text-[11px]">
                <div class="text-slate-300 hover:text-emerald-400 cursor-default transition">01. Networking</div>
                <div class="text-slate-300 hover:text-emerald-400 cursor-default transition">02. IoT Home</div>
                <div class="text-slate-300 hover:text-emerald-400 cursor-default transition">03. Server Ops</div>
                <div class="text-slate-300 hover:text-emerald-400 cursor-default transition">04. Security</div>
                <div class="text-slate-300 hover:text-emerald-400 cursor-default transition">05. Cloud Arch</div>
                <div class="text-slate-300 hover:text-emerald-400 cursor-default transition">06. SRE Triage</div>
            </div>
        </div>
    </section>
</main>

<footer class="bg-slate-950 text-slate-600 px-4 py-1 text-[10px] flex justify-between items-center border-t border-slate-900">
    <div>// OpsNerds Terminal v1.0.42</div>
    <div class="flex gap-4 italic font-bold">
        <span>uptime: 99.999%</span>
        <span class="text-emerald-900 font-mono">system_ready</span>
    </div>
</footer>
</body>
</html>
