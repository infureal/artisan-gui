<?php
/**
 * @var \Symfony\Component\Console\Input\InputArgument[] $arguments
 * @var \Symfony\Component\Console\Input\InputOption[] $options
 */
?>

<form method="post" action="{{ route('gui.run', $name) }}" class="p-6 bg-gray-100 rounded-md"
     :class="{'p-6 bg-gray-100 col-span-4': command == '{{ $name }}', 'col-span-4 md:col-span-1': command != '{{ $name }}'}">
    @csrf

    <div class="flex justify-between">

        <span @click="command = '{{ $name }}'" class="cursor-pointer px-4 py-2  text-gray-100 rounded"
              :class="{'w-full text-center bg-gray-800': command != '{{ $name }}', 'bg-red-500': command == '{{ $name }}'}">
            {{ $name }}
        </span>

        <button x-show="command == '{{ $name }}'"
                class="rounded bg-gray-700 transition ease-in-out duration-150 hover:bg-blue-600 text-white px-4 py-2">
            run
        </button>

    </div>

    <div class="text-xs text-gray-600 leading-none mt-2" :class="{'text-center': command != '{{ $name }}'}">
        {{ $command->getDescription() }}
    </div>

    <div x-show="command == '{{ $name }}'">
        @if(count($arguments) or count($options))

            <hr class="my-6" />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                @if($arguments)
                    <div class="p-6 rounded bg-gray-200">

                        <div class="mb-4">
                            Arguments
                        </div>

                        <div class="grid grid-cols-1 gap-3">
                            @foreach($arguments as $argument)
                                <div>
                                    <label class="text-sm block mb-1 text-gray-600"
                                           for="{{ $command->getName() . $argument->getName() }}">{{ Str::title($name = $argument->getName()) }} @if($argument->isRequired())
                                            <span class="text-red-500">*</span>@endif</label>
                                    <input
                                            @if($argument->isRequired()) required @endif
                                    class="w-full px-4 py-2 rounded border transition ease-in-out duration-150 focus:outline-none focus:border-red-500"
                                            type="text"
                                            id="{{ $name }}"
                                            name="{{ $name }}"
                                    >
                                    <div class="mt-1 text-xs leading-3 text-gray-500">
                                        {{ $argument->getDescription() }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endif
                @if($options)
                    <div class="p-6 rounded bg-gray-200">

                        <div class="mb-4">
                            Options
                        </div>

                        <div class="grid grid-cols-1 gap-3">
                            @foreach($options as $option)
                                <div>
                                    @if(!$option->acceptValue())
                                        <label class="ml-2 block mb-1 text-gray-700"
                                               for="{{ $name = $option->getName() }}">
                                            <input @if($option->isValueRequired()) required @endif value="1" type="checkbox"
                                                   id="{{ $name }}" name="{{ $name }}">
                                            {{ Str::title($name) }}
                                        </label>
                                    @else
                                        <label class="text-sm block mb-1 text-gray-600"
                                               for="{{ $name = $option->getName() }}">{{ Str::title($name) }}</label>
                                        <input
                                                class="w-full px-4 py-2 rounded border transition ease-in-out duration-150 focus:outline-none focus:border-red-500"
                                                type="text"
                                                id="{{ $name }}"
                                                name="{{ $name }}"
                                        >
                                        <div class="mt-1 text-xs leading-3 text-gray-500">
                                            {{ $option->getDescription() }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endif
            </div>
        @endif
    </div>


</form>