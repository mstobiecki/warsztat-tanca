const yearEl = document.querySelector('.footer--js');
const navigationButton = document.querySelector('.navigation__button');
const navigation = document.querySelector('.navigation__container');

const year = () => {
	const currentYear = new Date().getFullYear();
	yearEl.textContent = currentYear;
};

const mobileNavigation = () => {
	navigation.classList.toggle('navigation--js');
};

navigationButton.addEventListener('click', mobileNavigation);

const init = () => {
	year();
};
init();
