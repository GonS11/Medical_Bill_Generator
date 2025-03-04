<div class="mt-6">
    <button type="{{ $type ?? '' }}"
        class="w-full bg-{{ $bg }}-600 text-{{ $color ?? 'white' }} px-4 py-2 rounded-md hover:bg-{{ $bg }}-800 transition duration-200 cursor-pointer">
        {{ $message }}
    </button>
</div>
