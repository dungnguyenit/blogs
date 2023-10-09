function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function () {
            var image = new Image();
            image.src = reader.result;
            $(".box-image").append(image);
        };
        reader.readAsDataURL(input.files[0]);
    }
}



