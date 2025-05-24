document.getElementById('login-btn').addEventListener('click', function() {
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;

    fetch('/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email, password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Hide login screen and show app container
            document.getElementById('login-screen').classList.add('hidden');
            document.getElementById('app-container').classList.remove('hidden');
            // Optionally, store user data in localStorage or sessionStorage
        } else {
            alert('Login failed: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred during login.');
    });
    document.getElementById('loginForm').addEventListener('submit', function (event) {
        event.preventDefault();
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
    
        // Simple authentication (replace with actual authentication logic)
        if (username === 'admin' && password === 'password') {
            document.getElementById('loginSection').style.display = 'none';
            document.getElementById('dashboard').style.display = 'block';
            document.getElementById('userName').textContent = username;
        } else {
            alert('Invalid username or password');
        }
    });
    
    document.getElementById('logoutButton').addEventListener('click', function () {
        document.getElementById('dashboard').style.display = 'none';
        document.getElementById('loginSection').style.display = 'block';
        document.getElementById('loginForm').reset();
    });
});
