<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= $_ENV['APP_SHORT_TITLE'] ?> - Login</title>

        <!-- Favicon -->
        <link href="<?= base_url() ?>assets/img/logoweb.png" rel="icon" />
        <!-- Custom fonts for this template-->
        <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body class="bg-gradient-primary">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-flex justify-content-center p-5">
                                    <img src="<?= base_url() ?>assets/img/<?= $_ENV['APP_LOGO'] ?>" alt="Logo">
                                </div>
                                <div class="col-lg-6 p-5">
                                    <h3>Login Admin</h3>
                                    <?php if (session('error') !== null) : ?>
                                        <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                                    <?php elseif (session('errors') !== null) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php if (is_array(session('errors'))) : ?>
                                                <?php foreach (session('errors') as $error) : ?>
                                                    <?= $error ?>
                                                    <br>
                                                <?php endforeach ?>
                                            <?php else : ?>
                                                <?= session('errors') ?>
                                            <?php endif ?>
                                        </div>
                                    <?php endif ?>

                                    <?php if (session('message') !== null) : ?>
                                        <div class="alert alert-success" role="alert"><?= session('message') ?></div>
                                    <?php endif ?>

                                    <form action="<?= url_to('login') ?>" method="post">
                                        <?= csrf_field() ?>

                                        <!-- Email -->
                                        <div class="form-floating mb-3">
                                            <label for="floatingEmailInput"><?= lang('Auth.email') ?></label>
                                            <input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
                                        </div>

                                        <!-- Password -->
                                        <div class="form-floating mb-3">
                                            <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
                                            <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="current-password" placeholder="<?= lang('Auth.password') ?>" required>
                                        </div>

                                        <!-- Remember me -->
                                        <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')): ?> checked<?php endif ?>>
                                                    <?= lang('Auth.rememberMe') ?>
                                                </label>
                                            </div>
                                        <?php endif; ?>

                                        <div class="d-grid col-12 col-md-8 mx-auto m-3">
                                            <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.login') ?></button>
                                        </div>

                                        <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
                                            <p class="text-center"><?= lang('Auth.forgotPassword') ?> <a href="<?= url_to('magic-link') ?>"><?= lang('Auth.useMagicLink') ?></a></p>
                                        <?php endif ?>

                                        <p class="text-center"><a href="<?= base_url() ?>">Home</a></p>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

    </body>

</html>