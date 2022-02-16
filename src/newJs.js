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