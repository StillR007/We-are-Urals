const one = document.querySelector('.place-gallery__one-photo');
const two = document.querySelector('.place-gallery__two-photos');
const three = document.querySelector('.place-gallery__three-photos');
const four = document.querySelector('.place-gallery__four-photos');
const five = document.querySelector('.place-gallery__five-photos');
const many = document.querySelector('.place-gallery__many-photos');

const gallery = one || two || three || four || five || many;

var windowWidth = window.screen.width;
window.addEventListener('resize', () => {
	windowWidth = window.screen.width;
	/* Меняем hover на клик на иконках "поделиться" */
	if (windowWidth <= 1023) {
		document.querySelector('.place-contacts__buttons .share').addEventListener('click', function () {
			document.querySelector('.place-contacts__buttons .share-social-wrapper').classList.add('show');

			if (document.querySelector('.place-contacts__buttons .share-social-wrapper').classList.contains('show')) {
				document.onclick = function (e) {
					if ((e.target.className != 'share-social-wrapper.show') &&
						(e.target.className != 'share-social-wrapper') &&
						(e.target.className != 'share') &&
						(e.target.className != '')) {
						document.querySelector('.place-contacts__buttons .share-social-wrapper.show').classList.remove('show');
					}
				};
			}
		});

		document.querySelector('.main-screen-inner__buttons .share').addEventListener('click', function () {
			document.querySelector('.main-screen-inner__buttons .share-social-wrapper').classList.add('show');

			if (document.querySelector('.main-screen-inner__buttons .share-social-wrapper').classList.contains('show')) {
				document.onclick = function (e) {
					if ((e.target.className != 'share-social-wrapper.show') &&
						(e.target.className != 'share-social-wrapper') &&
						(e.target.className != 'share') &&
						(e.target.className != '')) {
						document.querySelector('.main-screen-inner__buttons .share-social-wrapper.show').classList.remove('show');
					}
				};
			}
		});
	}

	addPseudo();
});

/* Добавляем псевдоэлемент пятой фотографии галереи */
let addPseudo = () => {
	if (windowWidth >= 1024) {
		if (document.querySelector('.place-gallery__many-photos')) {
			let images = document.querySelectorAll('.place-gallery__many-photos-image');
			if (images.length > 5) {
				images[4].setAttribute("data-number", `${images.length - 5}`);
			}
		}
	}
};
addPseudo();


/* функционал хэдера */
document.querySelector('#header-burger').addEventListener('click', function () {
	this.classList.toggle("active");
	document.querySelector('nav').classList.toggle("active");
	document.querySelector('#header-go-back svg path').style.stroke = '#008066';
	document.querySelector('#header-go-back svg circle').style.stroke = '#008066';
	document.querySelector('#header-logo a svg path').style.fill = '#008066';
	document.querySelector('header').style.background = '#fff';


	if (document.querySelector('#header-burger.active')) {
		document.querySelector('header').style.background = '#fff';
		document.querySelector('#header-go-back svg path').style.stroke = '#000';
		document.querySelector('#header-go-back svg circle').style.stroke = '#000';
		document.querySelector('#header-logo a svg path').style.fill = '#000';
	}
});


/* функционал выпадающего меню навигации при скролле */
(function () {
	const scrollMenu = document.querySelector('.scroll-menu');
	const buttons = document.querySelectorAll('.scroll-menu-inner__list a');

	const info = document.querySelector('.place-info');
	const infoTop = info.getBoundingClientRect().top;
	const infoButtom = info.getBoundingClientRect().bottom;


	if (gallery) {
		var galleryTop = gallery.getBoundingClientRect().top;
		var galleryButtom = gallery.getBoundingClientRect().bottom;
	}


	const contacts = document.querySelector('.place-contacts');
	const contactsTop = contacts.getBoundingClientRect().top;


	const firstButton = () => {
		buttons[0].classList.add('active');
		buttons[1].classList.remove('active');
		if (gallery) {
			buttons[2].classList.remove('active');
		}
	};

	const secondButton = () => {
		buttons[1].classList.add('active');
		if (buttons[0].classList.contains('active')) {
			buttons[0].classList.remove('active');
		}
		if (buttons[2].classList.contains('active')) {
			buttons[2].classList.remove('active');
		}
	};

	window.addEventListener("scroll", function () {
		let userScroll = window.scrollY;

		if (userScroll >= (infoTop - 60)) {
			scrollMenu.classList.add('show');

			// первая кнопка
			if ((userScroll >= (infoTop - 60)) && (userScroll < infoButtom) || buttons[0].classList.contains('active')) {
				firstButton();
			}

			// вторая кнопка
			if (gallery) {
				if ((userScroll >= (galleryTop - 1) && (userScroll < galleryButtom)) || buttons[1].classList.contains('active')) {
					secondButton();
				}
			}

			// третья кнопка
			if (gallery) {
				/* && (userScroll <= contactsButtom) */
				if ((userScroll >= (contactsTop - 1)) || buttons[2].classList.contains('active')) {
					if (gallery) {
						buttons[2].classList.add('active');
						buttons[0].classList.remove('active');
						buttons[1].classList.remove('active');
					} else {
						buttons[1].classList.add('active');
						buttons[0].classList.remove('active');
					}
				}
			} else {
				if (userScroll >= (contactsTop - 1)) {
					buttons[1].classList.add('active');
					buttons[0].classList.remove('active');
				}
			}
		} else {
			scrollMenu.classList.remove('show');
			buttons.forEach(button => button.classList.remove('active'));
		}
	});

	buttons[0].addEventListener('click', function () {
		this.classList.add('active');
		info.scrollIntoView({ behavior: "smooth", block: 'start' });
	});
	if (gallery) {
		buttons[1].addEventListener('click', function () {
			this.classList.add('active');
			gallery.scrollIntoView({ behavior: "smooth", block: 'start' });
		});
		buttons[2].addEventListener('click', function () {
			this.classList.add('active');
			contacts.scrollIntoView({ behavior: "smooth", block: 'start' });
		});
	} else {
		buttons[1].addEventListener('click', function () {
			this.classList.add('active');
			contacts.scrollIntoView({ behavior: "smooth", block: 'start' });
		});
	}
})();




