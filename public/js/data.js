class DataSource {
  static index() {
    return fetch(`http://127.0.0.1:8000/api/letter`)
    .then(response => response.json())
    .then(responseJson => responseJson)
  }

  static store(letter) {
    return fetch(`http://127.0.0.1:8000/api/letter`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(letter),
    })
    .then(response => response.json())
    .then(responseJson => responseJson)
  }

  static destroy(id) {
    return fetch(`http://127.0.0.1:8000/api/letter/${id}`, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
    })
    .then(response => response.json())
    .then(responseJson => responseJson)
  }

  static show(id) {
    return fetch(`http://127.0.0.1:8000/api/letter/${id}`)
    .then(response => response.json())
    .then(responseJson => responseJson)
  }

  static update(letter, id) {
    return fetch(`http://127.0.0.1:8000/api/letter/${id}`, {
      method: "PATCH",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(letter),
    })
    .then(response => response.json())
    .then(responseJson => responseJson)
  }
}

export default DataSource;