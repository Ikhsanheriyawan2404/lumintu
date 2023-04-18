<form id="deleteDoc" method="post">
    @csrf
        <a href="{{ route('orders.show', $row->id) }}" class="btn btn-sm btn-primary mb-0"><i class="fa fa-eye"></i></a>
        @if($row->status->value == 'pending')
        <a href="{{ route('orders.edit', $row->id) }}" class="btn btn-sm btn-primary mb-0"><i
                class="fa fa-pencil-alt"></i></a>
        <button type="submit" class="btn btn-sm btn-danger mb-0 deleteBtn" data-id="{{ $row->id }}"><i
                class="fa fa-trash"></i></button>
        @endif


</form>
