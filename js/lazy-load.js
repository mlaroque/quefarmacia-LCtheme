	let lazyImg = [...document.querySelectorAll('.lazy-img')];
	let inAdvance = 100;

	function lazyLoad() {
	    lazyImg.forEach(img => {
	        if (img.y < window.innerHeight + window.pageYOffset + inAdvance && img.className.indexOf("loaded") < 0) {
	        	img.setAttribute("src",img.dataset.src);
	        	img.removeAttribute("data-src");
	            img.classList.add('loaded');

	        }
	    })
	
	    // if all loaded removeEventListener
	}

	lazyLoad();

	window.addEventListener('scroll', lazyLoad);
	window.addEventListener('resize', lazyLoad);