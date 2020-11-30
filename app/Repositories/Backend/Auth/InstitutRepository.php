<?php

namespace App\Repositories\Backend\Auth;

use App\Repositories\BaseRepository;
use App\Models\Auth\Institut;
use App\Events\Backend\Auth\Institut\InstitutCreated;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Events\Backend\Auth\Institut\InstitutUpdated;



/**
 * Class RoleRepository.
 */
class InstitutRepository extends BaseRepository
{
    //
    /**
     * RoleRepository constructor.
     *
     * @param  Institut  $model
     */
    public function __construct(Institut $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Throwable
     * @return Institut
     */
    public function create(array $data): Institut
    {
        // Make sure it doesn't already exist
        if ($this->institutExists($data['nama_institut'])) {
            throw new GeneralException('Nama institut telah ada - '.e($data['nama_institut']));
        }

        return DB::transaction(function () use ($data) {
            $institut = $this->model::create([
                'nama_institut' => $data['nama_institut']]);

            if ($institut) {

                event(new InstitutCreated($institut));

                return $institut;
            }

            throw new GeneralException(trans('exceptions.backend.access.instituts.create_error'));
        });

    }


    /**
     * @param $name
     *
     * @return bool
     */
    protected function institutExists($name): bool
    {
        return $this->model
            ->where('nama_institut', $name)
            ->count() > 0;
    }

    /**
     * @param Institut  $institut
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function update(Institut $institut, array $data)
    {
        if ($institut->isAdmin()) {
            throw new GeneralException('You can not edit the administrator institut.');
        }

        // If the name is changing make sure it doesn't already exist
        /* if ($institut->name !== $data['nama_institut']) {
            if ($this->institutExists($data['nama_institut'])) {
                throw new GeneralException('A institute already exists with the name '.$data['nama_institut']);
            }
        } */

        return DB::transaction(function () use ($institut, $data) {
            if ($institut->update([
                'nama_institut' => $data['nama_institut'],
            ])) {

                event(new InstitutUpdated($institut));

                return $institut;
            }

            throw new GeneralException(trans('exceptions.backend.access.instituts.update_error'));
        });
    }

}
