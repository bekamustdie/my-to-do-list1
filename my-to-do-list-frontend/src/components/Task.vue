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

	const emit = defineEmits(['updateTask',"delete", "update-task"])

	const toggleTask = ()=>{
		emit('toggle-task', props.task)
	}

	const isChecked = computed(() => props.task.completed)

	const deleteThisTask =()=>{
		emit("delete", props.task)
	}
	
	const updateTask=(TaskValue)=>{
		emit("update-task", props.task, TaskValue)
	}

	const updateState =()=>{
		props.task.change = !props.task.change
	}
	



	
	
</script>

<template>
	<!-- checking if change stament is true, change card to update form -->
	<div v-if="props.task.change" class="flex">
		<UpdateTask :task="props.task" @update-task ="updateTask" @cancel-update="updateState"/>
		
	</div>
	<!--  if change stament is false, showing simple card -->
	<div v-else="props.task.change" class="flex">
		<input type="checkbox" @change="toggleTask" class="w-[20px]" :checked="isChecked">
		<p class="flex-1 text-center my-auto" :style="{textDecoration: strikeThrough}">{{props.task.title}}</p>
		<div class="text-xs flex flex-col gap-4 mx-5">
			<span>{{props.task.deadline}}</span>
			<span :style="{ color: PriorityStyles }" >{{props.task.priority}}</span>
		</div>
		<a href="" class="p-2"></a>
		<button class="p-2 cursor-pointer" @click="deleteThisTask" >🗑️</button>
		<button v-if="!props.task.completed" class="p-2 cursor-pointer" @click="updateState" >🔄</button>

	</div>
</template>