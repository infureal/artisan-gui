<label class="text-sm block mb-1 text-gray-600" for="{{ $id = Str::random(mt_rand(4,6)) . "-$name" }}">
    {{ Str::of($name)->replace('_', ' ')->title() }} @if($required) <span class="text-red-500">*</span> @endif
</label>

<input
        class="w-full px-4 py-2 rounded border transition ease-in-out duration-150 focus:outline-none focus:border-red-500"
        type="text"
        id="{{ $id }}"
        name="{{ $name }}"
        @if($required)
        required
        @endif
>

@if($description)
<div class="mt-1 text-xs leading-3 text-gray-500">
    {{ $description }}
</div>
@endif