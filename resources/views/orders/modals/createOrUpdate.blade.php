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
        <div class="modal-body">
            <ul class="list-group">
                <li class="list-group-item" id="order_date"></li>
                <li class="list-group-item" id="estimate_date"></li>
                <li class="list-group-item" id="customer"></li>
                <li class="list-group-item" id="total_price"></li>
            </ul>
            <table class="table table-sm table-bordered table-striped" id="table">
                <thead class="bg-navy">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Kuantiti</th>
                    </tr>
                </thead>
                <tbody id="modal">

                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary float-right" data-bs-dismiss="modal" aria-label="Close">Close</button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
