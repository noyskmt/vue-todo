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
        <tr v-for="todo in todos">
          <td>{{ todo.name }}</td>
          <td>
            <form action="{{route('todos.edit', todo) }}" method="get">
              <button type="submit" class="btn btn-primary">編集</button>
            </form>
          </td>
          <td>
            <form action="{{route('todos.destroy', todo->id)}}" method="post">
              <button type="submit" class="btn btn-danger">削除</button>
            </form>
          </td> 
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  // import axios from 'axios';
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
        name: ""

      }
    },

    methods:{
      countUp() {
        this.count = this.count + 1
      },  

      addTodo:function() {
        Inertia.post('/todos/store', {
          name : this.newTodo
        });
        
        // .then((response) => {
        //   console.log(response);
        // })
        // .catch((error) => {
        //   console.log(error);
        // });
      },

      mounted() {
        this.newTodo = todos
        // axios.get('/todos')
        // .then((response) => (this.todo = response.data));
        // axios.post('/todos/store', data,)
      },
    }
  }
  
</script>
