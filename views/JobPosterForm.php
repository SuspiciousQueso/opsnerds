<?php include __DIR__ . '/partials/header.php'; ?>

<div class="max-w-3xl mx-auto px-6 py-10">
    <div class="mb-6">
        <a href="index.php?action=dashboard"
           class="text-slate-300 hover:text-emerald-400 transition text-sm">
            ← Back to Dashboard
        </a>
    </div>

    <h1 class="text-2xl font-semibold text-slate-100 mb-6">Post a New Job</h1>

    <form action="index.php?action=do_post_job" method="POST" class="space-y-5">
        <?= \App\Security\Helpers::csrf_field(); ?>

        <div>
            <label for="title" class="block text-sm text-slate-300 mb-2">Job Title</label>
            <input
                    type="text"
                    id="title"
                    name="title"
                    placeholder="e.g. Fix broken Nginx config"
                    required
                    class="w-full rounded-md bg-slate-900/50 border border-slate-700 text-slate-100 px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-emerald-500"
            />
        </div>

        <div>
            <label for="category" class="block text-sm text-slate-300 mb-2">Category</label>
            <select
                    id="category"
                    name="category"
                    class="w-full rounded-md bg-slate-900/50 border border-slate-700 text-slate-100 px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-emerald-500"
            >
                <option value="server">Server / Infrastructure</option>
                <option value="web">Web Development</option>
                <option value="network">Networking</option>
                <option value="general">General IT</option>
            </select>
            <p class="mt-2 text-xs text-slate-500">Pick the closest match—helps keep the feed tidy.</p>
        </div>

        <div>
            <label for="description" class="
