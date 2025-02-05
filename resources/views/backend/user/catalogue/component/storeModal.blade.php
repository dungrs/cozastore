@php
    $configModal = $configs['seo']['modal']
@endphp
<div class="card-body">
    <div class="modal fade bs-example-modal-center modal store-modal" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="" class="needs-validation" id="form-store-modal">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $configModal['add_member'] }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="name">{{ $configModal['name'] }} <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ $configModal['name_placeholder'] }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="phone">{{ $configModal['phone'] }} <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ $configModal['phone_placeholder'] }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="email">{{ $configModal['email'] }} <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="{{ $configModal['email_placeholder'] }} ">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description">{{ $configModal['description'] }} </label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="{{ $configModal['description_placeholder'] }} ">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.modal.close') }}</button>
                        <button type="submit" class="btn btn-primary" id="submitButton">{{ __('messages.modal.confirm') }}</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div><!-- end card body -->