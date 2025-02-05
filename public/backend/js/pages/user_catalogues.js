const UserCatalogue = {
    storeAndUpdateData: function (url) {
        let formData = {
            _token: HT._token,
            name: $('#name').val().trim(),
            phone: $('#phone').val().trim(),
            email: $('#email').val().trim(),
            description: $('#description').val().trim(),
        };

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
                    UserCatalogue.sendDataFilter(HT.currentPage);
                } else {
                    alertify.error(response.message);
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
            e.preventDefault();
            $('#form-store-modal').attr('data-id', '');
            $('#form-store-modal')[0].reset();
            HT.clearValidationErrors();
            $('.store-modal').modal('show');
        });
    },

    bindStoreAndUpdateEntityHandler: function () {
        $(document).on('click', '#submitButton', function (e) {
            e.preventDefault();
            HT.clearValidationErrors();

            let id = $('#form-store-modal').attr('data-id');
            let url = id ? `/ajax/user/catalogue/update/${id}` : '/ajax/user/catalogue/create';
            UserCatalogue.storeAndUpdateData(url);
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
            url: '/ajax/user/catalogue/filter',
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
                                    <input data-id="${item.id}" class="form-check-input publish-checkAll" type="checkbox" id="customerlistcheck${item.id}">
                                    <label class="form-check-label" for="customerlistcheck${item.id}"></label>
                                </div>
                            </td>
                            <td>${item.name ?? '-'}</td>
                            <td>${item.description ?? '-'}</td>
                            <td>${item.phone ?? '-'}</td>
                            <td>${item.email ?? '-'}</td>
                            <td>${item.users_count ?? '-'}</td>
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
                                // alertify.success(response.message);
                            } else {
                                // alertify.error(response.message);
                            }
                        },
                        error: function (xhr) {
                            alertify.error("Đã xảy ra lỗi khi cập nhật trạng thái.");
                        },
                    });
                });

                $('.edit-button-modal').on('click', function (e) {
                    e.preventDefault();
                    let id = $(this).data('id');
                    HT.clearValidationErrors();

                    $.ajax({
                        url: `/ajax/user/catalogue/edit/${id}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function (response) {
                            let item = response.data;

                            $('#name').val(item.name);
                            $('#phone').val(item.phone);
                            $('#email').val(item.email);
                            $('#description').val(item.description);
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
                                url: `/ajax/user/catalogue/delete/${id}`,
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
                                    Swal.fire(messages.errorTitle, xhr.responseJSON.message || response.message, "error");
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

    
    attachPaginationEvent: function () {
        $(document).on('click', '.pagination .page-link', function (e) {
            e.preventDefault();

            let page = $(this).data('page');
            HT.currentPage = page;
            if (!page) return;

            UserCatalogue.sendDataFilter(HT.currentPage);
        });
    },

    attachFilterEvent: function () {
        $(".filter-data").find("input, select").on("input change", function () {
            clearTimeout(HT.filterTimeout);

            HT.filterTimeout = setTimeout(() => {
                UserCatalogue.sendDataFilter();
            }, 500);
        });
    },
};

$(document).ready(function () {
    UserCatalogue.bindStoreAndUpdateEntityHandler();
    UserCatalogue.sendDataFilter();
    UserCatalogue.openAddModal();
    UserCatalogue.attachFilterEvent();
    UserCatalogue.attachPaginationEvent();
});