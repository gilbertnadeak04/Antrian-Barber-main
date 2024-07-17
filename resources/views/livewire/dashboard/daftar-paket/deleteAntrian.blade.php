
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteAntrian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> Hapus Antrian</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="deletePanggilan">
            <div class="modal-body">
                <h4>Hapus Antrian Ini ?</h4>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Ya</button>
            </div>
        </form>
      </div>
    </div>
  </div>