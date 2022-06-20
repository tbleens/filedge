<!-- Modal -->
<div class="modal fade" id="modal-share" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Share your file') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    <li><a href="#" title="Share on Facebook" target="_blank" class="btn btn-facebook share-facebook"><i class="icon-facebook"></i> {{ __('Share on Facebook') }}</a></li>
                    <li><a href="#" title="Share on Twitter" target="_blank" class="btn btn-twitter share-twitter"><i class="icon-twitter"></i> {{ __('Share on Twitter') }}</a></li>
                    <li><a href="#" title="Share on LinkedIn" target="_blank" class="btn btn-linkedin share-linkedin"><i class="icon-linkedin"></i> {{ __('Share on LinkedIn') }}</a></li>
                    <li><a href="mailto:?subject=Email Subject" title="Share via Email" class="btn btn-email"><i class="icon-mail"></i> {{ __('Share via Email') }}</a></li>
                    <li>
                        <div class="mt-3 mx-auto max-with-300">
                            <label class="form-label fw-bold" for="share">{{ __('Share link') }}</label>
                            <div class="input-group">
                                <input type="text" id="share" class="form-control sharing_input" value="">
                                <button type="button" class="btn btn-primary copy-btn" data-clipboard-target="#share">
                                    <i class="bi bi-clipboard"></i>
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>