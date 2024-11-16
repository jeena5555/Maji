<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <style>
        <style>
        html {
            scroll-behavior: smooth;
        }

        .sidebar-container {
            width: 100%;
            position: fixed;
            background-color: rgba(0, 0, 0, 0.077);
            backdrop-filter: blur(12px);
        }

        .type {
            overflow: hidden;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: 0.10em;
            animation: typing 8s steps(1200, end) infinite;
        }

        @keyframes typing {
            0% {
                opacity: 0;
                width: 0;
            }

            25% {
                opacity: 1;
                width: 100%;
            }

            50% {
                opacity: 1;
                width: 100%;
            }

            80% {
                opacity: 1;
                width: 100%;
            }

            100% {
                opacity: 0;
                width: 100%;
            }
        }
        html {
            scroll-behavior: smooth;
        }

    </style>
</head>

<body  style="
      font-family: Prompt, sans-serif;
      font-weight: 300;
      font-style: normal;
    ">
    <div class="sidebar text-white  text-center z-40 absolute inset-0 shadow-red-500/50">
        <nav id="1" class="backdrop-blur-md">
            <div class="flex justify-between h-[6rem] px-10 shadow items-center smooth">
                <div class="flex space-x-1 items-center flex-shrink-0 animate-pulse ">
                    <a href="../home/index.html">
                        <img src="logo.png" width="130px" height="130px"
                            class="self-center ml-[-20%] mt-[1%] transform hover:scale-105 transition-transform duration-100" /></a>

                </div>
                <button id="toggleMenu"
                    class="sm:hidden inline-flex items-center justify-center p-2 w-10 h-10 text-sm rounded-lg text-gray-400 transform hover:scale-105 transition-transform duration-100"
                    aria-controls="navbar-hamburger" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="flex space-x-6 items-center hidden sm:flex text-nowrap">
                        <a href="../menu/fullMenu.php"
                        class="px-4 text-white text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 ">เมนู</a>
                    <a href="../reservation/index.php"
                        class="px-4 text-white text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 ">สำรองที่นั่ง</a>
                    <div
                        class="text-white text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100">
                        <button
                            class="text-white text-sm transform hover:scale-[105%] hover:text-red-500 transition-transform duration-100"
                            type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                            aria-controls="drawer-example">
                            รีวิว
                        </button>
                    </div>
					<a href="../../index.php"
                    class="flex px-4 py-2 rounded text-white transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ออกจากระบบ
                    <svg class="ml-3" fill="currentColor"  height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 384.971 384.971" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g id="Sign_Out"> <path d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03 C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03 C192.485,366.299,187.095,360.91,180.455,360.91z"></path> <path d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279 c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179 c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z"></path> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> </g></svg>
                    </a>
                </div>
            </div>
            <div class="hidden w-full" id="navbar-hamburger">
                <ul class="flex flex-col font-medium rounded-lg justify-center items-center backdrop-blur-md">
                    <li>
                    <a href="../menu/fullMenu.php"
                        class="block ml-2 py-2 px-3 text-white hover:text-red-95">เมนู</a>
                    </li>
                    <li>
                        <a href="../reservation/index.php"
                            class="block ml-2 py-2 px-3 text-white hover:text-red-950">สำรองที่นั่ง</a>
                    </li>
                    <li>
                        <button class="block ml-2 py-2 px-3 text-white hover:text-red-950" type="button"
                            data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                            aria-controls="drawer-example">
                            รีวิว
                        </button>
                    </li>
                    <li>
                    <button class="block ml-2 py-2 px-3 text-white hover:text-red-950" type="button"
                            data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                            aria-controls="drawer-example">
                            <a href="../../index.php"
                        class="font-medium flex px-4 py-2 rounded text-white transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ออกจากระบบ
                        </a>
                        </button>

                    </li>
                </ul>
            </div>
        </nav>

        <div id="drawer-example"
            class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 "
            tabindex="-1" aria-labelledby="drawer-label">
            <h5 id="drawer-label" class="inline-flex items-center mb-4 text-base text-red-700 font-semibold"><svg
                    class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>รีวิว</h5>
            <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
                class="text-gray-400 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>

            <form class="" method="post">
                <div class="flex items-center px-3 py-2 rounded-lg">
                    <textarea id="chat" rows="1"
                        class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-full border border-gray-300"
                        placeholder="เขียนข้อความ"></textarea>
                    <button type="submit" onclick="sendfeedback();" class="inline-flex justify-center p-2  rounded-full cursor-pointer">
                        <svg class="w-5 h-5 rotate-90 rtl:-rotate-90 text-red-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                        </svg>
                        <span class="sr-only">Send message</span>
                    </button>
                </div>
            </form>
            <hr class="h-px my-8 bg-black">
                        <?php
            // Path to SQLite database file
            $dbPath = "../../test.db";

            try {
                // Connect to SQLite database
                $pdo = new PDO("sqlite:$dbPath");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Prepare SQL statement
                $sql = "SELECT content, feedback_date FROM feedback";
                $stmt = $pdo->query($sql);

                // Fetch all rows as an associative array
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Iterate through the fetched data and display it
                foreach ($rows as $row) {
                    $content = $row['content'];
                    $datefromdb = $row['feedback_date'];
                    $timestamp = strtotime($datefromdb);
                    $thai_months = array(
                        '01' => 'มกราคม',
                        '02' => 'กุมภาพันธ์',
                        '03' => 'มีนาคม',
                        '04' => 'เมษายน',
                        '05' => 'พฤษภาคม',
                        '06' => 'มิถุนายน',
                        '07' => 'กรกฎาคม',
                        '08' => 'สิงหาคม',
                        '09' => 'กันยายน',
                        '10' => 'ตุลาคม',
                        '11' => 'พฤศจิกายน',
                        '12' => 'ธันวาคม'
                    );
                    $day = date('j', $timestamp);
                    $month = $thai_months[date('m', $timestamp)];
                    $year = date('Y', $timestamp);
                    $date = $day . ' ' . $month . ' ' . ($year + 543);

                    echo '
                        <article class="p-6 text-base bg-white">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                        <img class="mr-2 w-6 h-6 rounded-full"
                                            src="https://images.nightcafe.studio//assets/profile.png?tr=w-1600,c-at_max">
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <time pubdate datetime="2022-02-08">'.$date.'</time>
                                    </p>
                                </div>
                            </footer>
                            <p class="text-gray-500 text-left">'.$content.'</p>
                        </article>';
                }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>

        </div>
    </div>

    <video src="maji.mp4" autoplay loop muted class="w-full h-full object-cover" style="
        position: fixed;
        top: 0;
        left: 0;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
      "></video>

    </div>

    <div class="text-white text-center z-20 absolute inset-0 flex justify-center items-center shadow-red-500/50">
        <p
            class="type max-[640px]:text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl bg-gradient-to-r text-center bg-gradient-to-r text-transparent bg-clip-text from-red-200 to-red-400 ">
            ยินดีต้อนรับสู่<br /><span class="sm:text-7xl md:text-9xl lg:text-11xl xl:text-13xl">มาจิ
            </span>
        </p>
    </div>

    <div class="flex justify-center items-center mt-[-5%]">
        <div id="header-service-type-button" class="header-service-type-button-group delivery" ng-class="deliveryType">
        </div>
    </div>





    <script>
        function sendfeedback() {
            var feedbackText = document.getElementById("chat").value;
            if (feedbackText.trim() == "") {
                alert("โปรดกรอกข้อความ");
                return;
            }

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.reload();
                }
            };

            xhttp.open("POST", "feedback.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("feedbackText=" + feedbackText );

        }

        document.addEventListener('DOMContentLoaded', function () {
            const toggleMenu = document.getElementById('toggleMenu');
            const navbarHamburger = document.getElementById('navbar-hamburger');

            toggleMenu.addEventListener('click', function () {
                navbarHamburger.classList.toggle('hidden');
            });
        });
    </script>

</body>

</html>
