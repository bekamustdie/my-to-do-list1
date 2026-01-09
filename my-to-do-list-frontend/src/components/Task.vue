<script setup>
import { computed } from 'vue';
import UpdateTask from './UpdateTask.vue';

	const props = defineProps({
		task:{
			required:true,
			type: Object,
			change: false
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

	const strikeThrough = computed(()=>{
		if (props.task.completed){
			return "line-through"
		}
	})

	const emit = defineEmits(['updateTask',"delete"])

	const handleChange = ()=>{
		emit('updateTask', props.task)
	}

	const isChecked = computed(() => props.task.completed)

	const deleteThisTask =()=>{
		emit("delete", props.task)
	}
	
</script>
<template>
	<div v-if="!props.task.change" class="flex">
		<UpdateTask :task="props.task"/>
		
	</div>
	<div v-else="!props.task.change" class="flex">
		<input type="checkbox" @change="handleChange" class="w-[20px]" :checked="isChecked">
		<p class="flex-1 text-center my-auto" :style="{textDecoration: strikeThrough}">{{props.task.title}}</p>
		<div class="text-xs flex flex-col gap-4 mx-5">
			<span>{{props.task.deadline}}</span>
			<span :style="{ color: PriorityStyles }" >{{props.task.priority}}</span>
		</div>
		<a href="" class="p-2"></a>
		<button class="p-2 cursor-pointer" @click="deleteThisTask" >🗑️</button>

	</div>
</template>