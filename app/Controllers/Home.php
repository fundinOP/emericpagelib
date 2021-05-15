<?php namespace App\Controllers;

use Page;

class Home extends BaseController
{
	public function index()
	{

        $page = new Page('monTitre');
        $page->addHeader('/headers/base_header.html');
        $page->addNav('/navs/base_nav.html', [
            'username' => 'Emeric'

        ]);
        $page->addContainer('/containers/index_container.html');
        $page->addFooter('/footers/base_footer.html');
        $page->setLinks([['type' => 'stylesheet', 'href' => '/css/style.css'], ['type' => 'stylesheet', 'href' => '/css/index.css']]);
        $page->setScrits([['src' => '/scripts/main.js']]);
        return $page->display();

	}


	//--------------------------------------------------------------------

}
