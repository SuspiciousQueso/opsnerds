<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - OpsNerds</title>
    <style>
        body { font-family: sans-serif; max-width: 400px; margin: 50px auto; padding: 20px; line-height: 1.5; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input, button { width: 100%; padding: 10px; margin-top: 5px; box-sizing: border-box; }
        button { background: #007BFF; color: white; border: none; cursor: pointer; margin-top: 20px; }
        .status { padding: 10px; background: #d4edda; color: #155724; margin-bottom: 20px; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Login to OpsNerds</h1>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'registered'): ?>
        <div class="status">Registration successful! Please login below.</div>
    <?php endif; ?>

    <form action="index.php?action=do_login" method="POST">
        <label>Email Address</label>
        <input type="email" name="email" required autofocus>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
    <p><small>Need an account? <a href="index.php?action=home">Register here</a></small></p>
</body>
</html>
