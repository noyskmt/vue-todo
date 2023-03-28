
axios.get('/todos')
  .then(function (response) {
 // handle success(axiosの処理が成功した場合に処理させたいことを記述)
    console.log(response);
  })
  .catch(function (error) {
 // handle error(axiosの処理にエラーが発生した場合に処理させたいことを記述)
    console.log(error);
  })
  .finally(function () {
 // always executed(axiosの処理結果によらずいつも実行させたい処理を記述)
  });
  
const { createApp, ref, onMounted } = Vue;
createApp({
  setup() {
    const message = ref('Hello Axios');
    onMounted(() => {
      axios
      .get('https://jsonplaceholder.typicode.com/users')
      .then((response) => console.log(response))
      .catch((error) => console.log(error));
    });
    return {
      message,
    };
  },
}).mount('#app');