<?php
declare(strict_types=1);
namespace PHP_Example\View;

use Exception;

abstract class View
{
    private string $template_dir = '../src/PHP_Example/templates/';
    private string $template_file;

    protected array $vars = array();

    public function __construct($template_file) {
        $this->template_file = $template_file;
    }

    abstract public function process($input);

    public function render() {
        if (file_exists($this->template_dir.$this->template_file)) {
            include $this->template_dir.$this->template_file;
        } else {
            throw new Exception('no template file ' . $this->template_file . ' present in directory ' . $this->template_dir);
        }
    }
    public function __set($name, $value) {
        $this->vars[$name] = $value;
    }
    public function __get($name) {
        return $this->vars[$name];
    }
}
