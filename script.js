document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const addPasswordForm = document.getElementById('addPasswordForm');
    const passwordTable = document.getElementById('passwordTable');
    const errorMessage = document.getElementById('errorMessage');
    const loginContainer = document.getElementById('loginContainer');
    const mainContainer = document.getElementById('mainContainer');
    
    const masterPassword = 'master123'; // Set the master password to 'master123'
    const passwordInput = document.getElementById('password');

    
    // Simulated password storage (in-memory)
    const passwords = [];
    
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const inputPassword = document.getElementById('masterPassword').value;
        
        if (inputPassword === masterPassword) {
            loginContainer.style.display = 'none';
            mainContainer.style.display = 'block';
        } else {
            errorMessage.textContent = 'Invalid password. Please try again.';
        }
    });
    
    addPasswordForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const siteName = document.getElementById('siteName').value;
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        
        const newPassword = { siteName, username, password };
        passwords.push(newPassword);
        displayPasswords();
        
        // Clear form fields
        addPasswordForm.reset();
    });
    
    function displayPasswords() {
        // Clear the table before displaying
        passwordTable.innerHTML = `
            <tr>
                <th>Site Name</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
        `;
        
        passwords.forEach((password) => {
            const row = passwordTable.insertRow();
            const cell1 = row.insertCell(0);
            const cell2 = row.insertCell(1);
            const cell3 = row.insertCell(2);
            
            cell1.textContent = password.siteName;
            cell2.textContent = password.username;
            cell3.textContent = password.password;
        });
    }
});
