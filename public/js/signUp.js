
const nextBtn = document.getElementById("next-for-submit");
const prevBtn = document.getElementById("prev-for-submit");

nextBtn.addEventListener("click", () => {
    const form = document.querySelector("form");
    
    const formPart1 = form.children[0];
    const formPart2 = form.children[1];
    
    formPart1.style.display = "none";
    formPart2.style.display = "grid";
});

prevBtn.addEventListener("click", () => {
    const form = document.querySelector("form");
    
    const formPart1 = form.children[0];
    const formPart2 = form.children[1];
    
    formPart1.style.display = "grid";
    formPart2.style.display = "none";
});
function previewFile() {
    var preview = document.getElementById('preview');
    var fileInput = document.getElementById('image');
    var file = fileInput.files[0];

    var reader = new FileReader();
    reader.onloadend = function () {
        preview.innerHTML = '<img src="' + reader.result + '" height="50px" alt="File Preview">';
    }
    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = '';
    }
}
