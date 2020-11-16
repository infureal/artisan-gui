<div :class="{'md:col-span-4': tab == '{{ $id }}'}">

    <div :class="{'bg-white p-6 rounded-md': tab == '{{ $id }}'}">

        {{-- Open button --}}
        <div x-show="tab != '{{ $id }}'" class="{{ $__trs }} px-6 py-4 cursor-pointer hover:bg-gray-300 rounded-md" @click="window.localStorage.setItem('gui-tab', tab = '{{ $id }}')">
            <div class="text-xl">
                {{ $title = Str::title($id) }}
            </div>
        </div>

        <div x-show="tab == '{{ $id }}'">

            {{-- Title --}}
            <div class="flex items-center justify-between">
                <div class="text-xl text-red-600">
                    {{ $title }}
                </div>
            </div>

            <hr class="my-6 border-red-100" />

            <div class="grid grid-cols-4 gap-6">
                {{ $slot }}
            </div>

        </div>

    </div>

</div>