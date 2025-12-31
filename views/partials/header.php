<?php
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>OpsNerds - The IT Marketplace</title>
</head>
<body class="h-full flex flex-col overflow-hidden">

<!-- Main Top Navigation -->
<nav class="bg-slate-900 text-white px-4 py-2 flex justify-between items-center shadow-md z-50">
    <div class="flex items-center gap-4">
        <a href="index.php" class="text-xl font-bold tracking-tight text-emerald-400">OpsNerds<span class="text-white text-xs ml-1 opacity-50">v1.0</span></a>
        <div class="hidden md:flex gap-4 ml-8 text-sm text-slate-300">
            <a href="index.php?action=browse_jobs" class="hover:text-white transition">Browse Workspace</a>
            <a href="index.php?action=about" class="hover:text-white transition">About</a>
        </div>
    </div>
    
    <div class="flex items-center gap-4">
        <?php if ($isLoggedIn): ?>
            <span class="text-xs text-slate-400">Connected: <span class="text-emerald-400"><?php echo $_SESSION['user_role']; ?></span></span>
            <a href="index.php?action=dashboard" class="bg-emerald-600 hover:bg-emerald-500 text-xs font-bold px-3 py-1 rounded transition">Dashboard</a>
            <a href="index.php?action=logout" class="text-xs text-slate-400 hover:text-white">Logout</a>
        <?php else: ?>
            <a href="index.php?action=login" class="text-sm hover:text-emerald-400 transition">Login</a>
            <a href="index.php?action=register" class="bg-emerald-600 hover:bg-emerald-500 text-sm font-bold px-4 py-1 rounded transition">Join</a>
        <?php endif; ?>
    </div>
</nav>