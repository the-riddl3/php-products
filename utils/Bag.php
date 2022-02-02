<?php
namespace Products\utils;

// class of utility methods
class Bag
{
    public static function render(string $template,array $variables, $layout = 'main.php') {
        // push all passed variables to the scope
        foreach($variables as $name => $value) {
            $$name = $value;
        }

        ob_start();
        $content = self::viewContent($template,$variables);
        $title = "products";
        include_once 'templates/layouts/' . $layout;
        return ob_get_clean();
    }

    public static function viewContent(string $template,array $variables) {
        // push all passed variables to the scope
        foreach($variables as $name => $value) {
            $$name = $value;
        }

        ob_start();
        $content = include 'templates/' . $template;
        return ob_get_clean();
    }

    public static function redirect($url): void
    {
        header('Location: ' . $url, true, 301);
        exit();
    }
}