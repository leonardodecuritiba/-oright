{{--<a href="{{(isset($field_edit_route) ? $field_edit_route : route($Page->entity.'.edit',$sel['id']))}}"--}}
{{--class="btn btn-simple btn-info btn-xs btn-icon edit"--}}
{{--data-toggle="tooltip"--}}
{{--data-placement="top"--}}
{{--title="Editar"><i class="material-icons">edit</i></a>--}}

<a href="{{(isset($field_edit_route) ? $field_edit_route : route($Page->entity.'.edit',$sel['id']))}}"
   class="btn btn-simple btn-info btn-xs btn-icon edit"
   data-toggle="tooltip"
   data-placement="top"
   title="Editar"><i class="material-icons">edit</i></a>
