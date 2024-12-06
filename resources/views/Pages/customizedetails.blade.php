@extends("TailwindCssLink.style")
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script defer src="home.js"></script> -->
</head>

<body>
    <div class=" w-full ">
    @include('pages.header')

        <style>
            /* General Styles */
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                line-height: 1.6;
            }

            /* Header */
            .header {
                background: black;
                color: white;
                padding: 10px 20px;
            }

            .header .container {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .header .nav a {
                color: white;
                margin-left: 20px;
                text-decoration: none;
                font-size: 14px;
            }

            .header .cart-icon {
                font-size: 18px;
            }

            /* Product Section */
            .product-details {
                padding: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .product-container {
                display: flex;
                gap: 20px;
                max-width: 900px;
                margin: 0 auto;
            }

            .product-image img {
                width: 300px;
                border-radius: 10px;
            }

            .product-info h2 {
                font-size: 20px;
                margin: 0 0 10px;
            }

            .rating {
                margin: 10px 0;
            }

            .price p {
                font-size: 24px;
                font-weight: bold;
                margin: 10px 0;
            }

            .quantity {
                display: flex;
                align-items: center;
                margin: 20px 0;
            }

            .quantity label {
                margin-right: 10px;
            }

            .quantity input {
                width: 50px;
                text-align: center;
                margin: 0 10px;
            }

            .buttons {
                display: flex;
                gap: 10px;
            }

            .add-to-cart,
            .customize {
                padding: 10px 20px;
                font-size: 14px;
                border: none;
                cursor: pointer;
            }

            .add-to-cart {
                background: black;
                color: white;
            }

            .customize {
                background: #f0f0f0;
                color: black;
            }

            /* Details Section */
            .details {
                margin-top: 40px;
                max-width: 900px;
                text-align: left;
            }

            .details h3 {
                font-size: 18px;
                margin-bottom: 10px;
            }

            .details p {
                font-size: 14px;
                margin-bottom: 10px;
            }

            .details ul {
                list-style: none;
                padding: 0;
            }

            .details ul li {
                margin-bottom: 5px;
            }
        </style>
        <main class="product-details">
            <div class="product-container">
                <div class="product-image">
                    <img src="1.png" alt="The Black Chroma Quencher H2.0 Tumbler">
                </div>
                <div class="product-info">
                    <h2>The Black Chroma Quencher H2.0 FlowState™ Tumbler | 40 OZ</h2>
                    <div class="rating">
                        <span>⭐⭐⭐⭐☆</span>
                        <p>3.9 out of 5 stars, average rating value. Read 11,798 Reviews.</p>
                    </div>
                    <div class="price">
                        <p>$55.00</p>
                    </div>
                    <div class="quantity">
                        <label for="quantity">Qty</label>
                        <button>-</button>
                        <input type="number" id="quantity" value="0" min="0">
                        <button>+</button>
                    </div>
                    <div class="buttons">
                        <button class="add-to-cart">Add to Cart</button>
                        <button class="customize">Customize</button>
                    </div>
                </div>
            </div>

            <div class="details">
                <h3>Details & Specifications</h3>
                <p>
                    A band of iridescent shimmer defines the new Black Chroma Collection.
                    The sleek prism effect makes each piece unique...
                </p>
                <ul>
                    <li>18/8 recycled stainless steel, BPA-free</li>
                    <li>Double-wall vacuum insulation</li>
                    <li>FlowState™ screw-on 3-position lid</li>
                    <li>Reusable straw</li>
                    <li>Comfort-grip handle</li>
                    <li>Car cup holder compatible (base diameter: 3.1 inches)</li>
                </ul>
            </div>

        </main>

        <div id="cartDialog" class=" p-4 fixed z-50 hidden flex right-0 top-1/4 transform -translate-y-1/2">
            <div class="bg-white w-80 h-70 rounded-lg shadow-lg p-4 relative">

                <!-- Close Button -->
                <button id="closeCartDialog" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <!-- Dialog Content -->
                <h3 class="text-xl font-bold mb-4">Your Cart</h3>
                <p class="text-gray-600 text-center justify-center">Your cart is currently empty.</p>
                <!-- <button class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Continue
            Shopping</button> -->
            </div>
        </div>




    </div>
    </div>



    <footer class="px-3 pt-4 lg:px-9  bg-gray-50">
        <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">

            <div class="sm:col-span-2">
                <a href="#" class="inline-flex items-center">
                    <span class="ml-2 text-xl font-bold tracking-wide text-gray-800">BE THE FIRST TO KNOW
                    </span>
                </a>
                <div class="mt-6 lg:max-w-xl">
                    <p class="text-sm text-gray-800">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi felis mi, faucibus dignissim
                        lorem
                        id, imperdiet interdum mauris. Vestibulum ultrices sed libero non porta. Vivamus malesuada
                        urna eu
                        nibh malesuada, non finibus massa laoreet. Nunc nisi velit, feugiat a semper quis, pulvinar
                        id
                        libero. Vivamus mi diam, consectetur non orci ut, tincidunt pretium justo. In vehicula porta
                        molestie. Suspendisse potenti.
                    </p>
                </div>
            </div>

            <div class="flex flex-col gap-2 text-sm">
                <p class="text-base font-bold tracking-wide text-gray-900">Popular Courses</p>
                <a href="#">UPSC - Union Public Service Commission</a>
                <a href="#">General Knowledge</a>
                <a href="#">MBA</a>
                <p class="text-base font-bold tracking-wide text-gray-900">Popular Topics</p>
                <a href="#">Human Resource Management</a>
                <a href="#">Operations Management</a>
                <a href="#">Marketing Management</a>
            </div>

            <div class="w-full h-full">
                <p class=" font-bold tracking-wide text-gray-900 text-center font-serif">Tumbler Haven </p>
                <img src="footer.png" alt="">
            </div>

        </div>

        <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
            <p class="text-sm text-gray-600">© Copyright 2023 Company. All rights reserved.</p>
            <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">
                <li>
                    <a href="#"
                        class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Privacy
                        &amp; Cookies Policy
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Disclaimer
                    </a>
                </li>
            </ul>
        </div>

    </footer>

</body>

</html>
