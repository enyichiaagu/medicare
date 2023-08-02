const rows = document.querySelectorAll('tr.click-item')
const rowsArray = Array.from(rows)

rowsArray.map((row) => {
	row.addEventListener('click', ({ currentTarget }) => {
		const href = currentTarget.dataset.href
		window.location.href = href
	})
})
