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
            <button type="submit" v-on:click="deodo" class="btn btn-primary">編集</button>
          </td>
          <td>
            <button type="submit" v-on:click="delTodo(todo.id)"  class="btn btn-danger">削除</button>
          </td> 
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
      },

      delTodo:function(id) {
        Inertia.delete('/todos/destroy/{id}')
        console.log(id)
      },

      // delTodo:function() {
      //   todo.id => {console.log(id)}
      // }

      // delTodo:function(todo) {   //v-onをdelTodo(todo)にする DBからは削除されない方法
      //   // todos配列の todo から key を取得 
      //   var index = this.todos.indexOf(todo);
      //   // key番目から１つ削除
      //   this.todos.splice(index, 1);
      // }
      
    }
  }
  
</script>
