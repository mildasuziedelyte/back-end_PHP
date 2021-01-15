const list = document.querySelector('#list');

document.addEventListener('DOMContentLoaded', () => {
  axios.post(apiURL, {
    list: 1,
  })
    .then(function (response) {
      list.innerHTML = response.data.list;
    })
    .catch(function (error) {
      console.log(error);
    });

})


const buttonAuginti = document.querySelector('[name="auginti"]')

buttonAuginti.addEventListener('click', () => {
  axios.post(apiURL, {
    auginti: 1,
  })
    .then(function (response) {
      list.innerHTML = response.data.list;
    })
    .catch(function (error) {
      console.log(error);
    });
})

