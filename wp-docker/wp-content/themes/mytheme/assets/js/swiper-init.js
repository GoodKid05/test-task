let swiperInstance = null;

function initSwiper() {
if (window.innerWidth < 1440 && !swiperInstance) {
	swiperInstance = new Swiper('.swiper', {
		slidesPerView: 'auto',
		watchOverflow: true,
		speed: 800,
		spaceBetween: 20,
		loop: false,
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true,
			enabled: false
		},
		breakpoints: {
			0: {
				pagination: {
					enabled: true, 
					loop: true
				}
			},
			361: {
				pagination: {
					enabled: false 
				},
			},
		},
		autoplay: {
			delay: 3000, 
			disableOnInteraction: true 
		},
	});

	
} else if (window.innerWidth > 1440 && swiperInstance) {
	swiperInstance.destroy();
	swiperInstance = null;
}
}

window.addEventListener('load', initSwiper);
window.addEventListener('resize', () => {
initSwiper();
});
