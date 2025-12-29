<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($job['title']); ?> - OpsNerds</title>
    <style>
        body { font-family: sans-serif; max-width: 700px; margin: 40px auto; padding: 20px; line-height: 1.6; }
        .job-header { border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; }
        .apply-box { background: #f4f4f4; padding: 20px; border-radius: 8px; margin-top: 30px; }
        textarea { width: 100%; padding: 10px; margin-top: 10px; box-sizing: border-box; }
        .btn { display: inline-block; padding: 10px 20px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; }
    </style>
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>
    <nav><a href="index.php?action=browse_jobs">← Back to Feed</a></nav>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'posted'): ?>
        <p style="color: green; font-weight: bold;">Job posted successfully!</p>
    <?php endif; ?>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'applied'): ?>
        <p style="color: green; font-weight: bold;">Application submitted! The poster has been notified.</p>
    <?php endif; ?>

    <div class="job-header">
        <h1><?php echo htmlspecialchars($job['title']); ?></h1>
        <p>Posted by <strong><?php echo htmlspecialchars($job['display_name']); ?></strong> | Category: <?php echo htmlspecialchars($job['category']); ?></p>
        <?php if ($job['budget']): ?><strong>Budget: <?php echo htmlspecialchars($job['budget']); ?></strong><?php endif; ?>
    </div>

    <div class="description">
        <h3>Description</h3>
        <?php echo nl2br(htmlspecialchars($job['description'])); ?>
    </div>

    <?php if (isset($_SESSION['user_id']) && ($_SESSION['user_role'] === 'seeker' || $_SESSION['user_role'] === 'both')): ?>
        <div class="apply-box">
            <h3>Apply for this Job</h3>
            <form action="index.php?action=apply_job" method="POST">
                <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
                <label>Why are you a good fit for this? (Cover Letter)</label>
                <textarea name="message" rows="5" required placeholder="Briefly explain your experience with this issue..."></textarea>
                <button type="submit" class="btn">Submit Application</button>
            </form>
        </div>
    <?php elseif (!isset($_SESSION['user_id'])): ?>
        <p><a href="index.php?action=login">Login</a> to apply for this job.</p>
    <?php endif; ?>
</body>
</html>
