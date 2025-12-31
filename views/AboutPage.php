<?php include __DIR__ . '/partials/header.php'; ?>

<main class="flex-1 flex overflow-hidden">
    <!-- LEFT SIDEBAR: (Optional for this page) -->
    <aside class="w-64 bg-slate-100 border-r border-slate-200 hidden lg:block"></aside>

    <!-- CENTER PANE: The Content -->
    <section class="flex-1 overflow-y-auto p-12 bg-white">
        <div class="max-w-3xl">
            <h1 class="text-5xl font-black text-slate-900 mb-2 tracking-tighter uppercase">Operations <span class="text-emerald-500">Matter.</span></h1>
            <p class="text-emerald-600 font-mono text-sm mb-8 font-bold"># tail -f /var/log/infrastructure</p>
            
            <div class="space-y-8 text-slate-600 leading-relaxed text-lg">
                <p class="text-2xl font-medium text-slate-800">OpsNerds is where the world goes when infrastructure breaks and every second counts.</p>
                
                <p>We don't do "digital transformation" buzzwords. We deal with reality. From a home IoT gateway failing in a smart house to an enterprise-scale network refresh that cannot afford an hour of downtime—we are the bridge between the problem and the professional.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 my-12">
                    <div class="bg-slate-50 p-6 rounded-lg border-t-2 border-emerald-500">
                        <h3 class="font-bold text-slate-900 mb-2">The Mission</h3>
                        <p class="text-sm">Eliminate the "freelancer noise." No bidding wars, no complex workflows. Just a direct line to elite contractors who know how to keep the world running.</p>
                    </div>
                    <div class="bg-slate-50 p-6 rounded-lg border-t-2 border-slate-900">
                        <h3 class="font-bold text-slate-900 mb-2">The Filter</h3>
                        <p class="text-sm">If you need an app built, go to Freelancer.com or Upwork. If you need that app to <span class="italic font-bold">work</span>, you're in the right place.</p>
                    </div>
                </div>

                <p class="bg-slate-900 text-emerald-400 p-8 rounded-xl font-mono text-sm shadow-2xl">
                    <span class="text-slate-500">// Our Philosophy</span><br>
                    <span class="text-blue-400">if</span> ($infrastructure == <span class="text-orange-400">'broken'</span>) {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;call_opsnerd();<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-slate-500">// Problem Solved.</span><br>
                    }
                </p>
            </div>
        </div>
    </section>

    <!-- RIGHT SIDEBAR: (Optional for this page) -->
    <aside class="w-80 bg-slate-50 border-l border-slate-200 p-8 hidden xl:block"></aside>
</main>

<!-- BOTTOM STATUS BAR -->
<footer class="bg-slate-900 text-slate-400 px-4 py-1 text-[10px] flex justify-between items-center border-t border-slate-700">
    <div>System Status: <span class="text-emerald-500 underline">Operational</span></div>
    <div>&copy; <?php echo date('Y'); ?> OpsNerds Ecosystem</div>
</footer>

</body>
</html>
