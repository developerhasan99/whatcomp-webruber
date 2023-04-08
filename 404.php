<?php 
//Exit If Accesed Directly
if( ! defined('ABSPATH') ) exit;

/**
 * @webruber 1
 * 404 template!
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>
<body>
    <div class="not-found-page">
        <div class="container">
            <div class="text-center py-5">
                <h1 class="display-1">404!</h1>
                <p class="pb-3">The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                <a class="btn btn-success btn-lg" href="<?php echo esc_url( home_url( ) ); ?>">Go to Home</a>
            </div>
        </div>
    </div>
</body>
</html>