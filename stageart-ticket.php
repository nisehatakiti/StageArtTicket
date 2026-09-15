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
 * AuthCore: extension
 * AuthCore Application Key: stageart-ticket
 * AuthCore Application Name: StageArtTicket
 * AuthCore Parent Application: stageart
 * AuthCore Application Version: 0.5.0
 * AuthCore Application URI: https://github.com/nisehatakiti/StageArtTicket
 * AuthCore Vendor: nisehatakiti
 * AuthCore Vendor URI: https://github.com/nisehatakiti
 * AuthCore Description: StageArtのチケット予約・受付管理拡張
 * AuthCore Icon: dashicons-tickets-alt
 */
declare(strict_types=1);
if(!defined('ABSPATH'))exit;
define('STAGEART_TICKET_VERSION','0.5.0');
define('STAGEART_TICKET_FILE',__FILE__);define('STAGEART_TICKET_DIR',plugin_dir_path(__FILE__));define('STAGEART_TICKET_URL',plugin_dir_url(__FILE__));
spl_autoload_register(static function(string$class):void{$prefix='StageArtTicket\\';if(!str_starts_with($class,$prefix))return;$relative=substr($class,strlen($prefix));$path=STAGEART_TICKET_DIR.'src/'.str_replace('\\','/',$relative).'.php';if(is_file($path))require_once$path;});
add_action('plugins_loaded',static function():void{if(!class_exists('StageArtTicket\\Plugin'))return;(new StageArtTicket\Plugin())->boot();});
register_activation_hook(STAGEART_TICKET_FILE,static function():void{if(class_exists('StageArtTicket\\Infrastructure\\Schema\\TicketMigration'))StageArtTicket\Infrastructure\Schema\TicketMigration::ensure();if(class_exists('StageArtTicket\\Presentation\\PublicSite\\TicketRouter'))(new StageArtTicket\Presentation\PublicSite\TicketRouter())->rewrite();flush_rewrite_rules();});
