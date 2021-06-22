<?php require 'includes/header.php'
?>
    <body>
    <div>
        <div class="container bg-gray-50 pb-10 rounded ">
            <div class="grid gap-6">
                <div class="rounded md:col-span-6 h-full">
                    <table class="w-full table-fixed">
                        <thead>
                        <tr>
                            <th class="rounded-tl bg-blue-600 text-left w-1/3 px-4 py-3 text-white">Id</th>
                            <th class="bg-blue-600 text-left w-1/3 px-4 py-3 text-white">Name</th>
                            <th class="rounded-tr bg-blue-600 text-left w-1/3 px-4 py-3 text-right">
                                <form method="get">
                                    <input type="submit" name="student" value="Create New" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                </form>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td class="bg-gray-100 border-b px-4 py-2"><?php echo $student->getId() ?></td>
                                <td class="bg-gray-100 border-b px-4 py-2"><?php echo $student->getFirstName()." ".$student->getLastName() ?></td>
                                <td class="bg-gray-100 border-b px-4 py-2 text-right">
                                    <form method="get">
                                        <input type="hidden" name="id" value="<?php echo $student->getId() ?>" />
                                        <input type="submit" name="student" value="update" class="w-28 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3" class="bg-blue-600 px-4 py-2 rounded-bl rounded-br"></td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
    </body>
<?php
require 'includes/footer.php'
?>