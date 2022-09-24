<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<main id="signinMain" class="d-flex justify-content-center">
	<?= form_open('signin', ['id' => 'signinForm', 'class' => 'row']) ?>

	<div class="d-flex flex-column col align-items-center align-items-sm-start pe-5">
		<img src="<?= base_url() ?>/assets/gnhs_logo.png" alt="goa national high school logo" id="signinBrand" class="mb-4">
		<p class="text-sm-start text-center"><span class="fs-2">Hi, Welcome back Admin!</span></p>
		<p class="text-sm-start text-center">This is the administrator interface of the website. Please enter your login credentials to continue or click the visit users website to go to the student's interface.</p>
	</div>

	<div class="col">
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
		<input type="submit" id="signinSubmitBtn" value="Sign-In" class="btn btn-danger w-100 mb-3">
		<div class="d-flex justify-content-center w-100">
			<hr style="height: 6px" class="mt-2 mb-2 flex-fill">
			<span class="ps-4 pe-4">OR</span>
			<hr style="height: 6px" class="mt-2 mb-2 flex-fill">
		</div>
		<a href="http://goanhs-lms.edu.ph" class="btn btn-sm btn-light mt-3 w-100">Visit Users Website <i class="fas fa-fw fa-arrow-right"></i></a>
		<?= form_close() ?>
	</div>
</main>

<?= $this->endSection() ?>