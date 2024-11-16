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
<?php
session_start();

if (isset($_SESSION['custId'])) {
    $custId = $_SESSION['custId'];
} else {
    $custId = 16;
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


?>

<body class="bg-white">

    <div id="topbar">
        <nav id="1">
            <div class="flex justify-between h-[6rem] px-10 shadow items-center smooth">
                <div class="flex space-x-1 items-center flex-shrink-0 animate-pulse ">
                    <a href="../home/index.html">
                        <img src="logo.png" width="130px" height="130px" class="self-center ml-[-20%] mt-[1%] transform hover:scale-105 transition-transform duration-100" /></a>

                </div>
                <button id="toggleMenu" class="sm:hidden inline-flex items-center justify-center p-2 w-10 h-10 text-sm rounded-lg text-gray-400 transform hover:scale-105 transition-transform duration-100" aria-controls="navbar-hamburger" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>

                <div class="flex space-x-4 items-center hidden sm:flex text-nowrap">
                    <a href="../reservation/index.html" class="px-4 text-red-700 text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 ">สำรองที่นั่ง</a>
                    <a href="../login/login.html" class="text-red-700 text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100">เข้าสู่ระบบ</a>
                    <a href="../signup/signup.html" class="px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">สมัครสมาชิก</a>
                    <div class="divide-x"></div>
                    <a href="../delivery/index.html" class="ml-4 flex justify-center text-center text-bold px-4 py-2 items-center rounded-full text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm bg-gray-50 shadow-white">
                        <svg class="animate-pulse mr-2" fill="#D54224" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="35px" viewBox="0 0 612 612" xml:space="preserve" stroke="#ec2222">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path d="M226.764,375.35c-28.249,0-51.078,22.91-51.078,51.16c0,28.166,22.829,51.078,51.078,51.078s51.078-22.912,51.078-51.078 C277.841,398.26,255.013,375.35,226.764,375.35z M226.764,452.049c-14.125,0-25.54-11.498-25.54-25.541 c0-14.123,11.415-25.539,25.54-25.539c14.124,0,25.539,11.416,25.539,25.539C252.302,440.551,240.888,452.049,226.764,452.049z M612,337.561v54.541c0,13.605-11.029,24.635-24.636,24.635h-26.36c-4.763-32.684-32.929-57.812-66.927-57.812 c-33.914,0-62.082,25.129-66.845,57.812H293.625c-4.763-32.684-32.93-57.812-66.845-57.812c-33.915,0-62.082,25.129-66.844,57.812 h-33.012c-13.606,0-24.635-11.029-24.635-24.635v-54.541H612L612,337.561z M494.143,375.35c-28.249,0-51.16,22.91-51.16,51.16 c0,28.166,22.912,51.078,51.16,51.078c28.166,0,51.077-22.912,51.077-51.078C545.22,398.26,522.309,375.35,494.143,375.35z M494.143,452.049c-14.125,0-25.539-11.498-25.539-25.541c0-14.123,11.414-25.539,25.539-25.539 c14.042,0,25.539,11.416,25.539,25.539C519.682,440.551,508.185,452.049,494.143,452.049z M602.293,282.637l-96.817-95.751 c-6.159-6.077-14.453-9.526-23.076-9.526h-48.86v-18.313c0-13.631-11.004-24.635-24.635-24.635H126.907 c-13.55,0-24.635,11.005-24.635,24.635v3.86L2.3,174.429l177.146,23.068L0,215.323l178.814,25.423L0,256.25l102.278,19.29 l-0.007,48.403h509.712v-17.985C611.983,297.171,608.452,288.796,602.293,282.637z M560.084,285.839h-93.697 c-2.135,0-3.86-1.724-3.86-3.859v-72.347c0-2.135,1.725-3.86,3.86-3.86h17.82c0.985,0,1.971,0.411,2.71,1.068l75.796,72.347 C565.257,281.569,563.532,285.839,560.084,285.839z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        สั่งอาหารทันที
                    </a>
                    <a href="../signup/signup.html" class="px-4 py-2 rounded text-white transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm"></a>
                </div>
            </div>
            <div class="hidden w-full mb-10" id="navbar-hamburger">
                <ul class="flex flex-col font-medium rounded-lg justify-center items-center bg-gray-50">
                    <li>
                        <a href="../reservation/index.html" class="block ml-2 py-2 px-3 text-red-700 hover:text-red-950">สำรองที่นั่ง</a>
                    </li>
                    <li>
                        <a href="../login/login.html" class="block ml-2 py-2 px-3 text-red-700 hover:text-red-950">เข้าสู่ระบบ</a>
                    </li>
                    <li>
                        <a href="../signup/signup.html" class="block ml-2 py-2 px-3 text-red-700 hover:text-red-950">สมัครสมาชิก</a>
                    </li>
                    <li>
                        <a href="../signup/signup.html" class="ml-1 flex text-center text-bold px-4 py-2 items-center rounded-full text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm bg-gray-50 shadow-white">
                            <svg class="animate-pulse mr-2" fill="#ec2222" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="35px" viewBox="0 0 612 612" xml:space="preserve" stroke="#ec2222">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g>
                                        <g>
                                            <path d="M226.764,375.35c-28.249,0-51.078,22.91-51.078,51.16c0,28.166,22.829,51.078,51.078,51.078s51.078-22.912,51.078-51.078 C277.841,398.26,255.013,375.35,226.764,375.35z M226.764,452.049c-14.125,0-25.54-11.498-25.54-25.541 c0-14.123,11.415-25.539,25.54-25.539c14.124,0,25.539,11.416,25.539,25.539C252.302,440.551,240.888,452.049,226.764,452.049z M612,337.561v54.541c0,13.605-11.029,24.635-24.636,24.635h-26.36c-4.763-32.684-32.929-57.812-66.927-57.812 c-33.914,0-62.082,25.129-66.845,57.812H293.625c-4.763-32.684-32.93-57.812-66.845-57.812c-33.915,0-62.082,25.129-66.844,57.812 h-33.012c-13.606,0-24.635-11.029-24.635-24.635v-54.541H612L612,337.561z M494.143,375.35c-28.249,0-51.16,22.91-51.16,51.16 c0,28.166,22.912,51.078,51.16,51.078c28.166,0,51.077-22.912,51.077-51.078C545.22,398.26,522.309,375.35,494.143,375.35z M494.143,452.049c-14.125,0-25.539-11.498-25.539-25.541c0-14.123,11.414-25.539,25.539-25.539 c14.042,0,25.539,11.416,25.539,25.539C519.682,440.551,508.185,452.049,494.143,452.049z M602.293,282.637l-96.817-95.751 c-6.159-6.077-14.453-9.526-23.076-9.526h-48.86v-18.313c0-13.631-11.004-24.635-24.635-24.635H126.907 c-13.55,0-24.635,11.005-24.635,24.635v3.86L2.3,174.429l177.146,23.068L0,215.323l178.814,25.423L0,256.25l102.278,19.29 l-0.007,48.403h509.712v-17.985C611.983,297.171,608.452,288.796,602.293,282.637z M560.084,285.839h-93.697 c-2.135,0-3.86-1.724-3.86-3.859v-72.347c0-2.135,1.725-3.86,3.86-3.86h17.82c0.985,0,1.971,0.411,2.71,1.068l75.796,72.347 C565.257,281.569,563.532,285.839,560.084,285.839z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            สั่งอาหารทันที
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="w-full" style="width: 100vw; height: 20vh;">
        <img src="wallpaper.jpg" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div class="grid grid-cols-1 mt-5">
        <div id="blaktomenu" class="hover:text-red-600 ml-5">
            <a href="menuPage.php" class="">
                <span class="flex ">
                    <svg class="justify-center mt-0.5 mr-1 ring-1 ring-red-500 rounded-full" height="20px" width="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    กลับไปสั่งอาหารเพิ่ม
                </span>
            </a>
        </div>

        <div class="grid grid-cols-1">
            <nav id="2">
                <div class="flex justify-center p-5 pb-5 px-10 items-center pb-2 mb-4 mt-4">
                    <div class="flex space-x-4 items-center">
                        <div class="flex items-center justify-center bg-gray-50 rounded-3xl hidden sm:flex">
                            <div>
                                <button id="delivery-button" onclick="close()" class="flex px-4 py-2 rounded-3xl text-red-700 font-medium text-sm bg-red-500 text-white">
                                    ✔ จัดส่งถึงบ้าน
                                </button>
                            </div>
                            <button id="pickup-button" onclick="close()" class="rounded-3xl px-4 py-2 rounded text-red-700 font-medium text-sm">
                                ✔ รับที่ร้าน
                            </button>
                        </div>

                        <button id="dropdownbutton" data-dropdown-toggle="dropdown" class="flex items-center justify-center rounded-3xl px-4 rounded text-red-700 font-medium text-sm bg-gray-50 " type="button">
                            <svg fill="#D24527" class="size-4 mr-1" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 395.71 395.71" xml:space="preserve">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g>
                                        <path d="M197.849,0C122.131,0,60.531,61.609,60.531,137.329c0,72.887,124.591,243.177,129.896,250.388l4.951,6.738 c0.579,0.792,1.501,1.255,2.471,1.255c0.985,0,1.901-0.463,2.486-1.255l4.948-6.738c5.308-7.211,129.896-177.501,129.896-250.388 C335.179,61.609,273.569,0,197.849,0z M197.849,88.138c27.13,0,49.191,22.062,49.191,49.191c0,27.115-22.062,49.191-49.191,49.191 c-27.114,0-49.191-22.076-49.191-49.191C148.658,110.2,170.734,88.138,197.849,88.138z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <p id="choose" class="text-nowrap p-2">เลือกที่อยู่</p>
                            <svg id="rotateicon" class="rotate-180 ml-10 w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6" style="margin-left: 10px;">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>


                        </button>

                    </div>
                </div>
            </nav>
        </div>
        <script>
            function toggleModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.toggle('hidden');
                modal.setAttribute('aria-hidden', modal.classList.contains('hidden'));
            }
        </script>

        <div id="dropdownmenu" class="flex justify-center items-center z-50 hidden bg-gray-50 rounded-3xl shadow w-44 mb-2 mt-[-10px] max-[640px]:mx-auto max-[640px]:mt-[-20px] mx-auto min-[640px]:mx-[49.5%] min-[640px]:mt-[-20px]">
            <ul class="py-2 text-gray-700 " aria-labelledby="dropdownDefaultButton">
                <li class="">
                    <button onclick="showSecondModal()" class="flex items-center px-4 py-2 text-black rounded-3xl text-red-600 font-bold hover:bg-gray-200 w-44 " style="font-size: 14px;">
                        <svg fill="#D24527" class="mr-2 flex items-center justify-center size-4 mr-1" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 395.71 395.71" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <path d="M197.849,0C122.131,0,60.531,61.609,60.531,137.329c0,72.887,124.591,243.177,129.896,250.388l4.951,6.738 c0.579,0.792,1.501,1.255,2.471,1.255c0.985,0,1.901-0.463,2.486-1.255l4.948-6.738c5.308-7.211,129.896-177.501,129.896-250.388 C335.179,61.609,273.569,0,197.849,0z M197.849,88.138c27.13,0,49.191,22.062,49.191,49.191c0,27.115-22.062,49.191-49.191,49.191 c-27.114,0-49.191-22.076-49.191-49.191C148.658,110.2,170.734,88.138,197.849,88.138z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        ใช้ตำแหน่งปัจจุบัน</button>
                </li>
            </ul>
        </div>
        <div id="dropdownmenu2" class="flex justify-center items-center z-50 hidden bg-gray-50 rounded-3xl shadow w-44 mb-2 mt-[-10px] max-[640px]:mx-auto max-[640px]:mt-[-20px] mx-auto min-[640px]:mx-[49.5%] min-[640px]:mt-[-18px]">
            <ul class="py-2 text-gray-700 " aria-labelledby="dropdownDefaultButton">

                <li>
                    <a onclick="displayBranch()" class="flex items-center px-4 py-2 text-black rounded-3xl text-red-600 font-bold hover:bg-gray-50 w-44" style="font-size: 14px;">
                        <svg fill="#D24527" class="mr-2 flex items-center justify-center size-4 mr-1" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 395.71 395.71" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <path d="M197.849,0C122.131,0,60.531,61.609,60.531,137.329c0,72.887,124.591,243.177,129.896,250.388l4.951,6.738 c0.579,0.792,1.501,1.255,2.471,1.255c0.985,0,1.901-0.463,2.486-1.255l4.948-6.738c5.308-7.211,129.896-177.501,129.896-250.388 C335.179,61.609,273.569,0,197.849,0z M197.849,88.138c27.13,0,49.191,22.062,49.191,49.191c0,27.115-22.062,49.191-49.191,49.191 c-27.114,0-49.191-22.076-49.191-49.191C148.658,150.2,170.734,88.138,197.849,88.138z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                        สาขา ลาดกระบัง</a>
                </li>
            </ul>
        </div>

        <div class="responpick flex items-center justify-center md:hidden lg:hidden rounded-3xl z-50 p-4">
            <div>
                <button id="delivery-button2" class="flex px-4 py-2 rounded-3xl text-red-700 font-medium text-sm bg-red-500 text-white">
                    ✔ จัดส่งถึงบ้าน
                </button>
            </div>
            <div>
                <button id="pickup-button2" class="rounded-3xl px-4 py-2 rounded text-red-700 font-medium text-sm">
                    ✔ รับที่ร้าน
                </button>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toggleMenu = document.getElementById('toggleMenu');
                const navbarHamburger = document.getElementById('navbar-hamburger');

                toggleMenu.addEventListener('click', function() {
                    navbarHamburger.classList.toggle('hidden');
                });
            });
            const deliveryButton = document.getElementById('delivery-button');
            const pickupButton = document.getElementById('pickup-button');
            const deliveryButton2 = document.getElementById('delivery-button2');
            const pickupButton2 = document.getElementById('pickup-button2');
            const dropdownButton = document.getElementById('dropdownbutton');
            const dropdownMenu = document.getElementById('dropdownmenu');
            const dropdownMenu2 = document.getElementById('dropdownmenu2');
            const rotateIcon = document.getElementById('rotateicon');
            const choose = document.getElementById('choose');

            deliveryButton.addEventListener('click', function() {
                dropdownMenu.classList.add('hidden');
                dropdownMenu2.classList.add('hidden');

                this.classList.add('bg-red-500', 'text-white');
                pickupButton.classList.remove('bg-red-500', 'text-white');
                choose.innerText = 'เลือกที่อยู่';

            });

            pickupButton.addEventListener('click', function() {
                dropdownMenu2.classList.add('hidden');
                dropdownMenu.classList.add('hidden');


                this.classList.add('bg-red-500', 'text-white');
                deliveryButton.classList.remove('bg-red-500', 'text-white');
                choose.innerText = 'เลือกสาขา';
            });
            deliveryButton2.addEventListener('click', function() {
                dropdownMenu2.classList.add('hidden');
                dropdownMenu.classList.add('hidden');


                this.classList.add('bg-red-500', 'text-white');
                pickupButton2.classList.remove('bg-red-500', 'text-white');
                choose.innerText = 'เลือกที่อยู่';

            });
            pickupButton2.addEventListener('click', function() {
                dropdownMenu2.classList.add('hidden');
                dropdownMenu.classList.add('hidden');


                this.classList.add('bg-red-500', 'text-white');
                deliveryButton2.classList.remove('bg-red-500', 'text-white');
                choose.innerText = 'เลือกสาขา';

            });

            dropdownButton.addEventListener('click', function() {
                if (choose.innerText === 'เลือกสาขา') {
                    dropdownMenu2.classList.toggle('hidden');

                    if (rotateIcon.style.transform === 'rotate(0deg)') {
                        rotateIcon.style.transform = 'rotate(180deg)';
                    } else {
                        rotateIcon.style.transform = 'rotate(0deg)';
                    }
                } else {
                    dropdownMenu.classList.toggle('hidden');
                    if (rotateIcon.style.transform === 'rotate(0deg)') {
                        rotateIcon.style.transform = 'rotate(180deg)';
                    } else {
                        rotateIcon.style.transform = 'rotate(0deg)';
                    }
                }
            });
        </script>



        <div class="grid justify-center w-[100%] mt-10">
            <div id="display"></div>
            <section class="w-full  mb-[2%] ml-[2%] bg-white rounded-md mr-2 sm:py-8 lg:py-8">
                <div class="grid grid-cols-1 text-gray-900 divide-y divide-gray-900 w-auto mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex  items-center mt-[3%]">
                        <h1 class="text-black"> ตรวจสอบรายการอาหารที่สั่ง </h1>
                    </div>
                    <div class="mt-[2%]">
                        <div class="items-center text-l text-red-700 grid-col-3">
                            <?php
                            if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {

                                $amountPrice = 0;

                                foreach ($_SESSION['basket'] as $index => $item) {
                                    $menuId = $item['menuId'];
                                    $menuName = $item['menuName'];
                                    $menuQuantity = $item['menuQuantity'];

                                    $menuSQL = "SELECT
                                            menuImage,
                                            menuPrice
                                            FROM menu WHERE menuId = $menuId
                                    ";
                                    $ret = $db->query($menuSQL);


                                        $menuRow = $ret->fetchArray(SQLITE3_ASSOC);
                                        $menuImage = $menuRow['menuImage'];
                                        $menuPrice = $menuRow['menuPrice'];


                                        echo "<div class='flex mt-5'>
                                        <div class='flex-shrink-0 text-center mt-10'>$menuQuantity</div>
                                            <img src='$menuImage' class='w-28 m-2' alt=''>
                                            <div class='flex-shrink-0 text-sm mt-8'>$menuName <br><br> ฿$menuPrice.-</div>
                                            </div>
                                            <hr>
                                            ";


                                    $amountPrice += $menuPrice * $menuQuantity;
                                }
                            }
                            ?>


                        </div>

                        <div class="between mt-5">
                            <div class="flex mb-2">
                                <div class="ml-5">ค่าอาหาร</div>
                                <div id="price" class="ml-auto text-center">฿<?php echo number_format($amountPrice, 2); ?></div>
                            </div>
                            <div id="discountDiv" class="flex text-red-500 mb-2">
                                <div class="ml-5">ส่วนลด</div>
                                <div id="price" class="ml-auto text-center">฿<?php 
                                    $discount = $amountPrice * 0.10;
                                    echo number_format($discount, 2); ?></div>
                            </div>

                            <div id="amountMoney" class="flex mb-2">
                                <div class="ml-5">ทั้งหมด</div>
                                <div id="money" class="ml-auto text-center">฿<?php
                                $amountPrice -=$discount;
                                echo number_format($amountPrice, 2); ?></div>
                            </div>

                            <div id="amountDiscount" class="flex mb-2">

                            </div>
                        </div>

                        <hr>

                        <div class="mt-5 mb-3">
                            <label for="payment-method" class="block text-sm font-medium text-black-700">วิธีการชำระเงิน :</label>
                            <select id="payment-method" name="payment-method" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 sm:text-sm">
                                <option value="">เลือกวิธีชำระเงิน</option>
                                <option value="เงินสด">เงินสด</option>
                                <option value="โอนชำระ">โอนชำระ</option>
                            </select>
                            <div id="qrcode" class="text-center"></div>

                        </div>

                        <div class="grid-cols-1 items-center ">
                            <button type="button" onclick="orderConfirm()" class="mt-2 mb-[2%] text-white bg-red-700 hover:bg-red-500 focus:outline-none focus:ring-4 focus:ring-red-500 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                                ยืนยันการสั่งซื้อ
                            </button>
                            </div>
                        </div>
                    </div>
            </section>

        </div>
        <!-- ลูกค้าใส่ที่อยู่ ! -->
        <div id="second-modal" tabindex="-1" aria-hidden="true" class="hidden fixed z-50 justify-center items-center md:inset-0 w-full mx-auto flex justify-center items-center selfs-center">
            <div class="relative p-4 w-full max-w-2xl">
                <div class="relative rounded-3xl shadow-xl shadow-white-300/40">
                    <div class="w-full mx-auto bg-white p-8 rounded-md shadow-md m-2">
                        <h2 class="text-red-500 text-2xl font-semibold mb-6">ข้อมูลติดต่อ</h2>

                        <form>
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-900">ตำแหน่งปัจจุบัน :</label>
                                <p id="location" class="mt-1 p-2 w-full border rounded-md"></p>
                            </div>

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-900">ชื่อ :</label>
                                <input type="name" id="name" name="name" class="mt-1 p-2 w-full border rounded-md">

                                <label for="tel" class="block text-sm font-medium text-gray-900">เบอร์ติดต่อ :</label>
                                <input type="number" id="tel" name="tel" class="mt-1 p-2 w-full border rounded-md">

                                <div class="p-4 flex justify-center items-center ">
                                    <button onclick="displayLocation()" data-modal-hide="default-modal2" type="button" class="text-white hover:bg-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-red-600 mr-4">ยืนยัน</button>
                                    <button data-modal-hide="default-modal2" type="button" onclick="hideSecondModal()" class="text-white hover:bg-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-red-600">ยกเลิก</button>
                                </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        const x = document.getElementById("location");

        function showSecondModal() {
            const secondModal = document.getElementById('second-modal');
            secondModal.classList.remove('hidden');
            secondModal.setAttribute('aria-hidden', false);

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }

        }

        function showPosition(position) {
            x.innerHTML = position.coords.latitude + "," + position.coords.longitude;
        }

        function hideSecondModal() {
            const secondModal = document.getElementById('second-modal');
            secondModal.classList.add('hidden');
            secondModal.setAttribute('aria-hidden', true);
        }
    </script>


