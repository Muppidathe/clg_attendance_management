var dept = decodeURI((window.location.search.slice(1).split("&")[0].split("=")[0] == "dept") ? window.location.search.slice(1).split("&")[0].split("=")[1] : null);
var year = (window.location.search.slice(1).split("&")[1].split("=")[0] == "year") ? window.location.search.slice(1).split("&")[1].split("=")[1] : null;
var batch = (window.location.search.slice(1).split("&")[2].split("=")[0] == "batch") ? window.location.search.slice(1).split("&")[2].split("=")[1] : null;
dept = dept.replace('+', ' ');
console.log(dept);
function pagedata(regno) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "calculateattendance.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                console.log(response.responsedata);
                // fetched misc data

                const classnamecontainer = document.querySelector(".classnamecontainer");
                const tbodycontainer = document.querySelector(".table-fill tbody");
                classnamecontainer.textContent = `${year} ${dept} ${batch} batch`;
                var reslen = response.responsedata.length;
                //table data insert
                for (let i = 0; i < reslen; i++) {


                    //creating tr+data
                    tbodycontainer.innerHTML += `
           
            <tr>
            <td>${response.responsedata[i]["name"]}</td>
            <td>${response.responsedata[i]["regno"]}</td>
            <td>${response.responsedata[i]["totaldays"]}</td>
            <td>${response.responsedata[i]["presenteddays"]}</td>
            <td>${response.responsedata[i]["percentage"]}%</td>
            <td> <form action="individualattendance.html" method="get"><button id="individualattendance" >view</button><input type="hidden" name="regno" value="${response.responsedata[i]["regno"]}"></form></td>
            </tr>
            `;

                }
            } else {

            }
        }
    };
    xhr.send(`dept=${dept}&year=${year}&batch=${batch}`);
}

pagedata();