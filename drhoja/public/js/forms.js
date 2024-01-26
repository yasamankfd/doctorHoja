function closeModal(modal) {

    $('#' + modal).addClass("hidden");
}

function showModal(modal) {
    $('#' + modal).removeClass('hidden');
}

function resetForm(elm) {
    $('#' + elm + 'Form')[0].reset();
}

function checkCode(modal){
    let nCode = document.getElementById(modal+"_nationalCode").value;
    let _url            = 'showPatient/' + nCode;

    $.ajax({
        url: _url,
        type: "GET",
        success: function(response) {
            console.log(response)
            if(response) {
                if(Object.keys(response).length > 0)
                {
                    $('#'+modal+'_name').val(response.name);
                    $('#'+modal+'_phone').val(response.phone);
                    $('#'+modal+'_patient_id').val(response.id);

                    showModal(modal);
                }else alert('کاربری با این کد ملی یافت نشد!')
            }
        }
    });
}

function add_sick_certificate(link) {
    var form = document.getElementById('modal_sick_Form');
    var formData = new FormData(form);

    $.ajax({
        url: '/addSickCertificate',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            window.open(link+'/'+response.id);
            closeModal('modal_sick');
            resetForm('modal_sick_');
        },
        error: function (response) {
            console.log('error')

            console.log(response)
            if (response.status == 422) {
                var response = JSON.parse(response.responseText);
                var errorString = '<ul>';
                $.each(response.errors, function (key, value) {
                    errorString += '<li>' + value + '</li>';
                });
                errorString += '</ul>';
                showAlert(errorString, 'error');
            }
            if (response.status == 500) {
                var response = JSON.parse(response.responseText);
                showAlert(response.responseText, 'error');
            }
            if (response.status == 400) {
                showAlert('خطا در برقراری ارتباط', 'error');
            }
        }
    });
}

function add_prescription_certificate(link) {
    var form = document.getElementById('modal_prescription_Form');
    var formData = new FormData(form);

    $.ajax({
        url: '/addPrescriptionCertificate',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            window.open(link+'/'+response.id);
            closeModal('modal_prescription');
            resetForm('modal_prescription_');
        },
        error: function (response) {
            console.log('error')

            console.log(response)
            if (response.status == 422) {
                var response = JSON.parse(response.responseText);
                var errorString = '<ul>';
                $.each(response.errors, function (key, value) {
                    errorString += '<li>' + value + '</li>';
                });
                errorString += '</ul>';
                showAlert(errorString, 'error');
            }
            if (response.status == 500) {
                var response = JSON.parse(response.responseText);
                showAlert(response.responseText, 'error');
            }
            if (response.status == 400) {
                showAlert('خطا در برقراری ارتباط', 'error');
            }
        }
    });
}

function add_physio_certificate(link){
    var form = document.getElementById('modal_physio_Form');
    var formData = new FormData(form);
    $.ajax({
        url: '/addPhysioCertificate',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            window.open(link+'/'+response.id);
            closeModal('modal_physio');
            resetForm('modal_physio_');},
        error: function (response) {
            console.log('error')

            console.log(response)
            if (response.status == 422) {
                var response = JSON.parse(response.responseText);
                var errorString = '<ul>';
                $.each(response.errors, function (key, value) {
                    errorString += '<li>' + value + '</li>';
                });
                errorString += '</ul>';
                showAlert(errorString, 'error');
            }
            if (response.status == 500) {
                var response = JSON.parse(response.responseText);
                showAlert(response.responseText, 'error');
            }
            if (response.status == 400) {
                showAlert('خطا در برقراری ارتباط', 'error');
            }
        }
    });
}

function add_payment(link) {
    var form = document.getElementById('modal_payment_Form');
    var formData = new FormData(form);

    $.ajax({
        url: '/addPayment',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            window.open(link+'/'+response.id);
            closeModal('modal_payment');
            resetForm('modal_payment_');
        },
        error: function (response) {
            console.log('error')

            console.log(response)
            if (response.status == 422) {
                var response = JSON.parse(response.responseText);
                var errorString = '<ul>';
                $.each(response.errors, function (key, value) {
                    errorString += '<li>' + value + '</li>';
                });
                errorString += '</ul>';
                showAlert(errorString, 'error');
            }
            if (response.status == 500) {
                var response = JSON.parse(response.responseText);
                showAlert(response.responseText, 'error');
            }
            if (response.status == 400) {
                showAlert('خطا در برقراری ارتباط', 'error');
            }
        }
    });
}
