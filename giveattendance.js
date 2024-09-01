
//checkbox into color changing button
const tbodycontainer = document.querySelector(".table-fill tbody");
tbodycontainer.addEventListener("click", (event) => {
    if (event.target.tagName == 'LABEL') {
        event.target.previousElementSibling.checked = (event.target.previousElementSibling.checked == true) ? false : true;
        if (event.target.previousElementSibling.type == 'checkbox' && event.target.previousElementSibling.checked) {
            event.target.style.backgroundColor = "green";
            event.target.style.border = " 1px solid green";
        }
        if (event.target.previousElementSibling.type == 'checkbox' && !event.target.previousElementSibling.checked) {
            event.target.style.backgroundColor = "red";
            event.target.style.border = " 1px solid red";
        }
    }
    else { return; }
});
const confirmationcontainer = document.querySelector(".confirmation");
const absentlistcontainer = document.querySelector("#absent");
const popupbutton = document.querySelector(".confirmation .popupbutton");
const giveattentanceform = document.querySelector(".bodycontainer form");
//form action listener
giveattentanceform.addEventListener("submit", (event) => {
    event.preventDefault();
    confirmationcontainer.style.display = "block";
    displayabsentlist();
    popupbutton.addEventListener("click", cancelorsubmit);
    console.log(event.target);
});

function cancelorsubmit(event) {
    if (event.target.name == 'cancel') {
        confirmationcontainer.style.display = "none";
    }
    else if (event.target.name == 'confirm') {
        giveattentanceform.submit();
    }
}

function displayabsentlist() {
    absentlistcontainer.innerHTML = "";
    var notselectedcheckboxes = document.querySelectorAll('#chkbox:not(:checked)')
    for (var i = 0; i < notselectedcheckboxes.length; i++) {
        absentlistcontainer.innerHTML += `<li>${notselectedcheckboxes[i].closest('tr').firstElementChild.firstElementChild.value}</li>`;
    }

}