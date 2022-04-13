function category(event) {
    event.preventDefault();
    d = event.target
    method = $(d).attr('method')
    url = $(d).attr('action')
    data = dat = $(d).serialize()
    console.log(data)
    $.ajax({
        url: url+'?'+dat,
        type: method,
        data: dat,
        headers: {
            'Content-Type':'application/json',
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    }).fail(function (response) {
        error422(response,d)
    }).done(function (success) {
        donecategory(success, false,d)
    }).always(function (response) {
    })
}

function check(d) {
    return d.is_active == true ? 'Active' :'Unactive'
}

function loadcategory(data) {
    d = data.data
    console.log(d)
    $('#category-table').append(`
        <tr>
        <td class="text-center">${d.id}</td>
        <td class="align-middle text-center text-sm">
            <span class="text-xs font-weight-bold"> ${d.category_name}
            </span>

        </td>
        <td class="align-middle text-center text-sm">
            <span class="text-xs font-weight-bold">
            ${check(d)}
            </span>
        </td>
        <td class="align-middle text-center text-sm">
            <span style="cursor: pointer"
                class="bg-primary text-xs btn-sm font-weight-bold text-white"><i
                    class="fa fa-edit"> Edit</i> </span>
        </td>
        <td class="text-center">
            <span style="cursor: pointer"
                class="bg-danger  text-white btn-sm text-xs font-weight-bold"><i
                    class="fa fa-trash"> Delete </i>
            </span>

        </td>
    </tr>
    `)
}
function error422(response,d) {
        if (response.status == 422) {
        errors = (response.responseJSON.errors)
        $.each(errors, function (p, i) {
            // console.log($('span#' + d))
            $(d).find('span.error').empty();
            if (!$('span#' + p).hasClass('text-danger')) {
                $('span#' + p).addClass('text-danger').addClass('text-sm').empty().text(i[0]);
            } else {
                $('span#' + p).empty().addClass('text-danger').text(i[0]);
            }
        })
            if ($(d).find('span#message').hasClass('text-primary') ) {
                $(d).find('span#message').removeClass('text-primary')
            }
        $(d).find('span#message').addClass('text-warning').text(response.responseJSON.message)
        } else if (response.status == 500) {
            if ($(d).find('span#message').hasClass('text-primary') ) {
                $(d).find('span#message').removeClass('text-primary')
            }
            $(d).find('span#message').addClass('text-warning').removeClass('text-primary').text(response.responseJSON.message)
        }
        console.log(response)
}
function donecategory(data, isArray ,d) {
    if (data.success) {
        if (isArray ==true) {

        } else {
loadcategory(data)
        }

            if ($(d).find('span#message').hasClass('text-warning') ) {
                $(d).find('span#message').removeClass('text-primary')
            }
        $(d).find('span#message').empty().removeClass('text-warning').addClass('text-primary').text(data.message)

    }
}

function doneSection(data) {
    d = data.data
    $('#session-table').append(
`       <tr data-target="${d.category_id}">
            <td class="text-center">${ d.id }</td>
            <td class="align-middle text-center text-sm">
                <span class="text-xs font-weight-bold">
                    ${ d.section_name }
                </span>

            </td>
            <td class="align-middle text-center text-sm">
                <span class="text-xs font-weight-bold">
                    <img src="${ d.pic }" alt="" srcset="" width="50px">
                </span>
            </td>
            <td class="align-middle text-center text-sm">
                <span style="cursor: pointer"
                    class="bg-primary text-xs btn-sm font-weight-bold text-white"><i
                        class="${ d.icon }"> icon</i> </span>
            </td>
            <td class="align-middle text-center text-sm">
                <span style="cursor: pointer"
                    class="bg-primary text-xs btn-sm font-weight-bold text-white"><i
                        class="fa fa-edit"> Edit</i> </span>
            </td>
            <td class="text-center">
                <span style="cursor: pointer"
                    class="bg-danger  text-white btn-sm text-xs font-weight-bold"><i
                        class="fa fa-trash"> Delete </i>
                </span>
            </td>
        </tr>`
    )
}


