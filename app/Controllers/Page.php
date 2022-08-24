<?php

namespace App\Controllers;

class Page extends BaseController
{
    protected $helpers = ['form'];

    /**
     * shows the page specified in the router
     * @param string $page_name
     * 
     * @return string
     */
    public function showPage($page_name = "")
    {
        $uri = service('uri');

        if ($page_name === "")
            return view('login');

        return view(
            $page_name,
            ['path' => $uri->getPath()] 
        );
    }
}
