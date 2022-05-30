const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');

// hilangkan tombol cari
tombolCari.style.display = 'none';

//event ketika kita menuliskan keyword  
keyword.addEventListener('keyup', function (){
// Jalankan Ajax
  
// xmlhttprequest
// const xhr = new XMLHttpRequest();

// xhr.onreadystatechange = function() {
//   if(xhr.readyState == 4 && xhr.status == 200) {
//   container.innerHTML = xhr.responseText;
//   }
// };

// xhr.open('get', 'ajax/ajax_cari.php?keyword=' + keyword.value);
// xhr.send();


// Pake Fetch()

fetch('ajax/ajax_cari.php?keyword=' + keyword.values)
  .then((response) => response.text())
  .then((response) => (container.innerHTML = response));

});   