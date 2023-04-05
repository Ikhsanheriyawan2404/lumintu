<!-- Modal Create And Edit -->
<div class="modal fade" id="modal-md">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="itemForm" name="itemForm" method="post">
        @csrf
        <input type="hidden" name="item_id" id="item_id">
        <div class="modal-body">
            <div class="form-group">
                <label for="username">Username Pegawai<span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="email">Email Pegawai <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-sm mr-2" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="text" class="form-control form-control-sm mr-2" name="Password" id="Password">
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
