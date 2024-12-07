@extends("TailwindCssLink.style")
@extends("Component.Nav_Dashbord")
@section('contents')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Products</title>
</head>
<body>
<main>
    <section>
        <div class="flex gap-2 p-5">
            <h1 class="text-3xl font-bold text-gray-700">Products</h1>
            <span class="bg-gray-200 text-sm text-red-900 content-center px-2 font-medium rounded-xl">3 Models</span>
        </div>
        <div class="flex justify-between px-5 item-center">
            <p class="text-lg content-center font-bold">All</p>
            <div>
                <input placeholder="Find products" type="text" name="" id="" class="outline-none bg-gray-200 p-2 w-[300px] rounded-md">
                <select id="selection" class="py-2 px-4 bg-gray-200 rounded-md outline-none text-gray-400">
                    <option class="outline-none " value="Status" >Status</option>
                    <option value="now" class="outline-none">now</option>
                </select>
            </div>
            <button id="showNew" class="bg-blue-500 text-white text-sm p-2 rounded-md">New Product</button>

        </div>
        <div>
            <form>
                <h1>Create New Product</h1>
                <div>
                    <input type="text">
                </div>
            </form>
        </div>
    </section>
</main>
</body>
</html>
@endsection

