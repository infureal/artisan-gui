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

        <span @click="window.localStorage.setItem('gui-command', command = '{{ $name }}')"
              class="cursor-pointer px-4 py-2  text-gray-100 rounded"
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

            <hr class="my-6"/>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                @if($arguments)
                    <div class="p-6 rounded bg-gray-200">

                        <div class="mb-4">
                            Arguments
                        </div>

                        <div class="grid grid-cols-1 gap-3">
                            @foreach($arguments as $argument)
                                <div>
                                    <x-gui-command-input :name="$argument->getName()" :description="$argument->getDescription()" :required="$argument->isRequired()" />
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
                                        <x-gui-command-checkbox :name="$option->getName()" :description="$option->getDescription()" :required="$option->isValueRequired()" />
                                    @else
                                        <x-gui-command-input :name="$option->getName()" :description="$option->getDescription()" :required="$option->isValueRequired()" />
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