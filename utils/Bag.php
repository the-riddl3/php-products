<?php
namespace Products\utils;

// class of utility methods
class Bag
{
    public static function render(string $template,array $variables) {
        // push all passed variables to the scope
        foreach($variables as $name => $value) {
            $$name = $value;
        }

        ob_start();
        include_once 'templates/' . $template;
        return ob_get_clean();
    }


}