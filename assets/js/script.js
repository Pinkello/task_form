$(document).ready(function() {
    $('#submitBtn').on('click', function() {
        event.preventDefault();
        var subjectValue = $('#subject').val().trim();
        var contentValue = $('#notes').val().trim();
        if (subjectValue === '' || contentValue === '') {
            showToast(error_toast);
        } else {
            $('#myForm').submit();
        }
    });

    function showToast(message) {
        var toast = new bootstrap.Toast(document.getElementById('toast'));
        $('.toast-body').text(message);
        toast.show();
    }

    $('.add-to-textarea').on('click', function(e) {
        e.preventDefault();
        var linkValue = $(this).data('value');
        var currentContent = $('#notes').val();
        var newContent = currentContent + linkValue;
        $('#notes').val(newContent);
    });

    $('#flexSwitchCheckDefault').change(function() {
        if ($(this).is(':checked')) {
            $('.checks').slideUp();
        } else {
            $('.checks').slideDown();
        }
    });

    $('#skills').change(function() {
        if ($(this).is(':checked')) {
            $('.checkSkills').slideDown();
        } else {
            $('.checkSkills').slideUp();
        }
    });

    $('#trainings').change(function() {
        if ($(this).is(':checked')) {
            $('.checkTrainings').slideDown();
        } else {
            $('.checkTrainings').slideUp();
        }
    });

    $('#companies').change(function() {
        if ($(this).is(':checked')) {
            $('.checkCompanies').slideDown();
        } else {
            $('.checkCompanies').slideUp();
        }
    });

    $('#companies').change(function() {
        if ($(this).is(':checked')) {
            $('.checkDepartments').slideDown();
        } else {
            $('.checkDepartments').slideUp();
        }
    });

    $('#database_data').change(function() {
        if ($(this).is(':checked')) {
            $('.buttons_database').hide().css({
                'display': 'flex',
                'flex-direction': 'column'
            }).slideDown('slow');
        } else {
            $('.buttons_database').hide().css({
                'flex-direction': 'row'
            }).slideUp('slow');
        }
    });
});

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

