<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <title>Pendaftaran Berhasil</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #43cea2, #185a9d);
            padding: 1rem;
        }

        .success-container {
            background: #ffffff;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        
        .success-icon {
            font-size: 6rem;
            color: #43cea2;
        }

        span{
            font-weight: 700;
        }
        .btn {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #ffffff;
            padding: 0.5rem 0.7rem;
            border-radius: 6px;
            transition: transform 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="success-container max-w-md">
        <div class="success-icon mb-4">✅</div>
        <h1 class="text-2xl font-semibold mb-2">Pendaftaran Berhasil!</h1>
        <p class="text-gray-700 text-sm mb-6">Terima kasih telah mendaftar.<br> Jangan lupa istirahat, jaga kesehatan.<br>Jomblo juga harus kuat wkwk.<br><span>Sampai Ketemu di Acara</span></p>
        
        <div class="flex justify-center space-x-4">
            <a href="index.php" class="btn">Daftar Lagi</a>
        </div>
    </div>
</body>

</html>
