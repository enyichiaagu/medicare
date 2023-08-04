const rows = document.querySelectorAll('table.highlight tbody tr')
const rowsArray = Array.from(rows)

rowsArray.map((row) => {
	row.setAttribute('title', 'Click to view details')
	row.addEventListener('click', ({ currentTarget }) => {
		window.location.href = currentTarget.dataset.href
	})
})
