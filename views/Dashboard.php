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
<body>
<?php include __DIR__ . '/partials/header.php'; ?>
    <nav>
        <strong>OpsNerds</strong> | 
        <a href="index.php?action=profile">My Profile</a> | 
        <a href="index.php?action=logout">Logout</a>
    </nav>

    <h1>Welcome back!</h1>
    
    <div class="card">
        <h3>Your Role: <?php echo ucfirst($_SESSION['user_role']); ?></h3>
        <p>Manage your presence on OpsNerds.</p>
        <a href="index.php?action=profile" class="btn">Update My Profile</a>
    </div>

    <?php if ($_SESSION['user_role'] === 'poster' || $_SESSION['user_role'] === 'both'): ?>
    <div class="card">
        <h3>Need help?</h3>
        <p>Post a new job or support request to find an OpsNerd.</p>
        <a href="index.php?action=post_job" class="btn">Post a Job</a>
    </div>
    <?php endif; ?>

    <?php if ($_SESSION['user_role'] === 'seeker' || $_SESSION['user_role'] === 'both'): ?>
    <div class="card">
        <h3>Looking for work?</h3>
        <p>Browse the latest job postings and apply.</p>
        <a href="index.php?action=browse_jobs" class="btn btn-secondary">Browse Job Feed</a>
    </div>
    <?php endif; ?>

    <?php if ($_SESSION['user_role'] === 'poster' || $_SESSION['user_role'] === 'both'): ?>
        <div class="card">
            <h3>Need help?</h3>
            <p>Post a new job or manage your existing listings.</p>
            <a href="index.php?action=post_job" class="btn">Post a Job</a>
            <a href="index.php?action=my_jobs" class="btn btn-secondary">Manage My Job Posts</a>
        </div>
    <?php endif; ?>
</body>
</html>
