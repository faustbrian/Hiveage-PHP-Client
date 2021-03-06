<?php

declare(strict_types=1);

/*
 * This file is part of Hiveage PHP Client.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plients\Hiveage;

use Plients\Http\Http;

class Client
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $subdomain;

    /**
     * Create a new client instance.
     *
     * @param string $key
     * @param string $subdomain
     */
    public function __construct(string $key, string $subdomain)
    {
        $this->key = $key;
        $this->subdomain = $subdomain;
    }

    /**
     * Create a new API service instance.
     *
     * @param string $name
     *
     * @return \Plients\Hiveage\API\AbstractAPI
     */
    public function api(string $name): API\AbstractAPI
    {
        $client = Http::withBaseUri("https://{$this->subdomain}.hiveage.com/api/")->withBasicAuth($this->key, null);

        $class = "Plients\\Hiveage\\API\\{$name}";

        return new $class($client);
    }
}
