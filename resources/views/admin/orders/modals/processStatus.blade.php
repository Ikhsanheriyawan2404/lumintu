<div class="modal fade" id="modalProcessStatus">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span>&times;</span>
            </button>
        </div>
        <form id="itemForm" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <input type="hidden" id="currentStatus" value="{{ $order->status }}">
                <input type="hidden" id="nextStatus" value="{{ $nextStatus }}">
                <label for="chooseValet" id="labelValet">Pilih Valet <span class="text-danger">*</span></label>
                <select name="chooseValet" id="chooseValet" class="form-control form-control-sm" required>
                    <option selected disabled>Pilih Valet</option>
                    @foreach ($valet as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary float-right" data-bs-dismiss="modal" aria-label="Close">Close</button>
            <button type="submit" class="btn btn-sm btn-primary float-right" id="saveBtn">Proses</button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
