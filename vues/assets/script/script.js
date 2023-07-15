
function openPopup(id) {
    document.getElementById('popup-id').textContent = id;
    document.getElementById('popup').style.display = 'block';
  }
  
  // Le reste du code reste inchangé
  
function closePopup() {
  document.getElementById('popup').style.display = 'none';
}

