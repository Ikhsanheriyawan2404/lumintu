@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://lumintu.masuk.id/assets/img/logo.png" class="logo" alt="lumintu Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
