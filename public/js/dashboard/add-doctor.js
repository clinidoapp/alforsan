
$(document).ready(function () {
 $('.selectpicker').selectpicker();

    /* ===========================
     * BASIC FORM VALIDATION
     * =========================== */
    $('#add_doctor').on('submit', function (e) {
        let valid = true;
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        $('.is-invalid').removeClass('is-invalid');

        function invalidate(selector) {
            $(selector).addClass('is-invalid');
            valid = false;
        }

        if (!$('#name_en').val()) invalidate('#name_en');
        if (!$('#name_ar').val()) invalidate('#name_ar');

        if (!$('#email').val() || !emailPattern.test($('#email').val())) {
            invalidate('#email');
        }

        if (!$('#phone').val()) invalidate('#phone');
        if (!$('#academic_title').val()) invalidate('#academic_title');

        if (!$('#services_ids').val()) invalidate('#services_ids');

        if (!valid) {
            e.preventDefault();
            alert('Please fill all required fields correctly.');
            return false;
        }

        // Before submit: collect dynamic inputs
        collectValues('#doctor_qualification_en', 'qualifications_en[]');
        collectValues('#doctor_qualification_ar', 'qualifications_ar[]');
        collectValues('#doctor_experiences_en', 'experiences_en[]');
        collectValues('#doctor_experiences_ar', 'experiences_ar[]');
    });

    /* ===========================
     * DYNAMIC ADD / REMOVE
     * =========================== */

    function dynamicBlock(placeholder, value = '') {
        return `<input type="text" class="form-control value-input" placeholder="${placeholder}" value="${value}" >`;
    }
    if(edit == true)
    {
    function appendExisting(containerId, placeholder, values = []) {
        const container = $(containerId + ' .card');

        values.forEach(value => {
            container.prepend(
                dynamicBlock(placeholder, value)
            );
        });
    }

        appendExisting('#doctor_qualification_en', 'Enter Academic Qualification (EN)', qualificationsEn);
        appendExisting('#doctor_qualification_ar', 'Enter Academic Qualification (AR)', qualificationsAr);
        appendExisting('#doctor_experiences_en', 'Enter Practical Experience (EN)', experiencesEn);
        appendExisting('#doctor_experiences_ar', 'Enter Practical Experience (AR)', experiencesAr);
    }

    $('#add_qualification_en').on('click', function () {
        const container = $('#doctor_qualification_en .card');
        const lastInput = container.find('.value-input').last();
        const value = lastInput.val().trim();
        if (value === '') {
            alert('Please enter a qualification first');
            return;
        }

        container.prepend(
            dynamicBlock('Enter Academic Qualification (EN)', value)
        );

        lastInput.val('');
    });
        $('#add_qualification_ar').on('click', function () {
        const container = $('#doctor_qualification_ar .card');
        const lastInput = container.find('.value-input').last();
        const value = lastInput.val().trim();
        if (value === '') {
            alert('Please enter a qualification first');
            return;
        }

        container.prepend(
            dynamicBlock('ادخل المؤهل باللغة العربية', value)
        );

        lastInput.val('');
    });
        $('#add_experiences_en').on('click', function () {
        const container = $('#doctor_experiences_en .card');
        const lastInput = container.find('.value-input').last();
        const value = lastInput.val().trim();
        if (value === '') {
            alert('Please enter a experiences first');
            return;
        }

        container.prepend(
            dynamicBlock('Enter Academic experiences (EN)', value)
        );

        lastInput.val('');
    });
     $('#add_experiences_ar').on('click', function () {
        const container = $('#doctor_experiences_ar .card');
        const lastInput = container.find('.value-input').last();
        const value = lastInput.val().trim();
        if (value === '') {
            alert('Please enter a experiences first');
            return;
        }

        container.prepend(
            dynamicBlock('ادخل الخبرة باللغة العربية', value)
        );

        lastInput.val('');
    });


    /* ===========================
     * COLLECT VALUES INTO HIDDEN INPUTS
     * =========================== */
    function collectValues(container, inputName) {
        let values = [];

        $(container).find('.value-input').each(function () {
            if ($(this).val().trim() !== '') {
                values.push($(this).val().trim());
            }
        });

        $(container).find(`input[type="hidden"][name="${inputName}"]`).remove();
        values.forEach(function (value) {
            $(container).append(
                `<input type="hidden" name="${inputName}" value="${value}">`
            );
        });
    }
function hasAtLeastOneValue(inputSelector) {
    const inputs = document.querySelectorAll(inputSelector);

    return Array.from(inputs).some(input =>
        input.value && input.value.trim() !== ''
    );
}
document.getElementById('add_doctor').addEventListener('submit', function (e) {

    let errors = [];

    /* ================= Academic Qualification ================= */
    if (!hasAtLeastOneValue('input[name="qualifications_en[]"]')) {
        errors.push('At least one Academic Qualification (EN) is required');
    }

    if (!hasAtLeastOneValue('input[name="qualifications_ar[]"]')) {
        errors.push('At least one Academic Qualification (AR) is required');
    }

    /* ================= Practical Experience ================= */
    if (!hasAtLeastOneValue('input[name="experiences_en[]"]')) {
        errors.push('At least one Practical Experience (EN) is required');
    }

    if (!hasAtLeastOneValue('input[name="experiences_ar[]"]')) {
        errors.push('At least one Practical Experience (AR) is required');
    }

    if (errors.length) {
        e.preventDefault();
        alert(errors.join('\n'));
    }
});

});
