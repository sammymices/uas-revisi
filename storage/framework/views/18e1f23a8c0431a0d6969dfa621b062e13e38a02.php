<div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Penghapusan Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" id="deleteForm" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <div class="modal-body m-3">
                <p class="mb-0">Apa anda yakin ingin menghapus data? data akan dihapus permanen dan tidak
                    dapat dikembalikan</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!-- END primary modal -->
<?php /**PATH D:\Kuliah\Semester 4\Web Lanjut\uts\Proyek\v8\panti-asuhan\resources\views/components/delete-modal.blade.php ENDPATH**/ ?>