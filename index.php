<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Landing Page</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Navbar */
        .navbar {
            background-color: #fff;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            position: sticky;
            top: 0;
            z-index: 100;
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
            transition: color 0.3s ease;
        }

        .navbar ul li a:hover {
            color: #ff5b5b;
        }

        /* Hero Section */
        .hero {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 90vh;
            text-align: center;
            padding: 2rem;
            background: linear-gradient(to right, #fceabb, #f8b500);
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.25rem;
            max-width: 600px;
        }

        .hero .cta {
            margin-top: 2rem;
            padding: 0.75rem 1.5rem;
            background-color: #ff5b5b;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .hero .cta:hover {
            background-color: #e14e4e;
        }

        @media (max-width: 600px) {
            .navbar ul {
                flex-direction: column;
                align-items: flex-start;
            }

            .hero h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<?php if (isset($_GET['success']) && $_GET['success'] == "1"): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Submitted!',
                text: 'Your form has been submitted successfully.',
                confirmButtonText: 'OK'
            });
        });
    </script>
<?php endif; ?>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">MySite</div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="contact_page.php">Contact</a></li>
            <a href="view-data.php">View Submissions</a>

        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Welcome to MySite</h1>
        <p>Your one-stop solution for awesome web experiences. Clean, modern, and mobile-friendly.</p>
        <button class="cta">Get Started</button>
    </section>

</body>

</html>