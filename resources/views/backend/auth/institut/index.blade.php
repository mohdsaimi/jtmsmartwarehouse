@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.instituts.management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.access.instituts.management')
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.auth.institut.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('Bil')</th>
                            <th>@lang('labels.backend.access.instituts.table.nama_institut')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <?php $bil=0;?>
                        <tbody>
                            @foreach($instituts as $institut)
                            <?php $bil++;?>
                                <tr>
                                    <td><?php echo $bil;?></td>
                                    <td>{{ $institut->nama_institut }}</td>
                                    <td>@include('backend.auth.institut.includes.actions', ['institut' => $institut])</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {{-- {!! $institut->total() !!} {{ trans_choice('labels.backend.access.institut.table.total', $institut->total()) }} --}}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {{-- {!! $institut->render() !!} --}}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection

