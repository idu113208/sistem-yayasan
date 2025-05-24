const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

app.use(bodyParser.json());

// Mock user data
const users = [
    { email: 'yohaneskalakmabin0@gmail.com', password: 'password123', role: 'admin' },
    { email: 'staff@gmail.com', password: 'password123', role: 'staff' }
];

app.post('/api/login', (req, res) => {
    const { email, password } = req.body;
    const user = users.find(u => u.email === email && u.password === password);

    if (user) {
        res.json({ success: true, user });
    } else {
        res.json({ success: false, message: 'Invalid email or password' });
    }
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});