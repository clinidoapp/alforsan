let symptomIndex   = 0;
let techniqueIndex = 0;
let faqIndex       = 0;

document.addEventListener('click', function (e) {

    /* ================== SYMPTOMS ================== */
    if (e.target.closest('.add-symptoms-btn')) {

        document.querySelectorAll('#symptoms-wrapper .add-btn-wrapper')
            .forEach(el => el.remove());

        symptomIndex++;

        const template = `
            <div class="card bg-light-gray p-4 mb-3 symptoms-card" data-index="${symptomIndex}">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="title_en" class="form-label">symptoms title(En)</label>
                        <input type="text" name="symptoms[${symptomIndex}][title_en]"
                            class="form-control form-control-lg border-0">
                    </div>
                    <div class="col-md-6">
                        <label for="title_ar" class="form-label">symptoms title(Ar)</label>
                        <input type="text" name="symptoms[${symptomIndex}][title_ar]"
                            class="form-control form-control-lg border-0">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="description_en" class="form-label">Description(En)</label>
                        <textarea name="symptoms[${symptomIndex}][description_en]"
                            class="form-control form-control-lg border-0"
                            placeholder="Description EN"></textarea>
                    </div>
                    <div class="col-md-6">
                         <label for="description_ar" class="form-label">Description(Ar)</label>
                        <textarea name="symptoms[${symptomIndex}][description_ar]"
                            class="form-control form-control-lg border-0"
                            placeholder="Description AR"></textarea>
                    </div>
                </div>
                <div class="text-center mt-4 add-btn-wrapper">
                    <button type="button"
                        class="btn btn-outline-primary p-3 w-50 add-symptoms-btn">
                    <i class="fa fa-plus"></i> Add another symptom
                    </button>
                </div>
                </div>
        `;

        document.getElementById('symptoms-wrapper')
            .insertAdjacentHTML('beforeend', template);
    }


    /* ================== TECHNIQUES ================== */
    if (e.target.closest('.add-techniques-btn')) {

        document.querySelectorAll('#techniques-wrapper .add-btn-wrapper')
            .forEach(el => el.remove());

        techniqueIndex++;

        const template = `
        <div class="card bg-light-gray p-4 mb-3 techniques-card" data-index="${techniqueIndex}">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="title_en" class="form-label">techniques title(En)</label>
                    <input type="text" name="techniques[${techniqueIndex}][title_en]"
                        class="form-control form-control-lg border-0 mb-2"
                        placeholder="Title EN">
                </div>
                <div class="col-md-6">
                    <label for="title_ar" class="form-label">techniques title(Ar)</label>
                    <input type="text" name="techniques[${techniqueIndex}][title_ar]"
                        class="form-control form-control-lg border-0 mb-2"
                        placeholder="Title AR">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="description_en" class="form-label">Description(En)</label>
                    <textarea name="techniques[${techniqueIndex}][description_en]"
                        class="form-control form-control-lg border-0 mb-2"
                        placeholder="Description EN"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="description_ar" class="form-label">Description(Ar)</label>
                    <textarea name="techniques[${techniqueIndex}][description_ar]"
                        class="form-control form-control-lg border-0 mb-2"
                        placeholder="Description AR"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="suitable_for_en" class="form-label">Who is it suitable for?(En)(En)</label>
                    <textarea name="techniques[${techniqueIndex}][suitable_for_en]"
                        class="form-control form-control-lg border-0 mb-2"
                        placeholder="Suitable For EN"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="suitable_for_ar" class="form-label">Who is it suitable for?(En)(Ar)</label>
                    <textarea name="techniques[${techniqueIndex}][suitable_for_ar]"
                        class="form-control form-control-lg border-0"
                        placeholder="Suitable For AR"></textarea>
                </div>
            </div>
            <div class="text-center mt-4 add-btn-wrapper">
                <button type="button"
                    class="btn btn-outline-primary p-3 w-50 add-techniques-btn">
                <i class="fa fa-plus"></i> Add another technique
                </button>
            </div>
            </div>
            `;

        document.getElementById('techniques-wrapper')
            .insertAdjacentHTML('beforeend', template);
    }


    /* ================== FAQ ================== */
    if (e.target.closest('.add-faq-btn')) {

        document.querySelectorAll('#faq-wrapper .add-btn-wrapper')
            .forEach(el => el.remove());

        faqIndex++;

        const template = `
            <div class="card bg-light-gray p-4 mb-3 faq-card" data-index="${faqIndex}">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="question_en" class="form-label">FAQ question (En)</label>
                        <input type="text" name="faqs[${faqIndex}][question_en]"
                            class="form-control form-control-lg border-0 mb-2"
                            placeholder="Question EN">
                    </div>
                    <div class="col-md-6">
                        <label for="question_ar" class="form-label">FAQ question (Ar)</label>
                        <input type="text" name="faqs[${faqIndex}][question_ar]"
                            class="form-control form-control-lg border-0 mb-2"
                            placeholder="Question AR">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="answer_en" class="form-label">Answer(En)</label>
                        <textarea name="faqs[${faqIndex}][answer_en]"
                            class="form-control form-control-lg border-0 mb-2"
                            placeholder="Answer EN"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="answer_ar" class="form-label">Answer(Ar)</label>
                        <textarea name="faqs[${faqIndex}][answer_ar]"
                            class="form-control form-control-lg border-0"
                            placeholder="Answer AR"></textarea>
                    </div>
                </div>
                <div class="text-center mt-4 add-btn-wrapper">
                    <button type="button"
                        class="btn btn-outline-primary p-3 w-50 add-faq-btn">
                    <i class="fa fa-plus"></i> Add another question
                    </button>
                </div>
                </div>
                `;

        document.getElementById('faq-wrapper')
            .insertAdjacentHTML('beforeend', template);
    }

});
