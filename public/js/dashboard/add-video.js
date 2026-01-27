let videoIndex = 0;

document.addEventListener('click', function (e) {
    if (e.target.closest('.add-video-btn')) {

        // remove add button from previous card
        document.querySelectorAll('.add-btn-wrapper').forEach(el => el.remove());

        videoIndex++;

        const template = `
        <div class="card bg-light-gray p-4 mb-3 video-card" data-index="${videoIndex}">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Video title (EN)</label>
                    <input type="text" name="videos[${videoIndex}][title_en]"
                           class="form-control form-control-lg border-0">
                </div>

                <div class="col-md-6">
                    <label class="form-label float-end">عنوان الفيديو باللغة العربية</label>
                    <input type="text" name="videos[${videoIndex}][title_ar]"
                           class="form-control form-control-lg border-0 text-end" placeholder="اكتب عنوان الفيديو باللغة العربية">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Video Link</label>
                    <input type="text" name="videos[${videoIndex}][video_url]"
                           class="form-control form-control-lg border-0">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Video Status</label>
                    <select name="videos[${videoIndex}][status]"
                            class="form-select form-control-lg border-0">
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
    }
});

