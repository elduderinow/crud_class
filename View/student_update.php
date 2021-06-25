<?php require 'includes/header.php' ?>
    <body>
    <div>
        <div class="container">
            <div class="mt-10 sm:mt-0">
                <div class="bg-blue-600 py-4 px-4">
                    <h3 class="text-lg font-medium leading-6 text-white text-center text-blue-200">Update Students</h3>
                </div>
                <div class="md:grid md:grid-cols-3 md:gap-6 mt-5">
                    <div class="md:col-span-1 px-4 shadow overflow-hidden sm:rounded-md bg-white">
                        <div class="p-5 sm:px-0 ">
                            <ul class="mt-1 text-sm text-gray-600">
                                <li>ID: <?php echo $stu_select[0]->getSId() ?></li>
                                <li>Name: <?php echo $stu_select[0]->getSFirstname()." ".$stu_select[0]->getSLastname() ?></li>
                                <li>Email: <?php echo $stu_select[0]->getSEmail() ?></li><br>
                                <li>Class: <a class="hover:text-blue-500" href="/?id=<?php echo $stu_select[0]->getClassId() ?>&class=update"><?php echo $stu_select[0]->getClassName() ?></a></li>
                                <li>Location: <?php echo $stu_select[0]->getLocation() ?></li><br>
                                <li>Teacher: <a class="hover:text-blue-500" href="/?id=<?php echo $stu_select[0]->getTId() ?>&teacher=update"><?php echo $stu_select[0]->getTFirstname()." ".$stu_select[0]->getTLastname() ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="#" method="POST">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">First
                                                name</label>
                                            <input value="<?php echo $stu_select[0]->getSFirstname() ?>" required type="text" name="first_name" id="first_name"
                                                   autocomplete="given-name"
                                                   class="p-2 border-gray-200 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last
                                                name</label>
                                            <input value="<?php echo $stu_select[0]->getSLastname() ?>" required type="text" name="last_name" id="last_name"
                                                   autocomplete="family-name"
                                                   class="p-2 border-gray-200 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="email_address" class="block text-sm font-medium text-gray-700">Email
                                                address</label>
                                            <input value="<?php echo $stu_select[0]->getSEmail() ?>" required type="text" name="email_address" id="email_address"
                                                   autocomplete="email"
                                                   class="p-2 border-gray-200 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="country"
                                                   class="block text-sm font-medium text-gray-700">Class</label>
                                            <select id="class" name="class"
                                                    class="p-2 border-gray-200 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <?php foreach ($getClass as $class): ?>
                                                    <option value="<?php echo $class->getId() ?>"><?php echo $class->getName() ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <a href="?page=student"><button name="button" value="delete" type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                       Delete
                                        </button></a>
                                    <button name="button" value="submit" type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                       Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
<?php
require 'includes/footer.php';
?>