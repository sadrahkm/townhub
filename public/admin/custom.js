$(document).ready(function () {
    $('a.requestSendBy').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: $(this).attr('href'),
            method: $(this).data('method'),
            success: function (response) {
                return response ? location.reload() : '';
            }
        });
    });

});
