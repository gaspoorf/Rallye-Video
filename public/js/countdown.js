const targetDate = new Date('January 24, 2024 16:00:00').getTime();

const interval = setInterval(function() {
    const currentDate = new Date().getTime();
    const timeLeft = targetDate - currentDate;

    const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

    document.getElementById('countdown').innerHTML = `${days}j : ${hours}h : ${minutes}m : ${seconds}s`;

    if (timeLeft < 0) {
        clearInterval(interval);
        document.getElementById('countdown').innerHTML = '00j:00h:00m:00s';
        }
    }, 1000);