<?php 
// Template name: Login page template

// redirect to dashboard if user is logged in
$dashboard = home_url( 'dashboard' );
$is_error = false;

if ( is_user_logged_in() ) {
    wp_redirect( $dashboard );
}

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = $_POST['remember'];

    $credentials = array(
        'user_login' => $username,
        'user_password' => $password
    );

    // Get user object from WP_SIGNON()
    $user = wp_signon( $credentials, $remember );

    //successfully logged in
    if(!isset($user->errors)){ 
        session_start();  //check for wp_session storage 
        $_SESSION["new_dashboard"] = '1';  //if you want to redirect user to a new page or set any conditions on login
        
        //set cookie for remember me 
        $user_login_details = $email.'_pass_'.$password;
        
        if(!empty($_POST["remember"])) {
            setcookie ("user_login_details",$user_login_details, time() + ( 7 * 24 * 60 * 60)); //set cookie time as per you need
        } else {  //remove login details from cookie
            if(isset($_COOKIE["user_login_details"])) {
                setcookie ("user_login_details","");
            }
        }
        wp_redirect($dashboard);
        exit;
    } else {
        $is_error= true;
    }
}

if(isset($_COOKIE["user_login_details"])) {
    $login_details = $_COOKIE["user_login_details"];
    $login_details = explode('_pass_', $login_details);
    $email_set = $login_details[0];
    $pass_set = $login_details[1];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php wp_head(  ); ?>
</head>
<body>
<div class="content-wrapper">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card registration-card" style="border-radius: 15px;">
                    <div class="card-body p-4">
                    <h2 class="text-uppercase text-center mb-5">Log in</h2>

                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>

                    <?php if (isset($_GET['registration_success'])) { ?>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                                Registration was successful, please login to access your dashboard.
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($is_error) { ?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                                Invalid credentials!
                            </div>
                        </div>
                    <?php } ?>

                    <form method="POST" action="<?php echo home_url( 'log-in' ); ?>">

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1cg">Username</label>
                        <input required name="username" type="text" id="form3Example1cg" class="form-control form-control-lg" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4cg">Password</label>
                        <input required name="password" type="password" id="form3Example4cg" class="form-control form-control-lg" />
                        </div>

                        <div class="form-check mb-4">
                            <input name="remember" class="form-check-input me-2" type="checkbox" value="" id="remember-checkbox" />
                            <label class="form-check-label" for="remember-checkbox">
                                Remember me!
                            </label>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit"
                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Log in</button>
                        </div>

                        <p class="mt-3 mb-0">Don't have account? <a href="<?php echo home_url( 'register' ); ?>"
                            class="fw-bold"><u>Register here</u></a></p>

                    </form>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>