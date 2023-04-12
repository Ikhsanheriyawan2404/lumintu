<form id="deleteDoc" method="post">
    @csrf
    @method('DELETE')
    <a href="{{ route('orders.show', $row->id) }}" class="btn btn-sm btn-primary mb-0"><i class="fa fa-eye"></i></a>
    <a href="{{ route('orders.show', $row->id) }}" class="btn btn-sm btn-primary mb-0"><i
            class="fa fa-dollar-sign"></i></a>
    <a href="{{ route('orders.edit', $row->id) }}" class="btn btn-sm btn-primary mb-0"><i
            class="fa fa-pencil-alt"></i></a>
    <button type="submit" class="btn btn-sm btn-danger mb-0 deleteBtn" data-id="{{ $row->id }}"><i
            class="fa fa-trash"></i></button>
</form>
