<form id="deleteDoc" method="post">
    @csrf
    @method('DELETE')
    <a href="javascript:void()" data-id="{{ $row->id }}" id="showItem" class="btn btn-sm btn-primary mb-0">Detail</a>
    <a href="javascript:void()" data-id="{{ $row->id }}" id="editItem" class="btn btn-sm btn-primary mb-0">Edit</a>
    <button type="submit" class="btn btn-sm btn-danger mb-0 deleteBtn" data-id="{{ $row->id }}">Hapus</button>
</form>
