<!-- Modal Create -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="createForm" name="createForm" method="post">
        @csrf
        <div class="modal-body">
            <button class="btn btn-sm btn-primary" id="createRow">Tambah Baris</button>
            <div class="table-responsive">
                <table class="table table-sm" id="list-costs" aria-describedby="ini adalah list tabel pengeluaran">
                    <thead>
                        <tr>
                            <th>Nama <span class="text-danger">*</span></th>
                            <th>Harga <span class="text-danger">*</span></th>
                            <th>Kuantitas <span class="text-danger">*</span></th>
                            <th>Deskripsi</th>
                            <th><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select class="form-control form-control-sm select2" name="name[]">
                                    <option selected disabled>Pilih Pengeluaran</option>
                                    @foreach ($master_cost as $item)
                                        <option data-tokens="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="harga[]" id="harga" class="form-control form-control-sm" placeholder="Harga">
                            </td>
                            <td>
                                <input type="text" name="qty[]" class="form-control form-control-sm" placeholder="Kuantitas">
                            </td>
                            <td>
                                <input type="text" name="description[]" class="form-control form-control-sm" placeholder="Deskripsi">
                            </td>
                            <td>
                                <a class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
