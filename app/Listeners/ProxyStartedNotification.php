<?php

namespace App\Listeners;

use App\Events\ProxyStarted;
use App\Models\Server;

class ProxyStartedNotification
{
    public Server $server;
    public function __construct()
    {
    }

    public function handle(ProxyStarted $event): void
    {
        $this->server = data_get($event, 'server');
        $this->server->setupDefault404Redirect();
        $this->server->setupDynamicProxyConfiguration();
    }
}