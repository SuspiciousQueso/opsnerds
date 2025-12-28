<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Applications for <?php echo htmlspecialchars($job['title']); ?></title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 40px auto; padding: 20px; line-height: 1.6; }
        .app-card { background: #f9f9f9; border-left: 4px solid #007BFF; padding: 20px; margin-bottom: 20px; }
        .meta { font-weight: bold; margin-bottom: 10px; }
        .btn-msg { background: #6f42c1; color: white; padding: 8px 12px; text-decoration: none; border-radius: 4px; display: inline-block; margin-top: 10px; }
    </style>
</head>
<body>
    <nav><a href="index.php?action=my_jobs">← Back to My Jobs</a></nav>
    <h1>Applications for "<?php echo htmlspecialchars($job['title']); ?>"</h1>

    <?php if (empty($applications)): ?>
        <p>No applications yet.</p>
    <?php else: ?>
        <?php foreach ($applications as $app): ?>
            <div class="app-card">
                <div class="meta">From: <?php echo htmlspecialchars($app['display_name']); ?> (<?php echo htmlspecialchars($app['email']); ?>)</div>
                <div class="letter">
                    <?php echo nl2br(htmlspecialchars($app['cover_letter'])); ?>
                </div>
                <!-- Future link to messaging -->
                <a href="mailto:<?php echo $app['email']; ?>" class="btn-msg">Reply via Email</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
