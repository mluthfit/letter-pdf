import DataSource from './data.js';
import './list-letter.js'

const storeLetter = async() => {
  const inputForm = document.querySelectorAll('.form-create input');

  const letter = {
    daerah_surat: inputForm[0].value,
    tanggal_surat: inputForm[1].value,
    nama_pengirim: inputForm[2].value,
    alamat_pengirim: inputForm[3].value,
    jabatan_pengirim: inputForm[4].value,
    nama_perusahaan: inputForm[5].value,
    alamat_perusahaan : inputForm[6].value,
    alasan_izin: inputForm[7].value
  };

  try {
    const store = await DataSource.store(letter);
    const alertContainer = document.querySelector('.form-create .alert-container');
    alertContainer.innerHTML = '';
    if (store.success || typeof store.message !== 'object') {
      alertContainer.innerHTML = `
        <div class="mb-3">
          <div class="alert" role="alert"></div>
        </div>
      `;

      const alertTag = alertContainer.querySelector('.alert');
      alertTag.classList.add('alert-success');

      if (store.success) alertTag.classList.add('alert-success');
      else if (typeof store.message !== 'object') alertTag.classList.add('alert-dangar')

      alertTag.innerText = store.message;
      clearInputInvalid();
      render();
    } else {
      Object.keys(letter).forEach((item) => {
        const tag = document.querySelector(`.form-create input#${item}`);
        if (store.message[item]) {
          tag.classList.add('is-invalid');
        } else {
          tag.value = `${letter[item]}`;
        }
      });
    }
  } catch(message) {
    alert(message);
  }

  inputForm.forEach(element => {
    element.value = '';
  });
}

const updateLetter = async() => {
  const inputForm = document.querySelectorAll('div#modalEdit input');
  const id = inputForm[0].value;

  const letter = {
    daerah_surat: inputForm[1].value,
    tanggal_surat: inputForm[2].value,
    nama_pengirim: inputForm[3].value,
    alamat_pengirim: inputForm[4].value,
    jabatan_pengirim: inputForm[5].value,
    nama_perusahaan: inputForm[6].value,
    alamat_perusahaan : inputForm[7].value,
    alasan_izin: inputForm[8].value
  };

  try {
    const update = await DataSource.update(letter, id);
    console.log(update);
    const alertContainer = document.querySelector('#modalEdit .alert-container')
    alertContainer.innerHTML = '';
    if (update.success || typeof update.message !== 'object') {
      alertContainer.innerHTML = `
        <div class="mb-3">
          <div class="alert" role="alert"></div>
        </div>
      `;

      const alertTag = alertContainer.querySelector('.alert');
      alertTag.classList.add('alert-success');

      if (update.success) alertTag.classList.add('alert-success');
      else if (typeof update.message !== 'object') alertTag.classList.add('alert-dangar')

      alertTag.innerText = update.message;
      clearInputInvalid();
      render();
    } else {
      Object.keys(letter).forEach((item) => {
        const tag = document.querySelector(`#modalEdit input#${item}`);
        if (update.message[item]) {
          tag.classList.add('is-invalid');
        } else {
          tag.value = `${letter[item]}`;
        }
      });
    }
  } catch(message) {
    alert(message);
  }
}

const clearInputInvalid = (tag) => {
  const inputForm = document.querySelectorAll(`${tag} input`);
  inputForm.forEach(element => {
    element.classList.remove('is-invalid');
    element.value = '';
  });
}

const clearAlert = (tag) => {
  const alertContainer = document.querySelector(`${tag} .alert-container`)
  alertContainer.innerHTML = '';
}

const destroyLetter = async(id) => {
  try {
    const destroy = await DataSource.destroy(id);
    render();
  } catch(message) {
    alert(message);
  }
}

const showLetter = async(id) => {
  try {
    const show = await DataSource.show(id);
    const modalEditInput = document.querySelectorAll('div#modalEdit input');
    modalEditInput[0].value = show.data.id;
    modalEditInput[1].value = show.data.daerah_surat;
    modalEditInput[2].value = show.data.tanggal_surat;
    modalEditInput[3].value = show.data.nama_pengirim;
    modalEditInput[4].value = show.data.alamat_pengirim;
    modalEditInput[5].value = show.data.jabatan_pengirim;
    modalEditInput[6].value = show.data.nama_perusahaan;
    modalEditInput[7].value = show.data.alamat_perusahaan;
    modalEditInput[8].value = show.data.alasan_izin;
  } catch(message) {
    alert(message);
  }
}

const render = async() => {
  const letterContainer = document.querySelector('.letter-container');
  letterContainer.innerHTML = '';
  try {
    const fetchAll = await DataSource.index();
    if (fetchAll.data.length) {
      const listLetter = document.createElement('list-letter');
      listLetter.items = { data: fetchAll.data, delEvent: destroyLetter, editEvent: showLetter };
      letterContainer.appendChild(listLetter);
    }

    const buttonEdit = document.querySelectorAll('.btn-edit')
    buttonEdit.forEach(element => {
      element.addEventListener('click', () => {
        clearAlert('#modalEdit');
        clearInputInvalid('#modalEdit');
      });
    });
    
  } catch(message) {
    alert("Pastikan bahwa database sudah benar dan nyala.");
  }
}

document.addEventListener('DOMContentLoaded', () => {
  const buttonCreate = document.querySelector('.btn-create');
  buttonCreate.addEventListener('click', function(event) {
    storeLetter();
    event.preventDefault();
  });

  document.querySelector('#modalOpenCreate').addEventListener('click', () => {
    clearAlert('.form-create');
    clearInputInvalid('.form-create');
  });

  document.querySelector('.btn-update').addEventListener('click', () => {
    updateLetter();
  });

  render();
});