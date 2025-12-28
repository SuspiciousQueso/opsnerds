<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Job Posts - OpsNerds</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 40px auto; padding: 20px; line-height: 1.6; }
        .job-row { border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 4px; display: flex; justify-content: space-between; align-items: center; }
        .job-info h3 { margin: 0; }
        .badge { background: #007BFF; color: white; padding: 4px 8px; border-radius: 12px; font-size: 0.8em; }
        .btn { padding: 8px 12px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; font-size: 0.9em; }
    </style>
</head>
<body>
    <nav><a href="index.php?action=dashboard">← Dashboard</a></nav>
    <h1>My Job Posts</h1>

    <?php if (empty($myJobs)): ?>
        <p>You haven't posted any jobs yet. <a href="index.php?action=post_job">Post one now?</a></p>
    <?php else: ?>
        <?php foreach ($myJobs as $job): ?>
            <div class="job-row">
                <div class="job-info">
                    <h3><?php echo htmlspecialchars($job['title']); ?></h3>
                    <small>Posted on <?php echo date('M j, Y', strtotime($job['created_at'])); ?></small>
                </div>
                <div>
                    <span class="badge"><?php echo $job['app_count']; ?> Applications</span>
                    <?php if ($job['app_count'] > 0): ?>
                        <a href="index.php?action=view_apps&job_id=<?php echo $job['id']; ?>" class="btn">View Apps</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
