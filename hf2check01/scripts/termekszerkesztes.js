function Termekszerkesztes() {
  this.data = [];
  this.editId = null;

  this.init = function () {
    $('#frissites').click(() => {
      this.termekBetoltes();
    });

    $('#szerkesztoform').submit((e) => {
      e.preventDefault();

      if (this.editId === null) {
        $.ajax({
          type: "POST",
          url: '/gep',
          data: $('#szerkesztoform').serialize(), // serializes the form's elements.
          success: () => {
            this.editId = null;
            this.termekBetoltes();
            $('#szerkesztoform').trigger("reset");
          }
        });
      } else {
        $.ajax({
          type: "PUT",
          url: '/gep/' + this.editId,
          data: $('#szerkesztoform').serialize(), // serializes the form's elements.
          success: () => {
            this.editId = null;
            this.termekBetoltes();
            $('#szerkesztoform').trigger("reset");
          }
        });
      }
    });
  };

  this.termekBetoltes = function () {
    $.get( "/gep", ( data ) => {
      this.data = JSON.parse(data);
      this.megjelenites();
    });
  };

  this.megjelenites = function() {
    $('#szerkeszteslista .gep').remove();

    for (var gep of this.data) {
      var html = '<tr class="gep">';
      for (var head of ['id', 'gyarto', 'tipus', 'kijelzo', 'memoria', 'merevlemez', 'videovezerlo', 'ar', 'processzorid', 'oprendszerid', 'db']) {
        html += '<td>' + gep[head] + '</td>';
      }
      html += '<td><button class="delete" data-id="' + gep.id + '">Törlés</button><button class="modosit" data-id="' + gep.id + '">Módosít</button></td></tr>';

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
      return elem.id === id;
    });

    this.editId = id;
    for (var head of ['id', 'gyarto', 'tipus', 'kijelzo', 'memoria', 'merevlemez', 'videovezerlo', 'ar', 'processzorid', 'oprendszerid', 'db']) {
      $('#szerkeszt-' + head).val(data[head]);
    }
  };

  this.torles = function (id) {
    $.ajax({
      url: '/gep/' + id,
      type: 'DELETE',
      success: (result) => {
        this.termekBetoltes();
      }
    });
  }
}