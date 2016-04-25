$('#save-maze').click(function() {
	var rows = $('.maze').children('.maze-row').each(function() {});
	var cols;

	var array = new Array(rows.length);

	var i;
	var j;
	var str;
	for (i = 0; i < rows.length; i++) {
		cols = $(rows[i]).children('.maze-cell').each(function() {});	
		str = "";
		for (j = 0; j < cols.length; j++) {
			if (!("white").localeCompare((cols[j]).style.backgroundColor))			str += " ";
			else if (!("black").localeCompare((cols[j]).style.backgroundColor))	str += "X";
			else if (!("green").localeCompare((cols[j]).style.backgroundColor))	str += "S";
			else if (!("red").localeCompare((cols[j]).style.backgroundColor))		str += "E";
			else																						str += "?";
		}
		array[i] = str;
	}

	var json_arr = JSON.stringify(array);

	var name = $('#maze-name').val();
	alert(name);

	$.ajax({
			type: 'POST',
			url: '../php/writeFile.php',
			data: {
				saveData: json_arr,
				maze-name: name
			}
	});
	//window.location = "http://maze.mybluemix.net/";
});
