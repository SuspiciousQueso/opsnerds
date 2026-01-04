<!DOCTYPE html>
<?php include __DIR__ . '/partials/header.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post a Job - OpsNerds</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 40px auto; padding: 20px; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input, textarea, select, button { width: 100%; padding: 10px; margin-top: 5px; box-sizing: border-box; }
        button { background: #28a745; color: white; border: none; cursor: pointer; margin-top: 20px; font-size: 1.1em; }
    </style>
</head>
<body>
<a href="index.php?action=dashboard">← Back to Dashboard</a>
<h1>Post a New Job</h1>
<form action="index.php?action=do_post_job" method="POST">
    <label>Job Title</label>
    <input type="text" name="title" placeholder="e.g. Fix broken Nginx config" required>

    <label>Category</label>
    <select name="category">
        <option value="server">Server / Infrastructure</option>
        <option value="web">Web Development</option>
        <option value="network">Networking</option>
        <option value="general">General IT</option>
    </select>

    <label>Description</label>
    <textarea name="description" rows="6" placeholder="Describe the issue, required skills, and urgency..." required></textarea>

    <label>Budget Range (Optional)</label>
    <input type="text" name="budget" placeholder="e.g. $50 - $100">

    <button type="submit">Post Job</button>
</form>
</body>
</html>