function previewImage() {
    var reader = new FileReader();
    var imageField = document.getElementById("imageInput");
    var preview = document.getElementById("preview");
  
    reader.onload = function() {
      preview.src = reader.result;
    }
  
    if (imageField.files[0]) {
      reader.readAsDataURL(imageField.files[0]);
    }
  }