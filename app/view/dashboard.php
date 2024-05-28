<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="flex w-full justify-start bg-white">
        <div class="w-full max-w-[23%]">
            <?php require_once 'layouts/partials/sidebar.php'; ?>
        </div>
        <div class="w-full p-8">
            <p class="text-lg my-2 p-3 <?php if($role == 'mahasiswa') echo('bg-salmon') ?> <?php if($role == 'dosen') echo('bg-yellow-tosca') ?> rounded-xl text-white w-fit">Anda telah login sebagai <strong><?php echo $role ?></strong></p>
            <div class="w-full">
                <div class="flex flex-col gap-4 bg-green-tosca p-10 rounded-xl">
                    <p class="text-3xl text-white font-semibold">
                        Pembelaaran Efektif Bersama Xinau
                    </p>
                    <p class="text-xl text-white">
                        Edukasi Inovatif untuk Generasi Hebat
                    </p>
                    <div class="my-3 flex gap-10">
                        <div class="flex gap-3 items-center">
                            <i class="bi bi-people-fill text-white text-3xl bg-salmon py-3 px-4 rounded-full border-2 border-white"></i>
                            <div class="text-white font-semibold">
                                <p class="block">Jumlah Mahasiswa</p>
                                <p class="block"><?= $mahasiswa ?></p>
                            </div>
                        </div>
                        <div class="flex gap-3 items-center">
                            <i class="bi bi-person-video3 text-white text-3xl bg-yellow-tosca py-3 px-4 rounded-full border-2 border-white"></i>
                            <div class="text-white font-semibold">
                                <p class="block">Jumlah Dosen</p>
                                <p class="block"><?= $dosen ?></p>
                            </div>
                        </div>
                        <div class="relative w-1/3">
                            <img src="/img/orang-belajar.gif" class="absolute left-32 -top-32" alt="orang belajar">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>