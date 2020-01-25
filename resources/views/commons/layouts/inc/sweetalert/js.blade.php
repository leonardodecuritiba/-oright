<script>
    // $('.btn-remove').on('click', function(){
    //     swal({
    //         title: 'Você tem certeza?',
    //         text: "Esta ação é irreversível!",
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Sim, remover!'
    //     }).then(function() {
    //         swal(
    //             'Removido!',
    //             'O recurso foi removido.',
    //             'success'
    //         );
    //     })
    // });
</script>

<script>
    function removeDataTableByAjax($el) {
        if($($el).data('refresh')){
            window.location.href = $($el).data('href');
            return false;
        }

        $.ajax({
            url: $($el).data('href'),
            type: 'post',
            data: {"_method": 'delete', "_token": "{{ csrf_token() }}"},
            dataType: "json",

            beforeSend: function () {
                loadingCard('show',$el);
            },
            error: function (xhr, textStatus) {
                loadingCard('hide', $el);
                console.log('xhr-error: ' + xhr);
                console.log('textStatus-error: ' + textStatus);
            },
            /**/
            success: function (json) {
                loadingCard('hide', $el);
                console.log(json);
                // return false;
                if(json){
                    swal(
//                "<i class='em em-disappointed_relieved'></i>",
                        "",
//                    "<i class='em em-disappointed_relieved'></i> Removido (a)!",
                        "<b>" + $($el).data('entity') + "</b> removido (a) com sucesso!",
                        "success"
                    )
                    var $_table_ = $($el).parents('table').DataTable();
                    // $_TABLE_
                    $_table_
                        .row($($el).parents('tr'))
                        .remove()
                        .draw();
                } else {
                    swal(
//                "<i class='em em-disappointed_relieved'></i>",
                        "",
//                    "<i class='em em-disappointed_relieved'></i> Removido (a)!",
                        "<b>Erro!</b> Nenhuma alteração realizada",
                        "error"
                    )
                }
            }
        });
    }
    function showDeleteTableMessage($el) {
        var entity = $($el).data('entity');
        swal({
            title: "Você tem certeza?",
            text: "Esta ação será irreversível!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
//            confirmButtonText: "<i class='em em-triumph'></i> Sim! ",
//            cancelButtonText: "<i class='em em-cold_sweat'></i> Não, cancele por favor! ",
            confirmButtonText: "Sim! ",
            cancelButtonText: "Não, cancelar! "
        }).then(
            function () {
                removeDataTableByAjax($el);
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        "Cancelado",
                        "Nenhuma alteração realizada!",
    //                    "<i class='em em-heart_eyes'></i>",
    //                    "Ufa, <b>" + entity + "</b> está a salvo :)",
                        "error"
                    )
                } else {
                    alert(1);
                }
            }
        );
    }
</script>