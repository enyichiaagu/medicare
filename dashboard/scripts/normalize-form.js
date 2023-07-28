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
	dateElement.addEventListener('blur', changeToText)
	dateElement.addEventListener(
		'focus',
		({ target }) => (target.type = 'date')
	)
}

if (timeElement) {
	timeElement.addEventListener(
		'focus',
		({ target }) => (target.type = 'time')
	)
	timeElement.addEventListener('blur', changeToText)
}

function changeToText({ target }) {
	target.value === '' && (target.type = 'text')
}
