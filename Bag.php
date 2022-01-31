<?php

class Bag
{
    public function render(string $template) {
        ob_start();
        include_once $template;
        return ob_get_clean();
    }
}