<?php require 'includes/header.php' ?>
    <body>
    <div>
        <div class="container">

            <div class="mt-10 sm:mt-0">
                <div class="bg-yellow-500 py-4 px-4">
                    <h3 class="text-lg font-medium leading-6 text-white text-center">Create New Classes</h3>
                </div>
                <div class="md:grid md:grid-cols-3 md:gap-6 mt-5">
                    <div class="md:col-span-1 px-4">
                        <div class="px-4 sm:px-0">
                            <p class="mt-1 text-sm text-gray-600">
                                Hello user, create new classes here.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="#" method="POST">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="first_name" class="block text-sm font-medium text-gray-700">Class Name</label>
                                            <input required type="text" name="class_name" id="class_name" class="p-2 border-gray-200 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="last_name" class="block text-sm font-medium text-gray-700">Class Location</label>
                                            <input required type="text" name="class_location" id="class_location" class="p-2 border-gray-200 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="country"
                                                   class="block text-sm font-medium text-gray-700">Teacher</label>
                                            <select id="teacherId" name="teacherId"
                                                    class="p-2 border-gray-200 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <?php foreach ($getTeachers as $teacher): ?>
                                                    <option value="<?php echo $teacher->getId() ?>"><?php echo $teacher->getFirstname()." ".$teacher->getLastname() ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Create New
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