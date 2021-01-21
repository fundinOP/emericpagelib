<?php namespace App\Controllers;

use Page;

class Home extends BaseController
{
	public function index()
	{

        $page = new Page('monTitre');
        $page->addHeader('/headers/base_header.php');
        $page->addNav('/navs/base_nav.php', [
            'username' => 'Emeric'

        ]);
        $page->addContainer('/containers/index_container.php');
        $page->addFooter('/footers/base_footer.php');
        $page->setLinks([['type' => 'stylesheet', 'href' => '/css/style.css'], ['type' => 'stylesheet', 'href' => '/css/index.css']]);
        $page->setScrits([['src' => '/scripts/main.js']]);
        return $page->display();

	}


	//--------------------------------------------------------------------

}
