const showAlert = document.getElementById("showAlert");
const tbody = document.querySelector("tbody");
const updateCMForm = document.getElementById("edit-camera-form");
const editCMModal = new bootstrap.Modal(document.getElementById("editCameraModal"));
const addCMForm = document.getElementById("add-camera-form");
const addCMModal = new bootstrap.Modal(document.getElementById("addNewCameraModal"));

addCMForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(addCMForm);
    formData.append("add_camera", 1);

    if (addCMForm.checkValidity() === false) {
        e.preventDefault();
        e.stopPropagation();
        addCMForm.classList.add("was-validated");
        return false;
    } else {
        document.getElementById("add-camera-btn").value = "Please Wait...";

        const data = await fetch("action.php", {
            method: "POST",
            body: formData
        })
        const response = await data.text();
        showAlert.innerHTML = response;
        document.getElementById("add-camera-btn").value = "Add Camera";
        addCMForm.reset();
        addCMForm.classList.remove("was-validated");
        addCMModal.hide();
        fetchAllCamera();
    }
})

const fetchAllCamera = async () => {
    const data = await fetch("action.php?read_camera=1", {
        method: "GET"
    })
    const response = await data.text();
    tbody.innerHTML = response;
}
fetchAllCamera();
tbody.addEventListener("click", (e) => {
    if (e.target && e.target.matches("a.editlink")) {
        e.preventDefault();
        let id = e.target.getAttribute("id_camera");
        editCamera(id);
    }
})

const editCamera = async (id) => {
    const data = await fetch(`action.php?edit_camera=1&id_camera=${id}`, {
        method: "GET"
    })
    const response = await data.json();
    document.getElementById("id_camera").value = response.id;
    document.getElementById("status_cm").value = response.status_cm;
    document.getElementById("location_cm").value = response.location_cm;
}

updateForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(updateCMForm);
    formData.append("update_camera", 1);

    if (updateCMForm.checkValidity() === false) {
        e.preventDefault();
        e.stopPropagation();
        addCMForm.classList.add("was-validated");
        return false;
    } else {
        document.getElementById("edit-camera-btn").value = "Please Wait...";

        const data = await fetch("action.php", {
            method: "POST",
            body: formData
        })
        const response = await data.text();
        showAlert.innerHTML = response;
        document.getElementById("edit-camera-btn").value = "Edit Camera";
        updateCMForm.reset();
        updateCMForm.classList.remove("was-validated");
        editCMModal.hide();
        fetchAllCamera();
    }
})

tbody.addEventListener("click", (e) => {
    if (e.target && e.target.matches("a.deletelink")) {
        e.preventDefault();
        let id = e.target.getAttribute("id_camera");
        deleteCamera(id);
    }
})

const deleteCamera = async (id) => {
    const data = await fetch(`action.php?delete_camera=1&id_camera=${id}`, {
        method: "GET"
    })
    const response = await data.text();
    showAlert.innerHTML = response;
    fetchAllCamera();
}