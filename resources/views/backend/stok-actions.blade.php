@if ($stok->id !== 0)
    <div class="btn-group btn-group-sm" stok="group" aria-label="@lang('labels.backend.access.users.user_actions')">

        <a href="{{ route('admin.showstok',$stok) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.view')">
            <i class="fas fa-eye"></i>
        </a>

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
    </div>
@else
    N/A
@endif
