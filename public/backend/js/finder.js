var FD = {
    uploadImageToInput: function() {
        $('.upload-image').on('click', function() {
            let input = $(this),
                type = input.data('type')
            
            FD.setupCKFinder2(input, type)
        })
    },

    setupCKFinder2: function(object, type) {
        if (typeof(type) == 'undefined') {
            type = 'Images';
        }

        var finder = new CKFinder();
        finder.resourceType = type;
        finder.selectActionFunction = function(fileUrl, data) {
            object.val(fileUrl)
        }

        finder.popup();
    },
};

$(document).ready(function () {
    FD.uploadImageToInput()
});