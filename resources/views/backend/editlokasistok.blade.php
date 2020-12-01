@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

<form method="POST" action="{{ route('admin.updatelokasistok', $lokasistok) }}">
    <div class="form-group">
        @csrf
        @method('PATCH')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Edit Lokasi Stok
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
                            {{-- <input type="hidden" name="stok_id" value="{{ $lokasistok->stok->id }}"> --}}
                            <p class="mt-2">{{ $lokasistok->stok->fullcode }}</p>
                        </div><!--col-->

                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Nama Stok</label>
                        <div class="col-md-10">
                            <p class="mt-2">{{ $lokasistok->stok->stok_desc }}</p>
                        </div><!--col-->

                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kod IOT</label>
                        <div class="col-md-10">

                            <select class="form-control" name="device_id">
                                <option value="{{ $lokasistok->device->id ?? null}}">{{ $lokasistok->device->kod_IOT ?? null}}</option>
                                <option value="0">Sila Pilih</option>

                                @foreach($device as $device)
                                <option value="{{ $device->id}}">{{ $device->kod_IOT}}</option>
                                @endforeach

                                </select>


                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Petak</label>
                        <div class="col-md-10">

                            <select class="form-control" name="petak">
                                <option value="{{ $lokasistok->petak ?? null}}">{{ $lokasistok->petak ?? null}}</option>
                                <option value="0">Sila Pilih</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                </select>


                        </div><!--col-->
                    </div><!--form-group-->





                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.lokasistok'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{-- {{ html()->closeModelForm() }} --}}

</form>
@endsection
