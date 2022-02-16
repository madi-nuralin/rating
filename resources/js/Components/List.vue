<template>
    <div>
    	<div class="flex items-center justify-between" 
            v-for="(item, i) in items.data" :key="item.id" :class="i != 0 ? 'mt-4' : 'mt-0'">
            <div class="flex">
                <div :class="{'flex items-center': 'avatar' in item}">
                    <img class="w-8 h-8 mr-2 rounded-full" :src="item.avatar" :alt="item.name" v-if="'avatar' in item">
                    <div class="flex flex-col items-start">
                        <div>{{ item.name }}</div>
                        <div class="text-gray-400 text-sm" v-html="item.description" />
                    </div>
                </div>
            </div>

            <div class="flex items-center">

                <!-- Update Item -->
                <Link class="ml-2 text-sm text-gray-400 underline" :href="route(name + '.show', {'id': item.id})">
                    Update
                </Link>

                <!-- Remove Item -->
                <button class="cursor-pointer ml-6 text-sm text-red-500" v-if="showDeleteLink" >
                    Remove
                </button>
            </div>
        </div>
        
        <div class="flex justify-center items-center mt-2">
            <BreezePagination :links="items.links" />
        </div>
    </div>
</template>

<script>
    import BreezePagination from '@/Components/Pagination'
	import { Link } from '@inertiajs/inertia-vue3';

	export default {
		components: {
            BreezePagination,
            Link,
        },

        props: ['items', 'name', 'showDeleteLink'],
	}
</script>