@if ($row->payment_status == 'unpaid')
    <span class="badge badge-sm bg-gradient-danger">Belum Lunas</span>
@else
    <span class="badge badge-sm bg-gradient-success">Lunas</span>
@endif
