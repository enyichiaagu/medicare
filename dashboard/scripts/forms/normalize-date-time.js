const selectElements = document.querySelectorAll('form.classic-form select')
const dateElement = document.querySelector('form.classic-form input.date-box')
const timeElement = document.querySelector('form.classic-form input.time-box')

const selectArray = Array.from(selectElements)

selectArray.map((select) => {
	select.addEventListener('change', ({ target }) => {
		if (target.value === '') {
			target.style.color = 'var(--grey)'
			target.style.fontWeight = 'normal'
		} else {
			target.style.color = 'var(--black)'
			target.style.fontWeight = 'bold'
		}
	})
})

if (dateElement) {
	dateElement.style.cursor = 'default'
	dateElement.addEventListener('blur', changeToText)
	dateElement.addEventListener(
		'focus',
		({ target }) => (target.type = 'date')
	)
	if (dateElement.classList.contains('min-today')) {
		const today = new Date()
		const year = today.getFullYear()
		const month = (today.getMonth() + 1).toString().padStart(2, '0')
		const day = today.getDate().toString().padStart(2, '0')
		dateElement.min = `${year}-${month}-${day}`
	}
}

if (timeElement) {
	timeElement.style.cursor = 'default'
	timeElement.addEventListener(
		'focus',
		({ target }) => (target.type = 'time')
	)
	timeElement.addEventListener('blur', changeToText)
}

function changeToText({ target }) {
	target.value === '' && (target.type = 'text')
}
