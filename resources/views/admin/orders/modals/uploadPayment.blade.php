 <div class="modal fade" id="modal-upload-docs">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Upload Bukti Pembayaran</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form id="uploadForm" name="uploadForm" method="post" enctype="multipart/form-data">
                 <div class="modal-body">
                     <div class="form-group">
                         @csrf
                         <input type="hidden" name="order_id" value="{{ $order->id }}">
                         <div class="form-group">
                             <label for="image">Upload</label>
                             <input type="file" class="form-control form-control-sm" name="image">
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Close</button>
                     <button type="submit" id="btnUploadDoc" class="btn btn-sm btn-primary">Upload <em
                             class="fa fa-file"></em></buton>
                 </div>
             </form>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
