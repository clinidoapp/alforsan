
    function getLastIndex(wrapper, cardClass) {
        const cards = wrapper.querySelectorAll(cardClass);
    if (!cards.length) return 0;

    return Math.max(
        ...Array.from(cards).map(c => parseInt(c.dataset.index))
    );
}
const symptomsWrapper   = document.getElementById('symptoms-wrapper');
const techniquesWrapper = document.getElementById('techniques-wrapper');
const faqWrapper        = document.getElementById('faq-wrapper');

let symptomIndex   = getLastIndex(symptomsWrapper, '.symptoms-card');
let techniqueIndex = getLastIndex(techniquesWrapper, '.techniques-card');
let faqIndex       = getLastIndex(faqWrapper, '.faq-card');

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
                    <label class="form-label">Symptoms title (EN)</label>
                    <input type="text" name="symptoms[${symptomIndex}][title_en]"
                        class="form-control form-control-lg border-0">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Symptoms title (AR)</label>
                    <input type="text" name="symptoms[${symptomIndex}][title_ar]"
                        class="form-control form-control-lg border-0">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Description (EN)</label>
                    <textarea name="symptoms[${symptomIndex}][description_en]"
                        class="form-control form-control-lg border-0"></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Description (AR)</label>
                    <textarea name="symptoms[${symptomIndex}][description_ar]"
                        class="form-control form-control-lg border-0"></textarea>
                </div>
            </div>

            <div class="text-center mt-4 add-btn-wrapper">
                <button type="button"
                    class="btn btn-outline-primary p-3 w-50 add-symptoms-btn">
                    <i class="fa fa-plus"></i> Add another symptom
                </button>
            </div>
        </div>`;

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
                    <label class="form-label">Techniques title (EN)</label>
                    <input type="text" name="techniques[${techniqueIndex}][title_en]"
                        class="form-control form-control-lg border-0">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Techniques title (AR)</label>
                    <input type="text" name="techniques[${techniqueIndex}][title_ar]"
                        class="form-control form-control-lg border-0">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Description (EN)</label>
                    <textarea name="techniques[${techniqueIndex}][description_en]"
                        class="form-control form-control-lg border-0"></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Description (AR)</label>
                    <textarea name="techniques[${techniqueIndex}][description_ar]"
                        class="form-control form-control-lg border-0"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Suitable for (EN)</label>
                    <textarea name="techniques[${techniqueIndex}][suitable_for_en]"
                        class="form-control form-control-lg border-0"></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Suitable for (AR)</label>
                    <textarea name="techniques[${techniqueIndex}][suitable_for_ar]"
                        class="form-control form-control-lg border-0"></textarea>
                </div>
            </div>

            <div class="text-center mt-4 add-btn-wrapper">
                <button type="button"
                    class="btn btn-outline-primary p-3 w-50 add-techniques-btn">
                    <i class="fa fa-plus"></i> Add another technique
                </button>
            </div>
        </div>`;

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
                    <label class="form-label">Question (EN)</label>
                    <input type="text" name="faqs[${faqIndex}][question_en]"
                        class="form-control form-control-lg border-0" placeholder="Enter question in english">
                </div>
                <div class="col-md-6">
                    <label class="form-label float-end">السوال باللغة العربية</label>
                    <input type="text" name="faqs[${faqIndex}][question_ar]"
                        class="form-control text-end form-control-lg border-0" placeholder="ادخل السؤال باللغة العربية">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Answer (EN)</label>
                    <textarea name="faqs[${faqIndex}][answer_en]"
                        class="form-control form-control-lg border-0" placeholder="Enter answer in english"></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label float-end">الاجابة باللغة العربية</label>
                    <textarea name="faqs[${faqIndex}][answer_ar]"
                        class="form-control form-control-lg border-0 text-end" placeholder="ادخل الاجابة باللغة العربية"></textarea>
                </div>
            </div>

            <div class="text-center mt-4 add-btn-wrapper">
                <button type="button"
                    class="btn btn-outline-primary p-3 w-50 add-faq-btn">
                    <i class="fa fa-plus"></i> Add another question
                </button>
            </div>
        </div>`;

        document.getElementById('faq-wrapper')
            .insertAdjacentHTML('beforeend', template);
    }

});


