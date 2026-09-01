@props(['color' => 'blue'])
 <span style="background:{{ $color }}; padding:2px 8px; border-radius:4px; color:white; font-size:12px;">
    {{ $slot }}
</span>
