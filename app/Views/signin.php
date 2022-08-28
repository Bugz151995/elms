<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<main id="loginMain" class="row row-cols-1 row-cols-sm-2 g-3">
	<div class="d-flex flex-column col align-items-center align-items-sm-start">
		<img src="<?= base_url()?>/gnhs_logo.png" alt="goa national high school logo" id="loginBrand" class="mb-4">
		<p class="text-sm-start text-center"><span class="fs-2">Hello, Welcome!</span></p>
		<p class="text-sm-start text-center">Please enter your login credentials to continue.</p>
	</div>

	<?= form_open('signin', ['id' => 'loginForm', 'class' => 'col']) ?>
	<h1 class="text-center fw-bold">Sign In Form</h1>
	<hr>
	<div class="mb-3 mt-4">
		<label for="username" class="form-label">Username</label>
		<input type="text" class="form-control form-control-sm" id="username" name="username" value="<?= set_value('username') ?>" placeholder="Enter your username...">
		<?= isset($validation) ? $validation->showError('username', 'single') : null ?>
	</div>
	<div class="mb-4">
		<label for="password" class="form-label">Password</label>
		<input type="password" class="form-control form-control-sm" id="password" name="password" value="<?= set_value('password') ?>" placeholder="Enter your password...">
		<?= isset($validation) ? $validation->showError('password', 'single') : null ?>
	</div>
	<input type="submit" value="Sign-In" class="btn btn-primary w-100">
	<?= form_close() ?>
</main>

<!-- login style -->
<style>
	html {
		margin: 0;
	}

	body {
		height: 100vh;
		width: 100%;
		margin: auto;
		display: flex;
		justify-content: center;
		align-items: center;
		background-image: url('http://elms.gnhs.edu.ph/bg.jpg');
		background-size: cover;
	}

	#loginMain {
		padding: 1rem;
		border-radius: 1rem;
		background-color: rgba(255, 255, 255, 0.85);
		padding: 2rem;
		box-shadow: -3px 3px 15px rgba(0, 0, 0, 0.5);
	}

	#loginBrand {
		width: 120px;
	}
</style>

<?= $this->endSection() ?>