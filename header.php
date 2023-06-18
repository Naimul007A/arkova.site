<?php
// Get the current protocol (http or https)
$protocol = isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

// Get the current domain name
$domain = $_SERVER['HTTP_HOST'];

// Get the current script name (including path) from the URL
$script = $_SERVER['SCRIPT_NAME'];
//site url
$siteURL = $protocol . '://' . $domain;
?>
<!doctype html>
<html lang="en">

<head>
    <base href="<?php echo $siteURL ?>" />
    <meta charset="utf-8">
    <title>URL Shortener</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sakil">
    <meta name='facbook:url' content='<?php echo $siteURL ?>'>
    <meta name='facbook:title' content='URL Shortener'>
    <meta property="og:title" content="URL Shortener">
    <meta name='og:url' content='<?php echo $siteURL ?>'>
    <meta property="og:description"
        content="Step into a digital oasis designed to ignite your creative spirit and inspire your deepest passions. Our online platform is a captivating haven, meticulously crafted to nourish your artistic essence and fuel your imagination. Immerse yourself in a realm where the convergence of artistry and cutting-edge technology takes center stage, promising a seamless fusion of visual delight and intellectual stimulation with every visit. Unleash the boundless depths of your imagination as you embark on a curated journey through a mesmerizing collection of artwork, thought-provoking literature, and interactive wonders. Whether you're an artist seeking inspiration, a culture enthusiast, or simply a curious soul, our digital sanctuary beckons you to explore, connect, and find solace in the embrace of your muse. Embrace the transformative power of creativity as our virtual domain becomes your limitless canvas for exploration and self-expression.">
    <meta property="og:image" content='heart.png'>
    <link rel="shortcut icon" href="heart.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>