import './one-letter.js';
import DataSource from './data.js';

class ListLetter extends HTMLElement {
  set items(items) {
    this._data = items.data;
    this._delEvent = items.delEvent;
    this._editEvent = items.editEvent;
    this.render();
  }

  render() {
    this._data.forEach((item, index) => {
      const letter = document.createElement('one-letter');
      const length = this._data.length;
      letter.items = { data: item, index: length - index };
      letter.querySelector('.btn-delete').addEventListener('click', () => { 
        this._delEvent(item.id);
      });

      letter.querySelector('.btn-edit').addEventListener('click', () => { 
        this._editEvent(item.id);
      });
      this.appendChild(letter);
    });
  }
}

customElements.define('list-letter', ListLetter);
