const urlEducation = 'http://studenter.miun.se/~asha1900/dt173g/cms/api/education.php/';
const urlProjects = 'http://studenter.miun.se/~asha1900/dt173g/cms/api/projects.php/';
const urlEmployment = 'http://studenter.miun.se/~asha1900/dt173g/cms/api/employment.php/';

var dataUrl,editPage,objectData;

// Show Data

function getData(){
    if (window.location.href.indexOf("-education") > 0) {
        dataUrl = urlEducation;
        editPage = 'educationEdit';
      }
      else if(window.location.href.indexOf("-employment") > 0){
        dataUrl = urlEmployment;
        editPage = 'employmentEdit';
      }

      else if(window.location.href.indexOf("-projects") > 0){
        dataUrl = urlProjects;
        editPage = 'projectEdit';
    }

    fetch(dataUrl)
    .then((res)=>res.json())
    .then((data)=>{
        // Variabel som kommer innehålla all data
        let outPut = '';
        // loop för att gå igenom all data för utskrift
        data.forEach(function(post){
                outPut +=`
                <tr>
                <td>${post[Object.keys(post)[1]]}</td>
                <td>${post[Object.keys(post)[2]]}</td>
                <td>${post[Object.keys(post)[3]]}</td>
                <td>${post[Object.keys(post)[4]]}</td>
                <td><a class="edit" href="edit.php?${editPage}=${post.id}">
                Redigera &#9998;</a></td>
                <td><a class="delete" href="?del=${post.id}" 
                onclick="deleteData(${post.id})">Tag bort &#10060;</a></td>
                </tr>
                  `
        });
        // Skriver ut innehållet i outPut till DOM
          document.getElementById("data-table").innerHTML = outPut;
    })
}

// Get specific data

function getSpecificData(){
    var specificDataUrl;
    var educationForm,employmentForm,projectForm;
    var baseUrl = (window.location).href;
    var SpecificId = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);

    if (window.location.href.indexOf("educationEdit") > 0) {
        specificDataUrl = urlEducation + '?id=' + SpecificId;
        educationForm = true;
      }
      else if(window.location.href.indexOf("employmentEdit") > 0){
        specificDataUrl = urlEmployment + '?id=' + SpecificId;
        employmentForm = true;
      }

      else if(window.location.href.indexOf("projectEdit") > 0){
        specificDataUrl = urlProjects + '?id=' + SpecificId;
        projectForm = true;
    }
    
    fetch(specificDataUrl)
    .then((res)=>res.json())
    .then((data)=>{
        
        // Variabel som kommer innehålla all data
        let outPut = '';
        // loop för att gå igenom all data för utskrift
        if(educationForm){
          outPut +=` 
              <label for="input1">Lärosäte:</label>
              <input type="text" value="${data[Object.keys(data)[1]]}" name="input1" id="input1"required>
              <br>
              <label for="input2">Utbildning:</label>
              <input type="text" value="${data[Object.keys(data)[2]]}" name="input2" id="input2" required>
              <label for="input3">Startdatum:</label>
              <input id="input3" type="date" name="input3" value="${data[Object.keys(data)[3]]}" required>
              <label for="input4">Slutdatum:</label>
              <input type="date" id="input4" name="input4" value="${data[Object.keys(data)[4]]}" required>
              <input type="submit" name="update" id="add-post" value="Upddatera" onclick="updateData()">
          `;
      }

      else if(employmentForm){
          outPut +=` 
              <label for="input1">Arbetsplats:</label>
              <input type="text" value="${data[Object.keys(data)[1]]}" name="input1" id="input1"required>
              <br>
              <label for="input2">Titel:</label>
              <input type="text" value="${data[Object.keys(data)[2]]}" name="input2" id="input2" required>
              <label for="input3">Startdatum:</label>
              <input id="input3" type="date" name="input3" value="${data[Object.keys(data)[3]]}" required>
              <label for="input4">Slutdatum:</label>
              <input type="date" id="input4" name="input4" value="${data[Object.keys(data)[4]]}" required>
              <input type="submit" name="update" id="add-post" value="Upddatera" onclick="updateData()">
          `;
      }

      else if(projectForm){
          outPut +=` 
              <label for="input1">Titel:</label>
              <input type="text" value="${data[Object.keys(data)[1]]}" name="input1" id="input1"required>
              <br>
              <label for="input2">Beskrivning:</label>
              <input type="input2" value="${data[Object.keys(data)[2]]}" name="input2" id="input2" required>
              <label for="image" id="input3">Välj bild att ladda upp (PNG, JPG)</label>
              <input type="file" name="image" id="input3" accept=".jpg, .jpeg, .png">
              <br>
              <label for="input4">Länk:</label>
              <input type="text" value="${data[Object.keys(data)[4]]}" name="url" id="input4"required>
              <input type="submit" name="update" id="add-post" value="Upddatera" onclick="updateData()">
          `;
      } 
   
        // Skriver ut innehållet i outPut till DOM
          document.getElementById("form-content").innerHTML = outPut;  
    })
}

