<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Surat Izin</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="d-flex justify-content-between p-2">
        <h2>Daftar Surat</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate" id="modalOpenCreate">
          Buat Surat
        </button>
        
        {{-- Modal Create --}}
        <div class="modal fade" id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalCreateLabel">Buat Surat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body form-create">
                <div class="row">
                  <div class="col">
                    <div class="mb-3">
                      <label for="daerah_surat" class="form-label">Daerah Surat</label>
                      <input type="text" class="form-control" id="daerah_surat">
                      <div id="daerah_surat" class="invalid-feedback">Silahkan isi daerah surat</div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="mb-3">
                      <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                      <input type="date" class="form-control" id="tanggal_surat">
                      <div id="tanggal_surat" class="invalid-feedback">Silahkan isi tanggal surat</div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="mb-3">
                      <label for="nama_pengirim" class="form-label">Nama Pengirim/Izin</label>
                      <input type="text" class="form-control" id="nama_pengirim">
                      <div id="nama_pengirim" class="invalid-feedback">Silahkan isi nama pengirim/izin</div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="mb-3">
                      <label for="alamat_pengirim" class="form-label">Alamat Pengirim/Izin</label>
                      <input type="text" class="form-control" id="alamat_pengirim">
                      <div id="alamat_pengirim" class="invalid-feedback">Silahkan isi alamat pengirim/izin</div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="mb-3">
                      <label for="jabatan_pengirim" class="form-label">Jabatan Pengirim/Izin</label>
                      <input type="text" class="form-control" id="jabatan_pengirim">
                      <div id="jabatan_pengirim" class="invalid-feedback">Silahkan isi jabatan pengirim/izin</div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="mb-3">
                      <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                      <input type="text" class="form-control" id="nama_perusahaan">
                      <div id="nama_perusahaan" class="invalid-feedback">Silahkan isi nama perusahaan</div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="mb-3">
                      <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan</label>
                      <input type="text" class="form-control" id="alamat_perusahaan">
                      <div id="alamat_perusahaan" class="invalid-feedback">Silahkan isi alamat perusahaan</div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3">
                    <label for="alasan_izin" class="form-label">Alasan Izin</label>
                    <input type="text" class="form-control" id="alasan_izin">
                    <div id="alasan_izin" class="invalid-feedback">Silahkan isi alasan izin</div>
                  </div>
                </div>
                <div class="row alert-container"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-create" id="create_letter">Tambah Surat</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr class="m-0">

    {{-- Letter Container --}}
    <div class="letter-container mt-2"></div>

    {{-- Modal Edit --}}
    <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditLabel">Ubah Surat</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <input type="hidden" id="id_surat">
              <div class="col">
                <div class="mb-3">
                  <label for="daerah_surat" class="form-label">Daerah Surat</label>
                  <input type="text" class="form-control" id="daerah_surat">
                  <div id="daerah_surat" class="invalid-feedback">Silahkan isi daerah surat</div>
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                  <input type="date" class="form-control" id="tanggal_surat">
                  <div id="tanggal_surat" class="invalid-feedback">Silahkan isi tanggal surat</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label for="nama_pengirim" class="form-label">Nama Pengirim/Izin</label>
                  <input type="text" class="form-control" id="nama_pengirim">
                  <div id="nama_pengirim" class="invalid-feedback">Silahkan isi nama pengirim/izin</div>
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for="alamat_pengirim" class="form-label">Alamat Pengirim/Izin</label>
                  <input type="text" class="form-control" id="alamat_pengirim">
                  <div id="alamat_pengirim" class="invalid-feedback">Silahkan isi alamat pengirim/izin</div>
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for="jabatan_pengirim" class="form-label">Jabatan Pengirim/Izin</label>
                  <input type="text" class="form-control" id="jabatan_pengirim">
                  <div id="jabatan_pengirim" class="invalid-feedback">Silahkan isi jabatan pengirim/izin</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                  <input type="text" class="form-control" id="nama_perusahaan">
                  <div id="nama_perusahaan" class="invalid-feedback">Silahkan isi nama perusahaan</div>
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan</label>
                  <input type="text" class="form-control" id="alamat_perusahaan">
                  <div id="alamat_perusahaan" class="invalid-feedback">Silahkan isi alamat perusahaan</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="mb-3">
                <label for="alasan_izin" class="form-label">Alasan Izin</label>
                <input type="text" class="form-control" id="alasan_izin">
                <div id="alasan_izin" class="invalid-feedback">Silahkan isi alasan izin</div>
              </div>
            </div>
            <div class="row alert-container"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-update">Update Surat</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script type="module" src="{{ asset('js/main.js') }}"></script>
</body>
</html>