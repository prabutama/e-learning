<table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
    <thead>
        <tr>
            <th class="px-12 py-2 border-b text-left font-semibold bg-blue-gray-800 text-white ">ID</th>
            <th class="px-12 py-2 border-b text-left font-semibold bg-blue-gray-800 text-white ">File Name</th>
            <th class="px-12 py-2 border-b text-left font-semibold bg-blue-gray-800 text-white ">File Type</th>
            <th class="px-12 py-2 border-b text-left font-semibold bg-blue-gray-800 text-white ">Nilai</th>
            <th class="px-12 py-2 border-b text-left font-semibold bg-blue-gray-800 text-white ">Download</th>
            <?php if ($role == 'dosen') {
                echo '<th class="px-12 py-2 border-b text-left font-semibold bg-blue-gray-800 text-white">Action</th>';
            } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task) : ?>
            <tr>
                <td class="px-12 py-2 border-b"><?= htmlspecialchars($task['id']) ?></td>
                <td class="px-12 py-2 border-b"><?= htmlspecialchars($task['filename']) ?></td>
                <td class="px-12 py-2 border-b"><?= htmlspecialchars($task['type']) ?></td>
                <td class="px-12 py-2 border-b"><?= htmlspecialchars($task['nilai']) ?></td>
                <td class="px-12 py-2 border-b">
                    <a href="download.php?id=$task[' id']" class="text-white bg-blue-gray-800 rounded-md p-1 ms-6">
                        <i class='bi bi-download'></i>
                    </a>
                </td>
                <?php if ($role === 'dosen') : ?>
                    <td class="px-12 py-2 border-b text-left">
                        <a href="/dashboard/tugas/edit?id=<?= htmlspecialchars($task['id']) ?>" class="text-blue-500 hover:underline">Beri Nilai</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>