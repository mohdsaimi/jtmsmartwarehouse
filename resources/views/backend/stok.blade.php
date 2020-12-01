@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Senarai Nama Stok
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.stok-header-buttons')
            </div><!--col-->

            <div class="col-sm-7">
                <form action="{{ route('admin.stok') }}" method="GET" role="search">

                    <div class="input-group">
                        <label class="my-1 mr-2 font-weight-bold">Cari</label>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Carian Nama Stok" id="term">

                        {{-- <span class="input-group-btn mr-2">
                            <select id="inputState" name="inputState" class="form-control font-weight-bold">
                              <option value="1"selected>Nama Stok</option>
                              <option value="2">Kod Stok</option>
                            </select>
                        </span> --}}

                        <span class="input-group-btn mr-2">
                            <button class="btn btn-info" type="submit" title="Cari">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>

                          <a href="{{ route('admin.stok') }}">
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
                            <th>Kod Stok</th>
                            <th>Nama Stok</th>
                            <th>Penerangan</th>
                            @role('administrator')
                            <th>@lang('labels.general.actions')</th>
                            @endrole
                            <th>Add To List</th>
                        </tr>
                        </thead>
                        <?php $bil=0;?>
                        <tbody>
                            @foreach($stoks as $key => $stok)

                                <tr>
                                    <td>{{ $key + $stoks->firstItem() }}</td>
                                    <td>{{ $stok->fullcode }}</td>
                                    <td>{{ $stok->stok_desc }}</td>
                                    <td>{{ $stok->detail }}</td>
                                    @role('administrator')
                                    <td>@include('backend.stok-actions', ['stok' => $stok])</td>
                                    @endrole
                                    <td><div class="btn-group btn-group-sm" stok="group" aria-label="@lang('labels.backend.access.users.user_actions')">
                                            <a href="{{ route('admin.createlokasistok',$stok ) }}" class="btn btn-success" data-toggle="tooltip" title="Add To List"><i class="fas fa-plus-circle"></i></a>
                                        </div></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{$stoks->appends(['term' => request('term'),'inputState' => request('inputState')])->links()}} --}}
                    {{$stoks->appends(['term' => request('term')])->links()}}
                </div>
            </div><!--col-->
        </div><!--row-->

    </div><!--card-body-->
</div><!--card-->
@endsection
