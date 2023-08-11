<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width initial-scale=1.0">

	<!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<title><?= $title ?></title>
</head>
<body>
	<div class="container ">
	<header>
		
		<div class="nav-list">
			<ul class="nav-container">
				<li class="nav-list"><a href="<?= ROOT ?>">Home</a></li>
				<li class="nav-list"><a href="<?= ROOT ?>/about">About</a></li>
				<li class="nav-list"><a href="<?= ROOT ?>/products">Product</a></li>
				<li class="nav-list"><a href="../contact.html">Contact us</a></li>

			<?php if (isset($_SESSION['user'])): ?>
				<li class="nav-list"><a href="<?= ROOT ?>/logout"> Logout </a></li>
				<li class="nav-list"><a href="/../../user/profile.php"> My Profile </a></li>
				<li class="nav-list"><a href="/../../user/post/new_post.php"> Post </a></li>

			<?php else: ?>
				<li class="nav-list"><a href="<?= ROOT ?>/login">Login</a></li>
				<li class="nav-list"><a href="<?= ROOT ?>/signup">Register</a></li>
			<?php endif; ?>
			</ul>
       </div>
      </nav>
		<div class="hamburger flex -mt-5">
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</div>
	</header>
		<div class="mb-3"></div>
