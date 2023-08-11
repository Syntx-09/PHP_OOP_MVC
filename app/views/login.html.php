<?php

$title = "Login";
include __DIR__ . '../../views/header.php';

?>
<div class="text-center">
<main class="form-signin w-100 m-auto">
    <form method="POST">
        <h1 class="h3 mb-3 fw-normal">Input details to login</h1>
        <?php if (!empty($errMsg)): ?>
            <p class="alert alert-danger" role="alert">
                        <?= implode("<br>", $errMsg) ?>
            </p>
        <?php endif; ?>
        
        <div class="form-floating">
            <label for="email">Email</label>
            <input class="form-control" name="email" placeholder="Email" type="email">
        </div>
        <div class="form-floating">
            <label for="password">Password</label>
            <input class="form-control" name="password" placeholder="password" type="password">
        </div>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        
        <input class="w-100 btn btn-lg btn-primary" type="submit" name="login" value="Login" />
        <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
    </form>
</main>
</div>