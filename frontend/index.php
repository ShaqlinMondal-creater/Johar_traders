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

<!-- Slider Section -->
<script>
    const slides = [
        {
            img: "Johar_traders_uploads/banner/KXJUO7L32X-20190122-032030.jpg",
            title: "Premium Kitchen Appliances",
            description: "Discover our range of high-quality kitchen machines",
            buttonText: "Shop Now"
        },
        {
            img: "Johar_traders_uploads/banner/3IUOLRQ26Y-20190122-031938.jpg",
            title: "Food Processing Equipment",
            description: "Professional grade machines for your business",
            buttonText: "Explore Products"
        },
        {
            img: "https://images.pexels.com/photos/4226140/pexels-photo-4226140.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            title: "Modern Kitchen Solutions",
            description: "Transform your kitchen with our latest technology",
            buttonText: "View Collection"
        }
    ];

    let currentSlide = 0;
    const totalSlides = slides.length;
    const sliderTrack = document.getElementById('sliderTrack');
    const sliderDots = document.getElementById('sliderDots');

    function renderSlides() {
        // Dynamically render slides in the slider
        sliderTrack.innerHTML = slides.map((slide, index) => `
            <div class="slider-slide h-full relative">
                <img src="${slide.img}" alt="${slide.title}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <div class="text-center text-white px-4">
                        <h2 class="text-2xl md:text-4xl mb-2 md:mb-4">${slide.title}</h2>
                        <p class="text-base md:text-xl mb-4 md:mb-6">${slide.description}</p>
                        <a href="comming_soon" class="bg-orange-600 hover:bg-orange-700 text-white px-6 md:px-8 py-2 md:py-3 rounded-lg transition-colors">
                            ${slide.buttonText}
                        </a>
                    </div>
                </div>
            </div>
        `).join('');

        // Dynamically render dots
        sliderDots.innerHTML = slides.map((_, index) => `
            <button class="w-3 h-3 bg-white bg-opacity-60 rounded-full hover:bg-opacity-100 transition-all slider-dot ${index === 0 ? 'active' : ''}"
                onclick="goToSlide(${index})"></button>
        `).join('');
    }

    // Update the slider's transform value based on the current slide
    function updateSlider() {
        const dots = document.querySelectorAll('.slider-dot');
        const track = document.getElementById('sliderTrack');
        track.style.transform = `translateX(-${currentSlide * 100}%)`;

        // Activate the current dot and deactivate others
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
    }

    // Move to the next slide
    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    }

    // Move to the previous slide
    function previousSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlider();
    }

    // Go to a specific slide
    function goToSlide(index) {
        currentSlide = index;
        updateSlider();
    }

    // Initialize the slider
    renderSlides();
    updateSlider();

    // Button event listeners
    document.getElementById('nextSlideButton').addEventListener('click', nextSlide);
    document.getElementById('prevSlideButton').addEventListener('click', previousSlide);

    // Auto-slide functionality
    setInterval(nextSlide, 5000);


</script>

<!-- Products by Category -->
<script>
    const categoryIds = [10, 35, 13, 2]; // your category IDs
    const categorySectionContainer = document.getElementById("dynamic-category-sections");

    function scrollCategoryProducts(sectionId, direction) {
        const container = document.getElementById(`${sectionId}Slider`);
        const scrollAmount = 300;
        container.scrollBy({
            left: direction === 'left' ? -scrollAmount : scrollAmount,
            behavior: 'smooth'
        });
    }

    async function loadCategorySections() {
        try {
            const response = await fetch(`<?php echo $BASE_URL_LOCAL; ?>/products/get_products_by_category.php`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ category_id: categoryIds.join(", ") })
            });

            const result = await response.json();
            if (result.status === 'success') {
                result.categories.forEach(category => {
                    if (!category.products || category.products.length === 0) return; // Skip empty categories

                    const sectionId = `category-${category.category_id}`;
                    let html = `
                    <div class="bg-white rounded-lg p-4 md:p-6 mt-6">
                        <div class="flex justify-between items-center mb-4 md:mb-6">
                            <h2 class="text-xl md:text-2xl text-gray-800">${category.category_name}</h2>
                            <div class="flex gap-2">
                                <a href="under_construction?slug=${category.category_slug}" class="text-sm text-orange-600 mt-2 hover:underline">View All</a>
                                <button onclick=\"scrollCategoryProducts('${sectionId}', 'left')\" class="bg-orange-600 hover:bg-orange-700 text-white p-2 rounded-full">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button onclick=\"scrollCategoryProducts('${sectionId}', 'right')\" class="bg-orange-600 hover:bg-orange-700 text-white p-2 rounded-full">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            <div class="flex gap-4 overflow-x-hidden pb-2" id="${sectionId}Slider">
                    `;

                    category.products.forEach(product => {
                        // const firstImage = product.photos.split(",")[0];
                        // const firstImage = "Johar_traders_uploads/placeholder.png";
                        const firstImage = product.photos
                            ? product.photos.split(",")[0].trim() || 'Johar_traders_uploads/placeholder.png'
                            : 'Johar_traders_uploads/placeholder.png';

                        const displayName = product.name.length > 25 
                            ? product.name.slice(0, 25) + '...' 
                            : product.name;

                        html += `
                            <div class="product-card bg-gray-100 rounded-lg p-4 min-w-[240px] hover:shadow-lg transition-shadow">
                                <img src="Johar_traders_uploads/product/${firstImage}" alt="${product.name}" class="w-full h-40 md:h-48 object-cover rounded-lg mb-4">
                                <h3 class="text-base md:text-sm mb-2">${displayName}</h3>
                                <p class="text-gray-600 text-sm mb-3">SKU: ${product.sku}</p>
                                <div class="flex justify-between items-center">
                                    <a href="under_construction?slug=${product.slug}" class="bg-orange-600 hover:bg-orange-700 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm transition-colors">View Detail</a>
                                </div>
                            </div>
                        `;
                    });

                    html += `</div></div></div>`;
                    categorySectionContainer.innerHTML += html;
                });
            }
        } catch (error) {
            console.error("Error loading featured categories:", error);
        }
    }

    document.addEventListener("DOMContentLoaded", loadCategorySections);
</script>
<?php include("footer.php") ?>
