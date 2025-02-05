const User = {
    passwordFieldsHTML: `
        <div class="col-md-6 mb-3 password-section">
            <label for="password-input">${passwordModalConfig.label} <span class="text-danger">(*)</span></label>
            <div class="position-relative password-form">
                <input value="" id="password" name="password" type="password" class="form-control password-input" placeholder="${passwordModalConfig.placeholder}" autocomplete="off">
                <button type="button" class="btn btn-link position-absolute end-0 top-0 password-addon">
                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                </button>
            </div>
        </div>
        <div class="col-md-6 mb-3 password-section">
            <label for="password-input">${passwordModalConfig.confirm_label} <span class="text-danger">(*)</span></label>
            <div class="position-relative password-form">
                <input value="" id="re_password" name="re_password" type="password" class="form-control password-input" placeholder="${passwordModalConfig.confirm_placeholder}" autocomplete="off">
                <button type="button" class="btn btn-link position-absolute end-0 top-0 password-addon">
                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                </button>
            </div>
        </div>
    `,

    storeAndUpdateData: function (url) {
        let formData = $('#form-store-modal').serialize();
    
        formData += '&_token=' + encodeURIComponent(HT._token);
        
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alertify.success(response.message);
                    $('.store-modal').modal('hide'); 
                    $('#form-store-modal')[0].reset();
                    User.sendDataFilter(HT.currentPage);
                } else {
                    alertify.error(response.message)
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    HT.displayValidationErrors(xhr.responseJSON.errors);
                } else {
                    console.error('AJAX Error: ', xhr.responseText); 
                }
            },
        });
    },

    openAddModal: function () {
        $('.add-button').on('click', function (e) {
            console.log(123);
            e.preventDefault();

            $('.password-section').remove()
            $('#form-mode').val('store');
            User.togglePasswordForm();
            LG.togglePasswordVisibility();
    
            $('#form-store-modal').attr('data-id', ''); 
            $('#form-store-modal')[0].reset();
            
            HT.clearValidationErrors();

            $('.store-modal').modal('show');
        });
    },

    setupDatetimePickerBasic: function() {
        flatpickr(".datepicker-basic", {
            enableTime: false,
            dateFormat: "d/m/Y", 
            allowInput: true, 
            onReady: function(selectedDates, dateStr, instance) {
                setTimeout(function() {
                    let yearInput = instance.calendarContainer.querySelector(".numInput.cur-year");
                    if (yearInput) {
                        yearInput.removeAttribute("tabindex"); 
                    }
                }, 10);
            }
        });
    },

    bindStoreAndUpdateEntityHandler: function () {
        $(document).on('click', '#submitButton', function (e) {
            e.preventDefault();
            HT.clearValidationErrors();

            let id = $('#form-store-modal').attr('data-id');
            let url = id ? `/ajax/user/update/${id}` : '/ajax/user/create';
            User.storeAndUpdateData(url);
        });
    },

    sendDataFilter: function (page = 1) {
        let dataFilterSend = { page: page };

        $('.filter-data').find("input, select").each(function () {
            let name = $(this).attr("name");
            if (name) {
                dataFilterSend[name] = $(this).val();
            }
        });

        $.ajax({
            url: '/ajax/user/filter',
            type: 'GET',
            data: dataFilterSend,
            dataType: 'json',
            success: function (response) {
                const tbody = $('.data-table');
                tbody.empty();
                response.data.data.forEach(item => {
                    tbody.append(`
                        <tr>
                            <td>
                                <div class="form-check font-size-16">
                                    <input data-id="${item.id}" class="form-check-input publish-checkAll" type="checkbox" id="listcheck${item.id}">
                                    <label class="form-check-label" for="listcheck${item.id}"></label>
                                </div>
                            </td>
                            <td>${item.name ?? '-'}</td>
                            <td>
                                <p class="mb-1">${item.phone ?? '-'}</p>
                                <p class="mb-0">${item.email ?? '-'}</p>
                            </td>
                            
                            <td>${item.address ?? '-'}</td>
                            <td>${item.user_catalogue_name ?? '-'}</td>
                             <td>
                                <input type="checkbox" id="switch${item.id}" data-field="publish" data-id="${item.id}" class="publish-check" switch="none" ${item.publish == 2 ? 'checked' : ''}>
                                <label for="switch${item.id}" data-on-label="On" data-off-label="Off" class="mb-0"></label>
                            </td>
                             <td>
                                <div class="dropdown">
                                    <p class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                    </p>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a href="#" data-id="${item.id}" class="dropdown-item edit-button-modal">
                                                <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Chỉnh sửa
                                            </a>
                                        </li>
                                        <li><a href="#" data-id="${item.id}" class="dropdown-item sa-warning"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Xóa</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    `);
                });

                $('.publish-check').on('change', function () {
                    let _this = $(this);

                    let id = _this.data('id'),
                        status = _this.is(':checked') ? 2 : 1,
                        field = _this.data('field');

                    let formData = {
                        _token: HT._token,
                        field: field,
                        status: status,
                        model: Config.model,
                        modelParent: Config.modelParent
                    };

                    $.ajax({
                        url: `/ajax/dashboard/changeStatus/${id}`,
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'success') {

                            } else {

                            }
                        },
                        error: function (xhr) {
                            // alertify.error("Đã xảy ra lỗi khi cập nhật trạng thái.");
                        },
                    });
                });

                $('.edit-button-modal').on('click', function (e) {
                    e.preventDefault();
                    let id = $(this).data('id');

                    $('#form-mode').val('edit');
                    User.togglePasswordForm();
                
                    $.ajax({
                        url: `/ajax/user/edit/${id}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function (response) {
                            let item = response.data;
                
                            $('#name').val(item.name);
                            $('#email').val(item.email);
                            $('#phone').val(item.phone);
                            $('#description').val(item.description);
                            $('#address').val(item.address);
                            $('#birthday').val(HT.formatDate(item.birthday));
                            $('#image').val(item.image)
                
                            let userCatalogueSelect = $('select[name="user_catalogue_id"]'),
                                provinceSelect = $('select[name="province_id"]'),
                                districtSelect = $('select[name="district_id"]'),
                                wardSelect = $('select[name="ward_id"]');

                            User.setValueSwitchChoices(userCatalogueSelect, item.user_catalogue_id);

                            if (item.province_id) {
                                User.setValueSwitchChoices(provinceSelect, item.province_id);
                                LC.sendDataGetLocation({
                                    data : { location_id : item.province_id },
                                    target: "districts",
                                    callback: function() {
                                        if (item.district_id) {
                                            User.setValueSwitchChoices(districtSelect, item.district_id);
                                            LC.sendDataGetLocation({
                                                data: { location_id : item.district_id },
                                                target: "wards",
                                                callback: function() {
                                                    if (item.ward_id) {
                                                        User.setValueSwitchChoices(wardSelect, item.ward_id);
                                                    }
                                                }
                                            })
                                            
                                        }
                                    }
                                })
                            }

                            $('#form-store-modal').attr('data-id', id);
                            $('.store-modal').modal('show');
                        },
                        error: function (xhr) {
                            console.error('Error fetching detail: ', xhr.responseText);
                        }
                    });
                });

                $(".sa-warning").on("click", function (e) {
                    e.preventDefault();
                    let id = $(this).data('id'),
                        messages = Config.confirmMessages;
                    Swal.fire({
                        title: messages.title,
                        text: messages.text,
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#51d28c",
                        cancelButtonColor: "#f34e4e",
                        confirmButtonText: messages.confirmButton,
                        cancelButtonText: messages.cancelButton
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: `/ajax/user/delete/${id}`,
                                type: 'GET',
                                dataType: 'json',
                                success: function (response) {
                                    if (response.status === 'success') {
                                        Swal.fire(messages.successTitle, response.message, "success");
                                    } else {
                                        Swal.fire(messages.errorTitle, response.message, "error");
                                    }
                                    User.sendDataFilter(HT.currentPage);
                                },
                                error: function (xhr) {
                                    Swal.fire(messages.errorTitle, xhr.responseJSON.message || messages.deleteError, "error");
                                },
                            });
                        }
                    });
                });

                const pagination = $('.pagination');
                pagination.empty();

                pagination.append(`
                    <li class="page-item ${response.data.current_page === 1 ? 'disabled' : ''}">
                        <a class="page-link" href="javascript:void(0)" data-page="${response.data.current_page - 1}" aria-label="Previous">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                    </li>
                `);

                response.data.links.forEach(link => {
                    if (link.label !== 'pagination.previous' && link.label !== 'pagination.next') {
                        if (link.url) {
                            pagination.append(`
                                <li class="page-item ${link.active ? 'active' : ''}">
                                    <a class="page-link" href="javascript:void(0)" data-page="${link.label}">${link.label}</a>
                                </li>
                            `);
                        } else {
                            pagination.append(`
                                <li class="page-item disabled">
                                    <span class="page-link">${link.label}</span>
                                </li>
                            `);
                        }
                    }
                });

                pagination.append(`
                    <li class="page-item ${response.data.current_page === response.data.last_page ? 'disabled' : ''}">
                        <a class="page-link" href="javascript:void(0)" data-page="${response.data.current_page + 1}" aria-label="Next">
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                    </li>
                `);
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    console.error('Validation Error: ', xhr.responseText);
                } else {
                    console.error('AJAX Error: ', xhr.responseText);
                }
            },
        });
    },

    setValueSwitchChoices: function(selectElement, value) {
        selectElement.val(value);
        let instance = selectElement.data("choicesInstance");
        if (instance) {
            instance.setChoiceByValue(value.toString());
        }
    },

    attachPaginationEvent: function () {
        $(document).on('click', '.pagination .page-link', function (e) {
            e.preventDefault();

            let page = $(this).data('page');
            HT.currentPage = page;
            if (!page) return;

            
            User.sendDataFilter(HT.currentPage);
        });
    },

    attachFilterEvent: function () {
        $(".filter-data").find("input, select").on("input change", function () {
            clearTimeout(HT.filterTimeout);

            HT.filterTimeout = setTimeout(() => {
                User.sendDataFilter();
            }, 500);
        });
    },

    togglePasswordForm: function() {
        let formMode = $('#form-mode').val();

        if(formMode === 'edit') {
            $('.password-section').remove()
        } else {
            $('#birthday').closest('.col-md-6').after(User.passwordFieldsHTML)
        }
    }
};

$(document).ready(function () {
    User.openAddModal();
    User.bindStoreAndUpdateEntityHandler();
    User.sendDataFilter();
    User.setupDatetimePickerBasic();
    User.attachFilterEvent();
    User.attachPaginationEvent();
    User.togglePasswordForm()
});