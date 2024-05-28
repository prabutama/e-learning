<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Dashboard</title>
    <style>
        .on {
            background-color: #ff6d59;
            color: white;
        }
    </style>
</head>

<body class="font-poppins">
    <div class="flex w-full justify-start">
        <div class="w-full max-w-[23%]">
            <?php require_once 'layouts/partials/sidebar.php'; ?>
        </div>
        <div class="w-full p-8">
            <div>
                <p class="border-2 border-white rounded-full py-3 px-4 w-fit bg-yellow-tosca text-white">Tugas</p>
            </div>

            <?php
            if (isset($_SESSION['login']) and $_SESSION['role'] == 'mahasiswa') {
                require_once 'layouts/partials/form-upload.php';
            }
            ?>

            <p class="mt-4 text-xl font-semibold">Tugas yang telah diupload</p>
            <div class="gap-2 my-2 flex">
                <button id="btn-belum-dinilai" class="border rounded-full p-2 px-4 on">Belum dinilai</button>
                <button id="btn-sudah-dinilai" class="border rounded-full p-2 px-4">Sudah dinilai</button>
            </div>
            <div id="sudah-dinilai" class="grid grid-cols-3 gap-3 w-auto border-2 p-4 rounded-md bg-gray-200 hidden">
                <?php foreach ($tasks as $task) : ?>
                    <div class="border-2 border-white bg-green-tosca flex flex-col rounded-xl relative">
                        <div class="p-3">
                            <h5 class="block text-xl antialiased font-semibold leading-snug tracking-normal border-b-2 border-white my-2 pb-2 text-white">
                                <?php echo $task['filename'] ?>
                            </h5>
                            <p class="block text-white font-medium antialiased leading-relaxed text-inherit">
                                <?php echo "Nama : " . $task['username'] ?>
                            </p>
                            <p class="block text-white font-medium antialiased leading-relaxed text-inherit">
                                <?php echo "Nilai : " . $task['nilai'] ?>
                            </p>
                        </div>
                        <div class="p-3 pt-0 flex gap-2">
                            <?php if ($role == 'dosen') : ?>
                                <button onclick="showForm(this)" class="align-middle select-none font-medium text-center transition-all text-xs py-2 px-3 rounded-lg bg-salmon text-white" type="button" data-task-id="<?php echo $task['id']; ?>">
                                    Beri Nilai
                                </button>
                            <?php endif; ?>
                        </div>
                        <div class="absolute shadow-md top-[87px] -right-[125px] transform -translate-x-1/2 -translate-y-1/2 hidden" id="form-<?php echo $task['id']; ?>">
                            <form id="form-update" action="/dashboard/tugas/update" method="post" class="max-w-md bg-white border-2 rounded-lg shadow-md p-3">
                                <div class="flex justify-end">
                                    <i onclick="hideForm(this)" class="bi bi-x-lg text-right cursor-pointer"></i>
                                </div>
                                <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                <div class="mb-4">
                                    <label for="nilai-<?php echo $task['id']; ?>" class="block text-gray-700 text-sm font-bold mb-2">Nilai</label>
                                    <input type="number" id="nilai-<?php echo $task['id']; ?>" name="nilai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan nilai" required>
                                </div>
                                <div class="flex justify-end">
                                    <button class="align-middle select-none font-medium text-center transition-all text-xs py-2 px-3 rounded-lg bg-gray-900 text-white" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div id="belum-dinilai" class="grid grid-cols-3 gap-3 w-auto border-2 p-4 rounded-md bg-gray-200">
                <?php foreach ($tasksNoNilai as $task) : ?>
                    <div class="border-2 border-white bg-green-tosca flex flex-col rounded-xl relative">
                        <div class="p-3">
                            <h5 class="block text-xl antialiased font-semibold font-poppins leading-snug tracking-normal border-b-2 border-white my-2 pb-2 text-white">
                                <?php echo $task['filename'] ?>
                            </h5>
                            <p class="block font-medium text-white antialiased leading-relaxed text-inherit">
                                <?php echo "Nama : " . $task['username'] ?>
                            </p>
                            <p class="block font-medium text-white antialiased leading-relaxed text-inherit">
                                <?php echo "Nilai : " . $task['nilai'] ?>
                            </p>
                        </div>
                        <div class="p-3 pt-0 flex gap-2">
                            <?php if ($role == 'dosen') : ?>
                                <button onclick="showForm(this)" class="align-middle select-none font-medium text-center transition-all text-xs py-2 px-3 rounded-lg bg-salmon text-white" type="button" data-task-id="<?php echo $task['id']; ?>">
                                    Beri Nilai
                                </button>
                            <?php endif; ?>
                        </div>
                        <div class="absolute top-[125px] -right-[125px] transform -translate-x-1/2 -translate-y-1/2 shadow-md -bottom-48 hidden" id="form-<?php echo $task['id']; ?>">
                            <form id="form-update" action="/dashboard/tugas/update" method="post" class="max-w-md bg-white border-2 rounded-lg shadow-md p-3">
                                <div class="flex justify-end">
                                    <i onclick="hideForm(this)" class="bi bi-x-lg text-right cursor-pointer"></i>
                                </div>
                                <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                <div class="mb-4">
                                    <label for="nilai-<?php echo $task['id']; ?>" class="block text-gray-700 text-sm font-bold mb-2">Nilai</label>
                                    <input type="number" id="nilai-<?php echo $task['id']; ?>" name="nilai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan nilai" required>
                                </div>
                                <div class="flex justify-end">
                                    <button class="align-middle select-none font-medium text-center transition-all text-xs py-2 px-3 rounded-lg bg-gray-900 text-white" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
</body>

<script>
    function showForm(button) {
        var taskId = button.getAttribute('data-task-id');
        var form = document.getElementById('form-' + taskId);
        form.classList.remove('hidden');
    }

    function hideForm(icon) {
        var form = icon.parentNode.parentNode;
        form.classList.add('hidden');
    }

    const formUpdate = document.getElementById('form-update');
    formUpdate.addEventListener('submit', function(event) {
        event.preventDefault();
        formUpdate.submit();
    });

    const btnSudahDinilai = document.getElementById('btn-sudah-dinilai');
    const btnBelumDinilai = document.getElementById('btn-belum-dinilai');
    const sudahDinilai = document.getElementById('sudah-dinilai');
    const belumDinilai = document.getElementById('belum-dinilai');

    btnSudahDinilai.addEventListener('click', function() {
        btnBelumDinilai.classList.remove('on');
        btnSudahDinilai.classList.add('on');
        belumDinilai.classList.add('hidden');
        sudahDinilai.classList.remove('hidden');
    });

    btnBelumDinilai.addEventListener('click', function() {
        btnSudahDinilai.classList.remove('on');
        btnBelumDinilai.classList.add('on');
        sudahDinilai.classList.add('hidden');
        belumDinilai.classList.remove('hidden');
    });
</script>

</html>