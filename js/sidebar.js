const dropDownOptions = document.querySelectorAll('nav ul.navigation > li')

const dropDownsToArray = Array.from(dropDownOptions)

const filteredOptions = dropDownsToArray.filter((option) =>
	option.querySelector('.down-arrow')
)

filteredOptions.forEach((element) => {
	element.addEventListener('click', toggleSubMenu)
})

function toggleSubMenu({ currentTarget }) {
	const subMenuBlock = currentTarget.querySelector('.sub-menu-items')
	subMenuBlock.classList.toggle('sub-menu-open')
}

// const ButtonsToArray = Array.from(dropDownButtons)

// const optionsArray = ButtonsToArray.map(
// 	(option) => option.parentElement.parentElement
// )

// console.log(dropDownOptions[0].parentNode)
// console.log(dropDownOptions[1].parentNode)
// console.log(dropDownOptions[2].parentNode)
