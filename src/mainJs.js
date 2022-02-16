document.querySelector('#header-go-back').addEventListener('click', function () {
	window.history.back();
});




document.querySelector('#header-user-links').children[1].addEventListener('click', function () {
	document.querySelector('body').classList.add('lock');
	document.querySelector('.add-item__wrapper').classList.add('active');
	document.querySelector('.add-item').classList.add('active');
	if (window.innerWidth < 1024) {
		document.querySelector('nav').classList.remove('active');
		document.querySelector('#header-burger').classList.remove('active');
		document.querySelector('#header-logo a svg path').style.fill = "#fff";
	}

	document.querySelector('.add-item__close').addEventListener('click', function () {
		document.querySelector('.add-item').classList.remove('active');
		document.querySelector('.add-item__wrapper').classList.remove('active');
		document.querySelector('body').classList.remove('lock');
	})
});
