	function toggleAccordionContent(accordion_id) {
  		var element = document.getElementById(accordion_id);
  		if (element.style.display === "none") {
    		element.style.display = "block";
  		} else {
    		element.style.display = "none";
  		}
  		element.classList.toggle("accordion_content_style");
	}
