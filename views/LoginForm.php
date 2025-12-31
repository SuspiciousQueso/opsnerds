<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - OpsNerds</title>
    <style>body { font-family: sans-serif; line-height: 1.6; max-width: 800px; margin: 0 auto; padding: 0; }</style>
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>

<div style="padding: 20px;">
    <h1>Login</h1>
    <form action="index.php?action=do_login" method="POST">
        <?php echo \App\Security\Helpers::csrf_field(); ?>
        
        <div style="margin-bottom: 1rem;">
            <label for="email" style="display: block;">Email</label>
            <input type="email" id="email" name="email" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 1rem;">
            <label for="password" style="display: block;">Password</label>
            <input type="password" id="password" name="password" required style="width: 100%; padding: 8px;">
        </div>

        <button type="submit" style="background: #333; color: #fff; padding: 10px 20px; border: none; cursor: pointer;">
            Sign In
        </button>
    </form>
    <p>Don't have an account? <a href="index.php?action=register">Create one here</a>.</p>
</div>
</body>
</html>
