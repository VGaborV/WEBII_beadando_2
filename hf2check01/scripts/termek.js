function Termekek() {
  this.init = function () {
    $('#termekSzures').click(() => {
      this.termekBetoltes();
    });

    $('#pdfExport').click(() => {
      window.location = ( "/termekek?pdf=1" + this.szuresFeltetelek() );
    });

  };

  this.termekBetoltes = function () {
    $.get( "/termekek?ajax=1" + this.szuresFeltetelek(), function( data ) {
      $( "#termek-tartalom" ).html( data );
    });
  };

  this.szuresFeltetelek = function () {
    var oprendszer = $('#oprendszer-szures').val();
    var gyarto = $('#gyarto-szures').val();
    var processzor = $('#processzor-gyarto-szures').val();

    var result = '';
    if (oprendszer !== '') {
      result += '&oprendszer=' + oprendszer;
    }
    if (gyarto !== '') {
      result += '&gyarto=' + gyarto;
    }
    if (processzor !== '') {
      result += '&processzor=' + processzor;
    }

    return result;
  }
}