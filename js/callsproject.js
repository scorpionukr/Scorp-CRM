function callsProject(idProject, idResult, module, widget, fileName) {
    var pid = $('#' + idProject).val();
    $.ajax({
	type: 'POST',
	url: '/modules/' + module + '/' + widget + '/' + fileName + '.php',
	data: 'pid=' + pid,
	success: function (data) {
	    $('#' + idResult).html(data);
	},
	error: function (xhr, str) {
	    alert('Возникла ошибка: ' + xhr.responseCode);
	}
    });
}