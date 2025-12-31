<?php include __DIR__ . '/partials/header.php'; ?>

<main class="flex-1 flex overflow-hidden w-full bg-slate-950">
    <!-- LEFT SIDEBAR -->
    <aside class="w-64 bg-slate-950 border-r border-slate-900 shrink-0 hidden lg:block">
        <div class="p-8">
            <a href="index.php?action=browse_jobs" class="text-[10px] font-black text-emerald-500 uppercase tracking-widest hover:text-emerald-400 transition flex items-center gap-2">
                &larr; Back to Workspace
            </a>
        </div>
    </aside>

    <!-- CENTER PANE: The Job Ticket -->
    <section class="flex-1 overflow-y-auto bg-white rounded-tl-[3rem] shadow-2xl">
        <div class="p-12 max-w-4xl mx-auto">
            <header class="mb-12 border-b border-slate-100 pb-12">
                <div class="flex items-center gap-2 mb-4">
                    <span class="px-2 py-1 bg-slate-900 text-emerald-400 font-mono text-[10px] rounded">TICKET #<?php echo $job['id']; ?></span>
                    <span class="px-2 py-1 bg-blue-100 text-blue-700 font-mono text-[10px] rounded uppercase"><?php echo \App\Security\Helpers::e($job['category']); ?></span>
                </div>
                <h1 class="text-5xl font-black text-slate-900 tracking-tighter uppercase mb-4"><?php echo \App\Security\Helpers::e($job['title']); ?></h1>

                <div class="flex items-center gap-6 text-sm text-slate-500">
                    <p>Posted by: <span class="text-slate-900 font-bold"><?php echo \App\Security\Helpers::e($job['full_name']); ?></span></p>
                    <p>Budget: <span class="text-emerald-600 font-bold">$<?php echo \App\Security\Helpers::e($job['budget']); ?></span></p>
                </div>
            </header>

            <article class="prose prose-slate lg:prose-xl mb-16">
                <h3 class="text-xs font-black uppercase tracking-widest text-slate-400 mb-4">Issue Description</h3>
                <div class="text-slate-700 leading-relaxed whitespace-pre-wrap"><?php echo \App\Security\Helpers::e($job['description']); ?></div>
            </article>

            <!-- Application Form -->
            <div class="bg-slate-50 border border-slate-200 rounded-3xl p-10">
                <h2 class="text-2xl font-black text-slate-900 uppercase mb-2 tracking-tight">Apply for this Job</h2>
                <p class="text-slate-500 mb-8">Briefly explain your experience with this specific infrastructure issue.</p>

                <form action="index.php?action=apply_job" method="POST" class="space-y-6">
                    <?php echo \App\Security\Helpers::csrf_field(); ?>
                    <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">

                    <div>
                        <textarea name="message" rows="5" required
                                  class="w-full bg-white border border-slate-200 rounded-2xl p-6 text-slate-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all"
                                  placeholder="Why are you a good fit for this? (Cover Letter)"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-emerald-600 text-white font-black uppercase tracking-widest py-5 rounded-2xl hover:bg-emerald-500 transition-all shadow-xl shadow-emerald-200">
                        Submit Application
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- RIGHT SIDEBAR -->
    <aside class="w-80 bg-slate-950 border-l border-slate-900 shrink-0 hidden xl:flex flex-col p-10">
        <h3 class="text-[10px] font-black text-slate-600 uppercase tracking-[0.3em] mb-8">Metadata</h3>
        <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl font-mono text-[10px] text-slate-500">
            <p>CREATED: <?php echo $job['created_at']; ?></p>
            <p>STATUS: OPEN</p>
        </div>
    </aside>
</main>

<footer class="w-full bg-slate-950 text-slate-600 px-8 py-2 text-[10px] border-t border-slate-900 flex justify-between items-center shrink-0">
    <div class="font-mono uppercase tracking-widest">OpsCenter Ticket Viewer</div>
    <div class="font-mono text-emerald-900">SYS_READY</div>
</footer>
