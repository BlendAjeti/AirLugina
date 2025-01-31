const userCtn = document.querySelector('.user-ctnn');
const userLogo = document.querySelector('.user-logo');
const userCtnn = document.querySelector('.user-ctnn');

userCtn.addEventListener('click', function () {
  if (userLogo.style.display === 'none' || userLogo.style.display === '') {
    userLogo.style.display = 'flex';
  } else {
    userLogo.style.display = 'none';
  }

  userCtnn.classList.toggle('active');
});

