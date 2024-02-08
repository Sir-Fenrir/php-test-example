<?php
declare(strict_types=1);

namespace PHP_Example\View;

use Exception;

abstract class View
{

    // The map where the templates are stored
    private string $template_dir = '../src/PHP_Example/templates/';
    
    // The template used for the current subclass
    private string $template_file;

    public function __construct($template_file)
    {
        $this->template_file = $template_file;
    }

    /**
     * This function has to be implemented to process the current HTTP request.
     * @param array $input This is the HTTP request information
     * @return View The current view, to be able to chain from this to render.
     */
    abstract public function process(array $input): View;

    /**
     * @throws Exception when there is no template
     */
    public function render(): void
    {
        if (file_exists($this->template_dir . $this->template_file)) {
            include $this->template_dir . $this->template_file;
        } else {
            throw new Exception('no template file ' . $this->template_file . ' present in directory ' . $this->template_dir);
        }
    }
}
