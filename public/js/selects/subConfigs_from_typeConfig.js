$(document).ready(function () {

    $(function() {

        $('#type_configuration').change(function(e) {

            var selected = $(e.target).val();

            //console.dir(selected);

            var form = $('#form-select-sub-type-configuration');

            var url = form.attr('action');

            var data = form.serialize() + "&multiple=" + selected;

            //console.log(data);

            $.post(url, data, function (result) {

                console.log(result);

                $("#sub_type_configuration").empty();

                $("#sub_type_configuration").append('<option value="">'+'Sub-Configuracion'+'</option>');

                $.each(result, function(value,id){

                    $("#sub_type_configuration").append('<option value="'+id+'">'+value+'</option>');
                });

            }).fail(function (error) {

                $("#sub_type_configuration").empty();

                console.log(error);

            });

        });

    });
});