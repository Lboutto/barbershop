$(document).ready(function () {

    $('.btn-delete-massive').click(function (e) {

        e.preventDefault();

        var form = $('#form-delete-massive');

        var url = form.attr('action');

        var data = form.serialize();

        swal({
            title: '¿Borrar las 20 Ordenes mas antiguas?',
            text: "¡No podrás revertir esto!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlas!'
        }).then(function (result) {

            if (result.value) {

                $.post(url, data, function (response) {

                    if (response.delete === 'OK') {

                        //$('#table-order').DataTable().ajax.reload();

                        swal({
                            title: '20 ordenes mas antiguas elimandas!',
                            text: response.message,
                            type: 'success',
                            timer: 3000,
                            showConfirmButton: false
                        });

                        setInterval(function(){
                            location.reload();
                        }, 3000);

                    } else {

                        swal({
                            title: 'Disculpe..',
                            text: response.message,
                            type: 'info'
                        });
                    }

                }).fail(function (error) {

                    console.log(error);

                    swal({
                        title: 'Error desconocido..',
                        text: "Disculpe las molestias ocasionadas",
                        type: 'error'
                    });
                });
            }
        })

    });

});