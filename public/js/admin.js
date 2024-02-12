document.addEventListener('DOMContentLoaded', function() {
    const teamItems = document.querySelectorAll('.team-item');

    teamItems.forEach(item => {
        const teamHeader = item.querySelector('.team-header');
        const teamDetails = item.querySelector('.team-details');
        const teamToggle = item.querySelector('.team-toggle');

        teamHeader.addEventListener('click', function() {
            if (window.getComputedStyle(teamDetails).display === 'none') {
                teamDetails.style.display = 'flex';
                setTimeout(() => {
                    teamDetails.style.maxHeight = teamDetails.scrollHeight + 'px';
                    teamToggle.textContent = "-"; // Change toggle to "-"
                }, 10);
            } else {
                teamDetails.style.maxHeight = '0px';
                setTimeout(() => {
                    teamDetails.style.display = 'none';
                    teamToggle.textContent = "+"; // Change toggle back to "+"
                }, 300); // Adjust the time to match your transition duration
            }
        });
    });
});