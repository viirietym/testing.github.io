function previewImage(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function() {
        const image = document.getElementById('profileImage');
        image.src = reader.result; 
    };

    if (file) {
        reader.readAsDataURL(file); 
    }
}
