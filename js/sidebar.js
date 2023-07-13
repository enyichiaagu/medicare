const dropDownIcons = document.querySelectorAll(
	'nav ul.navigation > li .down-arrow'
)

const dropDownsToArray = Array.from(dropDownIcons)

dropDownsToArray.forEach((element, index) => {
	element.parentElement.addEventListener('click', ({ currentTarget }) =>
		toggleSubMenu(currentTarget, index)
	)
})

function toggleSubMenu(currentTarget, index) {
	currentTarget.parentElement.nextElementSibling.classList.toggle(
		'sub-menu-open'
	)
	dropDownIcons[index].textContent =
		dropDownIcons[index].textContent === 'arrow_drop_down'
			? 'arrow_drop_up'
			: 'arrow_drop_down'
}
