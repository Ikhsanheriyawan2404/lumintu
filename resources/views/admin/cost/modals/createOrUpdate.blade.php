<!-- Modal Create And Edit -->
<div class="modal fade" id="modal-md">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="itemForm" name="itemForm" method="post">
        @csrf
        <input type="hidden" name="item_id" id="item_id">
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Nama Pengeluran<span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="harga">Harga<span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2 price" name="price" id="harga">
            </div>
            <div class="form-group">
                <label for="kwantitas">Kwantitas<span class="text-danger">*</span></label>
                <input type="number" min="1" class="form-control form-control-sm mr-2" name="qty" id="kwantitas">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control form-control-sm mr-2" name="description" id="description"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-primary float-right" id="saveBtn">Simpan</button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
