const canvas = document.getElementById('canvas1');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const home = document.getElementById('home');
const about = document.getElementById('about');
const portfolio = document.getElementById('portfolio');
const blog = document.getElementById('blog');
const contact = document.getElementById('contact');
const nav = document.querySelector('#nav').children;
const navArr = Array.from(document.querySelector('#nav').children);
const href_contact = document.querySelector('#href-contact');

let particlesArray;

// create particle
class Particle{
	constructor(x, y, directionX, directionY, size, color){
		this.x = x;
		this.y = y;
		this.directionX = directionX;
		this.directionY = directionY;
		this.size = size;
		this.color = color;
	}

	// method to draw paricle
	draw(){
		ctx.beginPath();
		ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2, false);
		ctx.fillStyle = this.color;
		// ctx.closePath();
		ctx.fill();
	}

	// check particle position
	update(){
		if(this.x > canvas.width || this.x < 0){
			this.directionX = -this.directionX;
		}
		if(this.y > canvas.height || this.y < 0){
			this.directionY = -this.directionY;
		}

		// move particle
		this.x += this.directionX;
		this.y += this.directionY;

		//draw
		this.draw();
	}
}

// connection between particles
function connect(){
	let opacityValue = 1;
    // const compareDistance = canvas.width/15 + canvas.height/15;
    const compareDistance = 100;
	for(let i = 0; i < particlesArray.length; i++){
		for(let j = 0; j < particlesArray.length; j++){
			let dx = particlesArray[i].x - particlesArray[j].x;
			let dy = particlesArray[i].y - particlesArray[j].y;
			let distance = Math.sqrt(dx*dx + dy*dy);
			if(distance < compareDistance){
				opacityValue = 1 - (distance/150);
				ctx.strokeStyle = 'rgba(255, 255, 251,'+ opacityValue +')';
				ctx.lineWidth = 1;
				ctx.beginPath();
				ctx.moveTo(particlesArray[i].x, particlesArray[i].y);
				ctx.lineTo(particlesArray[j].x, particlesArray[j].y);
				ctx.stroke();	
			}	
		}
	}
}

// create particle array
function init() {
	particlesArray = [];
	let numberOfParticles = (canvas.height * canvas.width) / 9000;
	for (let i = 0; i < numberOfParticles; i++) {
		let size = (Math.random() * 5) + 1;
		let x = randomNumber(innerWidth - size * 2, size * 2);
		let y = randomNumber(innerHeight - size * 2, size * 2);;
		let directionX = (Math.random() * 5) - 2.5;
		let directionY = (Math.random() * 5) - 2.5;
		let color = '#e1e1dd';

		particlesArray.push(new Particle(x, y, directionX, directionY, size, color));
	}
}

// random no genrator in given range
function randomNumber(min, max) { 
    return Math.random() * (max - min) + min;
}

// animation loop
function animate(){
	requestAnimationFrame(animate);
	ctx.clearRect(0, 0, innerWidth, innerHeight);
	for (let i = 0; i < particlesArray.length; i++){
		particlesArray[i].update();
	}
	connect();
}

// resize
window.addEventListener('resize',() => {
	canvas.width = innerWidth;
	canvas.height = innerHeight;

	init();
});

init();
animate();

// navArr.forEach((item) => item.addEventListener('click', () => {
// 	console.log(this.target);
// 	navArr.forEach((item) => item.classList.remove('active'));
// 	// this.classList.add('active');
// }));

for ( var i = 0; i < nav.length; i++ ) (function(i){ 
  nav[i].onclick = function() {
  	let topic = nav[i].dataset.nav;

    // $('html, body').animate({
    //     scrollTop: $('#' + topic).offset().top
    // }, 200);
	navArr.forEach((item) => item.classList.remove('active'));
  	nav[i].classList.add('active');

  	var element = document.getElementById(topic);
    const offset = 65;
	const bodyRect = document.body.getBoundingClientRect().top;
	const elementRect = element.getBoundingClientRect().top;
	const elementPosition = elementRect - bodyRect;
	const offsetPosition = elementPosition - offset;

    window.scrollTo({
         top: offsetPosition,
         behavior: "smooth"
    });

  }
})(i);

href_contact.addEventListener('click', (e) => {

    const offset = 65;
	const bodyRect = document.body.getBoundingClientRect().top;
	const elementRect = contact.getBoundingClientRect().top;
	const elementPosition = elementRect - bodyRect;
	const offsetPosition = elementPosition - offset;

    window.scrollTo({
         top: offsetPosition,
         behavior: "smooth"
    });
});

setTimeout(function(){
	$('.disappear').slideUp('slow');
  }, 1500);

// function isOnScreen(element)
// {
//     var curPos = element.offset();
//     var curTop = curPos.top;
//     var screenHeight = $(window).height();
//     return (curTop > screenHeight) ? false : true;
// }

// window.onscroll = function () {
// 	let isOnScreen;
//     for ( var i = 0; i < nav.length; i++ ) (function(i){ 
// 		isOnScreen = is OnScreen(nav[i]);
// 		if(isOnScreen){
// 			console.log(nav[i].dataset.nav);
// 		}
// 	})(i);
// };