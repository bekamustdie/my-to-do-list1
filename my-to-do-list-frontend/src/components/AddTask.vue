<script setup>
	import { ref, onMounted, computed } from 'vue'

	const getTodayDate = () => {
		return new Date().toISOString().split('T')[0]
	}

	

	const newTask = ref({
	  title: '',
	  deadline: getTodayDate(),
	  priority: 'medium'
	})

	const emit = defineEmits(["create-task"])

	const create = ()=>{
		console.log(newTask.value)
		emit("create-task", newTask.value)
		newTask.value = {title:"", deadline:getTodayDate(), priority:"medium"}
	}

	const today =  new Date().toISOString().split('T')[0]
	

</script>

<template>
	<div class="max-w-2xl mt-[50px] mb-[20px] bg-[#f9f9f9] mx-auto p-[30px] rounded-lg shadow-md">
		<div class="p-[15px] bg-[#fee] color-[#c33] rounded-md mb-[20px] hidden"></div>
			<h1 class="text-center color-[#2c3e50] mb-[30px]">📝 Todo List</h1>
			<div class="flex gap-[10px] mb-[30px] ">
			<form @submit.prevent="create" name="newTask" class="flex gap-2 flex-wrap">
				<input v-model="newTask.title"  placeholder="your task" name="title" type="text" class="p-[12px]  border-2 border-[#ddd] rounded-lg">
				<input v-model="newTask.deadline" name="deadline" type="date" class="p-[12px] border border-[2px] border-[#ddd] rounded-lg"  :min="today" >
				<select v-model="newTask.priority"  name="priority"  class="p-[12px] border border-[2px] border-[#ddd] rounded-lg">
					<option value="low">Low</option>
					<option value="medium">Medium</option>
					<option value="High">High</option>
				</select>
				<button type="submit" class="bg-[#42b983] color-white py-[10px] px-[20px] rounded-lg cursor-pointer">Add task</button>
			</form>
		</div>
	</div>
</template>