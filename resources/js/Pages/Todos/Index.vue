<template>
  <div class="count-up">
    <li style="list-style:none;">現在{{ count }}回クリックされています</li>
    <button v-on:click="countUp" class="btn btn-secondary btn-sm">カウントアップ</button>
  </div>
  
  <div class="container" style="margin-top:50px;">
    <h1>Todoリスト追加</h1>
    <div class="form-group">
        <label >やることを追加してください</label>
        <input type="text" v-model="newTodo" class="form-control" style="max-width:1000px;">
      </div>
    <button v-on:click="addTodo()" class="btn btn-primary">追加する</button>

    <h1 style="margin-top:50px;">Todoリスト</h1>
    <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
      <tbody>
        <tr v-for="(todo, index) in todos" :key="todo">
          <td v-if="!todo.editFlag">{{ todo.name }} </td>
          <td v-else><input type="text" class="form-control" v-bind:value="todo.name"></td>
          <td>
            <button v-if="!todo.editFlag" type="submit" v-on:click="edTodo(todo.name, index)" class="btn btn-primary">編集</button>
            <button v-else type="submit" v-on:click="cplTodo(todo.id, index)" class="btn btn-primary">完了</button>
          </td>
          <td>
            <button type="submit" v-on:click="delTodo(todo.id)"  class="btn btn-danger">削除</button>
          </td> 
          <td>{{ todo.editFlag }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  import { Inertia } from '@inertiajs/inertia';

  export default {
    props: {
      todos:[
        Array
      ]
    },

    data() {
      return {
        count: 0,
        name: "",
      }
    },

    methods:{
      countUp() {
        this.count = this.count + 1
      },  

      addTodo:function() {
        Inertia.post('/todos/store', {
          name : this.newTodo
        })
        Inertia.get('/todos')
      },

      edTodo:function(name, index) {
        this.todos[index].editFlag = true;
        this.todos[index].name = name;
      },

      cplTodo:function(id, index) {
        Inertia.post(`/todos/update/${id}`)
        this.todos[index].editFlag = false;
        // Inertia.get('/todos')
      },

      delTodo:function(id) {
        Inertia.post(`/todos/destroy/${id}`)
        Inertia.get('/todos')
      }
    },

    mounted() {
      console.log(this.todos);
    }
  }
  
</script>
