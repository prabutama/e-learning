<style>
    .custom-file-input::file-selector-button{
        background-color: #ff6d59;
        color: #fff;
        border: none;
        border-radius: 5px; /* Tampilan sudut */
        cursor: pointer; /* Menjadikan kursor menjadi tangan saat diarahkan */
    }
</style>

<p class="mt-4 text-lg font-semibold">Silahkan upload file tugas pada form di bawah ini!</p>

<form action="/dashboard/tugas/upload" method="post" enctype="multipart/form-data" name="uploadform" class="max-w-md mt-4 bg-gray-200 border-2 border-white rounded-lg shadow-md p-3">
    <div class="mb-4">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
        <input name="file" type="file" class="custom-file-input border-2 border-white w-full rounded-md p-1" id="file">
    </div>
    <div class="flex justify-end">
        <button name="upload" type="submit" class="px-4 py-2 bg-salmon text-white border-white rounded-lg cursor-pointer" id="upload">Upload</i></button>
    </div>
</form>