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
                            <th class="bg-purple-600 text-left py-4 px-4 text-white font-normal">Id</th>
                            <th class="bg-purple-600 text-left py-4 px-4 text-white font-normal">Name</th>
                            <th class="bg-purple-600 text-right py-4 px-4 text-white font-normal">
                                <form method="get">
                                    <input type="submit" name="teacher" value="Create New"
                                           class="">
                                </form>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($getTeachers as $teacher): ?>
                            <tr>
                                <td class=""><?php echo $teacher->getId() ?></td>
                                <td class=""><?php echo $teacher->getFirstName() . " " . $teacher->getLastName() ?></td>
                                <td class="">
                                    <form method="get" class="float-right">
                                        <input type="hidden" name="id" value="<?php echo $teacher->getId() ?>"/>
                                        <input type="submit" name="teacher" value="update"
                                               class="">
                                    </form>
                                    <form method="post" class="float-right">
                                        <input type="hidden" name="id" value="<?php echo $teacher->getId() ?>"/>
                                        <input type="submit" name="teacher" value="delete"
                                               class="">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3" class=""></td>
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