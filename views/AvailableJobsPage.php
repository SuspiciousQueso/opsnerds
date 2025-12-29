<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Feed - OpsNerds</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 40px auto; padding: 20px; line-height: 1.6; }
        .job-card { border: 1px solid #eee; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .job-card h2 { margin-top: 0; color: #007BFF; }
        .meta { color: #666; font-size: 0.9em; margin-bottom: 10px; }
        .tag { background: #e9ecef; padding: 2px 8px; border-radius: 4px; font-size: 0.8em; }
        .btn { display: inline-block; padding: 8px 12px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>
    <nav><a href="index.php?action=dashboard">← Dashboard</a></nav>
    <h1>Available Jobs</h1>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'posted'): ?>
        <p style="color: green;">Job posted successfully!</p>
    <?php endif; ?>

    <?php if (empty($jobs)): ?>
        <p>No jobs found. Check back later!</p>
    <?php else: ?>
        <?php foreach ($jobs as $job): ?>
            <div class="job-card">
                <h2><?php echo htmlspecialchars($job['title']); ?></h2>
                <div class="meta">
                    Posted by <strong><?php echo htmlspecialchars($job['display_name']); ?></strong> 
                    <?php if (isset($job['category'])): ?>
                        in <span class="tag"><?php echo htmlspecialchars($job['category']); ?></span>
                    <?php endif; ?>
                    <?php if ($job['budget']): ?> | Budget: <?php echo htmlspecialchars($job['budget']); ?><?php endif; ?>
                </div>
                <p><?php echo nl2br(htmlspecialchars(substr($job['description'], 0, 200))); ?>...</p>
                <a href="index.php?action=view_job&id=<?php echo $job['id']; ?>" class="btn">View Details & Apply</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
