let isEditingProfile = false;

document.getElementById("profileImage").addEventListener("click", function () {
    if (isEditingProfile) {
        document.getElementById("editProfileImage").click();
    }
});

function previewProfileImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("profileImage").src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

document.getElementById("profileImage").style.cursor = "pointer";

function autoResizeTextarea(textarea) {
    textarea.style.height = "auto";
    textarea.style.height = textarea.scrollHeight + "px";
}

function editProfile() {
    isEditingProfile = true;

    document.getElementById("profileImage").addEventListener("click", function () {
        document.getElementById("editProfileImage").click();
    });

    document.querySelector('button[name="btnSave"]').style.display = "block"; // Show the save button
    document.querySelector('button[onclick="editProfile()"]').style.display = "none"; // Hide the edit button

    document.getElementById("fullName").style.display = "none";
    document.getElementById("editFullNameContainer").style.display = "block";

    const fullName = document.getElementById("fullName").innerText.split(" ");
    document.getElementById("editFirstName").value = fullName[0] || "";
    document.getElementById("editLastName").value = fullName[1] || "";

    document.getElementById("username").style.display = "none";
    document.getElementById("editUsername").style.display = "block";
    document.getElementById("editUsername").value = document.getElementById("username").innerText.replace('@', '');

    const shortDescriptionTextarea = document.getElementById("editDescription");
    document.getElementById("shortDescription").style.display = "none";
    shortDescriptionTextarea.style.display = "block";
    shortDescriptionTextarea.value = document.getElementById("shortDescription").innerText;
    autoResizeTextarea(shortDescriptionTextarea);

    const jobTitleInput = document.getElementById("editJobTitle");
    document.getElementById("jobTitleText").style.display = "none";
    jobTitleInput.style.display = "block";
    jobTitleInput.value = document.getElementById("jobTitleText").innerText;

    const fullDescriptionTextarea = document.getElementById("editFullDescription");
    document.getElementById("fullDescriptionText").style.display = "none";
    fullDescriptionTextarea.style.display = "block";
    fullDescriptionTextarea.value = document.getElementById("fullDescriptionText").innerText;
    autoResizeTextarea(fullDescriptionTextarea);

    const skillsTextarea = document.getElementById("editSkills");
    document.getElementById("skillsText").style.display = "none";
    skillsTextarea.style.display = "block";
    skillsTextarea.value = document.getElementById("skillsText").innerText;
    autoResizeTextarea(skillsTextarea);

    const contactTextarea = document.getElementById("editContact");
    document.getElementById("contactText").style.display = "none";
    contactTextarea.style.display = "block";
    contactTextarea.value = document.getElementById("contactText").innerText;
    autoResizeTextarea(contactTextarea);

    const educTextarea = document.getElementById("editEducDetails");
    document.getElementById("educDetailsText").style.display = "none";
    educTextarea.style.display = "block";
    educTextarea.value = document.getElementById("educDetailsText").innerText;
    autoResizeTextarea(educTextarea);

    const empTextarea = document.getElementById("editEmpHistory");
    document.getElementById("empHistoryText").style.display = "none";
    empTextarea.style.display = "block";
    empTextarea.value = document.getElementById("empHistoryText").innerText;
    autoResizeTextarea(empTextarea);

    const certTextarea = document.getElementById("editCertDetails");
    document.getElementById("certDetailsText").style.display = "none";
    certTextarea.style.display = "block";
    certTextarea.value = document.getElementById("certDetailsText").innerText;
    autoResizeTextarea(certTextarea);

    resetLayout();

    document.querySelector(".buttons button:nth-child(1)").style.display = "none";
    document.querySelector(".buttons button:nth-child(2)").style.display = "block";
}

function resetLayout() {
    let elements = document.querySelectorAll('.textInput, .textContent');
    elements.forEach(function (el) {
        el.style.padding = '0.5rem';
        el.style.margin = '0';
    });
}

function saveChanges() {
    const firstName = document.getElementById("editFirstName").value;
    const lastName = document.getElementById("editLastName").value;
    document.getElementById("fullName").innerText = `${firstName} ${lastName}`.trim();

    document.getElementById("fullName").style.display = "block";
    document.getElementById("editFullNameContainer").style.display = "none";

    document.getElementById("username").innerText = document.getElementById("editUsername").value;
    document.getElementById("username").style.display = "block";
    document.getElementById("editUsername").style.display = "none";

    document.getElementById("shortDescription").innerText = document.getElementById("editDescription").value;
    document.getElementById("shortDescription").style.display = "block";
    document.getElementById("editDescription").style.display = "none";

    const jobTitleInput = document.getElementById("editJobTitle");
    document.getElementById("jobTitleText").innerText = jobTitleInput.value;
    document.getElementById("jobTitleText").style.display = "block";
    jobTitleInput.style.display = "none";

    const fullDescriptionTextarea = document.getElementById("editFullDescription");
    document.getElementById("fullDescriptionText").innerText = fullDescriptionTextarea.value;
    document.getElementById("fullDescriptionText").style.display = "block";
    fullDescriptionTextarea.style.display = "none";

    const skillsTextarea = document.getElementById("editSkills");
    document.getElementById("skillsText").innerText = skillsTextarea.value;
    document.getElementById("skillsText").style.display = "block";
    skillsTextarea.style.display = "none";

    const contactTextarea = document.getElementById("editContact");
    document.getElementById("contactText").innerText = contactTextarea.value;
    document.getElementById("contactText").style.display = "block";
    contactTextarea.style.display = "none";

    const educTextarea = document.getElementById("editEducDetails");
    document.getElementById("educDetailsText").innerText = educTextarea.value;
    document.getElementById("educDetailsText").style.display = "block";
    educTextarea.style.display = "none";

    const empTextarea = document.getElementById("editEmpHistory");
    document.getElementById("empHistoryText").innerText = empTextarea.value;
    document.getElementById("empHistoryText").style.display = "block";
    empTextarea.style.display = "none";

    const certTextarea = document.getElementById("editCertDetails");
    document.getElementById("certDetailsText").innerText = certTextarea.value;
    document.getElementById("certDetailsText").style.display = "block";
    certTextarea.style.display = "none";

    document.querySelector(".buttons button:nth-child(1)").style.display = "block";
    document.querySelector(".buttons button:nth-child(2)").style.display = "none";

    isEditingProfile = false;

    document.querySelector("form").submit();
}
