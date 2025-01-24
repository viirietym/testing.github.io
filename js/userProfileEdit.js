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
    textarea.style.height = "auto"; // Reset the height
    const computedStyle = window.getComputedStyle(textarea);
    const padding = parseFloat(computedStyle.paddingTop) + parseFloat(computedStyle.paddingBottom);

    // Recalculate height based on content size
    textarea.style.height = (textarea.scrollHeight - padding) + "px";
}

// Enter edit mode for the profile
function editProfile() {
    isEditingProfile = true;

    // Enable profile image editing
    document.getElementById("profileImage").addEventListener("click", function () {
        document.getElementById("editProfileImage").click();
    });

    // Toggle buttons
    document.querySelector('button[name="btnSave"]').style.display = "block"; // Show save button
    document.querySelector('button[onclick="editProfile()"]').style.display = "none"; // Hide edit button

    // Handle full name
    document.getElementById("fullName").style.display = "none";
    document.getElementById("editFullNameContainer").style.display = "block";
    const fullName = document.getElementById("fullName").innerText.trim();

    // Split the full name to get the first and last name
    const nameParts = fullName.split(" ");
    const firstName = nameParts[0] || "";
    const lastName = nameParts.slice(1).join(" ") || "";

    // Add a hidden character (non-breaking space) to the first name for identification
    document.getElementById("editFirstName").value = firstName + "\u00A0"; // Non-breaking space added to first name
    document.getElementById("editLastName").value = lastName || "";

    // Handle username
    document.getElementById("username").style.display = "none";
    document.getElementById("editUsername").style.display = "block";
    document.getElementById("editUsername").value = document.getElementById("username").innerText.replace('@', '').trim();

    // Handle short description
    const shortDescriptionTextarea = document.getElementById("editDescription");
    document.getElementById("shortDescription").style.display = "none";
    shortDescriptionTextarea.style.display = "block";
    shortDescriptionTextarea.value = document.getElementById("shortDescription").innerText.trim();
    autoResizeTextarea(shortDescriptionTextarea);

    // Handle job title
    const jobTitleInput = document.getElementById("editJobTitle");
    document.getElementById("jobTitleText").style.display = "none";
    jobTitleInput.style.display = "block";
    jobTitleInput.value = document.getElementById("jobTitleText").innerText.trim();

    // Handle full description
    const fullDescriptionTextarea = document.getElementById("editFullDescription");
    document.getElementById("fullDescriptionText").style.display = "none";
    fullDescriptionTextarea.style.display = "block";
    fullDescriptionTextarea.value = document.getElementById("fullDescriptionText").innerText.trim();
    autoResizeTextarea(fullDescriptionTextarea);

    // Handle skills
    const skillsTextarea = document.getElementById("editSkills");
    document.getElementById("skillsText").style.display = "none";
    skillsTextarea.style.display = "block";
    skillsTextarea.value = document.getElementById("skillsText").innerText.trim();
    autoResizeTextarea(skillsTextarea);

    // Handle contact
    const contactTextarea = document.getElementById("editContact");
    document.getElementById("contactText").style.display = "none";
    contactTextarea.style.display = "block";
    contactTextarea.value = document.getElementById("contactText").innerText.trim();
    autoResizeTextarea(contactTextarea);

    // Handle education details
    const educTextarea = document.getElementById("editEducDetails");
    document.getElementById("educDetailsText").style.display = "none";
    educTextarea.style.display = "block";
    educTextarea.value = document.getElementById("educDetailsText").innerText.trim();
    autoResizeTextarea(educTextarea);

    // Handle employment history
    const empTextarea = document.getElementById("editEmpHistory");
    document.getElementById("empHistoryText").style.display = "none";
    empTextarea.style.display = "block";
    empTextarea.value = document.getElementById("empHistoryText").innerText.trim();
    autoResizeTextarea(empTextarea);

    // Handle certifications
    const certTextarea = document.getElementById("editCertDetails");
    document.getElementById("certDetailsText").style.display = "none";
    certTextarea.style.display = "block";
    certTextarea.value = document.getElementById("certDetailsText").innerText.trim();
    autoResizeTextarea(certTextarea);

    resetLayout();

    // Toggle save and cancel buttons
    document.querySelector(".buttons button:nth-child(1)").style.display = "none"; // Edit button
    document.querySelector(".buttons button:nth-child(2)").style.display = "block"; // Save button
}

// Save profile changes
function saveChanges() {
    const firstName = document.getElementById("editFirstName").value.trim().replace(/\u00A0/g, ""); // Remove the hidden character (non-breaking space)
    const lastName = document.getElementById("editLastName").value.trim();
    document.getElementById("fullName").innerText = `${firstName} ${lastName}`.trim();

    document.getElementById("fullName").style.display = "block";
    document.getElementById("editFullNameContainer").style.display = "none";

    document.getElementById("username").innerText = '@' + document.getElementById("editUsername").value.trim();
    document.getElementById("username").style.display = "block";
    document.getElementById("editUsername").style.display = "none";

    document.getElementById("shortDescription").innerText = document.getElementById("editDescription").value.trim();
    document.getElementById("shortDescription").style.display = "block";
    document.getElementById("editDescription").style.display = "none";

    document.getElementById("jobTitleText").innerText = document.getElementById("editJobTitle").value.trim();
    document.getElementById("jobTitleText").style.display = "block";
    document.getElementById("editJobTitle").style.display = "none";

    document.getElementById("fullDescriptionText").innerText = document.getElementById("editFullDescription").value.trim();
    document.getElementById("fullDescriptionText").style.display = "block";
    document.getElementById("editFullDescription").style.display = "none";

    document.getElementById("skillsText").innerText = document.getElementById("editSkills").value.trim();
    document.getElementById("skillsText").style.display = "block";
    document.getElementById("editSkills").style.display = "none";

    document.getElementById("contactText").innerText = document.getElementById("editContact").value.trim();
    document.getElementById("contactText").style.display = "block";
    document.getElementById("editContact").style.display = "none";

    document.getElementById("educDetailsText").innerText = document.getElementById("editEducDetails").value.trim();
    document.getElementById("educDetailsText").style.display = "block";
    document.getElementById("editEducDetails").style.display = "none";

    document.getElementById("empHistoryText").innerText = document.getElementById("editEmpHistory").value.trim();
    document.getElementById("empHistoryText").style.display = "block";
    document.getElementById("editEmpHistory").style.display = "none";

    document.getElementById("certDetailsText").innerText = document.getElementById("editCertDetails").value.trim();
    document.getElementById("certDetailsText").style.display = "block";
    document.getElementById("editCertDetails").style.display = "none";

    // Toggle buttons
    document.querySelector(".buttons button:nth-child(1)").style.display = "block"; // Edit button
    document.querySelector(".buttons button:nth-child(2)").style.display = "none"; // Save button

    isEditingProfile = false;

    // Submit form (if applicable)
    document.querySelector("form").submit();
}
