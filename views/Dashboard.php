<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - OpsNerds</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 40px auto; padding: 20px; line-height: 1.6; }
        .card { border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; border-radius: 8px; }
        .btn { display: inline-block; padding: 10px 15px; background: #007BFF; color: white; text-decoration: none; border-radius: 4px; }
        .btn-secondary { background: #6c757d; }
        nav { margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 10px; }
    </style>
</head>
<body class="bg-slate-50 flex flex-col min-h-screen">
<?php include __DIR__ . '/partials/header.php'; ?>

<main class="flex-1 flex overflow-hidden">
    <!-- LEFT SIDEBAR: Context & Navigation -->
    <aside class="w-64 bg-slate-100 border-r border-slate-200 flex flex-col hidden lg:flex">
        <div class="p-6 border-bottom border-slate-200">
            <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-4">My Navigation</h3>
            <nav class="space-y-1">
                <a href="index.php?action=profile" class="flex items-center px-3 py-2 text-sm font-medium text-slate-700 bg-white rounded-md shadow-sm border border-slate-200">
                    <span class="truncate">My Profile</span>
                </a>
                <a href="index.php?action=my_jobs" class="flex items-center px-3 py-2 text-sm font-medium text-slate-600 hover:bg-white hover:shadow-sm transition rounded-md">
                    <span class="truncate">My Job Posts</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- CENTER PANE: The Main Workspace -->
    <section class="flex-1 overflow-y-auto p-8 bg-white">
        <div class="max-w-4xl mx-auto">
            <header class="mb-8">
                <h1 class="text-3xl font-bold text-slate-900">Dashboard</h1>
                <p class="text-slate-500">Welcome back to your IT operations command center.</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Action Card -->
                <div class="bg-emerald-50 border border-emerald-100 p-6 rounded-xl hover:shadow-lg transition">
                    <h2 class="text-xl font-bold text-emerald-900 mb-2">Hire an OpsNerd</h2>
                    <p class="text-sm text-emerald-700 mb-4">Post a new technical issue and get help within minutes.</p>
                    <a href="index.php?action=post_job" class="inline-block bg-emerald-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-emerald-700 transition">Post Job</a>
                </div>

                <!-- Action Card -->
                <div class="bg-blue-50 border border-blue-100 p-6 rounded-xl hover:shadow-lg transition">
                    <h2 class="text-xl font-bold text-blue-900 mb-2">Find Work</h2>
                    <p class="text-sm text-blue-700 mb-4">Browse open tickets and start solving problems.</p>
                    <a href="index.php?action=browse_jobs" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700 transition">Browse Feed</a>
                </div>
            </div>
        </div>
    </section>

    <!-- RIGHT SIDEBAR: Utilities & AI -->
    <aside class="w-80 bg-slate-50 border-l border-slate-200 p-6 hidden xl:block">
        <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-4">System Assistant</h3>
        <div class="bg-white p-4 rounded-lg border border-slate-200 shadow-sm mb-6">
            <div class="flex items-center gap-2 text-emerald-600 mb-2">
                <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                <span class="text-xs font-bold uppercase">AI Services Online</span>
            </div>
            <p class="text-xs text-slate-600">Ollama/Llama3 is connected. You can now use the "Magic Import" for your resume in the profile section.</p>
        </div>
    </aside>
</main>

<!-- BOTTOM STATUS BAR -->
<footer class="bg-slate-900 text-slate-400 px-4 py-1 text-[10px] flex justify-between items-center border-t border-slate-700">
    <div>Branch: <span class="text-emerald-500">main</span> | Environment: <span class="text-orange-400">production</span></div>
    <div>System Latency: <span class="text-emerald-500">14ms</span></div>
</footer>

</body>
</html>
