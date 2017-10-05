<?php
/**
 * Pterodactyl - Panel
 * Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com>.
 *
 * This software is licensed under the terms of the MIT license.
 * https://opensource.org/licenses/MIT
 */

namespace Tests\Unit\Services\Services;

use Mockery as m;
use Tests\TestCase;
use Pterodactyl\Services\Services\ServiceUpdateService;
use Pterodactyl\Contracts\Repository\ServiceRepositoryInterface;

class ServiceUpdateServiceTest extends TestCase
{
    /**
     * @var \Pterodactyl\Contracts\Repository\ServiceRepositoryInterface
     */
    protected $repository;

    /**
     * @var \Pterodactyl\Services\Services\ServiceUpdateService
     */
    protected $service;

    /**
     * Setup tests.
     */
    public function setUp()
    {
        parent::setUp();

        $this->repository = m::mock(ServiceRepositoryInterface::class);

        $this->service = new ServiceUpdateService($this->repository);
    }

    /**
     * Test that the author key is removed from the data array before updating the record.
     */
    public function testAuthorArrayKeyIsRemovedIfPassed()
    {
        $this->repository->shouldReceive('withoutFresh')->withNoArgs()->once()->andReturnSelf()
            ->shouldReceive('update')->with(1, ['otherfield' => 'value'])->once()->andReturnNull();

        $this->service->handle(1, ['author' => 'author1', 'otherfield' => 'value']);
    }

    /**
     * Test that the function continues to work when no author key is passed.
     */
    public function testServiceIsUpdatedWhenNoAuthorKeyIsPassed()
    {
        $this->repository->shouldReceive('withoutFresh')->withNoArgs()->once()->andReturnSelf()
            ->shouldReceive('update')->with(1, ['otherfield' => 'value'])->once()->andReturnNull();

        $this->service->handle(1, ['otherfield' => 'value']);
    }
}
