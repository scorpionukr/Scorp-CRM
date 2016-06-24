function submitAnk(idForm, directory, widget, fileName, idHide, idShow, idIntermediate) {
    $('#' + idHide).hide('fast');
    $('#' + idIntermediate).show('fast');
    var msg = $('#' + idForm).serialize();
    $.ajax({
	type: 'POST',
	url: '/modules/' + directory + '/' + widget + '/' + fileName + '.php',
	data: msg,
	success: function (data) {
	    $('#' + idIntermediate).hide('fast');
	    $('#' + idShow).show('fast');
	},
	error: function (xhr, str) {
	    alert('Возникла ошибка: ' + xhr.responseCode);
	}
    });
}
