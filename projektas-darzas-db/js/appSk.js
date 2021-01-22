const list = document.querySelector('#list');

const addNewList = () => {
  const plant = document.querySelectorAll('.plant');
  plant.forEach(plant => {
      const skinti = plant.querySelector('[name="skinti"]');
      if(skinti != null){
        skinti.addEventListener('click', () => {
        const id = plant.querySelector('[name="skinti"]').value;
        const count = document.querySelector(`[name="kiekisSkinti[${id}]"]`).value;
        axios.post(apiURL, {
            id: id,
            skinti: count
            })
            .then(function (response) {
            console.log(response.data);
            list.innerHTML = response.data.list;
            addNewList();
            })
            .catch(function (error) {
            console.log(error);
            });
        });
    }
    const skintiVisus = plant.querySelector('[name="skintiVisus"]');
      if(skintiVisus != null){
    plant.querySelector('[name="skintiVisus"]').addEventListener('click', () => {
        const id = plant.querySelector('[name="skintiVisus"]').value;
        axios.post(apiURL, {
          id: id,
          skintiVisus: 1
          })
          .then(function (response) {
            console.log(response.data);
            list.innerHTML = response.data.list;
            addNewList();
          })
          .catch(function (error) {
            console.log(error);
          });
      });
    }
  });
}


document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiURL, {
      list: 1,
    })
      .then(function (response) {
        console.log(response.data);
        list.innerHTML = response.data.list;
        addNewList();
      })
      .catch(function (error) {
        console.log(error);
      });
  
  })

  const buttonVisasDerlius = document.querySelector('[name="nuimtiVisaDerliu"]');

  buttonVisasDerlius.addEventListener('click', () => {
    axios.post(apiURL, {
      visaDerliu: 1,
    })
      .then(function (response) {
        console.log(response.data);
        list.innerHTML = response.data.list;
      })
      .catch(function (error) {
        console.log(error);
      });
  })