/* Добавляем слайдер по клику */
if (gallery) {
	gallery.addEventListener('click', function () {
		if (windowWidth >= 1024) {
			/* Если уже есть, не надо */
			if (document.querySelector('.slider')) {
				document.querySelector('.slider').style.display = 'block';
				document.body.classList.add('lock');
			} else {
				document.body.classList.add('lock');


				const slider = document.createElement('div');
				slider.className = "slider";
				document.body.append(slider);

				const sliderContainer = document.createElement('div');
				sliderContainer.className = "slider-container";
				slider.append(sliderContainer);

				const sliderGoBack = document.createElement('div');
				sliderGoBack.className = "slider-go-back";
				slider.append(sliderGoBack);

				const sliderGoBackLink = document.createElement('a');
				sliderGoBackLink.text = "назад";
				sliderGoBack.append(sliderGoBackLink);

				const sliderGoBackLinkPhoto = document.createElement('img');
				sliderGoBackLinkPhoto.src = "/img/slider-arrow.svg";
				sliderGoBackLink.append(sliderGoBackLinkPhoto);

				const sliderNav = document.createElement('div');
				sliderNav.className = "slider-nav";
				slider.append(sliderNav);

				const sliderNavPhotos = document.createElement('div');
				sliderNavPhotos.className = "slider-nav-photos";
				sliderNav.append(sliderNavPhotos);

				const sliderNextButton = document.createElement('div');
				sliderNextButton.className = "slider-next";
				slider.append(sliderNextButton);

				const sliderPrevButton = document.createElement('div');
				sliderPrevButton.className = "slider-prev";
				slider.append(sliderPrevButton);


				const sliderNavAdd = document.createElement('div');
				sliderNavAdd.className = "slider-nav-add-photo";
				sliderNav.append(sliderNavAdd);

				const sliderNavAddPhoto = document.createElement('a');
				sliderNavAdd.append(sliderNavAddPhoto);

				const sliderNavAddPhotoImg = document.createElement('img');
				sliderNavAddPhotoImg.src = "/img/add-photo.svg";
				sliderNavAddPhoto.append(sliderNavAddPhotoImg);

				const sliderNavAddPhotoSpan = document.createElement('span');
				sliderNavAddPhotoSpan.innerText = "Добавить фото";
				sliderNavAddPhoto.append(sliderNavAddPhotoSpan);


				let createAnImage = (src, desc) => {
					let photoWrapper = document.createElement('div');
					photoWrapper.className = "slider-photo";
					sliderContainer.append(photoWrapper);

					let photo = document.createElement('img');
					photo.src = src.innerHTML;
					photoWrapper.append(photo);

					let photoDesc = document.createElement('p');
					photoDesc.innerText = desc.innerHTML;
					photoWrapper.append(photoDesc);

					let miniPhoto = document.createElement('img');
					miniPhoto.className = "slider-nav-mini-photo";
					miniPhoto.src = src.innerHTML;
					sliderNavPhotos.append(miniPhoto);
				};
				let picSources = document.querySelectorAll('.hidden-field');
				let picDesc = document.querySelectorAll('.hidden-field-desc');
				picSources = [...picSources];
				picDesc = [...picDesc];

				const allPicInfo = picSources.concat(picDesc);

				for (let i = 0; i < picSources.length; i++) {
					createAnImage(allPicInfo[i], allPicInfo[i + picSources.length]);
				}


				/* Делаем первую фотку фоном слайдера */
				let bgSrc = document.querySelector('.hidden-field').innerHTML;
				let bgPhoto = document.createElement('img');
				bgPhoto.className = "slider-photo__bg";
				bgPhoto.src = bgSrc;
				slider.append(bgPhoto);


				/* Включаем с первой фотки и делаем их активными*/
				let firstImg = document.querySelector('.slider-photo');
				firstImg.classList.add('active');
				let firstMiniImg = document.querySelector('.slider-nav-mini-photo');
				firstMiniImg.classList.add('active');

				/* Преобразуем ноды в массив */
				let sliderPhotos = document.querySelectorAll('.slider-photo');
				sliderPhotos = [...sliderPhotos];
				let sliderMiniPhotos = document.querySelectorAll('.slider-nav-mini-photo');
				sliderMiniPhotos = [...sliderMiniPhotos];

				/** Навигация по кликам на стрелки и нажатию кнопок на клавиатуре */
				let swipeNext = () => {
					let currPhoto = document.querySelector('.slider-photo.active');
					let currPhotoIndex = sliderPhotos.indexOf(currPhoto);
					currPhoto.classList.remove('active');
					currPhotoIndex == (sliderPhotos.length - 1) ? currPhotoIndex = 0 : currPhotoIndex++;
					sliderPhotos[currPhotoIndex].classList.add('active');
					sliderContainer.style.transform = `translate3d(-${windowWidth * currPhotoIndex}px, 0px, 0px)`;

					/* Листаем мини-изображения вперед */
					let currMiniPhoto = document.querySelector('.slider-nav-mini-photo.active');
					let currMiniPhotoIndex = sliderMiniPhotos.indexOf(currMiniPhoto);
					currMiniPhoto.classList.remove('active');
					currMiniPhotoIndex == (sliderMiniPhotos.length - 1) ? currMiniPhotoIndex = 0 : currMiniPhotoIndex++;
					sliderMiniPhotos[currMiniPhotoIndex].classList.add('active');
				};
				let swipePrev = () => {
					let currPhoto = document.querySelector('.slider-photo.active');
					let currPhotoIndex = sliderPhotos.indexOf(currPhoto);
					currPhoto.classList.remove('active');
					currPhotoIndex == 0 ? currPhotoIndex = (sliderPhotos.length - 1) : currPhotoIndex--;
					sliderPhotos[currPhotoIndex].classList.add('active');
					sliderContainer.style.transform = `translate3d(-${windowWidth * currPhotoIndex}px, 0px, 0px)`;

					/* Листаем мини-изображения назад */
					let currMiniPhoto = document.querySelector('.slider-nav-mini-photo.active');
					let currMiniPhotoIndex = sliderMiniPhotos.indexOf(currMiniPhoto);
					currMiniPhoto.classList.remove('active');
					currMiniPhotoIndex == 0 ? currMiniPhotoIndex = (sliderMiniPhotos.length - 1) : currMiniPhotoIndex--;
					sliderMiniPhotos[currMiniPhotoIndex].classList.add('active');
				};
				let keyDownSwipe = (e) => {
					if (e.key == "ArrowRight" || e.code == "ArrowRight") {
						swipeNext();
					}
					if (e.key == "ArrowLeft" || e.code == "ArrowLeft") {
						swipePrev();
					}
				};


				/* Обработчики событий */
				sliderNextButton.addEventListener('click', function () {
					swipeNext();
				});
				sliderPrevButton.addEventListener('click', function () {
					swipePrev();
				});
				addEventListener("keydown", keyDownSwipe);

				/* Навигация по клику на мини-изображения */
				sliderMiniPhotos.forEach(function (miniPic) {
					miniPic.addEventListener('click', function () {
						if (!this.classList.contains('active')) {
							let curMiniPic = document.querySelector('.slider-nav-mini-photo.active');
							let currPhoto = document.querySelector('.slider-photo.active');
							curMiniPic.classList.remove('active');
							currPhoto.classList.remove('active');

							this.classList.add('active');
							let currIndex = sliderMiniPhotos.indexOf(this);
							sliderPhotos[currIndex].classList.add('active');
							sliderContainer.style.transform = `translate3d(-${windowWidth * currIndex}px, 0px, 0px)`;
						}
					});
				});


				/* Сокрытие по клику */
				sliderGoBackLink.addEventListener('click', function () {
					slider.style.display = 'none';
					document.body.classList.remove('lock');
				});
			}
		}
	});
}



let geo = document.querySelector('#coordinates').innerHTML.trim().split(',');
let title = document.querySelector('h1').innerText;

function initMap() {
	let map = new google.maps.Map(document.querySelector(".place-contacts__map"), {
		zoom: 12,
		center: { lat: Number(geo[0]), lng: Number(geo[1]) }
	});

	mark_position = new google.maps.LatLng(Number(geo[0]), Number(geo[1]));
	let marker = new google.maps.Marker({
		map: map,
		title: title,
		position: mark_position,
	});
}