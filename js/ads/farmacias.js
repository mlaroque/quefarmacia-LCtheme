	function lazyLoad() {
	    lazyAds.forEach(ad => {
	        if (ad.offsetTop < window.innerHeight + window.pageYOffset + ads_inAdvance && ad.className.indexOf("loaded") < 0) {
	        	ad.style.backgroundColor = "";
	            if(ad.id == "ad_1ero_h2"){
	            	add_ad("1106505485","","auto",ad.id,"");
	            }else if(ad.id == "ad_4to_h2"){
	            	add_ad("2613064512","","auto",ad.id,"");
	            }
	        }
	    })
	} 

	lazyLoad();

	window.addEventListener('scroll', lazyLoad);
	window.addEventListener('resize', lazyLoad);

