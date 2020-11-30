<?php

namespace App\Events\Backend\Auth\Institut;

use Illuminate\Queue\SerializesModels;

/**
 * Class InstitutCreated.
 */
class InstitutCreated
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
