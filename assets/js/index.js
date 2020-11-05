document.addEventListener('DOMContentLoaded', () => {
	let item = document.querySelector('.goto-portfolio');
    to = document.querySelector('.album-title');

    item.addEventListener('click', () => {
        to.scrollIntoView({behavior: 'smooth'});
	});
});
