@props(['foods'])

<table class="border-2 border-black w-full">
    <thead>
        <tr>
            <th class="text-red-700">Nom</th>
            <th class="text-red-700">Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach($foods as $food)
            <tr>
                <td class="border border-black p-2">
                    {{ $food['nom'] }}
                </td>
                <td class="border border-black p-2">
                    {{ $food['description'] }}
                </td>
            </tr>
        @endforeach 
    </tbody>
</table>
