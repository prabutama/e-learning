<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: /login');
}

$name = $_SESSION['name'];
$role = $_SESSION['role'];
$current_url = $_SERVER['REQUEST_URI'];

?>

<style>
    .active {
        background-color: #fff;
        color: #374151;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1),
            0 1px 3px rgba(0, 0, 0, 0.08);

    }
</style>

<div class="ps-10">
    <div class="relative bg-gray-100 b flex h-full w-full flex-col text-blue-gray-700 p-4 pb-0 justify-around rounded-xl">
        <div>
            <div class="p-4 mb-2 border-b-2 border-blue-gray-800">
                <div class="flex gap-3 items-center text-blue-gray-800">
                    <i class="bi bi-person-circle text-4xl"></i>
                    <div>
                        <h1 class="text-md font-semibold"><?php echo ucwords($name) ?></h1>
                        <p class="text-sm font-semibold"><?php echo ucwords($role) ?></p>
                    </div>
                </div>
            </div>
            <nav class="flex min-w-[240px] flex-col gap-1 p-2 font-sans text-base font-semibold text-blue-gray-700">
                <a href="/dashboard" role="button" class="flex items-center w-full p-3 leading-tight transition-all rounded-xl outline-none text-start <?php echo ($current_url == '/dashboard') ? 'active' : ''; ?>">
                    <div class="grid mr-4 place-items-center">
                        <i class="bi bi-house text-lg"></i>
                    </div>
                    Beranda
                </a>
                <a href="/dashboard/tugas" role="button" class="flex items-center w-full p-3 leading-tight transition-all rounded-xl outline-none text-start <?php echo ($current_url == '/dashboard/tugas') ? 'active' : ''; ?>">
                    <div class="grid mr-4 place-items-center">
                        <i class="bi bi-bookmarks text-lg"></i>
                    </div>
                    Tugas
                </a>
                <form action="/logout" method="POST">
                    <button type="submit" class="flex items-center w-full p-3 leading-tight transition-all rounded-full outline-none text-start hover:bg-blue-gray-800 hover:text-white">
                        <div class="grid mr-4 place-items-center">
                            <i class="bi bi-power text-lg"></i>
                        </div>
                        Log Out
                    </button>
                </form>
        </div>
        <div>
            <img src="/img/hiasan-sidebar.svg" alt="hiasan sidebar">
        </div>
        </nav>
    </div>
</div>