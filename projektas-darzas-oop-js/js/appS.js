const buttonA = document.querySelector('[name="sodintiAgurka"]');
const buttonP = document.querySelector('[name="sodintiPomidora"]');
const list = document.querySelector('#list');

const addNewList = () => {
  const plant = document.querySelectorAll('.plant');
  plant.forEach(plant => {
    plant.querySelector('[name="rauti"]').addEventListener('click', () => {
      const id = plant.querySelector('[name=rauti]').value;
      axios.post(apiURL, {
        id: id,
        rauti: 1
      })
        .then(function (response) {
          list.innerHTML = response.data.list;
          addNewList();
        })
        .catch(function (error) {
          console.log(error);
        });
    });
  });
}


document.addEventListener('DOMContentLoaded', () => {
  axios.post(apiURL, {
    list: 1,
  })
    .then(function (response) {
      list.innerHTML = response.data.list;
      addNewList();
    })
    .catch(function (error) {
      console.log(error);
    });

})

buttonA.addEventListener('click', () => {
  axios.post(apiURL, {
    sodintiAgurka: 1,
  })
    .then(function (response) {
      list.innerHTML = response.data.list;
      addNewList();
    })
    .catch(function (error) {
      console.log(error);
    });
})

buttonP.addEventListener('click', () => {
  axios.post(apiURL, {
    sodintiPomidora: 1,
  })
    .then(function (response) {
      list.innerHTML = response.data.list;
      addNewList();
    })
    .catch(function (error) {
      console.log(error);
    });
})


