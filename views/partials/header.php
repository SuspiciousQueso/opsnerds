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
<body class="h-full flex flex-col bg-slate-900 overflow-hidden">

<!-- Navigation: Ensure this is w-full and NOT wrapped in a container -->
<nav class="w-full bg-slate-900 text-white px-6 py-3 flex justify-between items-center shadow-2xl z-50 border-b border-slate-800">
    <div class="flex items-center gap-8">
        <a href="index.php" class="text-2xl font-black tracking-tighter text-emerald-400 uppercase hover:text-emerald-300 transition-colors">Ops<span class="text-white">Nerds</span></a>
        
        <!-- Command Palette (Search) -->
        <div class="hidden md:flex items-center bg-slate-800 border border-slate-700 rounded-lg px-3 py-1.5 w-64 group focus-within:ring-1 focus-within:ring-emerald-500 transition-all">
            <span class="text-slate-500 text-xs font-mono mr-2">sh_</span>
            <input type="text" class="bg-transparent border-none text-xs text-slate-200 focus:outline-none w-full" placeholder="find --jobs">
        </div>
    </div>
    
    <div class="flex items-center gap-6">