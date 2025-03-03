<html>

<head>
    <link rel="stylesheet" href="../css/header_indeex.css">
</head>

<body>
    <header>
        <div class="container--header">
            <div class="contant-user">
                <div class="avatar" id="avatar">
                    <img src="assets/icon/avatar-body.png" alt="аватар">
                </div>
                <div class="user">
                    <span>Аноним</span>
                    <span>ПАЗЛ/КОД</span>
                </div>
                <div class="Group">
                </div>
            </div>
            <div class="Group-content_vibor">
                <button class="first-group">Не распределён</button>
            </div>
            <div class="burger-wrapper burger" id="burger">
                <div></div>
                <div></div>
            </div>
            <div class="Vhod" id="menu">
                <form action="application/registration.php">
                    <label>
                        <button class="index-first_button" href="application/registration.php">Регистрация</button>
                    </label>
                    <form action="application/auth.php">
                        <label>
                            <button class="index-second_button" href="application/auth.php">Вход</button>
                        </label>
                    </form>
            </div>
        </div>
        <script>
            const burger = document.getElementById('burger');
            const menu = document.getElementById('menu');

            function toggleMenu() {
                menu.classList.toggle('show');
                burger.classList.toggle('active');
            }
            burger.addEventListener('click', function(event) {
                event.stopPropagation();
                toggleMenu();
            });
            document.addEventListener('click', function(event) {
                if (menu.classList.contains('show') && !menu.contains(event.target) && !burger.contains(event.target)) {
                    menu.classList.remove('show');
                    burger.classList.remove('active');
                }
            });
        </script>
    </header>
</body>

</html>