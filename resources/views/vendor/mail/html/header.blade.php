<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Cabik')
<img src="{{ asset('images/logo.png') }}" class="logo" alt="Cabik Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
