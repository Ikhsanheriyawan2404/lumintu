<div class="div">
    <form action="{{ route('products.destroy', $row->id) }}" method="post">
        <a href="javascript:void()" data-id="{{ $row->id }}" class="btn btn-sm btn-primary">Edit</a>
        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
    </form>
</div>
