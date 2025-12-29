<?php
$isLoggedIn = isset($_SESSION['user_id']);
?>
<nav style="background: #333; color: #fff; padding: 1rem; display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <a href="index.php" style="color: #fff; text-decoration: none; font-weight: bold; font-size: 1.2rem;">OpsNerds</a>
    </div>
    <div style="display: flex; gap: 1.5rem;">
        <a href="index.php?action=browse_jobs" style="color: #fff; text-decoration: none;">Browse Jobs</a>
        <a href="index.php?action=about" style="color: #fff; text-decoration: none;">About</a>
        <a href="index.php?action=contact" style="color: #fff; text-decoration: none;">Contact</a>

        <?php if ($isLoggedIn): ?>
            <a href="index.php?action=dashboard" style="color: #ffca28; text-decoration: none; font-weight: bold;">Dashboard</a>
            <a href="index.php?action=logout" style="color: #fff; text-decoration: none;">Logout</a>
        <?php else: ?>
            <a href="index.php?action=login" style="color: #fff; text-decoration: none;">Login</a>
        <?php endif; ?>
    </div>
</nav>