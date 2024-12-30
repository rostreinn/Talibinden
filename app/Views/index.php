<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e69ef14388.js" crossorigin="anonymous"></script>
    <style>
        /* GENEL TASARIM */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        main {
            margin-top: 80px;
        }

        main.h1, h3 {
            color: #ff9800;
            text-align: center;
            margin-bottom: 20px;
        }

        main.hr {
            border: 1px solid #ddd;
            margin: 40px 0;
        }

        /* HOMEPAGE */
        .homepg {
            text-align: center;
            padding: 40px 20px;
            background: linear-gradient(45deg, #3a3a3a, #555);
            color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-out;
        }

        .homepg h1 {
            font-size: 2.5rem;
        }

        .homepg p {
            font-size: 1.2rem;
        }

        /* YETENEKLER */
        #stills {
            padding: 20px 10px;
        }

        .skills-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s ease;
            text-align: center;
        }

        .skills-card:hover {
            transform: translateY(-10px);
        }

        .skills-icon i {
            margin-bottom: 10px;
            color: #ff9800;
        }

        .skills-card h2 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 10px;
        }

        .skills-card .description {
            font-size: 1rem;
            color: #666;
            margin-top: 10px;
            line-height: 1.6;
        }

        .taltext {
            font-size: 1.5rem;
            text-align: center;
            margin-bottom: 15px;
            animation: slideIn 1s ease-out;
        }

        .skill-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .skill-card:hover {
            transform: translateY(-10px);
        }

        .skill-icon {
            margin-bottom: 15px;
        }

        .skill-icon i {
            transition: color 0.3s ease;
        }

        .skill-card:hover .skill-icon i {
            color: #ff9800;
        }

        .progress {
            height: 18px;
            margin-bottom: 8px;
            max-width: 80%;
            margin-left: auto;
            margin-right: auto;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.5s ease-in-out;
        }

        .progress-bar {
            font-size: 0.9rem;
            line-height: 18px;
            color: white;
            border-radius: 5px;
        }

        .progress.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Çalışmalarım */
        #my-works {
            text-align: center;
        }

        .work-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .work-card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .work-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .work-card .p-6 {
            padding: 20px;
        }

        .work-card h4 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .work-card p {
            color: #666;
            font-size: 0.875rem;
            line-height: 1.5;
        }

        /* Grid düzeni */
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        /* Responsive tasarım */
        @media (max-width: 768px) {
            .work-card {
                margin: 10px;
            }
        }

        /* BACK TO TOP BUTTON */
        #back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #555;
            color: white;
            padding: 10px 15px;
            border-radius: 50%;
            font-size: 20px;
            display: none;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        #back-to-top:hover {
            background: #ff9800;
        }

        /* ANİMASYONLAR */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateX(-100%);
            }
            to {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <?php include('header.php'); ?>

   <section id="home">
        <div class="homepg">
            <h1 id="greeting"></h1>
            <div class="skills-card">
                <div class="skills-icon">
                    <i class="fas fa-user fa-3x text-blue-500"></i>
                </div>
                <h2 class="mb-2">Benim Adım [Adınız]</h2>
                <p class="description">Kendimi web geliştirme ve modern teknolojilerde geliştirdim. Her zaman yeni şeyler öğrenmeye ve projeler üretmeye odaklanırım.</p>
            </div>
        </div>
    </section>

    <hr>

    <section id="stills" class="py-20">
        <h1 class="taltext"><b>Yeteneklerim</b></h1>
        <div class="container mx-auto grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-8 text-center">
        <div class="skill-card">
            <div class="skill-icon">
                <i class="fab fa-php fa-3x text-blue-500"></i>
            </div>
            <div class="progress">
                <div class="progress-bar" style="width: 63%;">PHP</div>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon">
                <i class="fab fa-html5 fa-3x text-orange-500"></i>
            </div>
            <div class="progress">
                <div class="progress-bar bg-success" style="width: 78%;">HTML</div>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon">
                <i class="fab fa-css3-alt fa-3x text-blue-400"></i>
            </div>
            <div class="progress">
                <div class="progress-bar bg-info" style="width: 57%;">CSS</div>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon">
                <i class="fab fa-bootstrap fa-3x text-purple-500"></i>
            </div>
            <div class="progress">
                <div class="progress-bar bg-warning" style="width: 38%;">BootStrap</div>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon">
                <i class="fab fa-vuejs fa-3x text-green-500"></i>
            </div>
            <div class="progress">
                <div class="progress-bar bg-danger" style="width: 17%;">VueJs</div>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon">
                <i class="fab fa-laravel fa-3x text-red-600"></i>
            </div>
            <div class="progress">
                <div class="progress-bar bg-secondary" style="width: 33%;">Laravel</div>
            </div>
        </div>
    </div>
</section>

    <hr>

    <section id="my-works" class="py-20">
        <h3 class="taltext"><b>Çalışmalarım</b></h3>
        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="work-card">
            <img src="" alt="Çalışma 1">
            <div class="p-6">
                <h4 class="text-xl font-semibold mb-3">Proje 1</h4>
                <p class="text-gray-600 text-sm">Bu proje, modern web tasarımı ve geliştirmeyi içeriyor.</p>
            </div>
        </div>
    </section>

    <hr>

    <!-- BACK TO TOP BUTTON -->
    <div id="back-to-top" title="Yukarı Çık">&#8679;</div>

    <!-- FOOTER -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>

    <script>
        // Dinamik Karşılama Mesajı
        const greeting = document.getElementById("greeting");
        const hours = new Date().getHours();
        if (hours < 12) {
            greeting.textContent = "Günaydın,";
        } else if (hours < 18) {
            greeting.textContent = "İyi Günler,";
        } else {
            greeting.textContent = "İyi Akşamlar,";
        }

        // Scroll Animasyonları
        const progressBars = document.querySelectorAll(".progress");
        window.addEventListener("scroll", function () {
            progressBars.forEach((bar) => {
                const rect = bar.getBoundingClientRect();
                if (rect.top < window.innerHeight - 50) {
                    bar.classList.add("visible");
                }
            });
        });

        // Back to Top Button
        const backToTop = document.getElementById("back-to-top");
        window.addEventListener("scroll", function () {
            if (window.scrollY > 150) {
                backToTop.style.display = "block";
            } else {
                backToTop.style.display = "none";
            }
        });

        backToTop.addEventListener("click", function () {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    </script>
</body>
</html>
