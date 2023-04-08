<form id="deleteDoc" method="post">
    @csrf
    @method('DELETE')
    <a href="{{ route('orders.show', $row->id) }}" class="btn btn-sm btn-primary mb-0">Detail</a>
    <button type="submit" class="btn btn-sm btn-danger mb-0 deleteBtn" data-id="{{ $row->id }}">Hapus</button>
</form>
