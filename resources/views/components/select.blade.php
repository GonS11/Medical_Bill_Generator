<div class="mb-4">
    <p class="block font-medium text-gray-700">{{ $message }}</p>
    <select name="{{ $name }}" id="{{ $name }}"
        class="mt-1 bg-gray-200 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2
        focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
        @if (!empty($value))
            @foreach ($options as $option)
                <option value="{{ $option[$value] }}">
                    {{ $option[$name] }}
                </option>
            @endforeach
        @else
            @foreach ($options as $key => $label)
                <option value="{{ $key }}">{{ $label }}</option>
            @endforeach
        @endif
    </select>
    @error($name)
        <div class="text-red-500 mt-1">{{ $message }}</div>
    @enderror
</div>
