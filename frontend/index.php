<?php include("header.php") ?>

<div class="body_section">
    <!-- Main Content -->
    <div class="max-w-9xl mx-auto mt-1 px-3 md:px-1">
        <!-- Image Slider -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="slider-container h-64 md:h-96 relative">
                <div class="slider-track h-full" id="sliderTrack"></div>

                <!-- Slider Navigation -->
                <button class="absolute left-2 md:left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 text-gray-800 p-2 rounded-full transition-all"
                    onclick="previousSlide()">
                    <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="absolute right-2 md:right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 text-gray-800 p-2 rounded-full transition-all"
                    onclick="nextSlide()">
                    <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Slider Dots -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2" id="sliderDots"></div>
            </div>
        </div>
    </div>

    <!-- Dynamic Product Showing -->
    <div class="max-w-8xl mx-auto mt-6 md:mt-10 px-3 md:px-5" id="dynamic-category-sections"></div>

</div>


<?php include("footer.php") ?>
