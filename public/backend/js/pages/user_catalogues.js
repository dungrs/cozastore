const UserCatalogue = {
    submitFormData: function (url, formId, formData) {
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alertify.success(response.message);
                    let modal = $('#' + formId).closest('.modal');
                    modal.modal('hide');
                    $('#' + formId)[0].reset();
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

            $('.modal-title').text(Config.modalTitle.create)
            $('#form-store-modal').attr('data-id', '');
            $('#form-store-modal')[0].reset();

            languageSelect = $('select[name="language_id"]');
            let selectedLanguage = $('.dropdown-menu .language-filter.active').data('id');
            instance = HT.setValueSwitchChoices(languageSelect, selectedLanguage);
            instance.enable();

            HT.clearValidationErrors();
            $('.store-modal').modal('show');
        });
    },

    openEditModal: function (selectedLanguage) {
        $('.edit-button-modal').on('click', function (e) {
            e.preventDefault();

            $('.modal-title').text(Config.modalTitle.edit)
            let id = $(this).data('id');
            HT.clearValidationErrors();

            $.ajax({
                url: `/ajax/user/catalogue/edit/${id}/${selectedLanguage}`,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    let item = response.data;

                    $('.name').val(item.name);
                    $('.phone').val(item.phone);
                    $('.email').val(item.email);
                    $('.description').val(item.description);
                    $('#form-store-modal').attr('data-id', id);
                    $('#form-store-modal').attr('data-languageId', selectedLanguage);

                    languageSelect = $('select[name="language_id"]');
                    let instance = HT.setValueSwitchChoices(languageSelect, item.language_id);
                    instance.disable();

                    $('.store-modal').modal('show');
                },
                error: function (xhr) {
                    console.error('Error fetching detail: ', xhr.responseText);
                }
            });
        });
    },

    openTranslateModal: function (selectedLanguage) {
        $('.translate-btn').on('click', function (e) {
            e.preventDefault();

            $('.modal-title').text(Config.modalTitle.translate);
            let id = $(this).data('id');

            $.ajax({
                url: `/ajax/user/catalogue/details/${id}`,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    let data = response.data;

                    let original = data.find(item => item.language_id == selectedLanguage)
                    if (original) {
                        $('#name_original').val(original.name);
                        $('#description_original').val(original.description);
                    }

                    HT.clearValidationErrors();

                    $('#language-tabs .nav-link').each(function () {
                        let tab = $(this);
                        let canonical = tab.data('canonical');
                        let icon = tab.find('i');
            
                        let hasTranslation = data.some(item => item.canonical === canonical && item.name);
            
                        if (hasTranslation) {
                            icon.removeClass('uil-exclamation-circle text-danger')
                                .addClass('uil-check-circle text-success');
                        } else {
                            icon.removeClass('uil-check-circle text-success')
                                .addClass('uil-exclamation-circle text-danger');
                        }
                    });

                    data.forEach(item => {
                        let tab = $('#language-tabs-content').find('#' + item.canonical);
                        if (tab.length) {
                            tab.find('.name_trans').val(item.name);
                            tab.find('.description_trans').val(item.description);
                        }
                    });

                    $('#form-translate-modal').attr('data-id', id);
    
                    $('.translate-modal').modal('show');
                },
                error: function (xhr) {
                    console.error('Error fetching detail: ', xhr.responseText);
                }
            });

        });
    },

    bindSubmitEntityHandler: function () {
        $(document).on('click', '.submitButton', function (e) {
            e.preventDefault();
            HT.clearValidationErrors();
    
            let modal = $(this).closest('.modal');
            let form = modal.find('form');
            let formId = form.attr('id');
            let id = form.attr('data-id'); 
            let url, formData;
    
            if (modal.hasClass('store-modal')) {
                let language_id = form.attr('data-languageId');
                formData = form.serialize() + '&_token=' + encodeURIComponent(HT._token);
                url = id ? `/ajax/user/catalogue/update/${id}/${language_id}` : '/ajax/user/catalogue/create/';
            } else if (modal.hasClass('translate-modal')) {
                let activeTab = $('#language-tabs-content .tab-pane.active');
                let language_id = activeTab.find('input[name="language_id"]').val();
                let name = activeTab.find('input[name="name_trans"]').val();
                let description = activeTab.find('input[name="description_trans"]').val();
    
                formData = {
                    name_trans: name,
                    description_trans: description,
                    language_id: language_id,
                    _token: HT._token,
                };
    
                url = `/ajax/user/catalogue/translate/${id}`;
            }
    
            UserCatalogue.submitFormData(url, formId, formData);
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

        let selectedLanguage = $('.dropdown-menu .language-filter.active').data('id');
        if (selectedLanguage) {
            dataFilterSend.language_id = selectedLanguage;
        }

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
                                                <i class="mdi mdi-pencil font-size-16 text-success me-1"></i> ${Config.actionTextButton.edit}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-id="${item.id}" class="dropdown-item translate-btn">
                                                <i class="mdi mdi-translate font-size-16 text-primary me-1"></i> ${Config.actionTextButton.translate}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" data-id="${item.id}" class="dropdown-item delete-btn">
                                                <i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> ${Config.actionTextButton.delete}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    `);
                });

                HT.openChangeStatus();
                UserCatalogue.openEditModal(selectedLanguage);
                UserCatalogue.openTranslateModal(selectedLanguage);
                HT.handleDeleteRequest(".delete-btn", "/ajax/user/catalogue/delete", UserCatalogue)
                HT.renderPagination(response);
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

        $(".dropdown-menu .language-filter").on("click", function () {
            let _this = $(this);
    
            $(".dropdown-menu .language-filter").removeClass('active');
            _this.addClass('active');
    
            let language_name = _this.data('name'),
                language_image = _this.data('image');
    
            $('#lang_image_select').attr('src', language_image);
            $('#lang_name_select').text(language_name);
            
            UserCatalogue.sendDataFilter();
        });
    },
};

$(document).ready(function () {
    UserCatalogue.bindSubmitEntityHandler();
    UserCatalogue.sendDataFilter();
    UserCatalogue.openAddModal();
    UserCatalogue.attachFilterEvent();
    UserCatalogue.attachPaginationEvent();
});