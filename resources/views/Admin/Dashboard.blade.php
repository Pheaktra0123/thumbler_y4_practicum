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
        <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
    <div class="container mx-auto w-11/12">
        <h1 class="text-4xl font-bold text-gray-700 text-start mb-8">
            Welcome to Admin Dashboard
        </h1>
         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Revenue Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">$48,291</p>
                            <div class="flex items-center mt-2">
                                <span class="text-green-600 text-sm font-medium flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    12%
                                </span>
                                <span class="text-gray-500 text-sm ml-2">vs last month</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 bg-cordes-blue bg-opacity-10 rounded-lg flex items-center justify-center">
                            <i class="fas fa-dollar-sign text-cordes-blue text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Users Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Users</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{
                                auth()->user()->count() ? auth()->user()->count() : 0
                            }}</p>
                            <div class="flex items-center mt-2">
                                <span class="text-green-600 text-sm font-medium flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                   {{ auth()->user()->count() ? auth()->user()->count() * 0.1 : 0 }}%
                                </span>
                                <span class="text-gray-500 text-sm ml-2">
                                    {{ auth()->user()->count() ? 'vs last month' : 'No users yet' }}
                                </span>
                            </div>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Orders Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Orders</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{$orderCount}}</p>
                            <div class="flex items-center mt-2">
                                <span class="text-green-600 text-sm font-medium flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    15%
                                </span>
                                <span class="text-gray-500 text-sm ml-2">vs last month</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-shopping-cart text-orange-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Products Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Products</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ $tumblers->count() ? $tumblers->count() : 0 }}
                            </p>
                            <div class="flex items-center mt-2">
                                <span class="text-green-600 text-sm font-medium flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    {{ $tumblers->count() ? round($tumblers->count() * 0.05, 2) : 0 }}%
                                </span>
                                <span class="text-gray-500 text-sm ml-2">{{
                                    $tumblers->count() ? 'vs last month' : 'No products yet'
                                }}</span>
                            </div>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-box text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>
<div class="flex justify-center w-11/12 mx-auto mt-8">
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
