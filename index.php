<?php
if (isset($_COOKIE['personal_id'])) {
    header("Location: profile/profile.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="icon" href="assets/learning_8130157.png">
    <link rel="stylesheet" href="css/header_indeex.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://app.allwidgets.ru/s/cookies/a2be9201-fa65-4a28-a901-271548c4eea6/"></script>
</head>

<body>
    <?php
    include("patch/header_index.php");
    ?>

    <main>
        <script>
            alert("для полного функционала необходимо авторизироватьсяи распределиться в группу");
        </script>
        <div class="container">
            <div class="first-container">
                <div class="card-connect-leessons" id="card-connect-leessons"
                    id="card-progress">
                    <a href="" class="title-link">Подключиться к занятию</a>
                    <img src="../assets/front/Frame 427320097.png" alt=""
                        class="circle-blue">
                </div>
                <div class="container_messanger">
                    <div class="card-video-lessons">
                        <a class="link" href="">Записи занятий</a>
                        <div class="icon_video_lessens reas">
                            <img src="../assets/front/Property 1=lesson.svg"
                                alt="">
                        </div>
                    </div>
                    <div>
                        <div class="card-chat-group" id="card-chat-group">
                            <div class="card-container">
                                <a class="link" href="">Чат группы</a>
                                <div class="icon_video_lessens">
                                    <img src="../assets/front/Property 1=chat.svg"
                                        alt="" class="chat">
                                </div>
                            </div>
                        </div>
                        <div class="card-chat-group">
                            <div class="card-container">
                                <a class="link" href="">Домашнее<br> задание</a>
                                <div class="icon_video_lessens">
                                    <img src="../assets/front/Property 1=document.svg"
                                        alt="" class="homework">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="second-container">
                <div class="card-progress">
                    <div class="statistics">
                        <h2 class="sum">0</h2>
                        <p class="subtitle">Общая сумма баллов за весь период
                            обучения</p>
                    </div>
                    <div class="positions-place">
                        <div class="position-in-group">
                            <p class="text-position">Место в группе</p>
                            <div class="circle-white">
                                <p class="pos-rait">0</p>
                            </div>
                        </div>
                        <div class="position-all-raite">
                            <p class="text-position">Место общ. рейт. </p>
                            <div class="circle-white">
                                <p class="pos-rait">0</p>
                            </div>
                        </div>
                    </div>
                    <img src="../assets/front/Frame 427320099.png" alt=""
                        class="circle-orange">
                </div>
                <div class="card-raite">
                    <div class="card-study-container">
                        <p class="title-raite">Образовательный рейтинг</p>
                        <div class="block-sum">
                            <p class="scores">0</p>
                            <p class="descr">всего</p>
                        </div>
                        <div class="block-procent">
                            <p class="procents">0 <span class="plus-procent">+ % <img
                                        src="../assets/front/Property 1=arrow mini.svg"
                                        alt="" class="up"></span></p>
                            <p class="date">в апреле</p>
                        </div>
                    </div>
                </div>
                <div class="card-raite">
                    <div class="card-active-container">
                        <p class="title-raite">Рейтинг активностей</p>
                        <div class="block-sum">
                            <p class="scores">0</p>
                            <p class="descr">всего</p>
                        </div>
                        <div class="block-procent">
                            <p class="procents">0 <span class="plus-procent">- 0 % <img
                                        src="../assets/front/Property 1=arrow mini.svg"
                                        alt="" class="down"></span></p>
                            <p class="date">в апреле</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="third-container">
                <div class="card-active-raite">
                    <div class="card-achivments">
                        <div class="achivments">
                            <h2 class="achiv-title">Достижения</h2>
                            <p class="achiv-subtitle">Последние достижения</p>
                        </div>
                        <div class="circles-achiv">
                            <div class="circle-achivments"></div>
                            <div class="circle-achivments"></div>
                            <div class="circle-achivments"></div>
                            <div class="circle-achivments"></div>
                            <div class="circle-achivments"></div>
                        </div>
                        <img src="../assets/front/Frame 427320100.png" alt=""
                            class="circle-purple">
                    </div>
                </div>
                <div class="layers-list-achivments">
                    <div class="achiv-month">
                        <div class="achiv-checked">
                            <p class="month">Октябрь</p>
                            <img src="../assets/front/Frame 1935.svg" alt=""
                                class="circle">
                        </div>
                    </div>
                    <div class="achiv-month">
                        <div class="achiv-checked">
                            <p class="month">Ноябрь</p>
                            <img src="../assets/front/Frame 1935.svg" alt=""
                                class="circle">
                        </div>
                    </div>
                    <div class="achiv-month">
                        <div class="achiv-checked">
                            <p class="month">Декабрь</p>
                            <img src="../assets/front/Frame 1935.svg" alt=""
                                class="circle">
                        </div>
                    </div>
                    <div class="achiv-month">
                        <div class="achiv-checked">
                            <p class="month">Январь</p>
                            <img src="../assets/front/Frame 1935.svg" alt=""
                                class="circle">
                        </div>
                    </div>
                    <div class="achiv-month">
                        <div class="achiv-checked">
                            <p class="month">Февраль</p>
                            <img src="../assets/front/Frame 1935.svg" alt=""
                                class="circle">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>