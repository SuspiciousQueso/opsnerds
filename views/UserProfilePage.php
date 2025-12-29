<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile - OpsNerds</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 40px auto; padding: 20px; color: #333; line-height: 1.6; }
        section { margin-bottom: 40px; padding-bottom: 20px; border-bottom: 1px solid #eee; }
        h2 { color: #007BFF; }
        .item { margin-bottom: 15px; padding: 10px; background: #f9f9f9; }
        form input, form textarea { display: block; width: 100%; margin-bottom: 10px; padding: 8px; }
        button { background: #007BFF; color: white; border: none; padding: 10px 15px; cursor: pointer; }
    </style>
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>
    <nav><a href="index.php?action=dashboard">← Dashboard</a> | <a href="index.php?action=logout">Logout</a></nav>

    <h1>My Profile</h1>

    <section>
        <h2>Basic Info</h2>
        <form action="index.php?action=update_profile" method="POST">
            <label>Full Name</label>
            <input type="text" name="full_name" value="<?php echo htmlspecialchars($user['full_name'] ?? ''); ?>">
            <label>Bio</label>
            <textarea name="bio" rows="4"><?php echo htmlspecialchars($user['bio'] ?? ''); ?></textarea>
            <button type="submit">Update Info</button>
        </form>
    </section>

    <section>
        <h2>Work Experience</h2>
        <?php foreach ($experience as $job): ?>
            <div class="item">
                <strong><?php echo htmlspecialchars($job['role_title']); ?></strong> at <?php echo htmlspecialchars($job['company_name']); ?><br>
                <small><?php echo $job['start_date']; ?> to <?php echo $job['end_date'] ?? 'Present'; ?></small>
                <p><?php echo nl2br(htmlspecialchars($job['description'])); ?></p>
            </div>
        <?php endforeach; ?>

        <h3>Add Experience</h3>
        <form action="index.php?action=add_experience" method="POST">
            <input type="text" name="company" placeholder="Company Name" required>
            <input type="text" name="role" placeholder="Job Title (e.g. Senior SysAdmin)" required>
            <input type="date" name="start_date" required>
            <input type="date" name="end_date" placeholder="End Date (leave blank if current)">
            <textarea name="description" placeholder="What did you achieve?"></textarea>
            <button type="submit">Add Experience</button>
        </form>
    </section>

    <section>
        <h2>Portfolio / Projects</h2>
        <?php foreach ($projects as $project): ?>
            <div class="item">
                <strong><?php echo htmlspecialchars($project['title']); ?></strong>
                <?php if ($project['link']): ?>
                    | <a href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank">Link</a>
                <?php endif; ?>
                <p><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
            </div>
        <?php endforeach; ?>

        <h3>Add Project</h3>
        <form action="index.php?action=add_project" method="POST">
            <input type="text" name="title" placeholder="Project Title (e.g. Linux Mail Server Migration)" required>
            <input type="url" name="link" placeholder="Project Link (Optional)">
            <textarea name="description" placeholder="Describe what you did and the tools you used." rows="3"></textarea>
            <button type="submit">Add Project</button>
        </form>
    </section>
</body>
</html>
