<?php require 'includes/header.php' ?>
    <body>
    <div>
        <div class="container">
            <div class="mt-10 sm:mt-0">
                <div class="bg-purple-600 py-4 px-4">
                    <h3 class="text-lg font-medium leading-6 text-white text-center text-purple-200">Update Teacher</h3>
                </div>
                <div class="md:grid md:grid-cols-3 md:gap-6 mt-5">
                    <div class="md:col-span-1 px-4 shadow overflow-hidden sm:rounded-md bg-white">
                        <div class="p-5 sm:px-0">
                            <ul class="mt-1 text-sm text-gray-600">
                                <li>ID: <?php echo $selectedTeacher[0]->getId() ?></li>
                                <li>
                                    Name: <?php echo $selectedTeacher[0]->getFirstname() . " " . $selectedTeacher[0]->getLastname() ?></li>
                                <li>Email: <?php echo $selectedTeacher[0]->getEmail() ?></li>
                                <br>
                                <li>Classes:<br>
                                    <?php if(!empty($selectedClass)): ?>
                                    <?php foreach ($selectedClass as $class): ?>
                                        <a class="hover:text-purple-600" href="?id=<?php echo $class->getId() ?>&class=update"><?php echo $class->getName()."<br>" ?></a>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </li>
                                <br>
                                <li>Students:<br>
                                    <?php if(!empty($stuteach)): ?>
                                        <?php foreach ($stuteach as $student): ?>
                                            <a class="hover:text-purple-600"
                                               href="?id=<?php echo $student->getId() ?>&student=update"><?php echo $student->getFirstname() . " " . $student->getLastname() ?></a>
                                            <br>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </li>
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
                                            <input value="<?php echo $selectedTeacher[0]->getFirstname() ?>" required
                                                   type="text" name="first_name" id="first_name"
                                                   autocomplete="given-name"
                                                   class="p-2 border-gray-200 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last
                                                name</label>
                                            <input value="<?php echo $selectedTeacher[0]->getLastname() ?>" required
                                                   type="text" name="last_name" id="last_name"
                                                   autocomplete="family-name"
                                                   class="p-2 border-gray-200 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="email_address" class="block text-sm font-medium text-gray-700">Email
                                                address</label>
                                            <input value="<?php echo $selectedTeacher[0]->getEmail() ?>" required
                                                   type="text" name="email_address" id="email_address"
                                                   autocomplete="email"
                                                   class="p-2 border-gray-200 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <a href="?page=student">
                                        <button name="button" value="delete" type="submit"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Delete
                                        </button>
                                    </a>
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