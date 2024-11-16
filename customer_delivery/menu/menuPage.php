<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <style>
        body {
            font-family: Prompt, sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .menu-item {
            width: 20%;
            margin: 2rem;
            padding: 1rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            align-items: center;
            transition: transform 0.3s ease-in-out;
        }

        .menu-item img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .menu-item:hover {
            transform: scale(1.05);
        }

        @media (min-width: 375px) {
            .md\:inset-0 {
                inset: 0;
            }
        }
    </style>
    <script src="fetchmainNav.js"></script>
    <script src="fetchNavbar.js"></script>
    <script src="fetchBasket.js"></script>


</head>

<body class="bg-white">

    <div id="topbar">
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
                        class="px-4 text-red-500 text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 ">เมนู</a>
                        <a href="../reservation/index.php"
                        class="px-4 text-red-500 text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 ">ประวัติ</a>
                    <a href="../reservation/index.php"
                        class="px-4 text-red-500 text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 ">สำรองที่นั่ง</a>
                    <div
                        class="text-red-500 text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100">
                        <button
                            class="text-red-500 text-sm transform hover:scale-[105%] hover:text-red-500 transition-transform duration-100"
                            type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                            aria-controls="drawer-example">
                            รีวิว
                        </button>
                    </div>
					<a href="../../index.php"
                    class="flex px-4 py-2 rounded text-red-500 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ออกจากระบบ
                    <svg class="ml-3" fill="currentColor"  height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 384.971 384.971" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g id="Sign_Out"> <path d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03 C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03 C192.485,366.299,187.095,360.91,180.455,360.91z"></path> <path d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279 c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179 c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z"></path> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> </g></svg>
                    </a>
                </div>
            </div>
            <div class="hidden w-full" id="navbar-hamburger">
                <ul class="flex flex-col font-medium rounded-lg justify-center items-center backdrop-blur-md">
                    <li>
                    <a href="../menu/fullMenu.php"
                        class="block ml-2 py-2 px-3 text-red-500 hover:text-red-95">เมนู</a>
                    </li>
                    <li>
                    <a href="../orderHistoryCustomer/orderHistory.php"
                        class="block ml-2 py-2 px-3 text-red-500 hover:text-red-95">ประวัติ</a>
                    </li>
                    <li>
                        <a href="../reservation/index.php"
                            class="block ml-2 py-2 px-3 text-red-500 hover:text-red-950">สำรองที่นั่ง</a>
                    </li>
                    <li>
                        <button class="block ml-2 py-2 px-3 text-red-500 hover:text-red-950" type="button"
                            data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                            aria-controls="drawer-example">
                            รีวิว
                        </button>
                    </li>
                    <li>
                    <button class="block ml-2 py-2 px-3 text-red-500 hover:text-red-950" type="button"
                            data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                            aria-controls="drawer-example">
                            <a href="../../index.php"
                        class="font-medium flex px-4 py-2 rounded text-red-500 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">ออกจากระบบ
                        </a>
                        </button>

                    </li>
                </ul>
            </div>
        </nav>
    <div class="w-full" style="width: 100vw; height: 20vh;">
        <img src="wallpaper.jpg" style="width: 100%; height: 100%; object-fit: cover;">
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleMenu = document.getElementById('toggleMenu');
            const navbarHamburger = document.getElementById('navbar-hamburger');

            toggleMenu.addEventListener('click', function() {
                navbarHamburger.classList.toggle('hidden');
            });
        });
    </script>
    
    </div>
    <div class="flex justify-center">
        <div id="navbar" class="flex text-nowrap p-6 z-10 overflow-x-auto ml-[10%] mr-[10%]  "></div>
    </div>
    <p id="demo" class="text-black"></p>

    <div class="grid w-full h-screen sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-4">
        <div class="md:col-span-3 sm:col-span-4 items-center justify-center">

            <?php
            if (isset($_GET['menuTypeId'])) {

                $menuTypeId = $_GET['menuTypeId'];
            } else {
                $menuTypeId = 6;
            }

            class MyDB extends SQLite3 {
                function __construct() {
                   $this->open('../../test.db');
                }
             }

             // 2. Open Database
             $db = new MyDB();
             if(!$db) {
                echo $db->lastErrorMsg();
             }

            $sql = "SELECT * FROM menu WHERE menuTypeID = $menuTypeId;";
            $ret = $db->query($sql);
            echo '<form  method="get" class="grid place-content-center mr-[8%] ml-[8%] sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-1 mt-[5%]"> ';

            //if (mysqli_num_rows($result) > 0) {
                while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                    $menuId = $row['menuId'];
                    $menuImage = $row['menuImage'];
                    $menuName = $row['menuName'];
                    $menuDescription = $row['menuDescription'];
                    $menuPrice = $row['menuPrice'];
                    $menuTime = $row['menuTime'];

                    echo '<div class="menu-item w-[75%] h-70 content-center text-pretty mt-[3%] bg-white border border-gray-200 rounded-lg">
                         <div class="flex justify-between"> 
                            <p class="text-black text-sm text-pretty"> </p>
                            <p class="text-red-500 text-sm text-pretty">' . $menuTime . ' นาที</p>
                         
                         </div>   
                            <img class="h-30 object-cover mb-2" src="' . $menuImage . '" alt="' . $menuName . '">
                            <p class="text-black text-pretty">' . $menuName . '</p>
                            <p class="text-amber-500 text-sm text-pretty">' . $menuDescription . '</p>
                            <p class="text-black mt-2">' . '฿' . $menuPrice . '.-</p>
                            <button type="submit" onclick="addBasket(' . $menuId . ',\'' . $menuName . '\')" name="order_menu" class="mt-2 text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-900 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                                สั่งอาหาร
                            </button>
                        </div>';
                }
            //} else {
            //    echo "0 results";
            //}
            echo "</form>";

            // Close connection
            $db->close();
            ?>

        </div>
        <div class="w-full flex justify-center mb-4 p-10">
            <div id="basket" class="justify-center"></div>
        </div>
    </div>

</body>

<script>
    function addBasket(menuId, menuName) {
        var menuQuantity = prompt("กรุณากรอกจำนวนเมนู " + menuName);

        if (menuQuantity !== null && !isNaN(menuQuantity) && menuQuantity > 0) {
            updateSesstionBasket(menuId, menuName, menuQuantity);
            alert("เพิ่ม" + menuQuantity + "จำนวนของเมนู" + menuName + " ลงตะกร้าเรียบร้อย");
        } else {
            alert("กรุณากรอกจำนวนเมนู");
        }
    }

    function updateSesstionBasket(menuId, menuName, menuQuantity) {
        console.log(menuId);
        console.log(menuName);
        console.log(menuQuantity);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'updateSessionBasket.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText.trim();
                console.log(result);
                location.reload();
            }
        };
        xhr.send('menuId=' + menuId + '&menuName=' + menuName + '&menuQuantity=' + menuQuantity);
    }
</script>




</html>
