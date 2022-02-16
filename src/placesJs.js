document.querySelector('#header-burger').addEventListener('click', function () {
	this.classList.toggle("active");
	document.querySelector('nav').classList.toggle("active");
	document.querySelector('#header-go-back svg path').style.stroke = '#fff';
	document.querySelector('#header-go-back svg circle').style.stroke = '#fff';
	document.querySelector('#header-logo a svg path').style.fill = '#fff';
	document.querySelector('header').style.background = '#008066';


	if (document.querySelector('#header-burger.active')) {
		document.querySelector('header').style.background = '#fff';
		document.querySelector('#header-go-back svg path').style.stroke = '#000';
		document.querySelector('#header-go-back svg circle').style.stroke = '#000';
		document.querySelector('#header-logo a svg path').style.fill = '#000';
	}
});





let mapButton = document.querySelector('#icon-map'),
	listButton = document.querySelector('#icon-list');

mapButton.addEventListener('click', function () {
	listButton.classList.remove('active');
	mapButton.classList.add('active');
	document.querySelector('section.places').classList.add('hidden');
	document.querySelector('.map').classList.remove('hidden');
	/* Временно */
	document.querySelector('.article-tags').style.display = 'none';
	/* Временно */
});

listButton.addEventListener('click', function () {
	mapButton.classList.remove('active');
	listButton.classList.add('active');
	document.querySelector('section.places').classList.remove('hidden');
	document.querySelector('.map').classList.add('hidden');
	/* Временно */
	document.querySelector('.article-tags').style.display = 'inline-flex';
	/* Временно */
});


window.addEventListener('resize', function () {
	if (window.innerWidth <= 1023) {
		document.querySelector('.map').classList.add('hidden');
		document.querySelector('section.places').classList.remove('hidden');
		mapButton.classList.remove('active');
		listButton.classList.add('active');
	}
});





const coordinates = document.querySelectorAll('.coordinates');
const titles = document.querySelectorAll('.map-cards__description-title');
const previewImages = document.querySelectorAll('.map-cards__image-img');


function initMap() {
	var map = new google.maps.Map(document.querySelector("#map__map-main"), {
		zoom: 10,
	});

	const markersBounds = new google.maps.LatLngBounds();

	coordinates.forEach((geo, index) => {
		const text = titles[index].innerHTML.trim();
		geo = geo.innerHTML.trim().split(',');
		const markerPosition = new google.maps.LatLng(Number(geo[0]), Number(geo[1]));
		markersBounds.extend(markerPosition);
		const img = previewImages[index].src;

		let marker = new google.maps.Marker({
			map: map,
			title: text,
			position: markerPosition,
		});

		let content = '<div class="map__info-block"><img src="' + img + '" /><p>' + text + '</p></div>';
		let infowindow = new google.maps.InfoWindow();


		google.maps.event.addListener(marker, 'click', function (marker, content, infowindow) {
			/* Закрываем прочие окна с информацией */
			let closeInfoMapButtons2 = document.querySelectorAll('.gm-ui-hover-effect');
			console.log(closeInfoMapButtons2.length);
			/* if (closeInfoMapButtons2) { */
			closeInfoMapButtons2.forEach(element => {
				element.click();
			});
			/* } */

			/* Открываем новое окно */
			return function () {
				infowindow.setContent(content);
				infowindow.open(map, marker);
			};
		}(marker, content, infowindow));
	});

	map.setCenter(markersBounds.getCenter());



	const wrappers = document.querySelectorAll('.map-cards-wrapper');

	wrappers.forEach((card, index) => {
		card.addEventListener('click', function () {
			if (document.querySelector('.map-cards__div-link.active')) {
				document.querySelector('.map-cards__div-link.active').classList.remove('active');
			}
			if (document.querySelector('.map-cards-wrapper.active')) {
				document.querySelector('.map-cards-wrapper.active').classList.remove('active');
			}
			this.classList.add('active');
			this.querySelector('.map-cards__div-link').classList.add('active');
			/* Закрываем прочие окна с информацией */
			let closeInfoMapButtons = document.querySelectorAll('.gm-ui-hover-effect');
			closeInfoMapButtons.forEach(element => {
				element.click();
			});

			/* Центрируем карту */
			let geo = coordinates[index].innerHTML.trim().split(',');
			let newCenter = new google.maps.LatLng(Number(geo[0]), Number(geo[1]));
			map.setCenter(newCenter);
			map.setZoom(16);


			/* Открываем окно с информацией */
			let textClick = titles[index].innerHTML.trim();
			let imgClick = previewImages[index].src;
			let contentClick = '<div class="map__info-block"><img src="' + imgClick + '" /><p>' + textClick + '</p></div>';
			let infowindowClick = new google.maps.InfoWindow();
			let markerClick = new google.maps.Marker({
				map: map,
				title: textClick,
				position: newCenter,
			});
			infowindowClick.setContent(contentClick);
			infowindowClick.open(map, markerClick);
		});
	});
}


