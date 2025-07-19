<table class="min-w-full table-auto border divide-y divide-gray-200">
    <thead class="bg-[#002398] text-white">
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Name (EN)</th>
            <th class="px-4 py-2">Name (KH)</th>
            <th class="px-4 py-2">Address (EN)</th>
            <th class="px-4 py-2">Province (EN)</th>
            <th class="px-4 py-2">Address (KH)</th>
            <th class="px-4 py-2">Province (KH)</th>
            <th class="px-4 py-2">Phone</th>
            <th class="px-4 py-2">GPS</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-100 text-sm text-gray-800">
        @foreach($depots as $depot)
        <tr>
            <td class="px-4 py-2 font-semibold text-gray-900">{{ $depot->id }}</td>
            <td class="px-4 py-2">{{ $depot->Name_EN }}</td>
            <td class="px-4 py-2">{{ $depot->Name_KH }}</td>
            <td class="px-4 py-2">{{ $depot->Address_EN }}</td>
            <td class="px-4 py-2">{{ $depot->province_EN }}</td>
            <td class="px-4 py-2">{{ $depot->Address_KH }}</td>
            <td class="px-4 py-2">{{ $depot->province_KH }}</td>
            <td class="px-4 py-2">{{ $depot->Phone }}</td>
            <td class="px-4 py-2">{{ $depot->GPS }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Laravel AJAX pagination links --}}
<div class="mt-4">
    {{ $depots->links('pagination::tailwind') }}
</div>
