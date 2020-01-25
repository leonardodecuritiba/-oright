
<!-- Scripts -->
{{Html::script('assets/js/core.min.js', ['data-provide' => 'sweetalert'])}}
{{Html::script('assets/js/app.js')}}
{{Html::script('assets/js/script.min.js')}}
<script>

    var $_LOADING_ = {};
    var $_TABLE_ = {};
    var $_DATATABLE_OPTIONS_ = {
        "dom": 'Bfrtip',
        "responsive": true,
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
        },
        "pageLength": 10,
        "order": [2, "asc"]
    };

    function loadingCard(type, $this) {
        if (type == 'show') {
            $_LOADING_ = $($this).parents('.card-content').next().addClass('reveal');
        } else {
            $_LOADING_ = $($this).parents('.card-content').next().removeClass('reveal');
        }
    }
</script>
{{--{{Html::script('assets/vendor/bootstrap-validator/pt_BR.js')}}--}}
@yield('script_content')