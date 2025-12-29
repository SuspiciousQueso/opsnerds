<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About - OpsNerds</title>
    <style>body { font-family: sans-serif; line-height: 1.6; max-width: 800px; margin: 0 auto; padding: 0; }</style>
</head>
<body>
<?php 
    $headerPath = __DIR__ . '/partials/header.php';
    if (file_exists($headerPath)) {
        include $headerPath;
    } else {
        echo "<!-- Header not found at $headerPath -->";
    }
?>
<div style="padding: 20px;">
    <h1>About OpsNerds</h1>
    <p>OpsNerds is a human-first marketplace for technical operations. We connect experienced IT professionals with those who need reliable, on-demand support.</p>
    <p>Our philosophy is simple: no bidding wars, no complex workflows—just real people solving real problems.</p>
</div>
</body>
</html>
