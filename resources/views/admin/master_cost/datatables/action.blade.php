<form id="deleteDoc" method="post">
    @csrf
    @method('DELETE')
    <a href="javascript:void()" data-id="{{ $row->id }}" id="editItem" class="btn btn-sm mb-0 btn-primary">Edit</a>
    <button type="submit" class="btn btn-sm mb-0 btn-danger deleteBtn" data-id="{{ $row->id }}">Hapus</button>
</form>
