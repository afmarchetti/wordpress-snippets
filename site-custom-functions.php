<?php
/**
 * Plugin Name: Site Custom Functions
 * Description: Plugin che raccoglie le funzioni e personalizzazioni custom del sito.
 * Version: 1.0.0
 * Author: Marchetti Design
 */

if (!defined('ABSPATH')) exit; // Sicurezza: blocca accesso diretto


// Mostra un messaggio di test nella dashboard (area admin)
add_action('admin_notices', function () {
    echo '<div class="notice notice-success is-dismissible">
		<p> <a href="">Come pubblicare un prodotto</a> | <a href="">Come tradurre una pagina</a></p>
    </div>';
});
