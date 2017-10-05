<?php
/**
 * Pterodactyl - Panel
 * Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com>.
 *
 * This software is licensed under the terms of the MIT license.
 * https://opensource.org/licenses/MIT
 */

namespace Tests\Unit\Services\Services\Options;

use Exception;
use Mockery as m;
use Tests\TestCase;
use Pterodactyl\Models\ServiceOption;
use Pterodactyl\Services\Services\Options\InstallScriptUpdateService;
use Pterodactyl\Contracts\Repository\ServiceOptionRepositoryInterface;
use Pterodactyl\Exceptions\Service\ServiceOption\InvalidCopyFromException;

class InstallScriptUpdateServiceTest extends TestCase
{
    /**
     * @var array
     */
    protected $data = [
        'script_install' => 'test-script',
        'script_is_privileged' => true,
        'script_entry' => '/bin/bash',
        'script_container' => 'ubuntu',
        'copy_script_from' => null,
    ];

    /**
     * @var \Pterodactyl\Models\ServiceOption
     */
    protected $model;

    /**
     * @var \Pterodactyl\Contracts\Repository\ServiceOptionRepositoryInterface
     */
    protected $repository;

    /**
     * @var \Pterodactyl\Services\Services\Options\InstallScriptUpdateService
     */
    protected $service;

    /**
     * Setup tests.
     */
    public function setUp()
    {
        parent::setUp();

        $this->model = factory(ServiceOption::class)->make();
        $this->repository = m::mock(ServiceOptionRepositoryInterface::class);

        $this->service = new InstallScriptUpdateService($this->repository);
    }

    /**
     * Test that passing a new copy_script_from attribute works properly.
     */
    public function testUpdateWithValidCopyScriptFromAttribute()
    {
        $this->data['copy_script_from'] = 1;

        $this->repository->shouldReceive('isCopiableScript')->with(1, $this->model->service_id)->once()->andReturn(true);
        $this->repository->shouldReceive('withoutFresh')->withNoArgs()->once()->andReturnSelf()
            ->shouldReceive('update')->with($this->model->id, $this->data)->andReturnNull();

        $this->service->handle($this->model, $this->data);
    }

    /**
     * Test that an exception gets raised when the script is not copiable.
     */
    public function testUpdateWithInvalidCopyScriptFromAttribute()
    {
        $this->data['copy_script_from'] = 1;

        $this->repository->shouldReceive('isCopiableScript')->with(1, $this->model->service_id)->once()->andReturn(false);
        try {
            $this->service->handle($this->model, $this->data);
        } catch (Exception $exception) {
            $this->assertInstanceOf(InvalidCopyFromException::class, $exception);
            $this->assertEquals(trans('exceptions.service.options.invalid_copy_id'), $exception->getMessage());
        }
    }

    /**
     * Test standard functionality.
     */
    public function testUpdateWithoutNewCopyScriptFromAttribute()
    {
        $this->repository->shouldReceive('withoutFresh')->withNoArgs()->once()->andReturnSelf()
            ->shouldReceive('update')->with($this->model->id, $this->data)->andReturnNull();

        $this->service->handle($this->model, $this->data);
    }

    /**
     * Test that an integer can be passed in place of a model.
     */
    public function testFunctionAcceptsIntegerInPlaceOfModel()
    {
        $this->repository->shouldReceive('find')->with($this->model->id)->once()->andReturn($this->model);
        $this->repository->shouldReceive('withoutFresh')->withNoArgs()->once()->andReturnSelf()
            ->shouldReceive('update')->with($this->model->id, $this->data)->andReturnNull();

        $this->service->handle($this->model->id, $this->data);
    }
}
