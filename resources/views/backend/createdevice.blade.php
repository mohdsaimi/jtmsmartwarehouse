@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

<form method="POST" action="{{ route('admin.storedevice') }}">
    <div class="form-group">
        @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Cipta Peranti IOT Stok Baru
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Kod IOT</label>
                        <div class="col-md-10">
                            <input type="number" pattern="[0-9]{13}" class="form-control" name="kod_IOT" id="kod_IOT" placeholder="Kod IOT" required>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Bilangan Petak</label>
                        <div class="col-md-10">

                            <select class="form-control" name="bil_petak">
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

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Institut</label>
                        <div class="col-md-10">

                            <select class="form-control" name="institut_id">
                                <option value="0">Sila Pilih</option>
                                @foreach($instituts as $institut)
                                <option value="{{ $institut->id}}">{{ $institut->nama_institut}}</option>
                                @endforeach
                                </select>

                        </div><!--col-->
                    </div><!--form-group-->



                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.device'), __('buttons.general.cancel')) }}
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
