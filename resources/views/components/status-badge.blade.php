@if ($status === 'Aktif')
    <div class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
        Aktif
    </div>

@elseif ($status === 'Tidak Aktif')
    <div class="inline-flex items-center rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
        Tidak Aktif
    </div>

@endif