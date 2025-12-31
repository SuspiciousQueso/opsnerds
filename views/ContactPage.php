<?php include __DIR__ . '/partials/header.php'; ?>

<main class="flex-1 flex overflow-hidden w-full bg-slate-950">
    <aside class="w-64 bg-slate-950 border-r border-slate-900 shrink-0 hidden lg:block">
        <!-- Re-use the same sidebar as About for consistency -->
        <div class="p-8">
            <h3 class="text-[10px] font-black text-slate-600 uppercase tracking-[0.3em] mb-6">Directory</h3>
            <div class="space-y-4 text-xs font-mono">
                <a href="index.php?action=about" class="block text-slate-500 hover:text-slate-300">about_us.md</a>
                <a href="index.php?action=manifesto" class="block text-slate-500 hover:text-slate-300">manifesto.sh</a>
                <a href="index.php?action=contact" class="block text-emerald-500 font-bold">protocols.json</a>
            </div>
        </div>
    </aside>

    <section class="flex-1 overflow-y-auto bg-white rounded-tl-[3rem]">
        <div class="p-16 max-w-4xl">
            <h1 class="text-5xl font-black text-slate-900 uppercase tracking-tighter mb-8">System <span class="text-emerald-600">Contact</span></h1>
            
            <div class="bg-slate-900 p-10 rounded-3xl text-emerald-400 font-mono text-sm shadow-2xl space-y-4">
                <p class="text-slate-500">// Initialize direct communication protocol</p>
                <p>Email: <a href="mailto:support@mspguild.tech" class="underline hover:text-white transition">support@mspguild.tech</a></p>
                <p>Status: <span class="bg-emerald-500 text-slate-950 px-2 py-0.5 rounded text-[10px] font-bold">AWAITING_SIGNAL</span></p>
                <hr class="border-slate-800">
                <p class="text-slate-500 leading-relaxed">Have a critical infrastructure failure? Reach out to the core team. We prioritize requests that provide clear error logs and environment context.</p>
            </div>
        </div>
    </section>
</main>
<?php include __DIR__ . '/partials/footer.php'; // If you made a footer partial ?>