</body>

<script>

    function displayLocation() {
        const name = document.getElementById('name').value;
        let location = document.getElementById('location').innerText;
        const tel = document.getElementById('tel').value;

        if (location.trim() === '' || tel.trim() === '') {
            alert('กรุณากรอกข้อมูลให้ครบถ้วน');
            return false;
        }

        console.log(location);
        console.log(tel);

        const display = document.getElementById('display');
        if (display !== null) {
            display.innerHTML = `<div id='displayType' class='text-center text-xl'>ตำแหน่งปัจจุบัน</div>`;
            display.innerHTML += `<div id='displayLocation' class='text-center'>${location}</div>`;
            display.innerHTML += `<div id='displayName' class='text-center'>ชื่อ: ${name}</div>`;
            display.innerHTML += `<div id='displayTel' class='text-center' value='${tel}'>เบอร์โทร: ${tel}</div>`;
        } else {
            console.error("Element with ID 'display' not found");
        }


        const secondModal = document.getElementById('second-modal');
        secondModal.classList.add('hidden');
        secondModal.setAttribute('aria-hidden', true);

    }

    function displayBranch() {
        const display = document.getElementById('display');
        display.innerHTML = `<div id='displayType' class='text-center text-xl'>สาขา</div>`;
        display.innerHTML += `<div id='displayBranch' class='text-center'>ลาดกระบัง</div>`;
    }

    function orderConfirm() {
        const displayType = document.getElementById('displayType');
        let displayTypeValue;
        if (displayType) {
            displayTypeValue = displayType.innerText;
        } else {
            alert("กรุณาเลือกบริการ");
        }

        let paymentMethod = document.getElementById('payment-method').value;
        if (paymentMethod == "") {
            alert("กรุณาเลือกช่องทางการชำระเงิน");
            return false;
        }

        let amountMoney = document.getElementById('money').innerText;
        amountMoney = amountMoney.replace('฿', '');

        const displayLocation = document.getElementById('displayLocation');
        let displayLocationValue;
        if (displayLocation) {
            displayLocationValue = displayLocation.innerText;
        } 

        const displayTel = document.getElementById('displayTel');
        let displayTelValue;
        if (displayTel) {
            displayTelValue = displayTel.innerText.replace('เบอร์โทร: ', '');
        } 

        const displayName = document.getElementById('displayName');
        let displayNameValue;
        if (displayName) {
            displayNameValue = displayName.innerText.replace('ชื่อ: ', '');
        }


        if (displayTypeValue == "สาขา"){
            branch(paymentMethod, amountMoney);
        } else  {
            console.log(displayNameValue);
            console.log(displayLocationValue);
            console.log(displayTelValue);
            console.log(paymentMethod);
            console.log(amountMoney);
            latlong(displayLocationValue, displayTelValue, displayNameValue, paymentMethod, amountMoney);
        }

    }

    function branch(paymentMethod, amountMoney) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'branch.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                alert("คำสั่งซื้อเรียบร้อย");
                 window.location.href = 'fullMenu.php';
            }
        };
        var data = 'paymentMethod=' + paymentMethod + '&amountMoney=' + amountMoney;
        xhr.send(data);
    }

    function latlong(location, tel, name, paymentMethod, amountMoney) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'location.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            alert("คำสั่งซื้อเรียบร้อย");
             window.location.href = 'fullMenu.php';
        }
    };
    var data = 'location=' + location + '&tel=' + tel + '&name=' + name + '&paymentMethod=' + paymentMethod + '&amountMoney=' + amountMoney;
    xhr.send(data);
}

    
</script>

</html>
