<a href="javascript:void()" data-id="{{ $row->id }}" id="editItem" class="btn btn-sm btn-primary mb-0">Edit</a>
@if($row->active == '1')
    <a class="btn btn-sm btn-primary mb-0" id="active" data-id="{{ $row->id }}">Aktif</a>
@else
    <a class="btn btn-sm btn-danger mb-0" id="nonactive" data-id="{{ $row->id }}">Nonaktif</a>
@endif
