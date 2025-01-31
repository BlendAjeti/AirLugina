const menuToggle = document.querySelector('.menu-toggle');
const dropdownSecond = document.getElementById('dropdown-second');


menuToggle.addEventListener('click', () => {
  
  if (
    dropdownSecond.style.display === 'none' ||
    dropdownSecond.style.display === ''
  ) {
    dropdownSecond.style.display = 'block';
  } else {
    dropdownSecond.style.display = 'none';
  }
});

document.addEventListener('click', (event) => {
  if (
    !menuToggle.contains(event.target) &&
    !dropdownSecond.contains(event.target)
  ) {
    dropdownSecond.style.display = 'none';
  }
});


menuToggle.addEventListener('click',function(){
  console.log('Mete Zemra');
});