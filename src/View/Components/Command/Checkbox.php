<?php


namespace Infureal\View\Components\Command;


use Illuminate\View\Component;

class Checkbox extends Component {

    public $name;
    public $required;
    public $description;

    public function __construct($name, $description = null, $required = false) {
        $this->name = $name;
        $this->required = $required;
        $this->description = $description;
    }

    public function render() {
        return view('gui::components.command.checkbox');
    }
}