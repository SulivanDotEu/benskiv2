<?php

namespace Benski\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BenskiUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
