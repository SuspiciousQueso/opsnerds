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

<nav class="w-full bg-slate-900 text-white px-6 py-2 flex justify-between items-center shadow-md z-50 border-b border-slate-800">
    <div class="flex items-center gap-6">
        <a href="index.php" class="text-xl font-black tracking-tighter text-emerald-400 uppercase">Ops<span class="text-white">Nerds</span></a>

    <!-- The Command Palette (Search) -->
    <div class="hidden md:flex flex-1 max-w-md mx-8">
        <div class="relative w-full group">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="text-slate-500 text-xs">sh</span>
            </div>
            <input type="text" 
                   class="block w-full bg-slate-800 border border-slate-700 rounded-md py-1.5 pl-10 pr-3 text-sm placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500 transition" 
                   placeholder="Search infrastructure jobs... (Ctrl+K)">
        </div>
    </div>
    
    <div class="flex items-center gap-4">