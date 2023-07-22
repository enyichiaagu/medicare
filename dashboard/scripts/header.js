const closeButton = document.querySelector('header .close-button')
const sidebar = document.querySelector('aside.sidebar')

closeButton.addEventListener('click', ToggleSidebar)

function ToggleSidebar() {
	sidebar.classList.toggle('close-sidebar')
}
