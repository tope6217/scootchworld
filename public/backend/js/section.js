    $('#sectionformsubmit').submit(function(event) {
        event.preventDefault();
        d = event.target
        method = $(d).attr('method')
        url = $(d).attr('action')
        data = dat = $(d).serialize()
        var form = new FormData(this)
        $.ajax({
            url: url + '?' + form,
            type: method,
            data: form,
            dataType: 'JSON',
            contentType: false,
            processData: false,
            cache: false

        }).fail(function(response) {
            error422(response, d)
            //console.log(response)
        }).done(function(success) {
            doneSection(success)
        }).always(function (response) {
            console.log(response)
        })
    })

function select(event) {
    $this = event.target;
  //  console.log($this)
    value = $($this).val();
    table = $('.section-table');
    //$(table).addClass('d-none');
    $length = $(table).length;
    if (value == '') {
        $(table).removeClass('d-none')
        return 0;
    }
    for (i = 0; i < $length; i++){
        if ($($(table)[i]).attr('data-target') == value) {
            $($(table)[i]).removeClass('d-none')
        } else {
            $($(table)[i]).addClass('d-none')
        }
    }

}

