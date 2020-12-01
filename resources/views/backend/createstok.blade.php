@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

<form method="POST" action="{{ route('admin.storestok') }}">
    <div class="form-group">
        @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Cipta Nama Stok Baru
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
                            <input type="number" pattern="[0-9]{13}" class="form-control" name="fullcode" id="fullcode" placeholder="13 Digit Kod Stok" required>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Stok</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="stok_desc" name="stok_desc" placeholder="Nama Stok (Huruf Besar)" style="text-transform:uppercase" required>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Penerangan</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="detail" name="detail" placeholder="Penerangan"></textarea>
                        </div><!--col-->
                    </div><!--form-group-->



                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.stok'), __('buttons.general.cancel')) }}
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
