// function previewImage(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function () {
//             var image = new Image();
//             image.src = reader.result;
//             $(".box-image").append(image);
//         };
//         reader.readAsDataURL(input.files[0]);
//     }
// }

function previewImage(input) {
    var boxImage = document.getElementById("boxImage");
    var preview = document.getElementById("preview");

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            boxImage.style.display = "block"; // Hiển thị boxImage khi có ảnh
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function deleteImage() {
    var boxImage = document.getElementById("boxImage");
    var preview = document.getElementById("preview");
    var fileUpload = document.getElementById("file-upload");

    preview.src = "";
    fileUpload.value = ""; // Xóa giá trị file đã chọn
    boxImage.style.display = "none"; // Ẩn boxImage khi xóa ảnh
}

// ------------------
var menu = document.querySelector(".menu"); // Using a class instead, see note below.
menu.classList.toggle("hidden-phone");


// -----------------

