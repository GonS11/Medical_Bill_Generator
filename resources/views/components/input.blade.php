<div class="mb-4">
    <label for="{{ $name }}" class="block font-medium text-gray-700">{{ $labelText ?? '' }}</label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value ?? '') }}"
        autocomplete="off"
        placeholder="{{ $placeholder ?? $labelText }}"
        @if($type === 'date') pattern="\d{4}-\d{2}-\d{2}" @endif
        required
        class="mt-1 bg-gray-200 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2
        focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
    @error($name)
        <div class="text-red-500 mt-1">{{ $message }}</div>
    @enderror
</div>
