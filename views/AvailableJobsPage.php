<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Feed - OpsNerds</title>
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>

<main class="flex-1 flex overflow-hidden w-full bg-slate-950">
    <!-- LEFT SIDEBAR: Filters/Context -->
    <aside class="w-64 bg-slate-950 border-r border-slate-900 shrink-0 hidden lg:flex flex-col">
        <div class="p-8">
            <h3 class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] mb-6">Filter Workspace</h3>
            <div class="space-y-4">
                <div class="text-xs text-emerald-500 font-bold border-l-2 border-emerald-500 pl-3">All Active Tickets</div>
                <div class="text-xs text-slate-600 hover:text-slate-400 cursor-pointer pl-3 transition">My Applications</div>
            </div>
        </div>
    </aside>

    <!-- CENTER PANE: The Job Feed -->
    <section class="flex-1 overflow-y-auto bg-slate-700 rounded-tl-[3rem] shadow-2xl">
        <div class="p-12 max-w-5xl mx-auto">
            <header class="mb-12">
                <h1 class="text-5xl font-black text-slate-900 tracking-tighter uppercase">Browse <span class="text-emerald-600">Workspace</span></h1>
                <p class="text-slate-400 font-mono text-xs mt-2">Scanning active infrastructure incidents...</p>
            </header>

            <?php if (empty($jobs)): ?>
                <div class="bg-slate-50 border-2 border-dashed border-slate-200 rounded-3xl p-20 text-center">
                    <p class="text-slate-400 font-mono text-sm uppercase">No active tickets found in this sector.</p>
                </div>
            <?php else: ?>
                <div class="space-y-6">
                    <?php foreach ($jobs as $job): ?>
                        <div class="group bg-white border border-slate-200 p-8 rounded-3xl hover:border-emerald-500 hover:shadow-xl transition-all duration-300">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <span class="px-2 py-0.5 bg-slate-100 text-slate-500 font-mono text-[10px] rounded uppercase mr-2"><?php echo \App\Security\Helpers::e($job['category'] ?? 'General'); ?></span>
                                    <span class="text-[10px] font-mono text-emerald-600 uppercase">Budget: $<?php echo \App\Security\Helpers::e($job['budget'] ?? '0.00'); ?></span>
                                </div>
                                <span class="text-[10px] text-slate-400 font-mono uppercase"><?php echo date('Y-m-d', strtotime($job['created_at'])); ?></span>
                            </div>

                            <h2 class="text-2xl font-black text-slate-900 mb-2 uppercase tracking-tight group-hover:text-emerald-600 transition-colors">
                                <?php echo \App\Security\Helpers::e($job['title']); ?>
                            </h2>
                            
                            <p class="text-slate-500 text-sm mb-6 line-clamp-2 leading-relaxed">
                                <?php echo \App\Security\Helpers::e($job['description']); ?>
                            </p>

                            <div class="flex items-center justify-between pt-6 border-t border-slate-100">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 bg-slate-900 rounded-full flex items-center justify-center text-[8px] text-emerald-400 font-bold uppercase">
                                        <?php echo substr($job['full_name'] ?? 'U', 0, 1); ?>
                                    </div>
                                    <span class="text-xs font-bold text-slate-700"><?php echo \App\Security\Helpers::e($job['full_name'] ?? 'Unknown'); ?></span>
                                </div>
                                <a href="index.php?action=view_job&id=<?php echo $job['id']; ?>" 
                                   class="bg-slate-900 text-white text-[10px] font-black uppercase tracking-widest px-6 py-3 rounded-xl hover:bg-emerald-600 transition-all shadow-lg shadow-slate-200">
                                    Analyze & Apply
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- RIGHT SIDEBAR: Stats -->
    <aside class="w-80 bg-slate-950 border-l border-slate-900 shrink-0 hidden xl:flex flex-col p-10">
        <h3 class="text-[10px] font-black text-slate-600 uppercase tracking-[0.3em] mb-8">Node Stats</h3>
        <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl">
            <p class="text-[10px] font-mono text-slate-500 uppercase mb-2">Total Tickets</p>
            <p class="text-3xl font-black text-white italic"><?php echo count($jobs); ?></p>
        </div>
    </aside>
</main>

<footer class="w-full bg-slate-950 text-slate-600 px-8 py-2 text-[10px] border-t border-slate-900 flex justify-between items-center shrink-0">
    <div class="font-mono uppercase tracking-widest">OpsWorkspace Feed v1.0</div>
    <div class="font-mono text-emerald-900 uppercase">System Ready</div>
</footer>

</body>
</html>
