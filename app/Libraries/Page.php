<?php

/**
 * Class Page
 *
 * Emeric Callandret
 *
 * 21.01.2021
 *
 * Cette classe permet de crée plus facilement et de manière plus structurer son application web avec codeigniter4
 */
class Page{
    //attributs
    private $title;
    private $links = [[]];
    private $scripts = [[]];
    private $container;
    private $containerDatas = [];
    private $header;
    private $headerDatas = [];
    private $footer;
    private $footerDatas = [];
    private $nav;
    private $navDatas = [];


    //constructeur
    public function __construct($title){
        $this->setTitle($title);
    }

    //accesseurs
    public function setTitle($title){
        $this->title = $title;
    }
    public function getTitle(){
       return $this->title;
    }
    public function setLinks($links){
        $this->links = $links;
    }
    public function getLinks(){
       return $this->links;
    }
    public function setScripts($scripts){
        $this->scripts = $scripts;
    }
    public function getScripts(){
       return $this->scripts;
    }
    private function setContainer($container){
        $this->container = $container;
    }
    private function getContainer(){
        return $this->container;
    }
    private function setContainerDatas($containerDatas){
        $this->containerDatas = $containerDatas;
    }
    private function getContainerDatas(){
        return $this->containerDatas;
    }
    private function setHeader($header){
        $this->header = $header;
    }
    private function getHeader(){
        return $this->header;
    }
    private function setHeaderDatas($headerDatas){
        $this->headerDatas = $headerDatas;
    }
    private function getHeaderDatas(){
        return $this->headerDatas;
    }
    private function setFooter($footer){
        $this->footer = $footer;
    }
    private function getFooter(){
        return $this->footer;
    }
    private function setFooterDatas($footerDatas){
        $this->footerDatas = $footerDatas;
    }
    private function getFooterDatas(){
        return $this->headerDatas;
    }
    private function setNav($nav){
        $this->nav = $nav;
    }
    private function getNav(){
        return $this->nav;
    }
    private function setNavDatas($navDatas){
        $this->navDatas = $navDatas;
    }
    private function getNavDatas(){
        return $this->navDatas;
    }

    //méthodes
    public function addHeader($header, $headersDatas = null){
        $this->setHeader($header);
        if(is_null($headersDatas)){
            $this->setHeaderDatas(null);
        }else{
            $this->setHeaderDatas($headersDatas);
        }
    }
    public function addContainer($container, $containerDatas = null){
        $this->setContainer($container);
        if(is_null($containerDatas)){
            $this->setContainerDatas(null);
        }else{
            $this->setContainerDatas($containerDatas);
        }
    }
    public function addFooter($footer, $footerDatas = null){
        $this->setFooter($footer);
        if(is_null($footerDatas)){
            $this->setFooterDatas(null);
        }else{
            $this->setFooterDatas($footerDatas);
        }
    }
    public function addNav($nav, $navDatas = null){
        $this->setNav($nav);
        if(is_null($navDatas)){
            $this->setNavDatas(null);
        }else{
            $this->setNavDatas($navDatas);
        }
    }

    public function display(){
        //debut html
        echo '<!doctype html>
                <html lang="fr">
                <!-- head -->
                <head>';
        echo '<meta charset="utf-8">
              <title>'.$this->getTitle().'</title>';
        //header
        if(!is_null($this->getHeader())){
            if(is_null($this->getHeaderDatas())){
                echo view($this->getHeader());
            }else{
                echo view($this->getHeader(), $this->getHeaderDatas());
            }
        }
        //links
        echo "<!-- css -->";
        if(!is_null($this->getLinks())){
            foreach ($this->getLinks() as $link ){
                if(isset($link['type']) && isset($link['href']))
                echo '<link rel="'.$link['type'].'" href="'.$link['href'].'" >';
            }
        }
        //fin head
        echo '</head>';
        //debut body
        echo "<!-- body -->";
        echo "<body>";
        //nav
        if(!is_null($this->getNav())){
            if(is_null($this->getNavDatas())){
                echo view($this->getNav());
            }else{
                echo view($this->getNav(), $this->getNavDatas());
            }
        }
        //debut container
        echo "<!-- container -->";
        echo '<div class="container">';
        //container
        if(!is_null($this->getContainer())){
            if(is_null($this->getContainerDatas())){
                echo view($this->getContainer());
            }else{
                echo view($this->getContainer(), $this->getContainerDatas());
            }
        }
        //fin container
        echo '</div>';
        //footer
        echo "<!-- Footer -->";
        if(!is_null($this->getFooter())){
            if(is_null($this->getFooterDatas())){
                echo view($this->getFooter());
            }else{
                echo view($this->getFooter(), $this->getFooterDatas());
            }
        }

        //scripts
        echo "<!-- scripts -->";
        if(!is_null($this->getScripts())){
            ;
            foreach ($this->getScripts() as $script ){
                if(isset($script['src'])){
                    echo '<script src="'.$script['src'].'"></script>';
                }

            }
        }
        //fin body
        echo '</body>';
        //fin html
        echo '</html>';

        return true;
    }


}
