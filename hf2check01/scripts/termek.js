function Termekek() {
  this.init = function () {
    $('#termekSzures').click(() => {
      this.termekBetoltes();
    });
  };

  this.termekBetoltes = function () {
    $.get( "/termekek?ajax=1", function( data ) {
      $( "#termek-tartalom" ).html( data );
    });
  };
}