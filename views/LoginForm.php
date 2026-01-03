<?php include __DIR__ . '/partials/header.php'; ?>

<div class="max-w-3xl mx-auto px-6 py-10">
    <h1 class="text-2xl font-semibold text-slate-100 mb-6">Login</h1>

    <form action="index.php?action=do_login" method="POST" class="space-y-5">
        <?= \App\Security\Helpers::csrf_field(); ?>

        <div>
            <label for="email" class="block text-sm text-slate-300 mb-2">Email</label>
            <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    class="w-full rounded-md bg-slate-900/50 border border-slate-700 text-slate-100 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                    autocomplete="email"
            />
        </div>

        <div>
            <label for="password" class="block text-sm text-slate-300 mb-2">Password</label>
            <div class="relative">
                <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="w-full rounded-md bg-slate-900/50 border border-slate-700 text-slate-100 px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-emerald-500"
                        autocomplete="current-password"
                />
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button
                    type="submit"
                    class="inline-flex items-center rounded-md bg-emerald-500 px-5 py-3 font-semibold text-slate-950 hover:bg-emerald-400 transition"
            >
                Sign In
            </button>

            <a href="index.php?action=register" class="text-slate-300 hover:text-emerald-400 transition">
                Create an account
            </a>
        </div>
    </form>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
