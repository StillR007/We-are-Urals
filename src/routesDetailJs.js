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


if (window.innerWidth <= 1023) {
	document.querySelector('.share').addEventListener('click', function () {
		document.querySelector('.share-social-wrapper').classList.add('show');

		if (document.querySelector('.share-social-wrapper.show')) {
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
}



const coordinates = document.querySelectorAll('.coordinates');
const titles = document.querySelectorAll('.map-cards__title');
const previewImages = document.querySelectorAll('.map-cards__image-img');

function initMap() {
	let map = new google.maps.Map(document.querySelector(".map__map-main"), {
		zoom: 12,
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

		google.maps.event.addListener(marker, 'click', (function (marker, content, infowindow) {
			return function () {
				infowindow.setContent(content);
				infowindow.open(map, marker);
			};
		})(marker, content, infowindow));

		map.setCenter(markersBounds.getCenter());

		const wrappers = document.querySelectorAll('.map-cards-wrapper');
		wrappers.forEach((card, index) => {
			card.addEventListener('click', function () {
				if (document.querySelector('.map-cards-wrapper.active')) {
					document.querySelector('.map-cards-wrapper.active').classList.remove('active');
				}
				this.classList.add('active');

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
	});

	/* Добавляем маршрут */
	/* let request = {
		origin: 'Chicago, IL',
		destination: 'Los Angeles, CA',
		waypoints: [
			{
				location: 'Joplin, MO',
				stopover: false
			}, {
				location: 'Oklahoma City, OK',
				stopover: true
			}],
		travelMode: 'WALKING'
	};

	let directionsDisplay = new google.maps.DirectionsRenderer();
	let directionsService = new google.maps.DirectionsService();

	directionsService.route(request, function (response, status) {
		console.log(response);
		console.log(status);
	}); */
}