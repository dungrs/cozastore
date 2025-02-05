@php
    $configModal = $configs['seo']['modal']
@endphp
<div class="modal fade bs-example-modal-lg store-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form method="post" id="form-store-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">{{ $configModal['add_member'] }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="mb-3">{{ $configModal['common_info'] }}</h6>
                    <div class="row">
                        <input type="hidden" id="form-mode" name="form_mode" value="">
                        <div class="col-md-6 mb-3">
                            <label for="name">{{ $configModal['name'] }} <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{ $configModal['name_placeholder'] }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">{{ $configModal['email'] }} <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="{{ $configModal['email_placeholder'] }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <div id="user_catalogue_id">
                                <label for="user_catalogue_id">{{ $configModal['group'] }} <span class="text-danger">(*)</span></label>
                                <div class="">
                                    <select class="form-control rounded choice-single" name="user_catalogue_id">
                                        <option value="">{{ $configModal['group_placeholder'] }}</option>
                                        @foreach ($userCatalogues as $userCatalogue)
                                            <option value="{{ $userCatalogue->id }}">{{ $userCatalogue->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="birthday">{{ $configModal['birthday'] }} <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control datepicker-basic" id="birthday" name="birthday" placeholder="{{ $configModal['birthday_placeholder'] }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="image">{{ $configModal['avatar'] }}</label>
                            <input type="text" class="form-control upload-image" data-type="Images" name="image" id="image" placeholder="{{ $configModal['avatar_placeholder'] }}">
                        </div>
                    </div>

                    <hr/>

                    <h6 class="mb-3">{{ $configModal['contact_info'] }}</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="province">{{ $configModal['city'] }}</label>
                            <select class="form-control rounded location provinces choice-single-location" data-target="districts" name="province_id">
                                <option value="">{{ $configModal['city'] }}</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->code }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="district">{{ $configModal['district'] }}</label>
                            <select class="form-control rounded location districts choice-single-location" data-target="wards" name="district_id">
                                <option value="">{{ $configModal['district'] }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ward">{{ $configModal['ward'] }}</label>
                            <select class="form-control rounded wards choice-single-location" name="ward_id">
                                <option value="">{{ $configModal['ward'] }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="address">{{ $configModal['address'] }}</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="{{ $configModal['address_placeholder'] }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">{{ $configModal['phone'] }}</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ $configModal['phone_placeholder'] }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="description">{{ $configModal['note'] }}</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="{{ $configModal['note_placeholder'] }}">
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
<script>
    let passwordModalConfig = @json($configModal['password']);
</script>