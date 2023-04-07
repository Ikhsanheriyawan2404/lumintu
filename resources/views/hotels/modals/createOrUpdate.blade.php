<!-- Modal Create And Edit -->
<div class="modal fade" id="modal-md">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span>&times;</span>
            </button>
        </div>
        <form id="itemForm" name="itemForm" method="post">
        @csrf
        <input type="hidden" name="item_id" id="item_id">
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="username">Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control form-control-sm mr-2" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control form-control-sm mr-2" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="phone_number">Nomor HP</label>
                <input type="number" class="form-control form-control-sm mr-2" name="phone_number" id="phone_number">
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea class="form-control form-control-sm mr-2" name="address" id="address"></textarea>
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
