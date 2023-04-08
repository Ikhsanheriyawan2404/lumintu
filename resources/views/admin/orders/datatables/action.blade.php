<form id="deleteDoc" method="post">
    @csrf
    @method('DELETE')
    <a href="{{ route('orders.show', $row->id) }}"class="btn btn-sm btn-primary mb-0">Detail</a>
    <a href="javascript:void()" data-id="{{ $row->id }}" id="showItem" class="btn btn-sm btn-primary mb-0">Approved</a>
</form>
