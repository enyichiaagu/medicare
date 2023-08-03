const rows = document.querySelectorAll('tr.click-item')
const rowsArray = Array.from(rows)

rowsArray.map((row) => {
	row.addEventListener('click', ({ currentTarget }) => {
		window.location.href = currentTarget.dataset.href
	})
})
