$(document).on('click','#add-account', function () {
    $('#add-new-account-modal').modal('toggle')
});
$(document).on('click','#save-account', async function () {
    const inputs = $('#add-new-account-modal .modal-body :input')
    let objectAccount = {}
    for (const [key,value] of Object.entries(inputs)) {
        const name = $(value).attr('name')
        if(name){
            const inputValue = $(value).val()
            objectAccount[name] = inputValue
        }
    }
    console.log(objectAccount)

    $.ajaxSetup({
        header: {
            'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content')
        }
    })

    const {success,msg} = await $.ajax({
        type: 'POST',
        url: 'api/createAccount',
        data : {
            objectAccount:objectAccount
        }
    })

    Swal.fire({
        icon: success ? 'success' : 'error',
        title: msg
    }).then((e)=>{
        $('#add-new-account-modal').modal('toggle')
        Livewire.dispatch('refreshAdminPage')
    })
});

$(document).on('click','#edit', function () {
    $('#edit-new-account-modal').modal('toggle')
    $('#edit-new-account-modal #account_id').val($(this).attr('data-id'))
    $('#edit-new-account-modal #search_id').val($(this).attr('data-id'))
    $('#edit-new-account-modal #account_name').val($(this).attr('data-name'))
    $('#edit-new-account-modal #bank_name').val($(this).attr('data-bank'))
    $('#edit-new-account-modal #current_balance').val($(this).attr('data-balance'))
    $('#edit-new-account-modal #date_opened').val($(this).attr('data-date')).prop('disabled', true)
});

$(document).on('click','#edit-account',async function () {
    const inputs = $('#edit-new-account-modal .modal-body :input')
    let objectAccount = {}
    for (const [key,value] of Object.entries(inputs)) {
        const name = $(value).attr('name')
        if(name){
            const inputValue = $(value).val()
            objectAccount[name] = inputValue
        }
    }

    console.log(objectAccount)

    $.ajaxSetup({
        header: {
            'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content')
        }
    })

    const {success,msg} = await $.ajax({
        type: 'POST',
        url: 'api/updateAccount',
        data : {
            objectAccount:objectAccount
        }
    })

    Swal.fire({
        icon: success ? 'success' : 'error',
        title: msg
    }).then((e)=>{
        $('#edit-new-account-modal').modal('toggle')
        Livewire.dispatch('refreshAdminPage')
    })
});

$(document).on('click','#delete',async function () {
    let objectAccount = {}
    objectAccount['search_id'] = $(this).attr('data-id')
    console.log(objectAccount)

    $.ajaxSetup({
        header: {
            'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content')
        }
    })

    const {success,msg} = await $.ajax({
        type: 'POST',
        url: 'api/deleteAccount',
        data : {
            objectAccount:objectAccount
        }
    })

    Swal.fire({
        icon: success ? 'success' : 'error',
        title: msg
    }).then((e)=>{
        Livewire.dispatch('refreshAdminPage')
    })
});

// $(document).on('change','#sort', function () {
//     alert($(this).val());
// });
