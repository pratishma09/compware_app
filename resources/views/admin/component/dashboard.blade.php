<div x-cloak :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity lg:hidden h-full"></div>
    
<div x-cloak :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-blue lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
            <span class="mx-2 text-2xl font-semibold text-white">Dashboard</span>
        </div>
    </div>

    <nav class="mt-10">
        <a class="flex items-center px-6 py-2 mt-4 text-gray-100 bg-gray-700 bg-opacity-25" href="/">
            <span class="mx-3">Course Enquiry</span>
        </a>

        <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/ui-elements">
           
            <span class="mx-3">Testimonial</span>
        </a>

        <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/tables">
           

            <span class="mx-3">Team</span>
        </a>

        <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/forms">
           
            <span class="mx-3">Trainer</span>
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/course/create">
           
            <span class="mx-3">Courses</span>
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/forms">
           
            <span class="mx-3">Vacancy</span>
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/forms">
           
            <span class="mx-3">Gallery</span>
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/forms">
           
            <span class="mx-3">Blog</span>
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/forms">
           
            <span class="mx-3">Session</span>
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/forms">
           
            <span class="mx-3">Clients</span>
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/forms">
           
            <span class="mx-3">Partners</span>
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/forms">
           
            <span class="mx-3">Students</span>
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/forms">
           
            <span class="mx-3">Requested Certificates</span>
        </a>
    </nav>
</div>