const closeButton = document.querySelector('header .close-button')
const mainContent = document.querySelector('main.main-content')

closeButton.addEventListener('click', ToggleSidebar)

function ToggleSidebar() {
	mainContent.classList.toggle('widen')
}
