var HT = {
    togglePasswordVisibility: function() {
        $("#password-addon").on('click', function() {
            let passwordInput = $('#password-input');
            if (passwordInput.attr('type') == "password") {
                passwordInput.attr('type', "text");
            } else {
                passwordInput.attr('type', "password")
            }
        })
    }

};

// Thực thi các phương thức của đối tượng Ht khi tài liệu đã sẵn sàng
$(document).ready(function() {
    HT.togglePasswordVisibility();
});