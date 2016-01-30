$(function() {
    $('body').on('submit', '.ajaxForm', function (e) {

        e.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            //data: $(this).serialize(),
            data: $('.ajaxForm').serialize(),

            success: function(data) {
                document.getElementById('form_id').innerHTML = data;
            },
            error: function(xhr, str){
                alert('Error!');
            }
        });
    });
});