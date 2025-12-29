<script setup>
	import { ref, onMounted } from 'vue'
	import api from '@/services/api'
	
	const tasks = ref([])
	const newTask = ref({
	  title: '',
	  deadline: '',
	  priority: 'medium'
	})
	const loading = ref(false)
	const error = ref('')
	
	const loadTasks = async () => {
	  try {
		loading.value = true
		const response = await api.getTasks()
		tasks.value = response.data.data || response.data
	  } catch (err) {
		error.value = 'Ошибка загрузки задач'
		console.error(err)
	  } finally {
		loading.value = false
	  }
	}
	
	const createTask = async () => {
	  try {
		await api.createTask(newTask.value)
		newTask.value = { title: '', deadline: '', priority: 'medium' }
		await loadTasks()
	  } catch (err) {
		error.value = 'Ошибка создания задачи'
		console.error(err)
	  }
	}
	
	const toggleTask = async (task) => {
	  try {
		await api.updateTask(task.id, {
		  completed: !task.completed
		})
		await loadTasks()
	  } catch (err) {
		console.error(err)
	  }
	}
	
	const deleteTask = async (id) => {
	  try {
		await api.deleteTask(id)
		await loadTasks()
	  } catch (err) {
		console.error(err)
	  }
	}
	
	onMounted(() => {
	  loadTasks()
	})
	</script>
	
	<template>
	  <div class="container">
		<h1>📝 Todo List</h1>
	
		<div v-if="error" class="error">{{ error }}</div>
		<div v-if="loading" class="loading">Загрузка...</div>
	
		<form @submit.prevent="createTask" class="create-form">
		  <input
			v-model="newTask.title"
			type="text"
			placeholder="Название задачи"
			required
		  />
		  <input
			v-model="newTask.deadline"
			type="date"
			required
		  />
		  <select v-model="newTask.priority">
			<option value="low">Низкий</option>
			<option value="medium">Средний</option>
			<option value="high">Высокий</option>
		  </select>
		  <button type="submit">➕ Добавить</button>
		</form>
	
		<ul class="task-list" v-if="tasks.length > 0">
		  <li
			v-for="task in tasks"
			:key="task.id"
			:class="{ completed: task.completed }"
		  >
			<input
			  type="checkbox"
			  :checked="task.completed"
			  @change="toggleTask(task)"
			/>
			<div class="task-info">
			  <strong>{{ task.title }}</strong>
			  <span>📅 {{ task.deadline }} | 🎯 {{ task.priority }}</span>
			</div>
			<button @click="deleteTask(task.id)" class="delete-btn">
			  🗑️
			</button>
		  </li>
		</ul>
	
		<div v-else-if="!loading" class="empty">
		  Нет задач. Создайте первую! 🎉
		</div>
	  </div>
	</template>
	
	<style scoped>
	.container {
	  max-width: 700px;
	  margin: 50px auto;
	  padding: 30px;
	  background: #f9f9f9;
	  border-radius: 12px;
	  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
	}
	
	h1 {
	  text-align: center;
	  color: #2c3e50;
	  margin-bottom: 30px;
	}
	
	.error {
	  padding: 15px;
	  background: #fee;
	  color: #c33;
	  border-radius: 8px;
	  margin-bottom: 20px;
	}
	
	.loading {
	  text-align: center;
	  padding: 20px;
	  color: #666;
	}
	
	.create-form {
	  display: flex;
	  gap: 10px;
	  margin-bottom: 30px;
	  flex-wrap: wrap;
	}
	
	.create-form input,
	.create-form select {
	  padding: 12px;
	  border: 2px solid #ddd;
	  border-radius: 8px;
	  font-size: 14px;
	  flex: 1;
	  min-width: 150px;
	}
	
	.create-form button {
	  padding: 12px 24px;
	  background: #42b983;
	  color: white;
	  border: none;
	  border-radius: 8px;
	  cursor: pointer;
	  font-weight: bold;
	}
	
	.task-list {
	  list-style: none;
	  padding: 0;
	}
	
	.task-list li {
	  display: flex;
	  align-items: center;
	  gap: 15px;
	  padding: 18px;
	  background: white;
	  border-radius: 8px;
	  margin-bottom: 12px;
	}
	
	.task-list li.completed {
	  opacity: 0.6;
	}
	
	.task-list li.completed .task-info strong {
	  text-decoration: line-through;
	}
	
	.task-info {
	  flex: 1;
	  display: flex;
	  flex-direction: column;
	  gap: 8px;
	}
	
	.delete-btn {
	  padding: 8px 16px;
	  background: #e74c3c;
	  color: white;
	  border: none;
	  border-radius: 6px;
	  cursor: pointer;
	}
	
	.empty {
	  text-align: center;
	  padding: 40px;
	  color: #95a5a6;
	  font-size: 18px;
	}
	</style>