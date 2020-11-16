<label class="ml-2 block mb-1 text-gray-700"
       for="{{ $id = Str::random(mt_rand(4,6)) . "-$name" }}">
    <input @if($required) required @endif value="1"
           type="checkbox"
           id="{{ $id }}" name="{{ $name }}">

    <label for="{{ $id }}">
        {{ Str::title($name) }} @if($required) <span class="text-red-500">*</span> @endif
    </label>

</label>
@if($description)
    <div class="mt-1 text-xs leading-3 text-gray-500">
        {{ $description }}
    </div>
@endif