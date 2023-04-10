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
                <label for="name">Nama Barang<span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm mr-2" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="price">Harga <span class="text-danger">*</span></label>
                <input type="number" class="form-control form-control-sm mr-2" name="price" id="price">
            </div>
            <div class="form-group">
                <label for="unit">Unit</label>
                <input type="text" class="form-control form-control-sm mr-2" name="unit" id="unit">
            </div>
            <div class="form-group">
                <label for="category_id">Jenis Barang <span class="text-danger">*</span></label>
                <select class="form-control form-control-sm mr-2 select2" name="category_id" id="category_id">
                    <option selected disabled>--Pilih Jenis--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary float-right" data-bs-dismiss="modal" aria-label="Close">Close</button>
            <button type="submit" class="btn btn-sm btn-primary float-right" id="saveBtn">Simpan</button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
