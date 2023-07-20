@props(['row' => [], 'editables' => [], 'model'])


<tr>

    @if($row)
        @foreach ($row as $key => $value)
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                @if(in_array($key, $editables))
                    <input type="text" name="{{$key}}" value="{{$value}}" 
                        class="bg-transparent text-white hover:bg-slate-100 hover:text-black font-semibold py-2 px-4 border border-white rounded-lg shadow-md focus:outline focus:outline-2 focus:outline-red-500" 
                        hx-put="/api/{{$model}}/{{$row["id"]}}/update"
                        hx-trigger="keyup changed"/>
                @else
                    {{ $value }}
                @endif
            </td>
        @endforeach
    @else
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            No data
        </td>
    @endif

</tr>