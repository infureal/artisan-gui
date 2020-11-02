<?php


namespace Infureal\View\Components;


use Illuminate\View\Component;

class Group extends Component {

    public $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function render() {
        return view("gui::components.group");
    }
}