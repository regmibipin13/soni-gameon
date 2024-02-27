@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            <img src="{{ asset('images/logo.png') }}" class="logo" alt="GameOn Logo">
            {{-- @if (trim($slot) === 'Laravel')

            @else
                {{ $slot }}
            @endif --}}
        </a>
    </td>
</tr>
