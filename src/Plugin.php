<?php
declare(strict_types=1);
namespace StageArtTicket;
use StageArtTicket\Infrastructure\Schema\TicketMigration;use StageArtTicket\Presentation\Admin\TicketAdmin;use StageArtTicket\Presentation\PublicSite\TicketRouter;
final class Plugin{public function boot():void{if(!class_exists('StageArtCore\\Plugin'))return;TicketMigration::ensure();add_action('admin_menu',[new TicketAdmin(),'register'],33);(new TicketRouter())->register();}}
