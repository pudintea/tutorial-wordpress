function openNavMobile() {
	var NavMenu = document.getElementById("NavMenu");
	var NavGradient = document.getElementById("NavGradient");

	if (NavMenu.style.marginLeft === '0px') {
		NavMenu.style.marginLeft = '-100%';
		NavGradient.style.marginLeft = '-100%';
	} else {
		NavMenu.style.marginLeft = '0px';
		NavGradient.style.marginLeft = '0px';
	}
}

function openSearch() {
	var SearchForm = document.getElementById("SearchForm");
	var SearchIcon = document.getElementById("SearchIcon");

	if (SearchForm.style.display === 'none') {
		SearchForm.style.display = 'block';

		SearchIcon.classList.remove("fa-search");
		SearchIcon.classList.add("fa-times");
	} else {
		SearchForm.style.display = 'none';
		
		SearchIcon.classList.add("fa-search");
		SearchIcon.classList.remove("fa-times");
	}
}
