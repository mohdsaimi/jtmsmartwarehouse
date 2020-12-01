@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Prihal Stok
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Kod Stok</label>
                        <div class="col-md-10">
                            <p class="card-text mt-2">{{ $stok->fullcode }}</p>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Stok</label>
                        <div class="col-md-10">
                            <p class="card-text mt-2">{{ $stok->stok_desc }}</p>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Penerangan</label>
                        <div class="col-md-10">
                            <p class="card-text mt-2">{{ $stok->detail }}</p>
                        </div><!--col-->
                    </div><!--form-group-->



                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">

                    <a href="{{ route('admin.stok') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.view')">
                        Back
                    </a>

                </div><!--col-->

                <div class="col text-right">

                    <a href="{{ route('admin.editstok',$stok) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.edit')">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a href="{{ route('admin.destroystok', $stok) }}"
                        data-method="delete"
                        data-trans-button-cancel="@lang('buttons.general.cancel')"
                        data-trans-button-confirm="@lang('buttons.general.crud.delete')"
                        data-trans-title="@lang('strings.backend.general.are_you_sure')"
                        class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')">
                            <i class="fas fa-trash"></i>
                    </a>

                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->


{{-- </form> --}}
@endsection
