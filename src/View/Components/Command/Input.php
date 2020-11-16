<?php


namespace Infureal\View\Components\Command;

use Illuminate\View\Component;

class Input extends Component {

    public $name;
    public $description;
    public $required;

    public function __construct($name, $description = null, $required = false) {
        $this->name = $name;
        $this->description = $description;
        $this->required = $required;
    }

    public function render() {
        return view('gui::components.command.input');
    }
}