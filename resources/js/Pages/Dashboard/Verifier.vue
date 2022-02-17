<template>
    <Head :title="translate[0]('head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ translate[0]('header') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            	<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                    	<div class="grid gap-6 grid-cols-8 pb-6">
					      	<div class="col-span-8 sm:col-span-4">
					      		<form @submit.prevent="$emit('submitted')">
				                	<breeze-select id="verifier" class="mt-1 block w-full" :value="form.verifier" @input="submit" :options="options.verifier" :multiple="false" />
				                </form>
				            </div>
				            <div class="col-span-8 sm:col-span-2">
				            	<p class="text-sm text-gray-800">All participants</p>
				            	<h3 class="text-lg">25</h3>
				            </div>
				            <div class="col-span-8 sm:col-span-2">
				                <p class="text-sm text-gray-800">Last</p>
				            	<h3 class="text-lg">12</h3>
				            </div>
				        </div>

                        <!-- Table -->
                        <div class="-mx-6">
	                        <table class="min-w-full divide-y divide-gray-200">
					          <thead class="bg-gray-50">
					            <tr class="flex flex-col md:table-row">
					              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
					              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
					              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progress</th>
					              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
					              <th scope="col" class="relative px-6 py-3">
					                <span class="sr-only">Edit</span>
					              </th>
					            </tr>
					          </thead>
					          <tbody class="bg-white divide-y divide-gray-200">
					            <tr class="flex flex-col md:table-row" v-for="user in $page.props.verifier.users.data">
					              <td class="px-6 py-4 whitespace-nowrap">
					                <div class="flex items-center">
					                  <div class="flex-shrink-0 h-10 w-10">
					                    <img class="h-10 w-10 rounded-full" :src="user.profile_photo_path" alt="">
					                  </div>
					                  <div class="ml-4">
					                    <div class="text-sm font-medium text-gray-900">{{ user.name }}</div>
					                    <div class="text-sm text-gray-500">{{ user.email }}</div>
					                  </div>
					                </div>
					              </td>
					              <td class="px-6 py-4 whitespace-nowrap">
					                <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
					                <div class="text-sm text-gray-500">Optimization</div>
					              </td>
					              <td class="px-6 py-4 whitespace-nowrap">
					                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Active </span>
					              </td>
					              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin</td>
					              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
					                <Link :href="route('verification.index', {'verifier': $page.props.verifier.id, 'rating': $page.props.verifier.rating.id, 'user': user.id})" class="text-indigo-600 hover:text-indigo-900">Visit</Link>
					              </td>
					            </tr>

					            <!-- More people... -->
					          </tbody>
					        </table>

					        <div class="flex justify-center items-center my-2">
					            <breeze-pagination :links="$page.props.verifier.users.links" />
					        </div>
					        <!-- /Table -->
					    </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeFormSection from '@/Components/FormSection.vue'
import BreezeSectionBorder from '@/Components/SectionBorder.vue'
import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
import BreezePagination from '@/Components/Pagination'
import BreezeDropdown from '@/Components/Dropdown.vue'
import BreezeDropdownLink from '@/Components/DropdownLink.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeSelect from '@/Components/Select.vue'
import BreezeAvatar from '@/Components/Avatar.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeFormSection,
        BreezeSectionBorder,
        BreezeButtonSecondary,
        BreezePagination,
        BreezeDropdown,
        BreezeDropdownLink,
        BreezeAvatar,
        BreezeLabel,
        BreezeSelect,
        Link,
        Head,
    },

    data() {
    	return {
    		form: this.$inertia.form({
                verifier: this.$page.props.verifier.id,
            })
    	};
    },

    methods: {
    	submit(event) {
    		this.form.verifier = event;

    		this.form.get(route( 'dashboard-verifier', {'verifier': this.form.verifier} ), {
                errorBag: 'submit',
                preserveScroll: true
            });
    	}
    },

    computed: {
        translate() {
            var $t = this.$t;

            return [
                function (path) { // [0]
                    return $t(`pages.dashboard.verifier.${path}`);
                },
            ]
        },
        options() {
    		return {
    			'verifier': this.$page.props.verifiers ? this.$page.props.verifiers.map(function(verifier) {
    				return {
    					'value': verifier.id,
    					'name': verifier.rating.name,
    					'description': verifier.rating.description
    				};
    			}) : Array()
    		};
    	}
    },
}
</script>