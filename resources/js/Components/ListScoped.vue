<template>
    <div>
    	<ul>
            <li v-for="(item, i) in items.data">
                <slot name="item" :item="item" />
            </li>
        </ul>
        
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

        props: {
            items: {
                type: Array,
                required: true
            }
        }
	}
</script>