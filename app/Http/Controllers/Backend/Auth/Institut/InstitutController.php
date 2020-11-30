<?php

namespace App\Http\Controllers\Backend\Auth\Institut;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Auth\InstitutRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use Illuminate\Http\Request;
use App\Models\Auth\Institut;
use App\Http\Requests\Backend\Auth\Institut\ManageInstitutRequest;
use App\Http\Requests\Backend\Auth\Institut\StoreInstitutRequest;
use App\Http\Requests\Backend\Auth\Institut\UpdateInstitutRequest;
use App\Events\Backend\Auth\Institut\InstitutDeleted;


class InstitutController extends Controller
{
    //
/**
     * @var InstitutRepository
     */
    protected $institutRepository;

    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * @param InstitutRepository       $institutRepository
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(InstitutRepository $institutRepository, PermissionRepository $permissionRepository)
    {
        $this->institutRepository = $institutRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @param ManageInstitutRequest $request
     *
     * @return mixed
     */
     public function index(ManageInstitutRequest $request)
    {
        return view('backend.auth.institut.index')
            ->withInstituts(Institut::all());
    }

    /**
     * @param ManageInstitutRequest $request
     *
     * @return mixed
     */
    public function create(ManageInstitutRequest $request)
    {
        return view('backend.auth.institut.create')
            ->withPermissions($this->permissionRepository->get());
    }

    /**
     * @param  StoreInstitutRequest  $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreInstitutRequest $request)
    {
        $this->institutRepository->create($request->only(
            'nama_institut'
        ));

        //$this->institutRepository->create($request->all());

        return redirect()->route('admin.auth.institut.index')->withFlashSuccess(__('alerts.backend.instituts.created'));
    }

    /**
     * @param ManageInstitutRequest $request
     * @param Institut              $institut
     *
     * @return mixed
     */
    public function edit(ManageInstitutRequest $request, Institut $institut)
    {
        if ($institut->isAdmin()) {
            return redirect()->route('admin.auth.institut.index')->withFlashDanger('You can not edit the administrator institut.');
        }

        return view('backend.auth.institut.edit')
            ->withInstitut($institut)
            /* ->withInstituts(Institut::all()) */
            /* ->withInstitutPermissions($institut->permissions->pluck('nama_institut')->all()) */
            ->withPermissions($this->permissionRepository->get());
    }

    /**
     * @param  UpdateInstitutRequest  $request
     * @param  Institut  $institut
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateInstitutRequest $request, Institut $institut)
    {
        $this->institutRepository->update($institut, $request->only('nama_institut'));

        return redirect()->route('admin.auth.institut.index')->withFlashSuccess(__('alerts.backend.instituts.updated'));
    }

    /**
     * @param ManageInstitutRequest $request
     * @param Institut              $institut
     *
     * @throws \Exception
     * @return mixed
     */
    public function destroy(ManageInstitutRequest $request, Institut $institut)
    {
        if ($institut->isAdmin()) {
            return redirect()->route('admin.auth.institut.index')->withFlashDanger(__('exceptions.backend.access.instituts.cant_delete_admin'));
        }

        $this->institutRepository->deleteById($institut->id);

        event(new InstitutDeleted($institut));

        return redirect()->route('admin.auth.institut.index')->withFlashSuccess(__('alerts.backend.instituts.deleted'));
    }

}
