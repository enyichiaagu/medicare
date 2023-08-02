const dropDownIcons = document.querySelectorAll(
	'nav ul.navigation > li .down-arrow'
)

const selectNav = document.querySelector('aside.sidebar nav')
const MenuItemsParent = document.querySelector('nav ul.navigation')
const lastItem = MenuItemsParent.lastElementChild

if (lastItem.querySelector('.active-link')) {
	selectNav.scrollTop = selectNav.scrollHeight
}

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
		dropDownIcons[index].textContent.trim() === 'arrow_drop_down'
			? 'arrow_drop_up'
			: 'arrow_drop_down'
}
