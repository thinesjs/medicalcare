function showDocDropdown() {

    var checkBox = document.getElementById("doctorCheck");
    var dropdownBox = document.getElementById("doctorInput");
  
    if (checkBox.checked == true){
        dropdownBox.style.display = "block";
    }else{
        dropdownBox.style.display = "none";
    }
  } 