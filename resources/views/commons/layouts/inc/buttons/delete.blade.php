<button data-href="{{(isset($field_delete_route) ? $field_delete_route : route($Page->entity.'.destroy',$sel['id']))}}"
        data-refresh="{{(isset($refresh) ? $refresh : 0)}}"
        class="btn btn-simple btn-xs btn-danger btn-icon"
        onclick="showDeleteTableMessage(this)"
        type="button"
        data-entity="{{(isset($field_delete) ? $field_delete : $Page->name).': '.$sel['name']}}"><i
            class="material-icons">delete_forever</i></button>