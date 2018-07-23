$(document).ready(function () {

    $(function() {

        $('#level').change(function() {

            var model = $('#model').val();
            var typeConf = $('#type_configuration').val();
            var subTypeConf = $('#sub_type_configuration').val();
            var level = $('#level').val();

            var form = $('#form-select-element-predecessor');

            var url = form.attr('action');

            var data = form.serialize() + "&model=" + model + "&configuration=" + typeConf + "&sub_configuration=" + subTypeConf + "&level=" + level;

            $.post(url, data, function (result) {

                console.log(result);

                $("#predecessor").empty();

                $.each(result, function(value,id){

                    $("#predecessor").append('<option value="'+id+'">'+value+'</option>');
                });

            }).fail(function (error) {

                $("#predecessor").empty();

                console.log(error);

            });
        });
    });
});