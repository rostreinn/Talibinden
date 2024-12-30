<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
           /* FOOTER TASARIMI */
/* FOOTER TASARIMI */
.footer {
    background: rgba(0, 0, 0, 0.6); /* Yarı saydam arka plan */
    color: white;
    padding: 20px;
    text-align: center;
    position: fixed;
    bottom: -100px; /* Varsayılan olarak gizli */
    left: 0;
    width: 100%;
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.5);
    transition: bottom 0.5s ease-in-out;
    z-index: 1000;
}

.footer a {
    color: white;
    margin: 0 10px;
    text-decoration: none;
    font-size: 1.3rem;
    transition: color 0.3s ease-in-out, transform 0.2s ease-in-out;
}

.footer a:hover {
    color: #ff9800;
    transform: scale(1.1);
}

.footer.show {
    bottom: 0; /* Aşağı kaydırınca footer görünür olacak */
}


.footer a:hover {
    color: #ff9800;
    transform: scale(1.2);
}

.copy {
    margin-top: 1px;
    font-size: 0.9rem;
    color: #ccc;
    flex: 1 1 100%;
    text-align: center;
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

.footer {
    animation: fadeIn 1s ease-out;
}

    </style>
    
</head>
<body>
<footer class="footer">
            <div class="footer-left">
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fa-regular fa-envelope"></i></a>
                <a href="#"><i class="fa-brands fa-github"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            </div>
            <p class="copy">&copy; Example. Tüm hakları saklıdır.</p>
        </footer>

        <script>
    document.addEventListener("scroll", function () {
        const footer = document.querySelector(".footer");
        const scrollHeight = window.scrollY + window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight;

        if (scrollHeight >= documentHeight - 50) {
            footer.classList.add("show");
        } else {
            footer.classList.remove("show");
        }
    });
</script>

</body>
</html>