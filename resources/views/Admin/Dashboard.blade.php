@extends('Component.Nav_Dashbord')
@section('contents')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'IBM Plex Mono', sans-serif;
    }
    [x-cloak] {
        display: none;
    }
    .line {
        background: repeating-linear-gradient(
            to bottom,
            #eee,
            #eee 1px,
            #fff 1px,
            #fff 8%
        );
    }
    .tick {
        background: repeating-linear-gradient(
            to right,
            #eee,
            #eee 1px,
            #fff 1px,
            #fff 5%
        );
    }
</style>
<body>
<div class="bg-gray-100 p-4">
    <div class="container mx-auto ">
        <h1 class="text-4xl font-bold text-gray-700 text-start mb-8">
            Welcome to Admin Dashboard
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white rounded-lg shadow-sm p-5 flex gap-16">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-10 h-10 font-bold text-sky-900 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    <h2 class="text-xl font-bold text-gray-600 mb-4">Customers</h2>
                </div>
                <p class="text-3xl text-gray-600 font-bold place-content-center">
                    {{$users->count()}}
                </p>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-5 flex gap-16">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-10 h-10 text-sky-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                    <h2 class="text-xl font-bold text-gray-600 mb-4 mt-2">Orders</h2>
                </div>
                <p class="text-3xl text-gray-600 font-bold place-content-center">
                    1000
                </p>
            </div>
            <div class="bg-white rounded-lg shadow-sm p-5 flex gap-16">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-10 h-10 text-sky-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>
                    <h2 class="text-xl font-bold text-gray-600 mb-4 mt-2">Payments</h2>
                </div>
                <p class="text-3xl text-gray-600 font-bold place-content-center">
                    1000$
                </p>
            </div>
        </div>
    </div>
</div>
<div class="flex justify-center w-full">
    <div x-data="app()" x-cloak class="px-4 w-[70%]">
        <div class="">
            <div class=" p-2 rounded-lg bg-white">
                <div class="md:flex md:justify-between md:items-center">
                    <div>
                        <h2 class="text-xl text-gray-800 font-bold leading-tight">Product Sales</h2>
                        <p class="mb-2 text-gray-600 text-sm">Monthly Average</p>
                    </div>

                    <!-- Legends -->
                    <div class="mb-4">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-blue-600 mr-2 rounded-full"></div>
                            <div class="text-sm text-gray-700">Sales</div>
                        </div>
                    </div>
                </div>

                <div class="line my-8 relative">
                    <!-- Tooltip -->
                    <template x-if="tooltipOpen == true">
                        <div x-ref="tooltipContainer" class="p-0 m-0 z-10 shadow-lg rounded-lg absolute h-auto block" :style="`bottom: ${tooltipY}px; left: ${tooltipX}px`">
                            <div class="shadow-xs rounded-lg bg-white p-2">
                                <div class="flex items-center justify-between text-sm">
                                    <div>Sales:</div>
                                    <div class="font-bold ml-2">
                                        <span x-html="tooltipContent"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <!-- Bar Chart -->
                    <div class="flex -mx-2 items-end mb-2">
                        <template x-for="data in chartData">

                            <div class="px-2 w-1/6">
                                <div :style="`height: ${data}px`" class="transition ease-in duration-200 bg-blue-600 hover:bg-blue-400 relative" @mouseenter="showTooltip($event); tooltipOpen = true" @mouseleave="hideTooltip($event)">
                                    <div x-text="data" class="text-center absolute top-0 left-0 right-0 -mt-6 text-gray-800 text-sm"></div>
                                </div>
                            </div>

                        </template>
                    </div>

                    <!-- Labels -->
                    <div class="border-t border-gray-400 mx-auto" :style="`height: 1px; width: ${ 100 - 1/chartData.length*100 + 3}%`"></div>
                    <div class="flex -mx-2 items-end">
                        <template x-for="data in labels">
                            <div class="px-2 w-1/6">
                                <div class="bg-red-600 relative">
                                    <div class="text-center absolute top-0 left-0 right-0 h-2 -mt-px bg-gray-400 mx-auto" style="width: 1px"></div>
                                    <div x-text="data" class="text-center absolute top-0 left-0 right-0 mt-3 text-gray-700 text-sm"></div>
                                </div>
                            </div>
                        </template>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="w-[30%] bg-white px-3 mr-3 rounded-md shadow-sm">
        <div>
            <h2 class="text-xl text-gray-800 font-bold leading-tight">Product Sales</h2>
        </div>
        <canvas id="donut-chart"></canvas>
    </div>
</div>
<div class="p-3">
<div class="text-2xl font-bold px-3">User Recent</div>
<table class="min-w-full divide-y divide-gray-200 overflow-x-auto px-3">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Role
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Email
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($users as $user)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full object-cover object-center" src="{{asset($user->thumbnail)}}" alt="">
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{$user->username}}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{$user->email}}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Active
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$user->type}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$user->email}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                <a href="#" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
            </td>
        </tr> 
        @endforeach  
    </tbody>
</table>
</div>
</body>
<script>
    function app() {
        return {
            chartData: [112, 10, 225, 134, 101, 80, 50, 100, 200],
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
            tooltipContent: '',
            tooltipOpen: false,
            tooltipX: 0,
            tooltipY: 0,
            showTooltip(e) {
                console.log(e);
                this.tooltipContent = e.target.textContent
                this.tooltipX = e.target.offsetLeft - e.target.clientWidth;
                this.tooltipY = e.target.clientHeight + e.target.clientWidth;
            },
            hideTooltip(e) {
                this.tooltipContent = '';
                this.tooltipOpen = false;
                this.tooltipX = 0;
                this.tooltipY = 0;
            }
        }
    }
    // Get the canvas element
    var canvas = document.getElementById('donut-chart');

    // Set the chart data
    var data = {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'My First Dataset',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                '#EF4444',
                '#3B82F6',
                '#FBBF24',
                '#10B981',
                '#A78BFA',
                '#F59E0B'
            ],
            hoverOffset: 4
        }]
    };

    // Set the chart options
    var options = {
        plugins: {
            legend: {
                display: false
            }
        },
        aspectRatio: 1,
        cutout: '50%',
        animation: {
            animateRotate: false
        }
    };

    // Create the chart
    var chart = new Chart(canvas, {
        type: 'doughnut',
        data: data,
        options: options
    });
</script>
</html>
@endsection
