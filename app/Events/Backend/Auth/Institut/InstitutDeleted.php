<?php

namespace App\Events\Backend\Auth\Institut;

use Illuminate\Queue\SerializesModels;

/**
 * Class InstitutDeleted.
 */
class InstitutDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $institut;

    /**
     * @param $institut
     */
    public function __construct($institut)
    {
        $this->institut = $institut;
    }
}
