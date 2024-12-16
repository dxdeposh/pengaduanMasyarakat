<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>

    <!-- Link to Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">

    <!-- Link to FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- AOS Animation Library -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* Background effect with parallax */
        .bg-welcome {
            background-image: url('{{ asset('images/bgwel.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            filter: brightness(60%);
        }

        /* Centered content */
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            color: white;
            position: relative;
            z-index: 2;
        }

        /* Full-screen overlay */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .btn {
            transition: transform 0.4s ease, background-color 0.4s ease, box-shadow 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Custom font sizes and animation */
        .headline {
            font-size: 4rem;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .sub-headline {
            font-size: 1.25rem;
            margin-top: 20px;
        }
    </style>
</head>

<body class="bg-welcome">

    <!-- Overlay for darkening the background -->
    <div class="overlay"></div>

    <!-- Centered content -->
    <div class="content" data-aos="fade-up">
        <div>
            <!-- Main Headline -->
            <h1 class="headline" data-aos="fade-in" data-aos-duration="1500">
                Selamat datang di SIPMA 👋🏼
            </h1>

            <!-- Sub-headline -->
            <p class="sub-headline text-xl mb-6" data-aos="fade-in" data-aos-duration="2000">
                Laporkan Masalah, Wujudkan Solusi.
            </p>

            <!-- Login Button -->
            <a href="{{ route('login') }}"
                class="btn bg-blue-500 text-white px-8 py-4 rounded-full shadow-xl inline-flex items-center mb-4 transform hover:bg-blue-400 hover:text-white hover:bg-opacity-100"
                data-aos="zoom-in" data-aos-duration="1200">
                <i class="fas fa-sign-in-alt mr-3"></i> Login
            </a>

            <!-- Register Button -->
            <a href="{{ route('register') }}"
                class="btn bg-green-500 text-white px-8 py-4 rounded-full shadow-xl inline-flex items-center transform hover:bg-green-400 hover:text-white hover:bg-opacity-100"
                data-aos="zoom-in" data-aos-duration="1500">
                <i class="fas fa-user-plus mr-3"></i> Register
            </a>
        </div>
    </div>

    <!-- AOS Animation Script -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
