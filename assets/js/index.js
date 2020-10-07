document.addEventListener('DOMContentLoaded', () => {
	let item = document.querySelector('.goto-portfolio');
    to = document.querySelector('.album-title');
    // gotoStart = document.querySelector('.goto-start'),
    // main = document.querySelector('.main');

    // gotoStart.addEventListener('click', () => {
    //     main.scrollIntoView({behavior: 'smooth'});
    // })

    item.addEventListener('click', () => {
        to.scrollIntoView({behavior: 'smooth'});
	});
});
