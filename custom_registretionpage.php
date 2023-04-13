<?php 
// Template Name: Registration page

if ( ! defined( 'ABSPATH' ) ) exit;

if (is_user_logged_in(  )) {
    wp_redirect( home_url( 'dashboard' ) );
}

$is_error = false;

if (isset($_POST['email'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];
    $user_role = $_POST['user_role'];

    if (! empty($username) && $password === $retype_password) {

        $user_id = wp_insert_user( [
            'user_login' => $username,
            'user_email' => $email,
            'user_pass' => $password,
            'role' => $user_role
        ]);

        if ($user_id) {
            $user = get_user_by( 'ID', $user_id );
            wp_redirect( home_url( 'log-in/?registration_success=1' ) );
        } else {
            $is_error = true;
        }
    }
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
                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>

                    <?php if ($is_error) { ?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                                Username is already taken, please try another username.
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($_POST['password'] !== $_POST['retype_password']) { ?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                                Password dose not matched.
                            </div>
                        </div>
                    <?php } ?>

                    <form method="POST">

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1cg">Username</label>
                        <input name="username" required type="text" id="form3Example1cg" class="form-control form-control-lg" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3cg">Email</label>
                        <input name="email" required type="email" id="form3Example3cg" class="form-control form-control-lg" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4cg">Password</label>
                        <input name="password" required type="password" id="form3Example4cg" class="form-control form-control-lg" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                        <input name="retype_password" required type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                        </div>

                        <p class="mb-0">Select account type</p>
                        <div class="form-check">
                            <input required class="form-check-input" value="list_viewer" type="radio" name="user_role" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                List viewer
                            </label>
                        </div>
                        <div class="form-check mb-4">
                            <input required class="form-check-input" value="list_poster" type="radio" name="user_role" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                List poster
                            </label>
                        </div>

                        <div class="d-flex justify-content-center">
                        <button type="submit"
                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                        </div>

                        <p class="mt-3 mb-0">Have already an account? <a href="<?php echo home_url( 'log-in' ); ?>"
                            class="fw-bold"><u>Login here</u></a></p>

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