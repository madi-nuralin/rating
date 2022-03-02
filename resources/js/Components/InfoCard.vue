<template>
	<div class="shadow md:rounded-lg border-gray-100 bg-white border dark:bg-gray-800 dark:border-gray-800">
		<!---->
		<div class="p-6">
			<div class="justify-between items-center flex">
				<div class="flex shrink-0 grow-0 items-center justify-center">
					<div>
						<h3 class="text-lg leading-tight text-gray-500 dark:text-gray-400">
							<slot name="title"></slot>
						</h3>
						<h1 class="text-3xl leading-tight font-semibold dark:text-gray-100">
							<slot name="description"></slot>
						</h1>
					</div>
				</div>
				<div class="flex shrink-0 grow-0 items-center justify-center">
					<slot name="icon"></slot>
				</div>
			</div>
		</div>
	</div>
</template>