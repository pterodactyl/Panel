<?php
/*
 * Pterodactyl - Panel
 * Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace Pterodactyl\Services\Servers;

use GuzzleHttp\Exception\RequestException;
use Pterodactyl\Contracts\Repository\ServerRepositoryInterface;
use Pterodactyl\Contracts\Repository\Daemon\ServerRepositoryInterface as DaemonServerRepositoryInterface;
use Pterodactyl\Exceptions\DisplayException;
use Pterodactyl\Models\Server;

class ContainerRebuildService
{
    /**
     * @var \Pterodactyl\Contracts\Repository\Daemon\ServerRepositoryInterface
     */
    protected $daemonServerRepository;

    /**
     * @var \Pterodactyl\Contracts\Repository\ServerRepositoryInterface
     */
    protected $repository;

    /**
     * ContainerRebuildService constructor.
     *
     * @param \Pterodactyl\Contracts\Repository\Daemon\ServerRepositoryInterface $daemonServerRepository
     * @param \Pterodactyl\Contracts\Repository\ServerRepositoryInterface        $repository
     */
    public function __construct(
        DaemonServerRepositoryInterface $daemonServerRepository,
        ServerRepositoryInterface $repository
    ) {
        $this->daemonServerRepository = $daemonServerRepository;
        $this->repository = $repository;
    }

    /**
     * Mark a server for rebuild on next boot cycle.
     *
     * @param int|\Pterodactyl\Models\Server $server
     *
     * @throws \Pterodactyl\Exceptions\DisplayException
     */
    public function rebuild($server)
    {
        if (! $server instanceof Server) {
            $server = $this->repository->find($server);
        }

        try {
            $this->daemonServerRepository->setNode($server->node_id)->setAccessServer($server->uuid)->rebuild();
        } catch (RequestException $exception) {
            throw new DisplayException(trans('admin/server.exceptions.daemon_exception', [
                'code' => $exception->getResponse()->getStatusCode(),
            ]));
        }
    }
}
