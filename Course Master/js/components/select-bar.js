const select = document.getElementById('select');
const blocks = document.getElementsByClassName('block');

// При изменении выбора в select
select.addEventListener('change', function() {
  // Скрываем все блоки
  for (let i = 0; i < blocks.length; i++) {
    blocks[i].style.display = 'none';
  }
  
  // Отображаем выбранный блок, если выбрана опция
  const selectedOption = select.value;
  if (selectedOption) {
    const selectedBlock = document.getElementById(selectedOption);
    selectedBlock.style.display = 'block';
    
    // Очищаем значения в input
    const selectedInputs = selectedBlock.getElementsByTagName('input');
    for (let i = 0; i < selectedInputs.length; i++) {
      selectedInputs[i].value = '';
    }
    const selectedTextarea = selectedBlock.getElementsByTagName('textarea');
    for (let i = 0; i < selectedTextarea.length; i++) {
      selectedTextarea[i].value = '';
    }
  }
});

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