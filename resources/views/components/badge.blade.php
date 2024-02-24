@props(['status'])

<span
    @if ($status === 'canceled') class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded border border-red-400"
    @elseif ($status === 'accepted' || $status === 'confirmed')
        class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded border border-green-400"
    @elseif ($status === 'rejected')
        class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded border border-red-400"
    @else
        class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded border border-blue-400" @endif>
    {{ ucfirst($status) }}
</span>
