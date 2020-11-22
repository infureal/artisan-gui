<?php


namespace Infureal\View\Components;


use Illuminate\Support\Facades\Artisan;
use Illuminate\View\Component;

class Command extends Component {

    public $name;
    public $command;
    public $arguments;
    public $options;

    public function __construct($name) {

        $this->name = $name;
        /** @var \Illuminate\Console\Command[] $commands */
        $commands = Artisan::all();

        if (!in_array($name, array_keys($commands)))
            throw new \Exception("Command \"{$name}\" not found");

        $this->command = $commands[$name];
        $this->arguments = $this->command->getDefinition()->getArguments();
        $this->options = $this->command->getDefinition()->getOptions();
    }

    public function render() {
        return view('gui::components.command');
    }
}
