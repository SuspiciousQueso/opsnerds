<?php include __DIR__ . '/partials/header.php'; ?>

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
