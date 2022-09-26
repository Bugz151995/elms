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
          <h5 class="fw-bold">Issue Book</h5>
          <hr>
          <div class="mb-4">
            <label for="borrowersId">Borrower</label> <br>
            <select id="borrowersId" name="borrowers_id" class="form-select">
              <option value="" selected>Select Borrower...</option>
              <?php foreach ($students as $student) : ?>
                <option value="<?= $student['student_id'] ?>"><?= $student['fname'] . " " . substr($student['mname'], 0, 1) . ". " . $student['lname'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div id="qr-reader"></div>
          <div id="qr-reader-results"></div>
        </div>
      </div>
      <div class="col-12 col-lg-8">
        <div class="table-responsive rounded shadow-sm border">
          <table id="table" class="table table-light table-striped small">
            <thead>
              <tr>
                <th class="text-nowrap">#</th>
                <th>QR Code</th>
                <th class="text-nowrap">Book Name</th>
                <th class="text-nowrap">Category</th>
                <th class="text-nowrap">Student Name</th>
                <th class="text-nowrap">Created at</th>
                <th class="text-nowrap">Due at</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($books as $key => $book) : ?>
                <tr>
                  <td><?= ++$key ?></td>
                  <td class="text-center">
                    <div id="qrcode<?= $key ?>"></div>
                    <script type="text/javascript">
                      document.addEventListener('DOMContentLoaded', function() {
                        generateQR(<?= $key ?>, "<?= $book['qrcode'] ?>")
                      });
                    </script>
                  </td>
                  <td><?= $book['name'] ?></td>
                  <td><?= $book['category'] ?></td>
                  <td><?= $book['fname'] . " " . $book['lname'] ?></td>
                  <td><?= $book['created_at'] ?></td>
                  <td><?= $book['due_at'] ?></td>
                  <td class="text-center text-nowrap">
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailsModal<?= $book['book_id'] ?>">
                      <i class="fas fa fa-fw fa-eye"></i>
                    </button>

                    <div class="modal fade" id="detailsModal<?= $book['book_id'] ?>" tabindex="-1" aria-labelledby="detailsModal<?= $book['book_id'] ?>Label" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header bg-info">
                            <div>&nbsp;</div>
                            <h5 class="modal-title" id="detailsModal<?= $book['book_id'] ?>Label">Borrowed Book Details</h5>
                            <button type="button" class="btn btn-info rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
                          </div>
                          <div class="modal-body fs-6 text-start">
                            <table class="table table-borderless">
                              <tbody>
                                <tr>
                                  <th>Book Name:</th>
                                  <td class="fst-italic"><?= $book['name'] ?></td>
                                </tr>
                                <tr>
                                  <th>Author:</th>
                                  <td class="fst-italic"><?= $book['author'] ?></td>
                                </tr>
                                <tr>
                                  <th>Publish Date:</th>
                                  <td class="fst-italic"><?= $book['publish_date'] ?></td>
                                </tr>
                                <tr>
                                  <th>Units:</th>
                                  <td class="fst-italic"><?= $book['units'] ?></td>
                                </tr>
                                <tr>
                                  <th>Category:</th>
                                  <td class="fst-italic"><?= $book['category'] ?></td>
                                </tr>
                                <tr>
                                  <th>Borrowed By:</th>
                                  <td class="fst-italic"><?= $book['fname'] . ' ' . substr($book['mname'], 0, 1) . '. ' . $book['lname'] ?></td>
                                </tr>
                                <tr>
                                  <th>Student ID:</th>
                                  <td class="fst-italic"><?= $book['student_id'] ?></td>
                                </tr>
                                <tr>
                                  <th>Created at:</th>
                                  <td class="fst-italic"><?= $book['created_at'] ?></td>
                                </tr>
                                <tr>
                                  <th>Due at:</th>
                                  <td class="fst-italic"><?= $book['due_at'] ?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-circle-xmark"></i> Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-print fa-fw"></i> Print</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $book['borrowed_book_id'] ?>">
                      <i class="fas fa fa-fw fa-trash-alt"></i>
                    </button>

                    <div class="modal fade" id="deleteModal<?= $book['borrowed_book_id'] ?>" tabindex="-1" aria-labelledby="deleteModal<?= $book['borrowed_book_id'] ?>Label" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header bg-danger text-light">
                            <div>&nbsp;</div>
                            <h5 class="modal-title" id="deleteModal<?= $book['borrowed_book_id'] ?>Label">Delete a Book</h5>
                            <button type="button" class="btn btn-danger rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
                          </div>
                          <?= form_open('borrowed_books/delete') ?>
                          <?= form_hidden('borrowed_book_id', $book['borrowed_book_id']) ?>
                          <div class="modal-body fs-6">
                            <p>Are you sure that you want to delete this book data?</p>
                          </div>
                          <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-circle-xmark"></i> Cancel</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle fa-fw"></i> Confirm</button>
                          </div>
                          <?= form_close() ?>
                        </div>
                      </div>
                    </div>
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
        $id = $('#borrowersId').find(':selected').val();

        $.post(
          'https://goanhs-lmsadmin.edu.ph/borrowed_books/create', {
            student_id: $id,
            qrcode: decodedText
          },
          function(status) {
            console.log(status);
            window.location.href = 'https://goanhs-lmsadmin.edu.ph/borrowed_books';
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

    $(document).ready(function() {
      $('#borrowersId').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        tags: true
      });
    });
  });
</script>

<?= $this->endSection() ?>