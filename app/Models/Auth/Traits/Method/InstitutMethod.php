<?php

namespace App\Models\Auth\Traits\Method;

/**
 * Trait InstitutMethod.
 */
trait InstitutMethod
{
    /**
     * @return mixed
     */
    public function isAdmin()
    {
        return $this->name === config('access.users.admin_role');
    }
}
