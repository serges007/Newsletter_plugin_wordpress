<?php

/*
Plugin Name: Zero plugin
Plugin URI: http://www.amscorporations.com
Description: Un plugin d'introduction pour le développement sous WordPress
Version: 0.1
Author: Mbele Amoungui serge
Author URI: http://www.sergesmbele.be
License: GPL2
*/

/**
 * Description of Zero_Plugin
 *
 * @author amoungui
 */
class Zero_Plugin {
    public function __construct() {
        include_once plugin_dir_path(__FILE__).'Zero_Newsletter.php';
        include_once plugin_dir_path(__FILE__).'Zero_Page_Title.php';
        register_activation_hook(__FILE__, array('Zero_Newsletter', 'install'));
        register_deactivation_hook(__FILE__, array('Zero_Newsletter', 'deactivate'));   
        //ajout d'un menu dans le menu d'administration
        add_action('admin_menu', array($this, 'add_admin_menu'));
        new Zero_Page_Title();
        new Zero_Newsletter();
        register_uninstall_hook(__FILE__, array('Zero_Newsletter', 'uninstall'));
    }
    

    public function add_admin_menu(){
        add_menu_page('Notre premier plugin', 'Zero plugin', 'manage_options', 'zero', array($this, 'menu_html'));
    }    
    
    
    public function menu_html(){
        echo '<h1>'.get_admin_page_title().'</h1>';
        echo '<p>Bienvenue sur la page d\'accueil du plugin</p>';
    }
    
}

new Zero_Plugin();
