

<script>

    $(document).ready(function () {
        $('div#showComment').on('show.bs.modal', function (e) {
            var $origem = $(e.relatedTarget);
            var content_ = $($origem).data('content');
            var $modal_body = $(this).find('.modal-body dl.row');
            $($modal_body).find('dd#id').html(content_.id);
            $($modal_body).find('dd#active').html($($origem).parents('tr').find('span.badge').clone());
            // $($modal_body).find('dd#active').html('<span class="badge badge-' + content_.active.active_color + '">' + content_.active.active_text + '</span>');
            $($modal_body).find('dd#created_at').html(content_.created_at);
            $($modal_body).find('dd#user').html(content_.user);
            $($modal_body).find('dd#content').html(content_.content);
        });
    });
</script>