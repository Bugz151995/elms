<!-- Button trigger modal -->
<div class="mb-4 d-flex justify-content-start">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBorrowedBookModal">
    <i class="fas fa fa-fw fa-qrcode"></i> Borrow Book
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="addBorrowedBookModal" tabindex="-1" aria-labelledby="addBorrowedBookModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <div>&nbsp;</div>
        <h5 class="modal-title" id="addBorrowedBookModalLabel">Borrow a Book</h5>
        <button type="button" class="btn btn-primary rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
      </div>
      <div class="modal-body">
        <div id="qr-reader"></div>
        <div id="qr-reader-results"></div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function(){
    qrScanner();
  });
</script>