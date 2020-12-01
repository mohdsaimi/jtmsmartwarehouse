@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Senarai Lokasi Stok
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">

                <div class="btn-toolbar float-right" lokasistoks="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                    <a href="{{ route('admin.stok') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                </div>

            </div><!--col-->

            <div class="col-sm-7">
                <form action="{{ route('admin.lokasistok') }}" method="GET" role="search">

                    <div class="input-group">
                        <label class="my-1 mr-2 font-weight-bold">Cari</label>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Masukkan kata carian" id="term">

                        <span class="input-group-btn mr-2">
                            <button class="btn btn-info" type="submit" title="Cari">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>

                          <a href="{{ route('admin.lokasistok') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div><!--col-->

        </div><!--row-->


        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Bil.</th>
                            @role('administrator')
                            <th>ILJTM</th>
                            @endrole
                            <th>Kod Stok</th>
                            <th>Nama Stok</th>
                            <th class="text-center">Kod IOT</th>
                            <th class="text-center">Petak</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($lokasistok as $lokasistok)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    @role('administrator')
                                    <td>{{ $lokasistok->institut->nama_institut}}</td>
                                    @endrole
                                    <td>{{ $lokasistok->stok->fullcode ?? null }}</td>
                                    <td>{{ $lokasistok->stok->stok_desc ?? null }}</td>
                                    <td class="text-center">{{ $lokasistok->device->kod_IOT ?? null}}</td>
                                    <td class="text-center">{{ $lokasistok->petak ?? null}}</td>
                                    <td>

                                        {{-- butang --}}
                                        <div class="btn-group btn-group-sm" lokasistok="group" aria-label="@lang('labels.backend.access.users.user_actions')">

                                            <a href="{{ route('admin.editlokasistok',$lokasistok) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.edit')">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="{{ route('admin.destroylokasistok', $lokasistok) }}"
                                               data-method="delete"
                                               data-trans-button-cancel="@lang('buttons.general.cancel')"
                                               data-trans-button-confirm="@lang('buttons.general.crud.delete')"
                                               data-trans-title="@lang('strings.backend.general.are_you_sure')"
                                               class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>





                                        {{-- end butang --}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{$stoks->appends(['term' => request('term'),'inputState' => request('inputState')])->links()}} --}}
                </div>
            </div><!--col-->
        </div><!--row-->

    </div><!--card-body-->
</div><!--card-->
@endsection
