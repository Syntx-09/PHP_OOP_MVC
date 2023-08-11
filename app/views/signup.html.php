<?php
$title = "Sign Up/Register";
include __DIR__ . '../../views/header.php';

?>
<div class="col-6 mx-auto">
<form method="post">
<h1 class="h4 mb-3 fw-normal">Input details to sign-up</h1>

    <?php if (!empty($errMsg)): ?>
                    <p class="alert alert-danger" role="alert">
                        <?= implode("<br>", $errMsg) ?>
                    </p>
        <?php endif; ?>

    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" placeholder="Enter full name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" placeholder="Enter email address">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input class="form-control" type="tel" name="phone" placeholder="Enter phone number">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" placeholder="Password min. 4 characters">
    </div>
    <div class="form-group">
        <label for="verifyPass">Verify password</label>
        <input class="form-control" type="password" name="verifyPass" placeholder="Re-type password">
    </div>

    <input class="btn btn-primary" type="submit" name="signUp">

    <script src="<?= ROOT ?>/assets/js/register.js"></script>

</form>
</div>
