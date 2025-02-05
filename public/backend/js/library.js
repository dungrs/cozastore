var HT = {
    _token: $('meta[name="csrf-token"]').attr('content'),
    filterTimeout: null,
    currentPage: 1,

    initializeChoices: function () {
        $(".choice-single").each(function () {
            let select = $(this);
            if (!select.data("choicesInstance")) {
                let instance = new Choices(this, {
                    placeholderValue: "",
                    searchPlaceholderValue: "Tìm kiếm...",
                    itemSelectText: "",
                    shouldSort: false
                });
                select.data("choicesInstance", instance);
            }
        });
    },

    preventFormSubmitOnEnter: function () {
        $(document).on('keypress', '#form-store-modal', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                return false;
            }
        });
    },

    clearValidationErrors: function () {
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').remove();
    },

    displayValidationErrors: function (errors) {
        $.each(errors, function (field, messages) {
            let inputField = $(`#${field}`);
            inputField.addClass('is-invalid');
            inputField.after(`<div class="invalid-feedback">${messages[0]}</div>`);

            inputField.on(inputField.find('select') ? 'change' : 'keyup', function () {
                inputField.removeClass('is-invalid');
                inputField.next('.invalid-feedback').remove();
            });

        });
    },

    openChangeStatusAll: function () {
        $('.changeStatusAll').on('click', function (e) {
            e.preventDefault();

            let status = $(this).data('value'),
                field = $(this).data('field');

            let selectedIds = [];
            $('.publish-checkAll:checked').each(function () {
                selectedIds.push($(this).data('id'));
            });

            if (selectedIds.length === 0) {
                alert("Vui lòng chọn ít nhất một mục để thay đổi trạng thái.");
                return;
            }

            let formData = {
                _token: HT._token,
                field: field,
                status: status,
                ids: selectedIds,
                model: Config.model,
                modelParent: Config.modelParent
            };

            $.ajax({
                url: `/ajax/dashboard/changeStatusAll`,
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        selectedIds.forEach(id => {
                            let checkbox = $(`#switch${id}`);
                            if (status == 2) {
                                checkbox.prop('checked', true);
                            } else {
                                checkbox.prop('checked', false);
                            }
                        });
                    }
                },
                error: function (xhr) {
                    console.error('Error:', xhr.responseText);
                },
            });
        });
    },

    openCheckStatusAll: function () {
        $('.checkStatusAll').on('change', function () {
            let isChecked = $(this).prop('checked');
            $('.publish-checkAll').prop('checked', isChecked);
        });
    },

    enableFormValidation: function() {
        window.addEventListener("load", function () {
            var forms = document.getElementsByClassName("needs-validation");
            Array.prototype.filter.call(forms, function (form) {
                form.addEventListener("submit", function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add("was-validated");
                }, false);
            });
        }, false);
    },

    formatDate: function (dateString) {
        const date = new Date(dateString);

        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0'); 
        const year = date.getFullYear();

        return `${day}/${month}/${year}`;
    }
};

$(document).ready(function () {
    HT.initializeChoices();
    HT.openChangeStatusAll();
    HT.openCheckStatusAll();
    HT.enableFormValidation();
});
