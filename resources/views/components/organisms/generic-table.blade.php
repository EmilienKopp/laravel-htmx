@props(['table' => null, 'data' => [], 'headers' => [], 'editables' => [], 'model' => ''])

@php
    if($table) {
        $data = $table->data;
        $headers = $table->headers;
        $editables = $table->editables;
        $model = $table->model;
    }
@endphp

<table>

    <thead>
        <tr>
            @foreach ($headers as $header)
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{ $header }}
                </th>
            @endforeach
        </tr>
    </thead>

    <tbody>

    @if(count($data))
        {{-- Data --}}
        @foreach ($data as $row)
            <x-molecules.editable-tr :$row :$editables :$model />
        @endforeach
    @else
        {{-- No data --}}
        <x-molecules.editable-tr :row="[]" :$editables/>
    @endif

    </tbody>

</table>
