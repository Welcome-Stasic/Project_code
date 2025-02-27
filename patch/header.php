<html>

<head>

</head>

<body>
    <header>
        <div class="container--header">
            <div class="contant-user">
                <div class="avatar" id="avatar">
                    <img src="../assets/icon/avatar-body.png" alt="аватар">
                </div>
                <div class="user">
                    <span><?php echo htmlspecialchars($_COOKIE['username']) . " " . htmlspecialchars($_COOKIE['surname']) ?></span>
                    <span>ПАЗЛ/КОД</span>
                </div>
                <div class="Group">
                </div>
            </div>
            <div class="content-vibor_wrapper">
                <select>
                    <option>Кф4</option>
                    <option>Кб5</option>
                </select>
            </div>
            <div class="Group-content_vibor">
                <button class="first-group">Кф4</button>
                <img src="../assets/icon/line.png" alt="выбор" width="8px"
                    height="8px">
                <button class="second-group">Кб5</button>
            </div>
            <div class="burger-wrapper burger" id="burger">
                <div></div>
                <div></div>
            </div>
            <div class="content-wrapper_menu menu" id="menu">
                <nav>
                    <a href="../profile/edit.php">Редактировать профиль</a>
                    <a href="../profile/members.php">Найти друзей</a>
                </nav>
                <form action="../application/out.php">
                    <label>
                        <button href="../application/out.php">Выход</button>
                    </label>
                </form>
                </form>
            </div>
        </div>
        <script>
            const burger = document.getElementById('burger');
            const menu = document.getElementById('menu');
            const avatar = document.getElementById('avatar');
            avatar.addEventListener('click', function() {
                window.location.href = 'profile.php';
            });

            function toggleMenu() {
                menu.classList.toggle('show');
                burger.classList.toggle('active');
            }
            burger.addEventListener('click', function(event) {
                event
                    .stopPropagation();
                toggleMenu();
            });
            document.addEventListener('click', function(event) {
                if (menu.classList.contains('show') && !menu.contains(
                        event.target) && !burger.contains(event
                        .target)) {
                    menu.classList.remove('show');
                    burger.classList.remove('active');
                }
            });
        </script>
    </header>
</body>

</html>