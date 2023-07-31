<?php

namespace MC\App\Components;

class Component
{
    protected $data;
    protected $template;

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        $file = locate_template("components/{$this->template}");

        if (!file_exists($file)) {
            throw new Exception('Template file not found.');
        }

        ob_start();
        $data = $this->data;
        include $file;
        return ob_get_clean();
    }
}
