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
                            <th class="bg-blue-600 text-left w-1/3 px-4 py-3 text-white font-normal">Id</th>
                            <th class="bg-blue-600 text-left w-1/3 px-4 py-3 text-white font-normal">Name</th>
                            <th class="bg-blue-600 text-left w-1/3 px-4 py-3 text-right">
                                <form method="get">
                                    <input type="submit" name="student" value="Create New"
                                           class="transition ease-in-out transition-1000 cursor-pointer w-28 inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 shadow-md">
                                </form>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td class="text-gray-800 bg-gray-100 border-b px-4 py-2"><?php echo $student->getId() ?></td>
                                <td class="text-gray-800 bg-gray-100 border-b px-4 py-2"><?php echo $student->getFirstName() . " " . $student->getLastName() ?></td>
                                <td class="bg-gray-100 border-b px-4 py-2 text-right">
                                    <form method="get" class="float-right">
                                        <input type="hidden" name="id" value="<?php echo $student->getId() ?>"/>
                                        <input type="submit" name="student" value="update"
                                               class="transition ease-in-out transition-1000 m-1 shadow-md capitalize cursor-pointer w-20 inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-600">
                                    </form>
                                    <form method="post" class="float-right">
                                        <input type="hidden" name="id" value="<?php echo $student->getId() ?>"/>
                                        <input type="submit" name="student" value="delete"
                                               class="transition ease-in-out transition-1000 m-1 shadow-md capitalize cursor-pointer w-20 inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-600">
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