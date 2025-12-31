<?php include __DIR__ . '/partials/header.php'; ?>

<main class="flex-1 flex overflow-hidden w-full">
    <!-- LEFT SIDEBAR (The IDE "File Tree" feel) -->
    <aside class="w-64 bg-slate-900 border-r border-slate-800 shrink-0 hidden lg:block">
        <div class="p-8">
            <h3 class="text-[10px] font-black text-slate-600 uppercase tracking-[0.3em] mb-6">Directory</h3>
            <div class="space-y-2 text-xs font-mono">
                <p class="text-emerald-500">/about_us.md</p>
                <p class="text-slate-600 hover:text-slate-400 cursor-pointer">/manifesto.sh</p>
                <p class="text-slate-600 hover:text-slate-400 cursor-pointer">/protocols.json</p>
            </div>
        </div>
    </aside>

    <!-- CENTER PANE (The Editor) -->
    <section class="flex-1 overflow-y-auto bg-white rounded-tl-[2rem] shadow-2xl">
        <div class="p-12 max-w-4xl">
            <header class="mb-12">
                <h1 class="text-5xl font-black text-slate-900 tracking-tighter uppercase">Operations <span class="text-emerald-600">Matter.</span></h1>
                <p class="text-slate-400 font-mono text-sm mt-2"># tail -f /var/log/infrastructure</p>
            </header>

            <div class="prose prose-slate lg:prose-xl text-slate-600 space-y-8 leading-relaxed">
                <p class="text-2xl font-medium text-slate-800">OpsNerds is where the world goes when infrastructure breaks and every second counts.</p>
                
                <p>We don't do "digital transformation" buzzwords. We deal with reality. From a home IoT gateway failing in a smart house to an enterprise-scale network refresh that cannot afford an hour of downtime—we are the bridge between the problem and the professional.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 my-12">
                    <div class="bg-slate-50 p-8 rounded-2xl border-t-4 border-emerald-500">
                        <h3 class="font-bold text-slate-900 mb-2 uppercase tracking-tight">The Mission</h3>
                        <p class="text-sm">Eliminate the "freelancer noise." No bidding wars, no complex workflows. Just a direct line to elite contractors who know how to keep the world running.</p>
                    </div>
                    <div class="bg-slate-900 p-8 rounded-2xl border-t-4 border-emerald-400 text-white">
                        <h3 class="font-bold text-emerald-400 mb-2 uppercase tracking-tight">The Filter</h3>
                        <p class="text-sm">If you need an app built, go to Upwork. If you need that app to <span class="italic font-bold">work</span>, you're in the right place.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RIGHT SIDEBAR (The IDE "Inspector") -->
    <aside class="w-80 bg-slate-900 border-l border-slate-800 shrink-0 hidden xl:block">
        <div class="p-8">
            <h3 class="text-[10px] font-black text-slate-600 uppercase tracking-[0.3em] mb-6">Metadata</h3>
            <div class="bg-slate-800/50 p-4 rounded border border-slate-700 font-mono text-[10px] text-slate-500">
                <p>FILE: AboutPage.php</p>
                <p>LANG: PHP 8.3</p>
                <p>CSS: Tailwind 3.0</p>
            </div>
        </div>
    </aside>
</main>

<footer class="w-full bg-slate-950 text-slate-600 px-6 py-1 text-[10px] border-t border-slate-800 flex justify-between items-center shrink-0">
    <div class="font-mono uppercase tracking-widest">Sys_Ready_V1</div>
    <div class="font-mono text-emerald-900 uppercase">Production_Environment</div>
</footer>

</body>
</html>