// Add data

function addData(){
    var redirUrl;
    var input1 = document.getElementById('input1').value;
    var input2 = document.getElementById('input2').value;
    var input3 = document.getElementById('input3').value;
    var input4 = document.getElementById('input4').value;

    if(input1&&input2&&input3&&input4!=undefined){
      let educationData = { 
        edu_name: input1,
        program_name: input2,
        start_year: input3,
        end_year: input4};
      let employmentData = { 
        place: input1,
        title: input2,
        start_year: input3,
        end_year: input4};
      let projectData = { 
        title: input1,
        project_desc: input2,
        image: input4,
        url: input3};
  
    if (window.location.href.indexOf("-education") > 0) {
        dataUrl = urlEducation;
        objectData = educationData;
        redirUrl = 'http://studenter.miun.se/~asha1900/dt173g/cms/admin/admin-education.php';
      }
      else if(window.location.href.indexOf("-employment") > 0){
        dataUrl = urlEmployment;
        objectData = employmentData;
        redirUrl = 'http://studenter.miun.se/~asha1900/dt173g/cms/admin/admin-employment.php';
      }

      else if(window.location.href.indexOf("-project") > 0){
        dataUrl = urlProjects;
        objectData = projectData;
        redirUrl = 'http://studenter.miun.se/~asha1900/dt173g/cms/admin/admin-projects.php';
    }

    fetch(dataUrl, {
        method: 'POST',
        headers: {
        Accept: 'application/json, text/plain, */*'
        },
        body: JSON.stringify(objectData)
    })
        .then(res => res.json())
        .then(data => window.location.replace(redirUrl))
        .catch(err => console.log(err));
  }
  else{
    document.getElementById("message").innerHTML = 'Vänligen fyll i alla fält!';
  }
}

function updateData(){
    var baseUrl = (window.location).href; 
    var SpecificId = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);

    var input1 = document.getElementById('input1').value;
    var input2 = document.getElementById('input2').value;
    var input3 = document.getElementById('input3').value;
    var input4 = document.getElementById('input4').value;
    if(input1&&input2&&input3&&input4!=undefined){
    let educationdata = { 
      edu_name: input1,
      program_name: input2,
      start_year: input3,
      end_year: input4};
    let employmentData = { 
      place: input1,
      title: input2,
      start_year: input3,
      end_year: input4};
    let projectData = { 
      title: input1,
      project_desc: input2,
      image: input3,
      url: input4};
    
    if (window.location.href.indexOf("educationEdit") > 0) {
      dataUrl = urlEducation + '?id=' + SpecificId;
      data = educationdata;
      redirUrl = 'http://studenter.miun.se/~asha1900/dt173g/cms/admin/admin-education.php';
      

    }
    else if(window.location.href.indexOf("employmentEdit") > 0){
      dataUrl = urlEmployment + '?id=' + SpecificId;
      data = employmentData;
      redirUrl = 'http://studenter.miun.se/~asha1900/dt173g/cms/admin/admin-employment.php';
      
      
    }

    else if(window.location.href.indexOf("projectEdit") > 0){
      dataUrl = urlProjects + '?id=' + SpecificId;
      data = projectData;
      redirUrl = 'http://studenter.miun.se/~asha1900/dt173g/cms/admin/admin-projects.php';
  }
  
    fetch(dataUrl, {
      method: 'PUT',
      headers: {
        Accept: 'application/json, text/plain, */*'
      },
      body: JSON.stringify(data)
    })
      .then(res => res.json())
      .then(data => window.location.replace(redirUrl))
      .catch(err => console.log(err));
    }
    else{
      document.getElementById("message").innerHTML = 'Vänligen fyll i alla fält!';
    }
}

// Delete data
function deleteData(SpecificId){
    if (window.location.href.indexOf("-education") > 0) {
        dataUrl = urlEducation;
      }
      else if(window.location.href.indexOf("-employment") > 0){
        dataUrl = urlEmployment;
      }

      else if(window.location.href.indexOf("-project") > 0){
        dataUrl = urlProjects;
    }

    let specificUrl = dataUrl + '?id=' + SpecificId;
    let jsonStr = JSON.stringify({
      id: SpecificId
    });
    fetch(specificUrl, {
      method: 'DELETE',
      body: jsonStr
    })
      .then(res => res.json())
      .catch(err => console.log(err));
}

function hideSidebar(){
  var sidebar = document.getElementsByClassName('sidebar-container');
  for(i = 0; i < sidebar.length; i++) {
    sidebar[i].style.display = 'none';
  }
}

