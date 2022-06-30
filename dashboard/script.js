// check featured if checked in input project
function featuredChecked() {
  const checkbox = document.getElementById("featured_project");
  const img_input = document.querySelector("#img_project_container");
  if (checkbox.checked === true) {
    img_input.style.display = "block";
    img_input.querySelector("#img_project").setAttribute("required", "");
  } else {
    img_input.style.display = "none";
    img_input.querySelector("#img_project").removeAttribute("required");
  }
}

featuredChecked();

// preview image when input file change
function previewImage(e) {
  const imgPreview = document.querySelector(".img-preview");
  console.log(imgPreview);
  console.log(e.files[0]);

  const oFReader = new FileReader();
  oFReader.readAsDataURL(e.files[0]);
  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
}

// show input for update in skill
function showUpdate(e) {
  parent = e.parentElement.parentElement;
  const nama_skill = parent.querySelector(".skill_name");
  const form = parent.querySelector(".form_update_skill");

  if (nama_skill.style.display === "table-cell") {
    nama_skill.style.display = "none";
    form.style.display = "table-cell";
  } else {
    nama_skill.style.display = "table-cell";
    form.style.display = "none";
  }
}
