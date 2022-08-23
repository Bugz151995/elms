<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<main id="loginMain">
	<img src="<?= base_url()?>/gnhs_logo.png" alt="goa national high school logo" id="loginBrand">
	
	<?= form_open('login_verification', ['id' => 'loginForm']) ?>
	<div class="mb-3">
		<label for="username" class="form-label">Username</label>
		<input type="text" class="form-control" id="username">
	</div>
	<div class="mb-3">
		<label for="password" class="form-label">Password</label>
		<input type="password" class="form-control" id="password">
	</div>
	<input type="submit" value="Login" class="btn btn-primary">
	<?= form_close() ?>
</main>


<style>
	html {
		margin: 0;
	}

	body {
		height: 100vh;
		width: 100vh;
		margin: auto;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	#loginMain {
		display: flex;
		flex-direction: column;
		width: 600px;
	}

	#loginBrand {
		width: 200px;
	}

</style>

<?= $this->endSection() ?>