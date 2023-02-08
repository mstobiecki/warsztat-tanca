const yearEl = document.querySelector('.footer--js');
const navigationButton = document.querySelector('.navigation__button');
const headerNavigation = document.querySelector('.header');
const allLinks = document.querySelectorAll('a:link');
const sectionHero = document.querySelector('.hero');

const year = () => {
	const currentYear = new Date().getFullYear();
	yearEl.textContent = currentYear;
};

const mobileNavigation = () => {
	headerNavigation.classList.toggle('navigation--js');
};

const scrollBehavior = () => {
	allLinks.forEach((link) => {
		link.addEventListener('click', function (e) {
			e.preventDefault();

			const href = link.getAttribute('href');

			if (href === '#')
				window.scrollTo({
					top: 0,
					behavior: 'smooth',
				});

			if (href !== '#' && href.startsWith('#')) {
				const sectionEl = document.querySelector(href);
				sectionEl.scrollIntoView({ behavior: 'smooth' });
			}

			if (link.classList.contains('navigation__link'))
				headerNavigation.classList.toggle('navigation--js');
		});
	});
};

const stickyNavigation = () => {
	const obs = new IntersectionObserver(
		function (entries) {
			const ent = entries[0];

			if (!ent.isIntersecting) headerNavigation.classList.add('sticky');
			if (ent.isIntersecting) headerNavigation.classList.remove('sticky');
		},
		{
			root: null,
			threshold: 0,
			rootMargin: '-100px',
		}
	);
	obs.observe(sectionHero);
};

const init = () => {
	year();
	scrollBehavior();
	stickyNavigation();
};
init();

navigationButton.addEventListener('click', mobileNavigation);
