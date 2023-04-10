<form id="deleteDoc" method="post">
    @csrf
    @method('DELETE')
    <a href="{{ route('orders.show', $row->id) }}"class="btn btn-sm btn-primary mb-0">Detail</a>
    @if ($row->status->value == 'approve')
        <a href="{{ route('orders.edit', $row->id) }}" class="btn btn-sm btn-primary mb-0">Check</a>
    @endif

</form>
