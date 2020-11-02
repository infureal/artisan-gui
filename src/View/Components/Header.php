<?php


namespace Infureal\View\Components;


use Illuminate\View\Component;

class Header extends Component {

    /**
     * @inheritDoc
     */
    public function render() {
        return view("gui::components.header");
    }
}