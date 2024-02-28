<div class="fixed w-40 lg:w-1/6 overflow-y-auto bg-blue lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div>
            <span class="text-2xl font-semibold text-white">Dashboard</span>
        </div>
    </div>

    <nav class="mt-10">
        <a class="flex items-center px-3 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.enrolls.list') }}">
           
            <span class="mx-3">Enrolls</span>
        </a>

        <a class="flex items-center px-3 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.testimonials.list') }}">
           
            <span class="mx-3">Testimonial</span>
        </a>

        <a class="flex items-center px-3 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.events.list') }}">
           
            <span class="mx-3">Events</span>
        </a>

        <a class="flex items-center px-3 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.teams.list') }}">
           

            <span class="mx-3">Team</span>
        </a>

        <a class="flex items-center px-3 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.contacts.list') }}">
            <span class="mx-3">Contacts</span>
        </a>
        <a class="flex items-center px-3 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.courses.list') }}">
           
            <span class="mx-3">Courses</span>
        </a>
        
        <a class="flex items-center px-3 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.eventgalleries.list') }}">
           
            <span class="mx-3">Gallery</span>
        </a>
        <a class="flex items-center px-3 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.blogs.list') }}">
           
            <span class="mx-3">Blog</span>
        </a>
        <a class="flex items-center px-3 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.coursecategory.list') }}">
           
            <span class="mx-3">Course Category</span>
        </a>
        <a class="flex items-center px-3 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.clients.list') }}">
           
            <span class="mx-3">Clients</span>
        </a>
        <a class="flex items-center px-3 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.placements.list') }}">
           
            <span class="mx-3">Partners</span>
        </a>
        <a class="flex items-center px-3 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.studentcertificates.list') }}">
           
            <span class="mx-3">Students</span>
        </a>
        <a class="flex items-center px-3 py-2 mt-4 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{ route('admin.requestcertificates.list') }}">
           
            <span class="mx-3">Requested Certificates</span>
        </a>
    </nav>
</div>

<script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.querySelector('.lg:hidden');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>