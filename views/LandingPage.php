<?php include __DIR__ . '/partials/header.php'; ?>

<!-- We use min-h-screen and flex-col to allow the page to grow with content -->
<main class="min-h-screen flex flex-col bg-slate-950 text-white overflow-x-hidden">
    
    <!-- HERO SECTION: The Manifesto -->
    <section class="relative py-20 md:py-32 px-6 flex items-center justify-center overflow-hidden border-b border-slate-900">
        <!-- Technical Grid Background -->
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#10b981 0.5px, transparent 0.5px); background-size: 24px 24px;"></div>
        
        <div class="max-w-5xl w-full text-center z-10">
            <!-- Brand Badge -->
            <div class="inline-flex items-center gap-2 bg-emerald-500/10 border border-emerald-500/20 px-3 py-1 rounded-full mb-6">
                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                <span class="text-xs font-mono font-bold text-emerald-500 tracking-widest uppercase">OpsNerds Infrastructure v1.0</span>
            </div>

            <h1 class="text-5xl md:text-8xl font-black tracking-tighter mb-6 leading-[0.9]">
                BUILT TO <span class="text-emerald-500">WORK.</span>
            </h1>
            
            <p class="text-lg md:text-2xl text-slate-400 mb-10 max-w-2xl mx-auto leading-relaxed font-light">
                If you need an app built, go to Upwork. If you need that app to <span class="text-white font-bold italic underline decoration-emerald-500">actually function</span>, you're in the right place.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="index.php?action=register" class="bg-emerald-600 hover:bg-emerald-500 text-white px-8 py-4 rounded-md font-bold text-lg shadow-xl shadow-emerald-900/20 transition-all hover:-translate-y-1 text-center">Initialize Connection</a>
                <a href="index.php?action=about" class="bg-slate-800 hover:bg-slate-700 text-slate-300 px-8 py-4 rounded-md font-bold text-lg border border-slate-700 transition text-center">View Protocol</a>
            </div>
        </div>
    </section>

    <!-- LIVE TRIAGE & SPECIALTIES -->
    <!-- Removed fixed height (h-64) so it stacks correctly on mobile -->
    <section class="bg-slate-900 border-t border-slate-800 flex flex-col md:flex-row divide-y md:divide-y-0 md:divide-x divide-slate-800">
        <!-- Live Triage Feed -->
        <div class="flex-1 p-8 flex flex-col">
            <h3 class="text-[10px] font-bold text-emerald-500 uppercase tracking-[0.2em] mb-6 flex items-center gap-2">
                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-ping"></span>
                Live Triage Feed
            </h3>
            <div class="font-mono text-[11px] md:text-xs space-y-3 text-slate-400">
                <p><span class="text-slate-600">[14:22:01]</span> <span class="text-blue-400 font-bold">CRITICAL:</span> VPN Gateway unreachable (NYC-01) - <span class="text-emerald-400">Nerd Dispatched</span></p>
                <p><span class="text-slate-600">[14:19:45]</span> <span class="text-slate-500">INFO:</span> IoT Mesh Latency spike detected (Smart-Home-v2)</p>
                <p><span class="text-slate-600">[14:15:10]</span> <span class="text-emerald-500 font-bold">SUCCESS:</span> BGP Route optimization complete (Enterprise-Global)</p>
                <p><span class="text-slate-600">[14:08:22]</span> <span class="text-orange-400 font-bold">WARN:</span> Proximity sensor hardware failure (Home-Ops-Alpha)</p>
            </div>
        </div>

        <!-- Specialties Terminal -->
        <div class="w-full md:w-96 p-8 flex flex-col bg-slate-950/50">
            <h3 class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-6">Core Specialties</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 font-mono text-xs">
                <div class="text-slate-300 hover:text-emerald-400 cursor-default transition flex items-center gap-2"><span class="text-slate-700">01.</span> Networking</div>
                <div class="text-slate-300 hover:text-emerald-400 cursor-default transition flex items-center gap-2"><span class="text-slate-700">02.</span> IoT Home</div>
                <div class="text-slate-300 hover:text-emerald-400 cursor-default transition flex items-center gap-2"><span class="text-slate-700">03.</span> Server Ops</div>
                <div class="text-slate-300 hover:text-emerald-400 cursor-default transition flex items-center gap-2"><span class="text-slate-700">04.</span> Security</div>
                <div class="text-slate-300 hover:text-emerald-400 cursor-default transition flex items-center gap-2"><span class="text-slate-700">05.</span> Cloud Arch</div>
                <div class="text-slate-300 hover:text-emerald-400 cursor-default transition flex items-center gap-2"><span class="text-slate-700">06.</span> SRE Triage</div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-slate-600 px-6 py-4 text-[10px] flex flex-col md:flex-row justify-between items-center border-t border-slate-900 gap-4 mt-auto">
        <div>// OpsNerds Terminal &copy; <?php echo date('Y'); ?></div>
        <div class="flex gap-6 italic font-bold">
            <span class="flex items-center gap-1"><span class="w-1 h-1 bg-emerald-500 rounded-full"></span> uptime: 99.9%</span>
            <span class="text-emerald-900 font-mono tracking-tighter">status_ready</span>
        </div>
    </footer>
</main>
</body>
</html>
