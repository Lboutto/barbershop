$(document).ready(function () {

    $(function() {

        $('#model').change(function(e) {

            var selected = $(e.target).val();

            //console.dir(selected);

            var form = $('#form-select');

            var url = form.attr('action');

            var data = form.serialize() + "&select=" + selected;

            //console.log(data);

            $.post(url, data, function (result) {

                console.log(result);

                $("#element").empty();

                $.each(result, function(value,id){

                    $("#element").append('<option value="'+id+'">'+value+'</option>');
                });

            }).fail(function (error) {

                console.log(error);

            });

        });

    });
});