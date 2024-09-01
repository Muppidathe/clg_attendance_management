//global variable
var selecteddept = 'B.C.A';
var selectedyear = 3;
//form changing
const giveattenanceform = document.querySelector(".formgiveatt form");
const calculateattenanceform = document.querySelector(".formcalculateatt form");
const studentinfoform = document.querySelector(".formcreatestudent form");
const coursecreateform = document.querySelector(".formcreatecourse form");
const navmenu = document.querySelector(".container ol");
//batch hiding
var departmentselector = document.getElementById("dept1");
var batchselector = document.querySelector(".batchcontainer1");
//functions to preventdefault
const formactivity = (event) => {
    event.preventDefault();
    if (event.target.name == 'formcreatestudent') {
        var formdata = new FormData(event.target);
        var dept = formdata.get("dept");
        var year = formdata.get("year");
        var batch = formdata.get("batch");
        var sname = formdata.get("sname");
        var regno = formdata.get("regno");
        const msgboxstudent = document.querySelector("#msgboxstudencreate");

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "createstudentinfo.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success){
                    //message box
                    msgboxstudent.textContent = response.message;
                    msgboxstudent.style.display="block";
                    msgboxstudent.style.padding = "10px 0";
                    msgboxstudent.style.color = "green";
                } 
                else{
                    msgboxstudent.textContent = response.message;
                    msgboxstudent.style.display="block";
                    msgboxstudent.style.padding = "10px 0";
                    msgboxstudent.style.color = "red";
                }
                setTimeout(() => {msgboxstudent.style.display="none"},1000);
            }
        };
        xhr.send(`sname=${sname}&regno=${regno}&dept=${dept}&year=${year}&batch=${batch}&submit=createstudentinfo`);
    }
    else if (event.target.name == 'formcreatecourse') {
        var formdata = new FormData(event.target);
        var dept = formdata.get("dept");
        var year = formdata.get("year");
        var cname = formdata.get("course");
        const msgboxcourse = document.querySelector("#msgboxcoursecreate");

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "createcourse.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
               
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    msgboxcourse.textContent = response.message;
                    msgboxcourse.style.display="block";
                    msgboxcourse.style.padding = "10px 0";
                    msgboxcourse.style.color = "green";
                } else {

                    msgboxcourse.textContent = response.message;
                    msgboxcourse.style.display="block";
                    msgboxcourse.style.padding = "10px 0";
                    msgboxcourse.style.color = "red";
                }
                setTimeout(() => {msgboxcourse.style.display="none"},1000);
            }
        };
        xhr.send(`cname=${cname}&dept=${dept}&year=${year}&submit=createcourse`);
    }
    else if (event.target.name == 'formcalculateatt') {
        //event.target.submit(); is not working
        calculateattenanceform.submit();
    }
    else {
        event.target.submit();
    }

}

const addbatch = (event) => {
    selecteddept = event.target.value;
    fetchcoursename();
    if (event.target.value == "B.C.A") {
        batchselector.classList.add("showbatch");
    }
    else {
        batchselector.classList.remove("showbatch");
    }
}

function fetchcoursename() {
    const courseselecttag = document.querySelector("#cname");
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "coursefetching.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
               
                courseselecttag.innerHTML = ' <option label="select-subjectname" value=""></option>';
                for (let i = 0; i < response.length; i++) {
                    courseselecttag.innerHTML += ` <option value="${response[i]}">${response[i]}</option>`;
                }
            } else {
            }
        }
    };
    xhr.send(`dept=${selecteddept}&year=${selectedyear}`);
}

//batch hiding event listener
departmentselector.addEventListener("click", addbatch);
const yearselector = document.querySelector(".input-group #year");
yearselector.addEventListener("click", (event) => {
    selectedyear = event.target.value;
    fetchcoursename();
});
//form eventlistener
giveattenanceform.addEventListener("submit", formactivity);


//form changing event listener
navmenu.addEventListener("click", (event) => {
    //remove event listerner
    departmentselector.removeEventListener("click", addbatch);
    giveattenanceform.removeEventListener("submit", formactivity);
    calculateattenanceform.removeEventListener("submit", formactivity);
    studentinfoform.removeEventListener("submit", formactivity);
    coursecreateform.removeEventListener("submit", formactivity);
    yearselector.removeEventListener("click", (event) => {
        selectedyear = event.target.value;
        fetchcoursename();
    });


    //formelement to parent container
    let studentinfocontainer = studentinfoform.parentElement;
    let giveattenancecontainer = giveattenanceform.parentElement;
    let calculateattenancecontainer = calculateattenanceform.parentElement;
    let coursecreatecontainer = coursecreateform.parentElement;
    let val = event.target.attributes[0]['value'];
    //form changing
    if (val == 'coursecreate') {
        //form eventlistener
        coursecreateform.addEventListener("submit", formactivity);
        coursecreatecontainer.classList.add('showform');
        calculateattenancecontainer.classList.remove('showform');
        studentinfocontainer.classList.remove('showform');
        giveattenancecontainer.classList.remove('showform');
    }
    else if (val == 'calculateattendance') {
        //batch hiding
        let departmentselector = document.getElementById("dept2");
        departmentselector.addEventListener("click", addbatch);
        batchselector = document.querySelector(".batchcontainer2");
        //form eventlistener
        calculateattenanceform.addEventListener("submit", formactivity);

        //form changing
        calculateattenancecontainer.classList.add('showform');
        giveattenancecontainer.classList.remove('showform');
        studentinfocontainer.classList.remove('showform');
        coursecreatecontainer.classList.remove('showform');
    }
    else if (val == 'studentinfo') {
        //batch hiding
        let departmentselector = document.getElementById("dept3");
        departmentselector.addEventListener("click", addbatch);
        batchselector = document.querySelector(".batchcontainer3");
        //form eventlistener
        studentinfoform.addEventListener("submit", formactivity);


        //form changing 
        studentinfocontainer.classList.add('showform');
        giveattenancecontainer.classList.remove('showform');
        calculateattenancecontainer.classList.remove('showform');
        coursecreatecontainer.classList.remove('showform');
    }
    else {
        //batch hiding
        let departmentselector = document.getElementById("dept1");
        departmentselector.addEventListener("click", addbatch);
        batchselector = document.querySelector(".batchcontainer1");
        //form eventlistener
        giveattenanceform.addEventListener("submit", formactivity);
        yearselector.addEventListener("click", (event) => {
            selectedyear = event.target.value;
            fetchcoursename();
        });

        //form changing
        giveattenancecontainer.classList.add('showform');
        calculateattenancecontainer.classList.remove('showform');
        studentinfocontainer.classList.remove('showform');
        coursecreatecontainer.classList.remove('showform');
    }

});

//fetch username
function usernamefetch() {
    const staffcontainer = document.querySelector("#username");

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "dashboard.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
         
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                staffcontainer.innerHTML=`<img src="img/icons8-male-user-32.png">${response.message}`;
            }
            else {
                window.location.href="login.html";
            }
        }
    };
    xhr.send();

}
usernamefetch();
function logout() {

    if (confirm("press allow to logout") == true) {
        window.location.href = "logout.php";
    } else {
        return;
    }
}