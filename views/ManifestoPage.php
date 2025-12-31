<?php include __DIR__ . '/partials/header.php'; ?>

<main class="flex-1 flex overflow-hidden w-full bg-slate-950">
    <aside class="w-64 bg-slate-950 border-r border-slate-900 shrink-0 hidden lg:block"></aside>

    <section class="flex-1 overflow-y-auto bg-white rounded-tl-[3rem] shadow-2xl">
        <div class="p-16 max-w-4xl">
            <header class="mb-16">
                <h1 class="text-6xl font-black text-slate-900 tracking-tighter uppercase mb-4">The <span class="text-emerald-600">Manifesto</span></h1>
                <p class="text-slate-400 font-mono"># whoami --opsnerd</p>
            </header>

            <article class="prose prose-slate lg:prose-2xl text-slate-600 space-y-12 leading-relaxed">
                <section>
                    <h2 class="text-3xl font-black text-slate-900 uppercase">Who This Is For</h2>
                    <p>Operators. Admins. Engineers. Fixers.</p>
                    <p>People who have been on call at 3 AM. People who inherited undocumented systems and made them sing. People who know when <span class="italic">"just reboot it"</span> is correct — and when it’s dangerous.</p>
                </section>

                <div class="bg-slate-900 text-white p-12 rounded-[2rem] shadow-2xl">
                    <h2 class="text-emerald-400 font-black uppercase tracking-widest text-sm mb-6">Client Directive</h2>
                    <ul class="space-y-4 font-mono text-sm uppercase">
                        <li>> Fewer meetings</li>
                        <li>> Faster resolution</li>
                        <li>> Someone who already understands the problem</li>
                    </ul>
                </div>

                <section>
                    <h2 class="text-3xl font-black text-slate-900 uppercase italic">If it runs, routes, stores, or breaks — it belongs here.</h2>
                    <p>We deal with small devices running home IoT issues to full-scale enterprise network refresh projects. If it's broken, and you need to fix it, we're here with the right contractor.</p>
                </section>
            </article>
        </div>
    </section>

    <aside class="w-80 bg-slate-950 border-l border-slate-900 shrink-0 hidden xl:block"></aside>
</main>

<footer class="w-full bg-slate-950 text-slate-600 px-8 py-2 text-[10px] border-t border-slate-900 flex justify-between items-center shrink-0">
    <div class="font-mono">// REAL OPERATIONAL HISTORY</div>
    <div class="font-mono text-emerald-900">UPTIME_DIRECTIVE: 100</div>
</footer>
</body>
</html>
