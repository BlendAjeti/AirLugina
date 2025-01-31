document.addEventListener('DOMContentLoaded', function () {
    const emiratesDivs = document.querySelectorAll('.emirates');
    const showMoreButton = document.getElementById('show-more');
    let isExpanded = false;
  
    function updateVisibility() {
      emiratesDivs.forEach((div, index) => {
        const reverseIndex = emiratesDivs.length - index - 1;
        if (!isExpanded && reverseIndex < emiratesDivs.length - 5) {
          div.style.display = 'none';
        } else {
          div.style.display = 'flex';
        }
      });
  
      showMoreButton.textContent = isExpanded
        ? 'Show Less Results'
        : 'Show More Results';
    }
  
    showMoreButton.addEventListener('click', function () {
      isExpanded = !isExpanded;
      updateVisibility();
    });
  
    updateVisibility();
  });
  