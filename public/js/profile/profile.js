function clearForm() {
    document.getElementById('name').value = "";
    document.getElementById('description').value = "";

    checkboxes = document.getElementsByClassName('checkboxPermission');
    for(var i=0; i<checkboxes.length; i++) {
        checkboxes[i].checked = false;
    }
}

function allPermissions() {
    checkboxes = document.getElementsByClassName('checkboxPermission');
    for(var i=0; i<checkboxes.length; i++) {
        checkboxes[i].checked = true;
    }
}
