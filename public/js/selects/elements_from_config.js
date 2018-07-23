$(document).ready(function () {

    $(function() {

        $('#model').change(function() {

            $('#type_configuration').change(function() {

                $('#sub_type_configuration').change(function() {

                    var model = $('#model').val();
                    var typeConf = $('#type_configuration').val();
                    var subTypeConf = $('#sub_type_configuration').val();

                    $('#element').prop("disabled", false);

                    var form = $('#form-select-elements-conf');

                    var url = form.attr('action');

                    var data = form.serialize() + "&model=" + model + "&configuration=" + typeConf + "&sub_configuration=" + subTypeConf;

                    $.post(url, data, function (result) {

                        console.log(result);

                        $("#element").empty();

                        $("#element").append('<option value="">'+'Seleccione un Elemento'+'</option>');

                        $.each(result, function(value,id){

                            $("#element").append('<option value="'+id+'">'+value+'</option>');
                        });

                    }).fail(function (error) {

                        $("#element").empty();

                        $('#element').prop("disabled", true);

                        console.log(error);

                    });

                });

            });

        });

    });

});