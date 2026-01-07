<script setup>
import { computed } from 'vue';

	const props = defineProps({
		task:{
			required:true,
			type: Object
		}
	})

	const PriorityStyles = computed(()=>{
		switch (props.task.priority){
			case "low":
				return "#71e368"
			case "medium":
				return "#e3d50e"
			case "high":
				return "#d40606"
		}
	})
	
</script>
<template>
	
	<div class="flex">
		<input type="checkbox" class="w-[20px]">
		<p class="flex-1 text-center my-auto">{{props.task.title}}</p>
		<div class="text-xs flex flex-col gap-4 mx-5">
			<span  >{{props.task.deadline}}</span>
			<span :style="{ color: PriorityStyles }" >{{props.task.priority}}</span>
		</div>
		<a href="" class="p-2">🗑️</a>
	</div>
</template>