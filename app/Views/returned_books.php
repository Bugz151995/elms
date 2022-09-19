<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
    <?= $this->include('components/topbar') ?>
    <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
    <div class="container">
        <?= $this->include('components/breadcrumb') ?>
        <?= $this->include('components/modal_scan_return') ?>

        <div class="" id="reader"></div>
        <div class="table-responsive">
            <table id="table" class="table table-light table-striped small">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Borrower's Name</th>
                        <th>Returned @</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $key => $book) : ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $book['name'] ?></td>
                            <td><?= $book['author'] ?></td>
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
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const html5QrCode = new Html5Qrcode( /* element id */ "reader");
        Html5Qrcode.getCameras().then(devices => {
            /**
             * devices would be an array of objects of type:
             * { id: "id", label: "label" }
             */
            if (devices && devices.length) {
                var cameraId = devices[0].id;
                html5QrCode.start(
                        cameraId, {
                            fps: 10, // Optional, frame per seconds for qr code scanning
                            qrbox: {
                                width: 250,
                                height: 250
                            } // Optional, if you want bounded box UI
                        },
                        (decodedText, decodedResult) => {
                            // do something when code is read
                        },
                        (errorMessage) => {
                            // parse error, ignore it.
                        })
                    .catch((err) => {
                        // Start failed, handle it.
                    });
            }
        }).catch(err => {
            // handle err
        });
    });
</script>
<?= $this->endSection() ?>