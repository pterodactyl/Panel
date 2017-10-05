<?php
/**
 * Pterodactyl - Panel
 * Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com>.
 *
 * This software is licensed under the terms of the MIT license.
 * https://opensource.org/licenses/MIT
 */

namespace Pterodactyl\Exceptions\Repository;

class RecordNotFoundException extends \Exception
{
    /**
     * @return int
     */
    public function getStatusCode()
    {
        return 404;
    }
}
