// Get the modal
let modal = document.getElementById('myModal');

// Get the buttons that opens the modal
let btn = document.getElementById("save_button");

// When the user clicks button, open modal
function launch() {
    modal.style.display = "block";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// close modal on ESC press
$(document).keydown(function (e) {
    // ESCAPE key pressed
    if (e.keyCode == 27) {
        modal.style.display = "none";
    }
});
