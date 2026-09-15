<?php
/**
 * Plugin Name: StageArtTicket
 * Description: StageArtCore向けチケット予約・受付管理拡張。
 * Version: 0.5.0
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * Author: nisehatakiti
 * Author URI: https://nisehatakiti.online/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: stageart-ticket
 * Requires Plugins: stageart-core, authcore
 */
declare(strict_types=1);
if(!defined('ABSPATH'))exit;
define('STAGEART_TICKET_VERSION','0.5.0');
define('STAGEART_TICKET_FILE',__FILE__);def ine('STAGEART_TICKET_DIR',plugin_dir_path(__FILE__));
