
    <!-- Footer -->
    <footer class="text-white mt-16 footer">
        <div class="max-w-7xl mx-auto px-5 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- Our Company -->
                <div>
                    <h3 class="text-orange-500 text-xl font-bold mb-4">Our Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-white-500 hover:text-orange-400 transition-colors">About Us</a></li>
                        <li><a href="#" class="text-white-500 hover:text-orange-400 transition-colors">Distributor Enquiry Form</a></li>
                        <li><a href="#" class="text-white-500 hover:text-orange-400 transition-colors">Corporate Video</a></li>
                        <li><a href="#" class="text-white-500 hover:text-orange-400 transition-colors">Contact Us</a></li>
                    </ul>
                </div>
                
                <!-- Our Product Range -->
                <div>
                    <h3 class="text-orange-500 text-xl font-bold mb-4">Our Product Range</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-white-500 hover:text-orange-400 transition-colors">Poultry Machines</a></li>
                        <li><a href="#" class="text-white-500 hover:text-orange-400 transition-colors">Ice Cream & Cafe Machines</a></li>
                        <li><a href="#" class="text-white-500 hover:text-orange-400 transition-colors">Wet Grinder Machines</a></li>
                        <li><a href="#" class="text-white-500 hover:text-orange-400 transition-colors">Namkeen Machines</a></li>
                        <li><a href="#" class="text-white-500 hover:text-orange-400 transition-colors">Noodles / Sewai Machines</a></li>
                        <li><a href="#" class="text-white-500 hover:text-orange-400 transition-colors">Fast Food Machines</a></li>
                        <li><a href="#" class="text-white-500 hover:text-orange-400 transition-colors">More</a></li>
                    </ul>
                </div>
                
                <!-- Contact Us -->
                <div>
                    <h3 class="text-orange-500 text-xl font-bold mb-4">Contact Us</h3>
                    <div class="space-y-2">
                        <div>
                            <p class="text-white-500 font-semibold">Address:</p>
                            <p class="text-white-500 text-sm">24, Netaji Subhash Road, Ground Floor Room 8A</p>
                            <p class="text-white-500 text-sm">Opp PNB Bank, Kolkata- 700001,</p>
                            <p class="text-white-500 text-sm">West Bengal, India</p>
                        </div>
                    </div>
                </div>
                
                <!-- Huzefa Johar -->
                <div>
                    <h3 class="text-orange-500 text-xl font-bold mb-4">Huzefa Johar</h3>
                    <div class="space-y-2">
                        <div>
                            <p class="text-white-500 font-semibold">Mob:</p>
                            <p class="text-white-500">+91 9831050825</p>
                        </div>
                        <div>
                            <p class="text-white-500 font-semibold">Landline:</p>
                            <p class="text-white-500">033-40846288</p>
                        </div>
                        <div>
                            <p class="text-white-500 font-semibold">Email:</p>
                            <p class="text-white-500">johartrader52@gmail.com</p>
                        </div>
                        <div class="mt-4">
                            <p class="text-white-500 font-semibold mb-2">Connect with Us:</p>
                            <div class="flex space-x-2">
                                <a href="#" class="w-8 h-8 bg-blue-600 rounded flex items-center justify-center hover:bg-blue-700 transition-colors">
                                    <span class="text-white text-sm font-bold">f</span>
                                </a>
                                <a href="#" class="w-8 h-8 bg-red-600 rounded flex items-center justify-center hover:bg-red-700 transition-colors">
                                    <span class="text-white text-sm font-bold">G+</span>
                                </a>
                                <a href="#" class="w-8 h-8 bg-blue-400 rounded flex items-center justify-center hover:bg-blue-500 transition-colors">
                                    <span class="text-white text-sm font-bold">t</span>
                                </a>
                                <a href="#" class="w-8 h-8 bg-blue-700 rounded flex items-center justify-center hover:bg-blue-800 transition-colors">
                                    <span class="text-white text-sm font-bold">in</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Johar Traders Logo Section -->
            <div class="text-center mb-8">
                <div class="flex items-center justify-center mb-4">
                    <div class="flex items-center justify-center w-full">
                        <img src="Johar_traders_uploads/logo/TCJBTL91DR-20190102-073826.png" 
                            alt="Company Logo" class="w-full max-w-[300px] md:max-w-[400px] h-auto object-contain">
                    </div>
                </div>
            </div>
            
            <!-- Orange Banner -->
            <div class="bg-orange-600 text-white text-center py-4 mb-8 rounded-lg">
                <p class="text-lg font-bold">FOR HEAVY MACHINERY CONTACT OUR CONCERN S.AKBERALLY & CO</p>
            </div>
            
            <!-- S.Akberally & Co Section -->
            <div class="text-center mb-8">
                <div class="flex items-center justify-center mb-4">
                    <div class="flex items-center justify-center w-full">
                        <img src="Johar_traders_uploads/logo/sakberally_logo.png" 
                            alt="Company Logo" class="w-full max-w-[300px] md:max-w-[400px] h-auto object-contain">
                    </div>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="text-center border-gray-700 pt-4">
                <p class="text-white-400 text-sm">© Johar Traders. All Rights Reserved (Terms of Use)</p>
            </div>
        </div>
    </footer>
    
    <!-- Static Products Slider Section  -->
    <script>
        // Initialize positions for each section
        const sliderPositions = {
            featured: 0,
            bestselling: 0,
            newproducts: 0
        };

        window.addEventListener('scroll', function () {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
            }
        });

        function scrollProducts(section, direction) {
            const slider = document.getElementById(section + 'Slider');
            const cardWidth = window.innerWidth < 640 ? 235 : (window.innerWidth < 768 ? 265 : 300);
            const visibleCards = window.innerWidth < 640 ? 1 : (window.innerWidth < 1024 ? 2 : 3);
            const maxScroll = Math.max(0, (slider.children.length - visibleCards) * cardWidth);

            if (direction === 'right') {
                sliderPositions[section] = Math.min(sliderPositions[section] + cardWidth, maxScroll);
            } else {
                sliderPositions[section] = Math.max(sliderPositions[section] - cardWidth, 0);
            }

            slider.style.transform = `translateX(-${sliderPositions[section]}px)`;
        }

        // Fixed navigation functionality
        let lastScrollTop = 0;
        const nav = document.getElementById('navbar');
        const navHeight = nav.offsetHeight;
        window.addEventListener('scroll', function () {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > 200) {
                nav.classList.add('nav-fixed');
                document.body.style.paddingTop = navHeight + 'px';
            } else {
                nav.classList.remove('nav-fixed');
                document.body.style.paddingTop = '0';
            }
        });


        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('active');
        });

        // Mobile category modal functionality
        const categoriesBtn = document.getElementById('categoriesBtn');
        const categoryModal = document.getElementById('categoryModal');
        const closeCategoryModal = document.getElementById('closeCategoryModal');

        if (window.innerWidth <= 768) {
            categoriesBtn.addEventListener('click', function (e) {
                e.preventDefault();
                categoryModal.style.display = 'block';
            });

            closeCategoryModal.addEventListener('click', function () {
                categoryModal.style.display = 'none';
            });

            // Close modal when clicking outside
            categoryModal.addEventListener('click', function (e) {
                if (e.target === categoryModal) {
                    categoryModal.style.display = 'none';
                }
            });
        }

        // Handle window resize
        window.addEventListener('resize', function () {
            // Reset slider positions on resize
            Object.keys(sliderPositions).forEach(key => {
                sliderPositions[key] = 0;
                const slider = document.getElementById(key + 'Slider');
                if (slider) {
                    slider.style.transform = 'translateX(0px)';
                }
            });
        });
    </script>   

</body>

</html>