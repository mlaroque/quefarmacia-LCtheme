function menu_toggle(menu_id){
	var submenus = document.getElementsByClassName("subtoggle-"+menu_id);
	var submenu_ul = document.getElementById("sub-"+menu_id);
	var other_submenus_ul = [...document.querySelectorAll('[id*="sub-"]')];
	var other_submenus = [...document.querySelectorAll('[class*="subtoggle-"]')];
	for(var i=0;i<other_submenus.length;i++){
		if(!other_submenus[i].classList.contains("subtoggle-"+menu_id) && !other_submenus[i].classList.contains("hidden")){
			other_submenus[i].classList.add("hidden");
		}
	}
	for(var i=0;i<other_submenus_ul.length;i++){
		if(!other_submenus_ul[i].classList.contains("sub-"+menu_id)){
			other_submenus_ul[i].classList.remove("subActive");
		}
	}
	for(var i=0;i<submenus.length;i++){
		submenus[i].classList.toggle("hidden");
	}
	submenu_ul.classList.toggle("subActive");
}