<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Zero_Page_Title
 *
 * @author amoungui
 */
class Zero_Page_Title {
    public function __construct() {
        add_filter('wp_title', array($this, 'modify_page_title'), 20);
    }
    
    public function modify_page_title($title) {
        return $title. '| Avec le plugin de newsletter';
    }
}
