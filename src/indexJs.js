document.querySelector('#header-burger').addEventListener('click', function () {
	this.classList.toggle("active");
	document.querySelector('nav').classList.toggle("active");

	document.querySelector('#header-go-back svg path').style.stroke = '#fff';
	document.querySelector('#header-go-back svg circle').style.stroke = '#fff';
	document.querySelector('#header-logo a svg path').style.fill = '#fff';


	if (document.querySelector('#header-burger.active')) {
		document.querySelector('header').style.background = '#fff';
		document.querySelector('#header-go-back svg path').style.stroke = '#000';
		document.querySelector('#header-go-back svg circle').style.stroke = '#000';
		document.querySelector('#header-logo a svg path').style.fill = '#000';
	} else {
		let currBackColor = document.querySelector('.slider-wrapper').style.backgroundColor;
		document.querySelector('header').style.background = currBackColor;
	};
});


function slider() {
	let buttonNext = document.querySelector('.slider-button-next');
	let buttonPrev = document.querySelector('.slider-button-prev');
	let wrapper = document.querySelector('.slider-wrapper');
	let sliderPhotos = document.querySelectorAll('.slider-photo');
	sliderPhotos = [...sliderPhotos];
	let header = document.querySelector('header');
	let wave = document.querySelector('.slider-photo__title b span svg');
	let lines = document.querySelectorAll('.slider-photo__title b span')[1];
	document.querySelector('.slider-photo').classList.add('active');
	buttonPrev.style.display = 'none';

	function returnFirstPhoto() {
		let currPhoto = document.querySelector('.slider-photo.active');
		let currPhotoIndex = sliderPhotos.indexOf(currPhoto);
		if (currPhotoIndex !== 0) {
			sliderPhotos[0].classList.add('active');
			currPhoto.classList.remove('active');
		}
		wrapper.style.transform = `translate3d(0px, 0px, 0px)`;
		document.querySelector('nav.active') ? header.style.backgroundColor = '#fff' : header.style.backgroundColor = '#008066';

		wrapper.style.backgroundColor = '#008066';
		buttonPrev.style.display = 'none';
		buttonNext.style.display = 'flex';
		wave.classList.remove('active');
		lines.classList.remove('active');
	}

	function swipeNext() {
		let windowWidth = window.innerWidth;
		let currPhoto = document.querySelector('.slider-photo.active');
		let currPhotoIndex = sliderPhotos.indexOf(currPhoto);

		currPhotoIndex++;
		sliderPhotos[currPhotoIndex].classList.add('active');
		currPhoto.classList.remove('active');
		wrapper.style.transform = `translate3d(-${windowWidth * currPhotoIndex}px, 0px, 0px)`;
		switch (currPhotoIndex) {
			case 1:
				buttonPrev.style.display = 'flex';
				document.querySelector('nav.active') ? header.style.backgroundColor = '#fff' : header.style.backgroundColor = '#5c73b8';
				wrapper.style.backgroundColor = '#5c73b8';
				wave.classList.add('active');
				break;
			case 2:
				buttonNext.style.display = 'none';
				document.querySelector('nav.active') ? header.style.backgroundColor = '#fff' : header.style.backgroundColor = '#fcaf26';
				wrapper.style.backgroundColor = '#fcaf26';
				wave.classList.remove('active');
				lines.classList.add('active');
				break;
		}

	};
	function swipePrev() {
		let windowWidth = window.innerWidth;
		let currPhoto = document.querySelector('.slider-photo.active');
		let currPhotoIndex = sliderPhotos.indexOf(currPhoto);

		currPhotoIndex--;
		sliderPhotos[currPhotoIndex].classList.add('active');

		currPhoto.classList.remove('active');
		wrapper.style.transform = `translate3d(-${windowWidth * currPhotoIndex}px, 0px, 0px)`;

		switch (currPhotoIndex) {
			case 0:
				buttonPrev.style.display = 'none';
				document.querySelector('nav.active') ? header.style.backgroundColor = '#fff' : header.style.backgroundColor = '#008066';
				wrapper.style.backgroundColor = '#008066';
				wave.classList.remove('active');
				break;
			case 1:
				buttonPrev.style.display = 'flex';
				buttonNext.style.display = 'flex';
				document.querySelector('nav.active') ? header.style.backgroundColor = '#fff' : header.style.backgroundColor = '#5c73b8';
				wrapper.style.backgroundColor = '#5c73b8';
				wave.classList.add('active');
				lines.classList.remove('active');
				break;
		}
	};

	buttonNext.addEventListener('click', function () {
		clearTimeout(autoSwiper);
		swipeNext();
	});
	buttonPrev.addEventListener('click', function () {
		clearTimeout(autoSwiper);
		swipePrev();
	});

	checkVar++;
	if (checkVar === 1) {
		var autoSwiper = setTimeout(function run() {
			let currPhoto = document.querySelector('.slider-photo.active');
			let currPhotoIndex = sliderPhotos.indexOf(currPhoto);
			currPhotoIndex !== 2 ? swipeNext() : returnFirstPhoto();
			setTimeout(run, 5000);
		}, 5000);
	} else {
		clearTimeout(autoSwiper);
		returnFirstPhoto();
	}
}
var checkVar = 0;
slider();

window.addEventListener('resize', slider);