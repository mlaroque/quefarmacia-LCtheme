var lazyAds = [...document.querySelectorAll('.lazy-ads')];
var ads_inAdvance = 100;


function add_ad(slot, layout, format,id,sizes){
	let container_block = document.getElementById(id);
	container_block.classList.add('loaded');

	let ad = document.createElement( 'ins' );
	ad.setAttribute("style","display:block; text-align:center;" + sizes) ;
	ad.setAttribute("class","adsbygoogle") ;
	ad.setAttribute("data-ad-client","ca-pub-1748084553982745") ;
	if(layout != ""){
		ad.setAttribute("data-ad-layout",layout) ;
	}
	ad.setAttribute("data-ad-slot",slot) ;
	ad.setAttribute("data-ad-format",format) ;
	ad.setAttribute("data-full-width-responsive","true") ;

	container_block.appendChild( ad );

	(adsbygoogle = window.adsbygoogle || []).push({});
}