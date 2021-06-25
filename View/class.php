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
                            <th class="bg-yellow-500 text-left py-3 px-4 text-white font-normal">Id</th>
                            <th class="bg-yellow-500 text-left py-3 px-4 text-white font-normal">Name</th>
                            <th class="bg-yellow-500 text-right py-3 px-4 text-white font-normal">
                                <form method="get">
                                    <input type="submit" name="class" value="Create New"
                                           class="transition ease-in-out transition-1000 cursor-pointer w-28 inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-500 shadow-md">
                                </form>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($getclass as $class): ?>
                            <tr>
                                <td class="text-gray-800 bg-gray-100 border-b px-4 py-2"><?php echo $class->getId() ?></td>
                                <td class="text-gray-800 bg-gray-100 border-b px-4 py-2"><?php echo $class->getName() ?></td>
                                <td class="bg-gray-100 border-b px-4 py-2 text-right">
                                    <form method="get" class="float-right">
                                        <input type="hidden" name="id" value="<?php echo $class->getId() ?>"/>
                                        <input type="submit" name="class" value="update"
                                               class="transition ease-in-out transition-1000 m-1 shadow-md capitalize cursor-pointer w-20 inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-600">
                                    </form>
                                    <form method="post" class="float-right">
                                        <input type="hidden" name="id" value="<?php echo $class->getId() ?>"/>
                                        <input type="submit" name="class" value="delete"
                                               class="transition ease-in-out transition-1000 m-1 shadow-md capitalize cursor-pointer w-20 inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-500 hover:bg-gray-600">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3" class="bg-yellow-500 px-4 py-2 rounded-bl rounded-br""></td>
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