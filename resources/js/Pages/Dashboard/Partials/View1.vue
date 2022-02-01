<template>
	<!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Total clients
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    6389
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Account balance
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    $ 46,760.89
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    New sales
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    376
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Pending contacts
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    35
                  </p>
                </div>
              </div>
            </div>

    <div v-for="element in elements">
		<div class="col-span-1 pl-5 pr-3 whitespace-no-wrap flex flex-col justify-center mb-2 mt-10 sm:mt-0">
			<div class="text-gray-400">Year</div>
			<div class="text-sm">{{ element.year }}</div>
		</div>

		<ul class="grid gap-6">
    		<li v-for="rating in element.ratings">
                <Link :href="route('submission.index', {'rating': rating.id})">

		            <div class="relative transform scale-100 py-1 cursor-default bg-white hover:bg-blue-500 hover:bg-opacity-25 grid grid-cols-6 sm:rounded-lg shadow-xs">
		            	<div class="col-span-1 pl-5 pr-3 whitespace-no-wrap flex flex-col justify-center">
		            		<div class="text-gray-400">Today</div>
		                    <div>07:45</div>
		            	</div>

		            	<div class="col-span-5 px-2 py-2 whitespace-no-wrap">
		                    <div class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
		                    	Rating title
		                    </div>
		                    <div class="text-lg font-semibold text-gray-700 dark:text-gray-200">
		                    	{{ rating.name }}
		                	</div>
		                    <div class="leading-5 text-sm text-gray-800">
		                    	{{ rating.description }}
		                    </div>
		                </div>
		            </div>
		        </Link>
		    </li>
		</ul>
    	<breeze-section-border />
	</div>

</template>

<script>
	import BreezeSectionBorder from '@/Components/SectionBorder.vue'
	import BreezeBadge from '@/Components/Badge.vue'
	import { Link } from '@inertiajs/inertia-vue3';
	export default {
		components: {
			BreezeSectionBorder,
			BreezeBadge,
        	Link,
		},

		props: ['elements', 'translate']
/*
<svg class="" xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56" fill="none" aria-hidden="true">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 13C4 11.3431 5.34315 10 7 10H14C14.5523 10 15 10.4477 15 11C15 11.5523 14.5523 12 14 12H7C6.44772 12 6 12.4477 6 13V47C6 47.5523 6.44771 48 7 48H14C14.5523 48 15 48.4477 15 49C15 49.5523 14.5523 50 14 50H7C5.34315 50 4 48.6569 4 47V13Z" fill="#79B8FF"></path>
    <path d="M23 36C22.4477 36 22 36.4477 22 37C22 37.5523 22.4477 38 23 38H46C46.5523 38 47 37.5523 47 37C47 36.4477 46.5523 36 46 36H23Z" fill="#2188FF"></path>
    <path d="M22 31C22 30.4477 22.4477 30 23 30H46C46.5523 30 47 30.4477 47 31C47 31.5523 46.5523 32 46 32H23C22.4477 32 22 31.5523 22 31Z" fill="#2188FF"></path>
    <path d="M23 24C22.4477 24 22 24.4477 22 25C22 25.5523 22.4477 26 23 26H46C46.5523 26 47 25.5523 47 25C47 24.4477 46.5523 24 46 24H23Z" fill="#2188FF"></path>
    <path d="M22 19C22 18.4477 22.4477 18 23 18H36C36.5523 18 37 18.4477 37 19C37 19.5523 36.5523 20 36 20H23C22.4477 20 22 19.5523 22 19Z" fill="#2188FF"></path>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M20 6C18.3431 6 17 7.34315 17 9V47C17 48.6569 18.3431 50 20 50H49C50.6569 50 52 48.6569 52 47V9C52 7.34315 50.6569 6 49 6H20ZM19 9C19 8.44772 19.4477 8 20 8H49C49.5523 8 50 8.44772 50 9V47C50 47.5523 49.5523 48 49 48H20C19.4477 48 19 47.5523 19 47V9Z" fill="#2188FF"></path>
    <path d="M10 36C9.44772 36 9 36.4477 9 37C9 37.5523 9.44772 38 10 38H14C14.5523 38 15 37.5523 15 37C15 36.4477 14.5523 36 14 36H10Z" fill="#2188FF"></path>
    <path d="M9 31C9 30.4477 9.44772 30 10 30H14C14.5523 30 15 30.4477 15 31C15 31.5523 14.5523 32 14 32H10C9.44772 32 9 31.5523 9 31Z" fill="#2188FF"></path>
    <path d="M10 24C9.44772 24 9 24.4477 9 25C9 25.5523 9.44772 26 10 26H14C14.5523 26 15 25.5523 15 25C15 24.4477 14.5523 24 14 24H10Z" fill="#2188FF"></path>
</svg>
*/
	}
</script>
