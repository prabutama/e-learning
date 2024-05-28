<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>

<body>
    <div class="flex justify-center w-full h-full p-10">
        <div class="border-2 bg-white p-8 rounded-lg shadow-lg w-full max-w-lg mx-auto h-fit">
            <h2 class="text-2xl text-salmon font-bold mb-6 text-center">Register</h2>
            <form action="/register" method="POST">
                <div class="mb-4">
                    <label for="name" class="block text-green-tosca text-sm font-bold mb-2">Nama</label>
                    <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-green-tosca leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukan nama" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-green-tosca text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-green-tosca leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukan email" required>
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-green-tosca text-sm font-bold mb-2">Role</label>
                    <select id="role" name="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="" disabled selected>Pilih role</option>
                        <option value="dosen">Dosen</option>
                        <option value="mahasiswa">Mahasiswa</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-green-tosca text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-green-tosca leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukan password" required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-salmon hover:bg-green-tosca text-white py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">Register</button>
                    <a href="/login" class="text-green-tosca hover:text-green-tosca">Sudah mempunyai akun? <strong class="text-salmon">Login</strong></a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>