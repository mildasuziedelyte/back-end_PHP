const buttonA = document.querySelector('[name="sodintiAgurka"]');
const buttonP = document.querySelector('[name="sodintiPomidora"]');
const list = document.querySelector('#list');

const addNewList = () => {
  const plant = document.querySelectorAll('.plant');
  plant.forEach(plant => {
    plant.querySelector('[name="rauti"]').addEventListener('click', () => {
      const id = plant.querySelector('[name=rauti]').value;
      axios.post(apiURL + '/remove', {
        id: id
        // rauti: 1
      })
        .then(function (response) {
          console.log(response.data);
          list.innerHTML = response.data.list;
          addNewList();
        })
        .catch(function (error) {
          console.log(error.response.data.msg);
        });
    });
  });
}


document.addEventListener('DOMContentLoaded', () => {
  axios.post(apiURL + '/listSodinimas', {
    // list: 1,
  })
    .then(function (response) {
      console.log(response.data);
      list.innerHTML = response.data.list;
      addNewList();
    })
    .catch(function (error) {
      console.log(error.response.data.msg);
    });

})

buttonA.addEventListener('click', () => {
  axios.post(apiURL + '/plantCucumber', {
    // sodintiAgurka: 1,
  })
    .then(function (response) {
      console.log(response.data);
      list.innerHTML = response.data.list;
      addNewList();
    })
    .catch(function (error) {
      console.log(error.response.data.msg);
    });
})

buttonP.addEventListener('click', () => {
  axios.post(apiURL + '/plantTomato', {
    // sodintiPomidora: 1,
  })
    .then(function (response) {
      console.log(response.data);
      list.innerHTML = response.data.list;
      addNewList();
    })
    .catch(function (error) {
      console.log(error.response.data.msg);
    });
})


