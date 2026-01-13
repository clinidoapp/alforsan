$(document).ready(function() {
    const form = $('#add_admin');

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function markValid($el) {
        $el.removeClass('is-invalid').addClass('is-valid');
        $el.next('.invalid-feedback').remove();
    }

    $('#add_admin input, #add_admin select').on('input change', function() {
        markValid($(this));
    });

    form.on('submit', function(e) {
        let valid = true;

        const name = $('#admin_name').val().trim();
        const email = $('#admin_email').val().trim();
        const role = $('#admin_role').val();
        const password = $('#admin_password').val().trim();
        const isEdit = form.data('edit') === true;

        $('#add_admin input, #add_admin select').removeClass('is-invalid is-valid');
        $('.invalid-feedback').remove();

        if (name === '' || name.length < 2) {
            valid = false;
            $('#admin_name').addClass('is-invalid')
                .after('<div class="invalid-feedback">Name is required.</div>');
        } else markValid($('#admin_name'));

        if (email === '') {
            valid = false;
            $('#admin_email').addClass('is-invalid')
                .after('<div class="invalid-feedback">Email is required.</div>');
        } else if (!isValidEmail(email)) {
            valid = false;
            $('#admin_email').addClass('is-invalid')
                .after('<div class="invalid-feedback">Enter a valid email address.</div>');
        } else markValid($('#admin_email'));

        if (!role) {
            valid = false;
            $('#admin_role').addClass('is-invalid')
                .after('<div class="invalid-feedback">Please select a role.</div>');
        } else markValid($('#admin_role'));

        if (!isEdit && password === '') {
            valid = false;
            $('#admin_password').addClass('is-invalid')
                .after('<div class="invalid-feedback">Password is required.</div>');
        } else if (password && password.length < 8) {
            valid = false;
            $('#admin_password').addClass('is-invalid')
                .after('<div class="invalid-feedback">Password must be at least 8 characters.</div>');
        } else if (password) {
            markValid($('#admin_password'));
        }

        if (!valid) e.preventDefault();
    });
});
