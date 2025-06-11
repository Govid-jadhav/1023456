<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
        }

        /* NAVBAR */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: white;
            border-bottom: 1px solid #ddd;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff5b5b;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 1.5rem;
            margin: 0;
            padding: 0;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .navbar .btn {
            background-color: black;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .navbar .btn:hover {
            background-color: #333;
        }

        /* FORM LAYOUT */
        .form-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px);
            padding: 2rem;
        }

        .form-container {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-top: 1rem;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 0.75rem;
            margin-top: 0.3rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        button {
            margin-top: 1.5rem;
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            background-color: black;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #333;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="logo">SAmple</div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Contact</a></li>
        </ul>

    </nav>

    <!-- FORM SECTION -->
    <div class="form-wrapper">
        <div class="form-container">
            <h2>Contact Form</h2>
            <form action="contact-submit.php" method="POST"> <!-- Update the filename -->

                <label for="firstName">First Name *</label>
                <input type="text" id="firstName" name="firstName" required />

                <label for="lastName">Last Name *</label>
                <input type="text" id="lastName" name="lastName" required />

                <label for="mobile">Mobile Number *</label>
                <input type="tel" id="mobile" name="mobilenumber" required />

                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required />

                <label for="address">Address *</label>
                <textarea id="address" name="address" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>