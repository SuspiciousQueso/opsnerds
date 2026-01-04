<?php include __DIR__ . '/partials/header.php'; ?>

<div class="max-w-3xl mx-auto px-6 py-10">
    <div class="mb-6">
        <a href="index.php?action=dashboard"
           class="text-slate-300 hover:text-emerald-400 transition text-sm">
            ← Back to Dashboard
        </a>
    </div>

    <h1 class="text-2xl font-semibold text-slate-100 mb-2">Post a New Job</h1>
    <p class="text-sm text-slate-400 mb-8">Clear details get faster help.</p>

    <?php
    $old = $old ?? [];
    $errors = $errors ?? [];

    $val = function(string $key, string $default = '') use ($old) {
        return htmlspecialchars($old[$key] ?? $default, ENT_QUOTES, 'UTF-8');
    };

    $cat = $old['category'] ?? 'server';
    ?>

    <?php if (!empty($errors)): ?>
        <div class="mb-6 rounded-md border border-red-900/40 bg-red-950/30 p-4">
            <p class="text-sm font-semibold text-red-200 mb-2">Fix the following:</p>
            <ul class="list-disc pl-5 text-sm text-red-200 space-y-1">
                <?php foreach ($errors as $e): ?>
                    <li><?= htmlspecialchars($e, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="index.php?action=do_post_job" method="POST" class="space-y-6">
        <?= \App\Security\Helpers::csrf_field(); ?>

        <div>
            <label for="title" class="block text-sm text-slate-300 mb-2">Job Title</label>
            <input
                    type="text"
                    id="title"
                    name="title"
                    value="<?= $val('title'); ?>"
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
                <option value="server"  <?= $cat === 'server'  ? 'selected' : ''; ?>>Server / Infrastructure</option>
                <option value="web"     <?= $cat === 'web'     ? 'selected' : ''; ?>>Web Development</option>
                <option value="network" <?= $cat === 'network' ? 'selected' : ''; ?>>Networking</option>
                <option value="general" <?= $cat === 'general' ? 'selected' : ''; ?>>General IT</option>
            </select>
        </div>

        <div>
            <label for="description" class="block text-sm text-slate-300 mb-2">Description</label>
            <textarea
                    id="description"
                    name="description"
                    rows="8"
                    required
                    placeholder="Describe the issue, required skills, what you tried, urgency, etc."
                    class="w-full rounded-md bg-slate-900/50 border border-slate-700 text-slate-100 px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-emerald-500"
            ><?= $val('description'); ?></textarea>
        </div>

        <div>
            <label for="budget" class="block text-sm text-slate-300 mb-2">Budget Range (Optional)</label>
            <input
                    type="text"
                    id="budget"
                    name="budget"
                    value="<?= $val('budget'); ?>"
                    placeholder="e.g. $50 - $100"
                    class="w-full rounded-md bg-slate-900/50 border border-slate-700 text-slate-100 px-4 py-3
                       focus:outline-none focus:ring-2 focus:ring-emerald-500"
            />
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button
                    type="submit"
                    class="inline-flex items-center rounded-md bg-emerald-500 px-5 py-3 font-semibold text-slate-950
                       hover:bg-emerald-400 transition"
            >
                Post Job
            </button>

            <a href="index.php?action=dashboard"
               class="text-slate-300 hover:text-emerald-400 transition">
                Cancel
            </a>
        </div>
    </form>
</div>

<?php // include __DIR__ . '/partials/footer.php'; ?>
