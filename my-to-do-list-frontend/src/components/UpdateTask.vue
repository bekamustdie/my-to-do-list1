<script setup>
import { ref } from 'vue';

	const today =  new Date().toISOString().split('T')[0]

	const Props = defineProps({
		task:{
			required: true,
			type: Object
		}
	})

	const TaskValue = ref({
		title: Props.task.title,
	  	deadline: Props.task.deadline,
	  	priority: Props.task.priority
	})

</script>

<template>
	<form @submit.prevent="submit" >
		<input v-model="TaskValue.title"  placeholder="your task" name="title" type="text" class="p-[12px]  border-2 border-[#ddd] rounded-lg">
				<input v-model="TaskValue.deadline" name="deadline" type="date" class="p-[12px] border border-[2px] border-[#ddd] rounded-lg"  :min="today" >
				<select v-model="TaskValue.priority"  name="priority"  class="p-[12px] border border-[2px] border-[#ddd] rounded-lg">
					<option value="low">Low</option>
					<option value="medium">Medium</option>
					<option value="high">High</option>
				</select>
		<button type="submit" class="bg-[#42b983] color-white py-[10px] px-[20px] rounded-lg cursor-pointer">Update task</button>
	</form>
</template>