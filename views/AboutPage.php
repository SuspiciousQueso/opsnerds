<?php include __DIR__ . '/partials/header.php'; ?>

<main class="flex-1 flex overflow-hidden">
    <!-- LEFT SIDEBAR: (Optional for this page) -->
    <aside class="w-64 bg-slate-100 border-r border-slate-200 hidden lg:block"></aside>

    <!-- CENTER PANE: The Content -->
    <section class="flex-1 overflow-y-auto p-12 bg-white">
        <div class="max-w-3xl">
            <h1 class="text-4xl font-extrabold text-slate-900 mb-6 italic tracking-tight">About <span class="text-emerald-500">OpsNerds</span></h1>
            
            <div class="prose prose-slate lg:prose-lg space-y-6 text-slate-600 leading-relaxed">
                <p class="text-xl">OpsNerds is a human-first marketplace for technical operations. We connect experienced IT professionals with those who need reliable, on-demand support.</p>
                
                <p>Our philosophy is simple: <span class="font-bold text-slate-900">no bidding wars, no complex workflows</span>—just real people solving real problems.</p>
                
                <div class="bg-slate-50 border-l-4 border-emerald-500 p-6 rounded-r-lg my-8">
                    <p class="italic text-slate-700">"We built OpsNerds because technical support shouldn't feel like a bureaucracy. It should feel like calling a friend who happens to be a genius."</p>
                </div>
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
