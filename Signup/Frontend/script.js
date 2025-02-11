document.getElementById('signupForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Here you can add code to handle the form submission, like sending data to a server
    console.log('Name:', name);
    console.log('Email:', email);
    console.log('Password:', password);

    alert('Account created successfully!');
    // Redirect to login page or another page
    window.location.href = 'login.html';

    function openModal(modalId) {
        document.getElementById(modalId).style.display = "block";
    }
    
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
    }
    
});