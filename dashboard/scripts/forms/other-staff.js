const selectUnit = document.querySelector('select#unit')
const selectPosition = document.querySelector('select#position')

const defaultSelectPosition = selectPosition.innerHTML

const units = [
	{
		unitName: 'opd',
		positions: ['Receptionist'],
	},
	{
		unitName: 'management',
		positions: ['Dashboard Administrator'],
	},
	{
		unitName: 'pharmacy',
		positions: [
			'Pharmacist',
			'Pharmacy Intern',
			'Pharmacy Operations Manager',
		],
	},
	{
		unitName: 'nursing',
		positions: ['Nurse', 'Auxillary Nurse'],
	},
	{
		unitName: 'physician',
		positions: ['Doctor'],
	},
	{
		unitName: 'lab',
		positions: ['Lab Technician'],
	},
	{
		unitName: 'bursary',
		positions: ['Head Accountant'],
	},
]

selectUnit.addEventListener('change', ({ target }) => {
	let htmlOptions = ''

	const filteredUnits = units.filter((unit) => unit.unitName === target.value)
	if (filteredUnits.length === 1) {
		htmlOptions = filteredUnits[0].positions.reduce(
			(accumulator, current) => {
				return (
					accumulator +
					`<option value='${current}'>${current}</option>`
				)
			},
			''
		)
	}
	selectPosition.innerHTML = defaultSelectPosition + htmlOptions
})
