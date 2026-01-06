import axios from 'axios'

const api = axios.create({
  baseURL: 'http://127.0.0.1:8001/api/v1',
  headers: {
    'Content-Type': 'application/json',
  }
})

export default {
  
  getTasks() {
    return api.get('/tasks')
  },

  createTask(data) {
    return api.post('/tasks', data)
  },

  updateTask(id, data) {
    return api.patch(`/tasks/${id}`, data)
  },

  deleteTask(id) {
    return api.delete(`/tasks/${id}`)
  }

}