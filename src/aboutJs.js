document.querySelector('#header-burger').addEventListener('click', function () {
	this.classList.toggle("active");
	document.querySelector('nav').classList.toggle("active");
});


function mainFunc() {
	let footer = document.querySelector('footer');
	let formWrapper = document.querySelector('form');
	let footerHeight = footer.getBoundingClientRect().bottom - footer.getBoundingClientRect().top;

	if (window.innerWidth >= 1366) {
		gsap.registerPlugin(ScrollTrigger);
		gsap.registerPlugin(ScrollToPlugin);

		let panels = gsap.utils.toArray(".panel"),
			scrollTween;

		let goToSection = (i) => {
			scrollTween = gsap.to(window, {
				scrollTo: { y: i * innerHeight, autoKill: false },
				duration: 0.7,
				overwrite: true,
				onComplete: () => scrollTween = null,
			});
		};

		panels.forEach((panel, i) => {
			ScrollTrigger.create({
				trigger: panel,
				start: "top bottom",
				snap: 1 / 2,
				end: "+=200%",
				overwrite: true,
				onToggle: self => self.isActive && !scrollTween && goToSection(i),

			});
		});




		formWrapper.style.height = `calc(100vh - ${footerHeight}px)`;




		const hoversNode = document.querySelectorAll('.hover-word');
		const hovers = [...hoversNode];

		hovers.forEach(svg => {
			svg.onmouseover = function (event) {
				document.querySelector('.words__words--wrapper-img').classList.add('active');
				document.querySelector('.words__words--wrapper-img').querySelector('img').src = `/img/about__hover-photo-${hovers.indexOf(svg) + 1}.jpg`;
			};
			svg.onmouseout = function (event) {
				document.querySelector('.words__words--wrapper-img').classList.remove('active');
			};
		});


		let startOrange = document.querySelector('.orange-inner').getBoundingClientRect().top;
		let startOrangeRoutes = document.querySelector('.orange-text-2').getBoundingClientRect().top;
		window.addEventListener('scroll', function () {
			if (window.scrollY >= startOrange) {
				document.querySelectorAll('.place').forEach(element => {
					element.style.animationName = 'appear';
				});
			}
			if (window.scrollY >= startOrangeRoutes) {
				document.querySelectorAll('.route').forEach(element => {
					element.style.animationName = 'dash';
				});
			}
		});
	} else if ((window.innerWidth <= 1365) && (window.innerWidth >= 768)) {
		let startOrange = document.querySelector('.orange-inner').getBoundingClientRect().top;
		let startOrangeRoutes = document.querySelector('.orange-text-2').getBoundingClientRect().top;
		window.addEventListener('scroll', function () {
			if (window.scrollY >= startOrange - (window.innerHeight / 2)) {
				document.querySelectorAll('.place').forEach(element => {
					element.style.animationName = 'appear';
				});
			}
			if (window.scrollY >= startOrangeRoutes - (window.innerHeight / 2)) {
				document.querySelectorAll('.route').forEach(element => {
					element.style.animationName = 'dash';
				});
			}
		});
	} else if (window.innerWidth <= 767) {
		let startOrange = document.querySelector('.orange-inner').getBoundingClientRect().top;
		window.addEventListener('scroll', function () {
			if (window.scrollY >= (startOrange - window.innerHeight / 2)) {
				document.querySelectorAll('.place').forEach(element => {
					element.style.animationName = 'appear';
				});
				document.querySelectorAll('.route').forEach(element => {
					element.style.animationName = 'dash';
				});
			}
		});
	}

	formWrapper.style.minHeight = `calc(100vh - ${footerHeight}px)`;
}


document.addEventListener('DOMContentLoaded', mainFunc);
document.addEventListener('resize', mainFunc);

