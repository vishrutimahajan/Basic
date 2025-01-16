<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['damsid']==0)) {
    header('location:logout.php');
    } else
    
        ?>
        
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Dashboard</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f5f5f5;
                    margin: 0;
                    padding: 0;
                }
        
                .container {
                    max-width: 800px;
                    margin: 50px auto;
                    background-color: white;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
                }
        
                h1 {
                    text-align: center;
                }
        
                .form-container {
                    margin-bottom: 30px;
                }
        
                label {
                    display: block;
                    margin: 10px 0 5px;
                }
        
                input, select, button {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }
        
                button {
                    background-color: #4CAF50;
                    color: white;
                    cursor: pointer;
                }
        
                button:hover {
                    background-color: #45a049;
                }
        
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }
        
                table th, table td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: center;
                }
        
                table th {
                    background-color: #4CAF50;
                    color: white;
                }
        
                .hidden {
                    display: none;
                }
            </style>
        </head>
        <body>
        
            <!-- Login Form -->
            <div class="container" id="loginContainer">
                <h1>Admin Login</h1>
                <form id="loginForm">
                    <label for="username">Username:</label>
                    <input type="text" id="username" placeholder="Enter username" required>
                    
                    <label for="password">Password:</label>
                    <input type="password" id="password" placeholder="Enter password" required>
                    
                    <button type="submit">Login</button>
                </form>
            </div>
        
            <!-- Admin Dashboard -->
            <div class="container hidden" id="adminDashboard">
                <h1>Admin Dashboard</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Hospital Name</th>
                            <th>Patients</th>
                            <th>Accepted Patients</th>
                            <th>Rejected Patients</th>
                        </tr>
                    </thead>
                    <tbody id="hospitalTableBody">
                        <!-- Table rows will be dynamically added here -->
                    </tbody>
                </table>
            </div>
        
            <script>
                // Hardcoded Admin Credentials
                const ADMIN_CREDENTIALS = {
                    username: "admin",
                    password: "password123"
                };
        
                // Login Form and Dashboard Elements
                const loginForm = document.getElementById('loginForm');
                const loginContainer = document.getElementById('loginContainer');
                const adminDashboard = document.getElementById('adminDashboard');
                const hospitalTableBody = document.getElementById('hospitalTableBody');
        
                // Example Data for Hospitals
                const hospitals = [
                    { name: "City Hospital", patients: 100, accepted: 80, rejected: 20 },
                    { name: "Green Valley Hospital", patients: 50, accepted: 40, rejected: 10 },
                    { name: "Sunrise Hospital", patients: 120, accepted: 100, rejected: 20 }
                ];
        
                // Function to Populate the Table
                function populateTable() {
                    hospitalTableBody.innerHTML = ''; // Clear existing rows
                    hospitals.forEach(hospital => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${hospital.name}</td>
                            <td>${hospital.patients}</td>
                            <td>${hospital.accepted}</td>
                            <td>${hospital.rejected}</td>
                        `;
                        hospitalTableBody.appendChild(row);
                    });
                }
        
                // Login Form Submission
                loginForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    
                    const username = document.getElementById('username').value;
                    const password = document.getElementById('password').value;
        
                    if (username === ADMIN_CREDENTIALS.username && password === ADMIN_CREDENTIALS.password) {
                        alert("Login Successful!");
                        loginContainer.classList.add('hidden'); // Hide login form
                        adminDashboard.classList.remove('hidden'); // Show dashboard
                        populateTable(); 
                    } else {
                        alert("Invalid Username or Password");
                    }
                });
            </script>
        
        </body>
        </html>

    
        
            
            

 