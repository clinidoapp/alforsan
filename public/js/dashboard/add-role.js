$(document).ready(function () {
    /* ===============================
       Select All per Category
    ================================ */

    $('.select-all').on('change', function () {
        const card = $(this).closest('.card');
        const checked = $(this).is(':checked');

        card.find('input[name="permissions_ids[]"]').prop('checked', checked);
    });

    /* ===============================
       Update Select All if children change
    ================================ */

    $('input[name="permissions_ids[]"]').on('change', function () {
        const card = $(this).closest('.card');
        const all = card.find('input[name="permissions_ids[]"]').length;
        const checked = card.find('input[name="permissions_ids[]"]:checked').length;

        card.find('.select-all').prop('checked', all === checked);
    });

    /* ===============================
       Form Validation
    ================================ */

    $('#add_role').on('submit', function (e) {
        let valid = true;
        let errors = [];

        const roleName = $('#Role_name').val().trim();
        const permissionsChecked = $('input[name="permissions_ids[]"]:checked').length;

        // Role name required
        if (roleName === '') {
            valid = false;
            errors.push('Role name is required.');
        }

        // At least one permission
        if (permissionsChecked === 0) {
            valid = false;
            errors.push('Please select at least one permission.');
        }

        if (!valid) {
            e.preventDefault();
            alert(errors.join('\n'));
        }
    });

});
