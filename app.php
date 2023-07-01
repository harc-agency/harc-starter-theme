<!DOCTYPE html>
<html lang="en" data-theme="wireframe">

<head>
    <meta charset="UTF-8">
    <link rel='icon' href='/favicon.ico' type='image/x-icon' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>

    <?php bb_inject_inertia(); ?>

    <?php wp_footer(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/app.css">
</body>

</html>
