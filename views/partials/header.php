<?php
$isLoggedIn = isset($_SESSION['user_id']);

if (!defined('DISABLE_DEV_BANNER')): ?>
<div class="w-full bg-slate-900 border-b border-slate-800 text-slate-300 text-xs md:text-sm">
    <div class="max-w-7xl mx-auto px-4 py-2 flex items-center justify-between gap-4">
        <div class="flex items-center gap-2">
            <span class="text-amber-400 font-semibold uppercase tracking-wide">
                Dev Notice
            </span>
            <span class="hidden sm:inline">
                This site is under active development. Some features may be incomplete or reset.
            </span>
            <span class="sm:hidden">
                Active development in progress.
            </span>
        </div>
    </div>
</div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>OpsNerds - Infrastructure Ready</title>
</head>
<body class="h-full bg-slate-900 flex flex-col items-stretch m-0 p-0 overflow-x-hidden">


<nav class="w-full bg-slate-900 text-white px-6 py-3 flex justify-between items-center z-50 border-b border-slate-800 shrink-0">
    <div class="flex items-center gap-6">
        <a href="index.php" class="text-2xl font-black tracking-tighter text-emerald-400 uppercase">Ops<span class="text-white">Nerds</span></a>

        <div class="hidden md:flex items-center bg-slate-800 border border-slate-700 rounded px-3 py-1 text-[10px] font-mono text-slate-500">
            sh_ find --jobs
        </div>
    </div>

    <div class="flex gap-6 items-center">
        <a href="index.php?action=browse_jobs" class="text-xs font-bold text-slate-400 hover:text-white uppercase tracking-widest">Workspace</a>
        <a href="index.php?action=about" class="text-xs font-bold text-slate-400 hover:text-white uppercase tracking-widest">About</a>

        <?php if ($isLoggedIn): ?>
            <a href="index.php?action=dashboard" class="bg-emerald-600 hover:bg-emerald-500 text-white text-[10px] font-black uppercase px-4 py-2 rounded transition">Dashboard</a>
            <a href="index.php?action=logout" class="text-[10px] text-slate-500 hover:text-white transition uppercase font-bold">Logout</a>
        <?php else: ?>
            <a href="index.php?action=login" class="text-xs font-bold hover:text-emerald-400 transition uppercase tracking-widest">Login</a>
            <a href="index.php?action=register" class="bg-emerald-600 hover:bg-emerald-500 text-white text-[10px] font-black uppercase px-4 py-2 rounded transition">Join Fleet</a>
        <?php endif; ?>
    </div>
</nav>
<script src="../assets/scripts/js/text_effects.js" defer></script>
<!-- No <div> starts here. The views will start their own <main> tags. -->