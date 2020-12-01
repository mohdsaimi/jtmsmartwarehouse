@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<form method="POST" action="{{ route('admin.storelokasistok') }}">
    <div class="form-group">
        @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Cipta Lokasi Stok Baru
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
                            <input type="hidden" name="stok_id" value="{{ $stok->id }}">
                            {{-- <input type="hidden" name="fullcode" value="{{ $stok->fullcode }}">
                            <input type="hidden" name="stok_desc" value="{{ $stok->stok_desc }}"> --}}
                            <p class="mt-2">{{ $stok->fullcode }}</p>
                        </div><!--col-->

                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Nama Stok</label>
                        <div class="col-md-10">
                            <p class="mt-2">{{ $stok->stok_desc }}</p>
                        </div><!--col-->

                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kod IOT</label>
                        <div class="col-md-10">

                            <select class="form-control" name="device_id">
                                <option value="0">Sila Pilih</option>

                                @foreach($devices as $device)
                                <option value="{{ $device->id}}">{{ $device->kod_IOT}}</option>
                                @endforeach

                                </select>


                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Petak</label>
                        <div class="col-md-10">

                            <select class="form-control" name="petak">
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
