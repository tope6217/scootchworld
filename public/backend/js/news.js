//const { data } = require("jquery");

function deletenews(url,event) {
    event.preventDefault();
    $.ajax({
        url: url+'?_token='+$('[name=csrf-token]').attr('content'),
        method: 'DELETE',
        type: "POST",
    }).done(function (success) {
        data = success.data;
        $('#s'+data.id).addClass('d-none')
    }).always(function (data) {
        console.log(data)
    })
}
