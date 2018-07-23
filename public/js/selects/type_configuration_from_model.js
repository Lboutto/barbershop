$(document).ready(function () {

    $(function() {

        $('#model').change(function(e) {

            var selected = $(e.target).val();

            //console.dir(selected);

            var form = $('#form-select-type-configuration');

            var url = form.attr('action');

            var data = form.serialize() + "&multiple=" + selected;

            //console.log(data);

            $.post(url, data, function (result) {

                console.log(result);

                $("#type_configuration").empty();

                $("#type_configuration").append('<option value="">'+'Tipo de Configuracion'+'</option>');

                $.each(result, function(value,id){

                    $("#type_configuration").append('<option value="'+id+'">'+value+'</option>');
                });

            }).fail(function (error) {

                $("#type_configuration").empty();

                console.log(error);

            });

        });

    });
});