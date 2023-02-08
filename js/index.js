const yearEl = document.querySelector('.footer--js');
const navigationButton = document.querySelector('.navigation__button');
const headerNavigation = document.querySelector('.header');

const year = () => {
	const currentYear = new Date().getFullYear();
	yearEl.textContent = currentYear;
};

const mobileNavigation = () => {
	headerNavigation.classList.toggle('navigation--js');
};

navigationButton.addEventListener('click', mobileNavigation);

const init = () => {
	year();
};
init();
