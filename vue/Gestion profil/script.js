window.onload = function() {
  showCategory('personal');
};

function showCategory(categoryName) {
  var categories = document.getElementsByClassName('category');
  for (var i = 0; i < categories.length; i++) {
    categories[i].style.display = 'none';
  }
  
  var category = document.getElementById(categoryName);
  if (category) {
    category.style.display = 'block';
  }
  
  var links = document.getElementsByTagName('a');
  for (var j = 0; j < links.length; j++) {
    links[j].classList.remove('active');
  }
  
  event.target.classList.add('active');
}
