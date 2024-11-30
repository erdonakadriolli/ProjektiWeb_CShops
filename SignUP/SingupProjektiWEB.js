function validateForm(event) {
  event.preventDefault();
  
  const fullName = document.getElementById('fullName');
  const email = document.getElementById('email');
  const password = document.getElementById('password');
  
  clearErrors();
  
  let isValid = true;
  
  if (fullName.value.trim().length < 3) {
      showError(fullName, 'Emri duhet të ketë të paktën 3 karaktere');
      isValid = false;
  }
  
  if (!isValidEmail(email.value)) {
      showError(email, 'Ju lutem vendosni një email të vlefshëm');
      isValid = false;
  }
  
  if (password.value.length < 6) {
      showError(password, 'Fjalëkalimi duhet të ketë të paktën 6 karaktere');
      isValid = false;
  }
  
  if (isValid) {
      console.log('Forma u dërgua me sukses!');
      alert('Llogaria u krijua me sukses!');
      document.getElementById('signupForm').reset();
  }
  
  return false;
}

function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function showError(input, message) {
  input.classList.add('error');
  const errorDiv = document.createElement('div');
  errorDiv.className = 'error-message';
  errorDiv.innerText = message;
  input.parentNode.appendChild(errorDiv);
}

function clearErrors() {
  
  const inputs = document.querySelectorAll('.error');
  inputs.forEach(input => input.classList.remove('error'));
  
  const errorMessages = document.querySelectorAll('.error-message');
  errorMessages.forEach(error => error.remove());
}
