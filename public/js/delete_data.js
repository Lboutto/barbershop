$(document).ready(function () {

    $('.btn-delete').click(function (e) {

        e.preventDefault();

        var row = $(this).parents('tr');

        var id = row.data('id');

        var form = $('#form-delete');

        var url = form.attr('action').replace(':DATA_ID', id);

        var data = form.serialize();

        swal({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo!'
        }).then(function (result) {

            if (result.value) {

                $('#delete-progress').removeClass('hidden');

                $.post(url, data, function (response) {

                    $('#delete-progress').addClass('hidden');

                    if (response.delete === 'OK') {

                        row.fadeOut();

                        swal({
                            title: 'Eliminado!',
                            text: response.message,
                            type: 'success',
                            timer: 3000
                        });

                    } else {

                        swal({
                            title: 'Disculpe..',
                            text: response.message,
                            type: 'info'
                        });

                        row.show();
                    }

                }).fail(function (error) {

                    console.log(error);

                    swal({
                        title: 'Error desconocido..',
                        text: "Disculpe las molestias ocasionadas",
                        type: 'error'
                    });

                    row.show();
                });
            }
        })

    });

});