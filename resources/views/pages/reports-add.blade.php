<div class="modal" id="reports" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Add reports') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('reports.add') }}" method="post">
                @csrf
                <input type="hidden" name="file_id" class="file_id" value="{{ $file_id }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="reason">{{ __('Reason') }}</label>
                        <textarea id="reason" name="reason" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>