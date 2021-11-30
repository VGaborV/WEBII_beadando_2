function Feladatszerkesztes() {
  this.data = [];
  this.editId = null;

  this.init = function () {
    $('#frissites').click(() => {
      this.feladatBetoltes();
    });

    $('#szerkesztoform').submit((e) => {
      e.preventDefault();

      if (this.editId === null) {
        $.ajax({
          type: "POST",
          url: 'https://jsonplaceholder.typicode.com/todos',
          data: $('#szerkesztoform').serialize(), // serializes the form's elements.
          success: () => {
            this.editId = null;
            this.feladatBetoltes();
            $('#szerkesztoform').trigger("reset");
          }
        });
      } else {
        $.ajax({
          type: "PUT",
          url: 'https://jsonplaceholder.typicode.com/todos/' + this.editId,
          data: $('#szerkesztoform').serialize(), // serializes the form's elements.
          success: () => {
            this.editId = null;
            this.feladatBetoltes();
            $('#szerkesztoform').trigger("reset");
          }
        });
      }
    });
  };

  this.feladatBetoltes = function () {
    $.get( "https://jsonplaceholder.typicode.com/todos", ( data ) => {
      this.data = (data);
      this.megjelenites();
    });
  };

  this.megjelenites = function() {
    $('#szerkeszteslista .feladat').remove();

    for (var feladat of this.data) {
      var html = '<tr class="feladat">';
      for (var head of ['userId', 'id', 'title', 'completed']) {
        html += '<td>' + feladat[head] + '</td>';
        console.log(feladat, head, feladat[head]);
      }
      html += '<td><button class="delete" data-id="' + feladat.id + '">Törlés</button><button class="modosit" data-id="' + feladat.id + '">Módosít</button></td></tr>';

      $('#szerkeszteslista').append(html);
    }

    $('#szerkeszteslista .delete').click((event) => {
      this.torles(event.target.getAttribute('data-id'))
    });

    $('#szerkeszteslista .modosit').click((event) => {
      this.formbahelyez(event.target.getAttribute('data-id'))
    });
  };

  this.formbahelyez = function (id) {

    var data = this.data.find((elem) => {
      return parseInt(elem.id, 10) === parseInt(id);
    });

    console.log(data, id);

    this.editId = id;
    for (var head of ['userId', 'id', 'title', 'completed']) {
      $('#szerkeszt-' + head).val(data[head]);
    }
  };

  this.torles = function (id) {
    $.ajax({
      url: 'https://jsonplaceholder.typicode.com/todos/' + id,
      type: 'DELETE',
      success: (result) => {
        this.feladatBetoltes();
      }
    });
  }
}