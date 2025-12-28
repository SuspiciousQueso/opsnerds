<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?> - Submit a Request</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; max-width: 600px; margin: 40px auto; padding: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #007BFF; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h1>Need IT Help?</h1>
    <p>Tell us what's broken and we'll get an OpsNerd on it.</p>
    
    <form action="index.php?action=submit" method="POST">
        <label for="name">Your Name *</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email Address *</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number (Optional)</label>
        <input type="text" id="phone" name="phone">

        <label for="description">What is the problem? *</label>
        <textarea id="description" name="description" rows="5" required placeholder="Describe the issue, error messages, etc."></textarea>

        <button type="submit">Submit Request</button>
    </form>
</body>
</html>
