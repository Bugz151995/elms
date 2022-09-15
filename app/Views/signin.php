<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<main id="signinMain" class="row row-cols-1 row-cols-sm-2">
	<div class="d-flex flex-column col align-items-center align-items-sm-start pe-5">
		<img src="<?= base_url()?>/gnhs_logo.png" alt="goa national high school logo" id="signinBrand" class="mb-4">
		<p class="text-sm-start text-center"><span class="fs-2">Hello, Welcome!</span></p>
		<p class="text-sm-start text-center">Please enter your login credentials to continue.</p>
		<div class="d-flex justify-content-center w-100">
			<hr style="height: 6px" class="mt-2 mb-2 flex-fill">
			<span class="ps-4 pe-4">OR</span>
			<hr style="height: 6px" class="mt-2 mb-2 flex-fill">
		</div>
		<a href="http://gnhs-lms.edu.ph" class="btn btn-light mt-3 w-100">Visit Users Website <i class="fas fa-fw fa-arrow-right"></i></a>
	</div>

	<?= form_open('signin', ['id' => 'signinForm', 'class' => 'col']) ?>
	<h1 class="text-center fw-bold text-uppercase">Sign In</h1>
	<hr id="signinDivider">
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
	<hr id="signinDivider">
	<input type="submit" id="signinSubmitBtn" value="Sign-In" class="btn btn-danger w-100">
	<?= form_close() ?>
</main>

<!-- signin style -->
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

	#signinMain {
		border-radius: 1rem;
		background-color: rgba(255, 255, 255, 0.85);
		padding: 3rem;
		box-shadow: -3px 3px 15px rgba(0, 0, 0, 0.5);
	}

	#signinForm {
		background-color: #531388cc;
		color: white;
		padding: 2rem;
		border-radius: 1rem;
	}

	#signinBrand {
		width: 150px;
	}

	#signinSubmitBtn {
		background-color: #D90368;
	}

	#signinVisitBtn {
		background-color: #541388;
		color: white;
	}

	#signinDivider {
		height: 5px;
		border-radius: 1rem;
	}
</style>

<?= $this->endSection() ?>