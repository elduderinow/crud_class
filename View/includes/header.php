
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classes</title>
    <!-- Extra links -->
    <link rel="stylesheet" href="../view/css/style.css">

</head>
<body>
<header>
    <div class="container bg-gray-50">

        <div class=" sm:block" aria-hidden="true">
            <div class="py-5 text-center bold font-mono text-yellow-500">
                <h2 class="text-4xl">BECODE CLASS APP</h2>
                <p class="text-2xl">Coding is lyfe</p>
            </div>
        </div>

        <div class="grid sm:grid-cols-3 md:grid-cols-6 gap-4">
            <div class="rounded md:col-span-2 text-center">
                <form method="get">
                    <input type="submit" name="page" value="student" class="w-full inline-flex justify-center py-4 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                </form>
            </div>
            <div class="rounded md:col-span-2 text-center">
                <form method="get">
                    <input type="submit" name="page" value="teacher" class="w-full inline-flex justify-center py-4 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                </form>
            </div>
            <div class="rounded md:col-span-2 text-center">
                <form method="get">
                    <input type="submit" name="page" value="class" class="w-full inline-flex justify-center py-4 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                </form>
            </div>
        </div>

        <div class="block" aria-hidden="true">
            <div class="py-5">

            </div>
        </div>

    </div>
</header>

<?php var_dump($_GET); ?>

