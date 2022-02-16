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
	document.querySelector('section.routes').classList.add('hidden');
	document.querySelector('.subscribe').classList.add('hidden');
	document.querySelector('.map').classList.remove('hidden');
	document.querySelector('article h2').classList.add('hidden');

});

listButton.addEventListener('click', function () {
	mapButton.classList.remove('active');
	listButton.classList.add('active');
	document.querySelector('section.routes').classList.remove('hidden');
	document.querySelector('.subscribe').classList.remove('hidden');
	document.querySelector('.map').classList.add('hidden');
	document.querySelector('article h2').classList.remove('hidden');
});

const urls = document.querySelectorAll('.detail-url');
const titles = document.querySelectorAll('.map-cards__description-title');
const divs = document.querySelectorAll('.map-cards__div');

const title = document.querySelector('.map__map-title');

divs.forEach((route) => {
	route.addEventListener('click', function () {
		let index = Array.prototype.indexOf.call(divs, this);
		title.innerHTML = `${titles[index].innerHTML}`;
		title.setAttribute("href", `${urls[index].innerHTML}`);
	});
});



const cardsWrappers = document.querySelectorAll('.map-cards-wrapper');

function initMap() {
	var map = new google.maps.Map(document.querySelector(".map__map-main"), {
		zoom: 12,
		// центр екб
		center: new google.maps.LatLng(56.838784, 60.605181)
	});
	let markers = [];

	let removeMarkers = function () {
		for (i = 0; i < markers.length; i++) {
			markers[i].setMap(null);
		}
		markers = [];
	};

	cardsWrappers.forEach((div, index) => {
		div.addEventListener('click', function () {
			if (document.querySelector('.map-cards-wrapper.active')) {
				document.querySelector('.map-cards-wrapper.active').classList.remove('active');
			}
			this.classList.add('active');


			/* Удаляем маркеры */
			removeMarkers();


			/* Добавляем маркеры */
			const coordinates = this.querySelectorAll('.coordinates');
			const placesImages = this.querySelectorAll('.images');
			const placesNames = this.querySelectorAll('.names');

			const markersBounds = new google.maps.LatLngBounds();

			coordinates.forEach((geo, index) => {
				geo = geo.innerHTML.trim().split(',');

				const markerPosition = new google.maps.LatLng(Number(geo[0]), Number(geo[1]));
				markersBounds.extend(markerPosition);
				const img = placesImages[index].innerHTML;
				const name = placesNames[index].innerHTML;
				let marker = new google.maps.Marker({
					map: map,
					position: markerPosition,
				});
				markers.push(marker);

				let content = `<div class="map__info-block"><img src="${img}" /><p>${name}</p></div>`;
				let infowindow = new google.maps.InfoWindow();

				google.maps.event.addListener(marker, 'click', (function (marker, content, infowindow) {
					return function () {
						infowindow.setContent(content);
						infowindow.open(map, marker);
					};
				})(marker, content, infowindow));

				map.setCenter(markersBounds.getCenter());
				map.setZoom(14);
			});
		});
	});
}