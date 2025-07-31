@if ($errors->any())
    <div class="mb-4 rounded-sm border border-red-300 bg-red-50 p-3 text-sm text-red-700 shadow-sm">
        <div class="mb-1 font-semibold text-red-800">
            {{ __('There were some problems with your input:') }}
        </div>
        <ul class="list-disc list-inside space-y-1 pl-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif