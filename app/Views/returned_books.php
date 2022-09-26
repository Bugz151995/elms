<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
	<?= $this->include('components/topbar') ?>
	<?= $this->include('components/sidebar') ?>
</header>

<main id="content">
	<div class="container-fluid ps-4 pe-4">
		<?= $this->include('components/breadcrumb') ?>

		<div class="row">
			<div class="col-12 col-lg-4">
				<div class="p-4 shadow-sm rounded border">
					<h5 class="fw-bold">Return Book</h5>
					<hr>
					<div id="qr-reader"></div>
					<div id="qr-reader-results"></div>
				</div>
			</div>
			<div class="col-12 col-lg-8">
				<div class="table-responsive">
					<table id="table" class="table table-light table-striped small">
						<thead>
							<tr>
								<th>#</th>
								<th>Book Name</th>
								<th>Category</th>
								<th>Student Name</th>
								<th>Created @</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($books as $key => $book) : ?>
								<tr>
									<td><?= ++$key ?></td>
									<td><?= $book['name'] ?></td>
									<td><?= $book['category'] ?></td>
									<td><?= $book['fname'] . ' ' . substr($book['mname'], 0, 1) . '. ' . $book['lname'] ?></td>
									<td><?= $book['created_at'] ?></td>
									<td class="text-center">
										<a href="<?= base_url() ?>/returned_books/view_returned_book/<?= $book['returned_book_id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></a>

										<a href="<?= base_url() ?>/returned_books/delete_returned_book/<?= $book['returned_book_id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var lastResult, countResults = 0;

		function onScanSuccess(decodedText, decodedResult) {
			if (decodedText !== lastResult) {
				++countResults;
				lastResult = decodedText;
				// Handle on success condition with the decoded message.
				// ajax post request to server
				console.log(`Scan result ${decodedText}`, decodedResult);
				
				$.post(
					'https://goanhs-lmsadmin.edu.ph/returned_books/create', {
						qrcode: decodedText
					},
					function(status) {
						console.log(status);
						window.location.href = 'https://goanhs-lmsadmin.edu.ph/returned_books';
					}
				);
			}
		}

		var html5QrcodeScanner = new Html5QrcodeScanner(
			"qr-reader", {
				fps: 10,
				qrbox: 150
			});
		html5QrcodeScanner.render(onScanSuccess);
	});
</script>

<?= $this->endSection() ?>