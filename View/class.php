<?php require 'includes/header.php'
?>
    <body>
    <div>
        <div class="container bg-gray-50 pb-10 rounded ">
            <div class="grid gap-6">
                <div class="">
                    <table class="">
                        <thead>
                        <tr>
                            <th class="">Id</th>
                            <th class="">Name</th>
                            <th class="">
                                <form method="get">
                                    <input type="submit" name="class" value="Create New"
                                           class="">
                                </form>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($getclass as $class): ?>
                            <tr>
                                <td class=""><?php echo $class->getId() ?></td>
                                <td class=""><?php echo $class->getName() ?></td>
                                <td class="">
                                    <form method="get" class="float-right">
                                        <input type="hidden" name="id" value="<?php echo $class->getId() ?>"/>
                                        <input type="submit" name="class" value="update"
                                               class="">
                                    </form>
                                    <form method="post" class="float-right">
                                        <input type="hidden" name="id" value="<?php echo $class->getId() ?>"/>
                                        <input type="submit" name="class" value="delete"
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