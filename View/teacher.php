<?php require 'includes/header.php'
?>
    <body>
    <div>
        <div class="container bg-gray-50 pb-10 rounded">
            <div class="grid gap-6">
                <div class="rounded md:col-span-6 h-full">
                    <table class="w-full table-fixed">
                        <thead>
                        <tr>
                            <th class="bg-purple-600 text-left py-3 px-4 text-white font-normal">Id</th>
                            <th class="bg-purple-600 text-left py-3 px-4 text-white font-normal">Name</th>
                            <th class="bg-purple-600 text-right py-3 px-4 text-white font-normal">
                                <form method="get">
                                    <input type="submit" name="teacher" value="Create New"
                                           class="transition ease-in-out transition-1000 cursor-pointer w-28 inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-purple-400 hover:bg-purple-500 shadow-md">
                                </form>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($getTeachers as $teacher): ?>
                            <tr>
                                <td class="text-gray-800 bg-gray-100 border-b px-4 py-2"><?php echo $teacher->getId() ?></td>
                                <td class="text-gray-800 bg-gray-100 border-b px-4 py-2"><?php echo $teacher->getFirstName() . " " . $teacher->getLastName() ?></td>
                                <td class="bg-gray-100 border-b px-4 py-2 text-right">
                                    <form method="get" class="float-right">
                                        <input type="hidden" name="id" value="<?php echo $teacher->getId() ?>"/>
                                        <input type="submit" name="teacher" value="update"
                                               class="transition ease-in-out transition-1000 m-1 shadow-md capitalize cursor-pointer w-20 inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-600">
                                    </form>
                                    <form method="post" class="float-right">
                                        <input type="hidden" name="id" value="<?php echo $teacher->getId() ?>"/>
                                        <input type="submit" name="teacher" value="delete"
                                               class="transition ease-in-out transition-1000 m-1 shadow-md capitalize cursor-pointer w-20 inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-400 hover:bg-gray-600">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3" class="bg-purple-600 px-4 py-2 rounded-bl rounded-br"></td>
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