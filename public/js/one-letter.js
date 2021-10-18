class OneLetter extends HTMLElement {
  set items(items) {
    this._data = items.data;
    this._index = items.index;
    this.render();
  }

  render() {
    this.classList.add('row');

    this.date = new Date(this._data.tanggal_surat);
    this.month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"][this.date.getMonth()];

    this.innerHTML = `
      <div class="mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">#${this._index} - ${this._data.nama_pengirim}, ${this._data.nama_perusahaan}, ${this._data.alasan_izin}</h5>
            <ul class="list-group list-group-flush mb-3">
              <li class="list-group-item">Daerah surat : ${this._data.daerah_surat}</li>
              <li class="list-group-item">Tanggal surat : ${this.date.getDate()} ${this.month} ${this.date.getFullYear()}</li>
              <li class="list-group-item">Nama pengirim/izin : ${this._data.nama_pengirim}</li>
              <li class="list-group-item">Alamat pengirim/izin : ${this._data.alamat_pengirim}</li>
              <li class="list-group-item">Jabatan pengirim/izin : ${this._data.jabatan_pengirim}</li>
              <li class="list-group-item">Nama perusahaan : ${this._data.nama_perusahaan}</li>
              <li class="list-group-item">Alamat perusahaan : ${this._data.alamat_pengirim}</li>
              <li class="list-group-item">Alasan izin : ${this._data.alasan_izin}</li>
            </ul>
            <button class="btn btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit" id="modalOpenEdit">Edit</button>
            <button class="btn btn-danger btn-delete">Hapus</button>
            <a href="/pdf/${this._data.id}" class="btn btn-info btn-pdf">Cetak PDF</a>
          </div>
        </div>
      </div>
    `;
  }
}

customElements.define('one-letter', OneLetter);
