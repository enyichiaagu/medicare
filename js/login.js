const passwordInput = document.getElementById('password-input')
const toggleIcon = document.querySelector('#visibility')

toggleIcon.addEventListener('click', () => {
	passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password'
})
