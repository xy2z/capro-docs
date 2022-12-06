const sidebar = document.querySelector(".sidebar");
sidebar.onclick = function() {
	console.log(sidebar.classList);
	sidebar.classList.remove('closed')
	sidebar.classList.add('open');
}


const main = document.querySelector('main');
main.onclick = function() {
	// Close sidebar
	sidebar.classList.remove('open')
	sidebar.classList.add('closed')
}

// Sidebar will always start "open" so new visitors know of it.
// Start by triggering a click to close it.
setTimeout(function() {
	main.click();
}, 100);
