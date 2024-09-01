const logoutbutton = document.querySelector("#ullogout");
logoutbutton.addEventListener("click", logout);
function pagedata() {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "studentdashboard.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {

      const response = JSON.parse(xhr.responseText);
      if (response.success) {
        // fetched misc data

        const usernamecontainer = document.querySelector("#username");
        const totaldayscontainer = document.querySelector("#totaldays");
        const presenteddayscontainer = document.querySelector("#presenteddays");
        const percentagecontainer = document.querySelector("#percentage");
        const tbodycontainer = document.querySelector(".table-fill tbody");
        usernamecontainer.innerHTML=`<img src="img/icons8-male-user-32.png">${response.name}`;
        totaldayscontainer.textContent = response.totalday;
        presenteddayscontainer.textContent = response.presentedday;
        percentagecontainer.textContent = response.percentage;
        var reslen = response.tabledatalength;
        //table data insert
        for (let i = 0; i < reslen; i++) {
          //data filtering
          let class1 = (response.tabledata[i]['classname1'] == null) ? 'NULL' : response.tabledata[i]['classname1'];
          let class2 = (response.tabledata[i]['classname2'] == null) ? 'NULL' : response.tabledata[i]['classname2'];
          let class3 = (response.tabledata[i]['classname3'] == null) ? 'NULL' : response.tabledata[i]['classname3'];
          let class4 = (response.tabledata[i]['classname4'] == null) ? 'NULL' : response.tabledata[i]['classname4'];
          let class5 = (response.tabledata[i]['classname5'] == null) ? 'NULL' : response.tabledata[i]['classname5'];
          let staff1 = (response.tabledata[i]['staffname1'] == null) ? 'NULL' : response.tabledata[i]['staffname1'];
          let staff2 = (response.tabledata[i]['staffname2'] == null) ? 'NULL' : response.tabledata[i]['staffname2'];
          let staff3 = (response.tabledata[i]['staffname3'] == null) ? 'NULL' : response.tabledata[i]['staffname3'];
          let staff4 = (response.tabledata[i]['staffname4'] == null) ? 'NULL' : response.tabledata[i]['staffname4'];
          let staff5 = (response.tabledata[i]['staffname5'] == null) ? 'NULL' : response.tabledata[i]['staffname5'];
          let hour1=(response.tabledata[i]['hour1']== null)?'':(response.tabledata[i]['hour1']== 1)?'src=./img/icons8-check-mark-32.png':'src=./img/icons8-close-32.png';
          let hour2=(response.tabledata[i]['hour2']== null)?'':(response.tabledata[i]['hour2']== 1)?'src=./img/icons8-check-mark-32.png':'src=./img/icons8-close-32.png';
          let hour3=(response.tabledata[i]['hour3']== null)?'':(response.tabledata[i]['hour3']== 1)?'src=./img/icons8-check-mark-32.png':'src=./img/icons8-close-32.png';
          let hour4=(response.tabledata[i]['hour4']== null)?'':(response.tabledata[i]['hour4']== 1)?'src=./img/icons8-check-mark-32.png':'src=./img/icons8-close-32.png';
          let hour5=(response.tabledata[i]['hour5']== null)?'':(response.tabledata[i]['hour5']== 1)?'src=./img/icons8-check-mark-32.png':'src=./img/icons8-close-32.png';
          
          
          

          //creating tr+data
          tbodycontainer.innerHTML += `<tr>
<td>${response.tabledata[i]['date']}</td>
<td><img ${hour1} style="float:none;"><span class="tooltiptext">
        <div class="innerdiv1">${class1}</div>
        <div class="innerdiv2">${staff1}</div>
    </span></td>
<td><img ${hour2} style="float:none;"><span class="tooltiptext">
        <div class="innerdiv1">${class2}</div>
        <div class="innerdiv2">${staff2}</div>
    </span></td>
    <td><img ${hour3} style="float:none;"><span class="tooltiptext">
        <div class="innerdiv1">${class3}</div>
        <div class="innerdiv2">${staff3}</div>
    </span></td>
    <td><img ${hour4} style="float:none;"><span class="tooltiptext">
        <div class="innerdiv1">${class4}</div>
        <div class="innerdiv2">${staff4}</div>
    </span></td>
    <td><img ${hour5} style="float:none;"><span class="tooltiptext">
        <div class="innerdiv1">${class5}</div>
        <div class="innerdiv2">${staff5}</div>
    </span></td>
</tr>`;

        }
      } else {

        window.location.href="login.html";

      }
    }
  };
  xhr.send(`submit=pagedata`);
}

function logout() {

  if (confirm("press allow to logout") == true) {
    window.location.href = "logout.php";
  } else {
    return;
  }
}

pagedata();