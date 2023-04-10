<form id="deleteDoc" method="post">
    @csrf
    @method('DELETE')
    <a href="{{ route('orders.show', $row->id) }}"class="btn btn-sm btn-primary mb-0">Detail</a>
</form>
