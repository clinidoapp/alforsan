let videoIndex = 0;

document.addEventListener('click', function (e) {
    const addBtn = e.target.closest('.add-video-btn');
    if (!addBtn) return;

    const currentCard = addBtn.closest('.video-card');

    // validate current card first
    if (!validateVideoCard(currentCard)) {
        alert('Please fill all fields correctly (minimum 8 characters).');
        return;
    }

    // remove add button from previous card
    document.querySelectorAll('.add-btn-wrapper').forEach(el => el.remove());

    videoIndex++;

    const template = `
    <div class="card bg-light-gray p-4 mb-3 video-card" data-index="${videoIndex}">
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Video title (EN)</label>
                <input type="text" name="videos[${videoIndex}][title_en]"
                       class="form-control form-control-lg border-0" required minlength="8">
            </div>

            <div class="col-md-6">
                <label class="form-label float-end">عنوان الفيديو باللغة العربية</label>
                <input type="text" name="videos[${videoIndex}][title_ar]"
                       class="form-control form-control-lg border-0 text-end"
                       required minlength="8">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Video Link</label>
                <input type="text" name="videos[${videoIndex}][video_url]"
                       class="form-control form-control-lg border-0"
                       required minlength="8">
            </div>

            <div class="col-md-6">
                <label class="form-label">Video Status</label>
                <select name="videos[${videoIndex}][status]"
                        class="form-select form-control-lg border-0"
                        required>
                    <option value="" disabled selected>Select status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>

        <div class="text-center mt-4 add-btn-wrapper">
            <button type="button"
                    class="btn btn-outline-primary p-3 w-50 add-video-btn">
                <i class="fa fa-plus"></i> Add another video
            </button>
        </div>
    </div>`;

    document.getElementById('videos-wrapper')
        .insertAdjacentHTML('beforeend', template);
});

function validateVideoCard(card) {
    let valid = true;

    card.querySelectorAll('input[type="text"], select').forEach(el => {
        el.classList.remove('is-invalid');

        if (!el.value || el.value.trim() === '') {
            el.classList.add('is-invalid');
            valid = false;
            return;
        }

        // min length = 8
        if (el.tagName === 'INPUT' && el.value.trim().length < 8) {
            el.classList.add('is-invalid');
            valid = false;
        }
    });

    return valid;
}
document.querySelector('form').addEventListener('submit', function (e) {
    let isValid = true;

    document.querySelectorAll('.video-card').forEach(card => {
        if (!validateVideoCard(card)) {
            isValid = false;
        }
    });

    if (!isValid) {
        e.preventDefault();
        alert('All fields are required and minimum length is 8 characters.');
    }
});
