(function($, Dropzone) {
    "use strict";

    $("body").on("click", ".file-view", function(e){
        e.preventDefault();

        var shareLink = $(this).attr('data-link');

        $('.share-facebook').attr('href', "https://www.facebook.com/sharer/sharer.php?u="+shareLink);
        $('.share-twitter').attr('href', "https://twitter.com/intent/tweet?text=Twitter Text&url="+shareLink);
        $('.share-linkedin').attr('href', "https://www.linkedin.com/shareArticle?mini=true&url="+shareLink+"&title=LinkedIn%20Title&summary=LinkedIn%20Summary&source="+window.location.protocol + "//" + window.location.hostname);
        $('.sharing_input').val(shareLink);
    })

    $("body").on("click", "#deleteFile", function(e){
        e.preventDefault();

        var fileId = $(this).attr('data-file-id');

        $('.idDelete').val(fileId);
    })

    $("body").on("click", "#downloadbtn", function (e) {
        e.preventDefault();

        var file_id = $(this).data("id");

        const url = SITE_URL + "/file/request/" + file_id;

        var formData = new FormData();
        formData.append('file_id', file_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                if (response) {
                    window.location = response.download_link;
                }
            }
        });
    });

    // function UploadListener() {
        // set the dropzone container id
        var id = "#kt_dropzonejs_file";
        var id2 = "#uploadArea";

        // set the preview element template
        var previewNode = $(id2 + " .dropzone-item");

        const url = SITE_URL + "/upload";

        previewNode.id = "";
        var previewTemplate = previewNode.parent(".dropzone-items").html();
        previewNode.remove();

        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone(id, {
            url: url,
            method: 'post',
            parallelUploads: 20,
            maxFiles: 4,
            maxFilesize: max_file_size,
            previewTemplate: previewTemplate,
            dictDefaultMessage: 'Drop your file here or Click to browse',
            previewsContainer: id2 + " .dropzone-items",
            clickable: id,
            timeout: 0,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        myDropzone.on("addedfile", function (file) {
            // Hookup the start button
            $(document).find(id2 + " .dropzone-item").css("display", "");
        });


        // Hide the total progress bar when nothing"s uploading anymore
        myDropzone.on("complete", function (file) {
            var thisProgressBar = id + " .dz-complete";

            if (file.status == "success") {
                const preview = $(file.previewElement);
                const response = JSON.parse(file.xhr.response);
                const copyInput = preview.find('.sharing_input');
                const copyInputBtn = preview.find('.copy-btn');
                if (response.type == 'success') {
                    copyInput.attr('id', response.id);
                    copyInput.val(response.link);
                    copyInputBtn.attr('data-clipboard-target', '#'+response.id);
                    preview.find('.copy-download').show();
                }
                else {
                    preview.find('.dropzone-error').removeClass('d-none');
                    preview.find('.dropzone-error').html(response.errors);
                }
            }
        });


        myDropzone.on("error", function (file, message = null) {
            // Hookup the start button
            const preview = $(file.previewElement);

            preview.find('.dropzone-error').removeClass('d-none');
            preview.find('.dropzone-error').html(message ? message : error_file_detected);
        });

    // }

    $('.keep-open').on('click', function (event) {
        event.stopPropagation();
    });

    $('.view-reason').on('click', function (e) {
        var reason = $(this).attr('data-content-reason');
        $('.view-content').empty().append(reason);
    });

    var loc = window.location;

    $('.bg-home .navbar-nav').find('a').each(function() {
        $(this).toggleClass('active fw-bold', $(this).attr('href') == loc);
    });

})(jQuery, Dropzone);