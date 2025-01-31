document.addEventListener('DOMContentLoaded', function () {
  const menuToggle = document.querySelector('.menu-toggle');
  const dropdownSecond = document.getElementById('dropdown-second');

  const userCtn = document.querySelector('.user-ctnn');
  const userLogo = document.querySelector('.user-logo');

  function closeAllDropdowns() {
    dropdownSecond.style.display = 'none';
    userLogo.style.display = 'none';
    userCtn.classList.remove('active');
  }

  menuToggle.addEventListener('click', function (event) {
    closeAllDropdowns();
    if (dropdownSecond.style.display === 'block') {
      dropdownSecond.style.display = 'none';
    } else {
      dropdownSecond.style.display = 'block';
    }
    event.stopPropagation();
  });

  userCtn.addEventListener('click', function (event) {
    closeAllDropdowns();
    if (userLogo.style.display === 'flex') {
      userLogo.style.display = 'none';
      userCtn.classList.remove('active');
    } else {
      userLogo.style.display = 'flex';
      userCtn.classList.add('active');
    }
    event.stopPropagation();
  });

  document.addEventListener('click', function () {
    closeAllDropdowns();
  });
});
