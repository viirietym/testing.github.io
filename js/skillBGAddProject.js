// Function to add a new project input field
function addProject() {
    const portfolioContainer = document.getElementById('portfolioContainer');
    const newProject = document.createElement('div');
    newProject.classList.add('project-item');

    const projectCount = portfolioContainer.getElementsByClassName('project-item').length + 1;

    newProject.innerHTML = `
        <label for="portfolioInput${projectCount}" class="profileImageLabel">
            <img class="profileImage" src="../assets/image/userImage/project.png" alt="Profile Picture" class="form-control frm-sign">
        </label>
        <input type="file" name="portfolio[]" class="form-control projectFile" accept="image/*" onchange="previewImage(event)" required style="display: none;" id="portfolioInput${projectCount}">
        <input type="text" name="project-name[]" class="form-control projectName" placeholder="Project Name" required>
    `;

    portfolioContainer.appendChild(newProject);
}

// Function to preview image and change the corresponding image
function previewImage(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function () {
        const imagePreview = reader.result;
        const profileImage = event.target.previousElementSibling.querySelector('img');
        profileImage.src = imagePreview;  
    };

    if (file) {
        reader.readAsDataURL(file);
    }
}
