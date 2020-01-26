<?php

namespace Financial\View;

class View
{
    private string $view;
    private bool $menu;

    public function __construct(string $view, bool $showMenu)
    {
        require_once INCLUDE_PATH . 'header.phtml';
        $this->setView(VIEWS_PATH . $view);
        $this->setMenu($showMenu);
    }

    public function __get(string $index)
    {
        return $this->$index;
    }

    public function __set(string $index, $value)
    {
        $this->$index = $value;
    }

    public function getView(): string
    {
        return $this->view;
    }

    public function setView(string $view): void
    {
        $this->view = $view;
    }

    public function render()
    {
        ob_start();
        if (is_file($this->getView())) {
            require_once $this->getView();
        } else {
            /**
             * ! TRATAR O RETORNO
             */
            exit('VIEW NÃO EXISTE');
        }
        return ob_get_clean();
        require_once INCLUDE_PATH . 'footer.phtml';
    }

    public function getMenu()
    {
        return $this->menu;
    }

    public function setMenu($menu)
    {
        $this->menu = $menu;

        return $this;
    }
}