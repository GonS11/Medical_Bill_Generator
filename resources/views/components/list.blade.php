@props(['fields', 'buttons'])

<div class="p-6 bg-gray-100 rounded-lg shadow-md">
    @if (!empty($fields))
        <table class="w-full rounded-lg shadow-md bg-white overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    @if (!empty($fields) && is_array($fields[0]))
                        @foreach (array_keys($fields[0]) as $column)
                            <th class="p-3">{{ ucfirst($column) }}</th>
                        @endforeach
                    @endif
                    @if (!empty($buttons))
                        <th class="p-3">Options</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($fields as $index => $field)
                    <tr class="{{ $index % 2 === 0 ? 'bg-gray-50' : 'bg-gray-200' }} hover:bg-gray-300 transition">
                        @foreach ($field as $value)
                            <td class="p-4 border border-gray-300 text-center">{{ $value }}</td>
                        @endforeach
                        @if (!empty($buttons))
                            <td class="p-4 border border-gray-300 text-center">
                                <div class="flex justify-center gap-2">
                                    @foreach ($buttons as $button)
                                        <form action="{{ route($button['route'], $field['id']) }}"
                                            method="{{ $button['method'] }}"
                                            @if (Str::endsWith($button['route'], 'destroy')) onclick="return confirm('{{ __('¿Are you sure you want to delete it?') }}')" @endif>
                                            @csrf
                                            @if (Str::endsWith($button['route'], 'destroy'))
                                                @method('delete')
                                            @endif
                                            <x-button type="submit" bg="{{ $button['color'] }}"
                                                message="{{ $button['text'] }}" class="px-3 py-1 rounded-md" />
                                        </form>
                                    @endforeach
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No data available</p>
    @endif

</div>
