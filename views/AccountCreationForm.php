<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Join OpsNerds</title>
    <style>
        body { font-family: sans-serif; max-width: 400px; margin: 50px auto; padding: 20px; line-height: 1.5; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input, select, button { width: 100%; padding: 10px; margin-top: 5px; box-sizing: border-box; }
        button { background: #28a745; color: white; border: none; cursor: pointer; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Create Account</h1>
    <form action="index.php?action=do_register" method="POST">
        <?php echo \App\Security\Helpers::csrf_field(); ?>
        <label for="full_name">Full Name</label>
        <label>Email Address</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required minlength="8">

        <label>I want to...</label>
        <select name="role">
            <option value="seeker">Find Work (OpsNerd)</option>
            <option value="poster">Post Jobs (Requester)</option>
            <option value="both">Do Both</option>
        </select>

        <button type="submit">Register</button>
    </form>
    <p><small>Already have an account? <a href="index.php?action=login">Login</a></small></p>
</body>
</html>
