@extends('template')
@section('title', 'Courses')

@section('content')
    <div class=" bg-gray-100 border">
        <div class=" border-gray-900">
            <h1 class="text-5xl font-normal text-center py-8 text-blue">Our Courses</h1>
            <div class="flex justify-center mb-4">
                <p class="text-blue text-xs ml-4 hidden">Search courses</p>
                <div class="flex flex-row items-center justify-around border border-blue rounded-3xl w-2/4">
                    <input type="search" name="search" value="{{ request('search') }}" placeholder="Search courses"
                        id="search"
                        class="px-4 py-1 lg:py-3 w-5/6 rounded-3xl bg-gray-100 outline-none appearance-none focus:placeholder-transparent">
                    <button type="button" id="search-button"
                        class="bg-blue text-white px-4 py-2 lg:py-3.5 rounded-l-none rounded-3xl w-1/3 text-center text-xs lg:text-sm lg:w-1/6 uppercase"
                        onclick="searchCourses()">
                        <i class="fa-solid fa-search pt-1 pr-2"></i>Search
                    </button>
                </div>
            </div>
            <form method="get" :action="getCurrentUrl()">
                <div x-data="setup()">
                    <div class="relative max-w-sm mx-auto text-xs">
                        <div class="bg-white rounded-md p-2 flex gap-1 flex-wrap">
                            <template x-for="(name, id) in selected">
                                <div class="bg-blue-200 rounded-md flex items-center">
                                    <div class="p-2" x-text="name"></div>
                                    <div @click="remove(id)"
                                        class="p-2 select-none rounded-r-md cursor-pointer hover:bg-magma-orange-clear">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5745 1L1 12.5745" stroke="#FEAD69" stroke-width="2"
                                                stroke-linecap="round" />
                                            <path d="M1.00024 1L12.5747 12.5745" stroke="#FEAD69" stroke-width="2"
                                                stroke-linecap="round" />
                                        </svg>
                                    </div>
                                </div>
                            </template>
                            <div class="flex-1 relative">
                                <input type="text" x-model="search" x-init="initSearch()" x-ref="search_input"
                                    @input.debounce.400ms="goSearch()" placeholder="Search courses"
                                    class="w-full border-0 focus:border-0 focus:outline-none focus:ring-0 py-1 px-0"
                                    @click="showSelector = true">
                                <div x-show="showSelector" @click.away="showSelector = false"
                                    class="absolute left-0 bg-white z-30 w-full rounded-b-md font-medium mt-1">
                                    <div class="p-2 space-y-1">
                                        <template x-for="(name, id) in options">
                                            <div>
                                                <template x-if="!selected[id]">
                                                    <div @click="select(id, name)"
                                                        :class="{ 'bg-blue-200 border-2 border-blue-200 cursor-pointer rounded-md p-2 hover:border-light-blue-1': selectedCategory == id }"
                                                        x-text="name"></div>
                                                </template>
                                            </div>
                                        </template>
                                        <template x-if="Object.keys(options).length === 0">
                                            <div class="text-gray-500">
                                                No result
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


        </div>
        </form>

        <div>
            @if (session()->has('success'))
                <div>
                    {{ session('success') }}
                </div>
            @endif
        </div>
        @include('courses.course_list')
    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var categorySelect = document.getElementById('category');

            // Update form on change
            categorySelect.addEventListener('change', function() {
                // Submit the form when the selection changes
                categorySelect.form.submit();
            });
        });
    </script>
    <script>
        function setup() {
            return {
                search: '',
                showSelector: false,
                selected: {},
                selectedCategory: @json(request('coursecategory')),
                options: @json($coursecategories->pluck('coursecategory_name', 'id')->toArray()),
                initSearch() {
                // Extract the existing search query from the URL parameters
                const urlParams = new URLSearchParams(window.location.search);
                const existingSearch = urlParams.get('search');

                // Set the initial value of the search input
                if (existingSearch) {
                    this.search = existingSearch;
                    this.showSelector = true;
                }
            },
                goSearch() {
                    if (this.search) {
                        this.options = Object.fromEntries(
                            Object.entries(@json($coursecategories->pluck('coursecategory_name', 'id')->toArray()))
                            .filter(([id, name]) => name.toLowerCase().includes(this.search.toLowerCase()))
                        );
                        this.showSelector = true;
                    } else {
                        // this.clearOpts();
                    }
                },
                clearOpts() {
                    this.search = '';
                    this.showSelector = false;
                    this.options = @json($coursecategories->pluck('coursecategory_name', 'id')->toArray());
                },
                select(id, name) {
                    if (!(id in this.selected)) {
                        this.selected[id] = name;
                    }

                    // Check if there are already selected categories in the URL
                    const urlParams = new URLSearchParams(window.location.search);
                    const existingCategories = urlParams.get('coursecategory');
                    const existingSearch = urlParams.get('search');

                    // Check if the category is already present in the URL
                    const categoriesArray = existingCategories ? existingCategories.split(',') : [];
                    console.log(categoriesArray);

                    if (!categoriesArray.includes(id)) {
                        // Update the selected categories
                        const updatedCategories = existingCategories ? `${existingCategories},${id}` : id;

                        // Redirect to index with updated selected categories and existing search query
                        const updatedUrl = existingSearch ?
                            `/course?coursecategory=${updatedCategories}&search=${existingSearch}` :
                            `/course?coursecategory=${updatedCategories}`;

                        window.location.href = updatedUrl;
                    }
                },

                remove(id) {
                    delete this.selected[id];
                },

            };
        }

        function searchCourses() {
            // Get the search input value
            const searchInputValue = document.getElementById('search').value;

            // Get the existing URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const existingCategories = urlParams.get('coursecategory');

            // Update the search URL based on existing categories
            const updatedUrl = existingCategories ?
                `/course?coursecategory=${existingCategories}&search=${searchInputValue}` :
                `/course?search=${searchInputValue}`;

            // Redirect to the updated URL
            window.location.href = updatedUrl;
        }
    </script>
@endsection

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
