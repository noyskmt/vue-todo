
<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    props:{
        create_todos: {
            type: Array,
        }
    },
    
}
</script>
<template>
    <div class="container" style="margin-top:50px;">
    <h1>Todoリスト追加</h1>

    <form>
      <div class="form-group">
        <label >やることを追加してください</label>
        <td v-for="create_todo in create_todos">
         <input type="text" style="max-width:1000px;">
        </td>
      </div>
      <button @click="remove" type="submit" class="btn btn-primary">追加する</button>
    </form>

    <h1 style="margin-top:50px;">Todoリスト</h1>
    <table class="table table-striped" style="max-width:1000px; margin-top:20px;">
      <tbody>
        <tr>
          <td>フォームで入力した値を受け取る</td>
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