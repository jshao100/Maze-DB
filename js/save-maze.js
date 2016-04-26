var height;
var width;
var visited;
var splitted;
$('#save-maze').click(function() {
	var rows = $('.maze').children('.maze-row').each(function() {});
	var cols;
	var array = new Array(rows.length);

	var i;
	var j;
	var str;
	var str2 = "";
	for (i = 0; i < rows.length; i++) {
		cols = $(rows[i]).children('.maze-cell').each(function() {});	
		str = "";
		for (j = 0; j < cols.length; j++) {
			if (!("white").localeCompare((cols[j]).style.backgroundColor))		str += " ";
			else if (!("black").localeCompare((cols[j]).style.backgroundColor))	str += "X";
			else if (!("green").localeCompare((cols[j]).style.backgroundColor))	str += "S";
			else if (!("red").localeCompare((cols[j]).style.backgroundColor))		str += "E";
			else																						str += "?";
		}
		array[i] = str;
		str2 += (str + "\n");
	}
	str2 = str2.substring(0, str2.length - 1);
	splitted = str2.split("\n");
	var start = [0, 0];
	var end = [0, 0];
	var index;
	for(var i = 0; i < splitted.length; i++) {
		index = splitted[i].indexOf("S");
		if(index > -1) {
			start[0] = i;
			start[1] = index;
		}
		index = splitted[i].indexOf("E");
		if(index > -1) {
			end[0] = i;
			end[1] = index;
		}
	}
	var index = 0;
	height = splitted.length;
	width = splitted[0].length;
	visited = new Array(height);
	for(var i = 0; i < visited.length; i++) {
		visited[i] = new Array(width).fill(0);
	}
	dfs(start[0],start[1]);
	//alert(visited[end[0]][end[1]]);
	
	var json_arr = JSON.stringify(array);
	var name = $('#maze-name').val();
	var rating = $('#sliderOutput1').val();
	var difficulty = $('#sliderOutput2').val();

	if (name == null || name == "") {
		alert("Please enter a name for your maze");
	} else if (!visited[end[0]][end[1]]) {
		alert("Maze is not solvable.");	
	} else {
		$.ajax({
				type: 'POST',
				url: '../php/writeFile.php',
				data: {
					saveData: json_arr,
					mazename: name,
					rating: rating,
					difficulty: difficulty
				},
				success: function(data) {
					window.location = "http://maze.mybluemix.net/load.php?id=" + data
				},
				error: function(xhr, ajaxOptions, thrownerror) { }
		});
	}
});




function getNeighbors(row, col) {
	var array;
	var entries = 0;
	if(isCorner(row, col)) {
		entries = 2;
	} else if (isSide(row, col)) {
		entries = 3;
	} else {
		entries = 4;
	}
	var array = new Array(entries);
	for(var i = 0; i < entries; i++) {
		array[i] = new Array(2);
	}
	entries = 0;
	//try left/
	if(col > 0 ) {
		array[entries][0] = row;
		array[entries][1] = col - 1;
	} 
	//try right/ 
	if (col < width - 1) {
		entries++;
		array[entries][0] = row;
		array[entries][1] = col + 1;
	} 
	if(row > 0) {
		entries++;
		array[entries][0] = row - 1;
		array[entries][1] = col;
	}
	if(row < height - 1) {
		entries++;
		if(!array[entries]) array[entries] = [];
		array[entries][0] = row + 1;
		array[entries][1] = col;
	}
	return array;
}
function isNumber(obj) { return !isNaN(parseFloat(obj)) }

function isCorner(row,col) {
	return (row == 0 || row == 30) && (col == 0 || col == 30);
}
function isSide(row, col) {
	return (row == 0 || row == 30 || col == 0 || col == 30);
}

function dfs(row, col) {
	//console.log("dfs call");
	visited[row][col] = 1;		

	//get row number maze-row
	//get col number maze-cell
	/*
	var calc = ".maze > div:nth-child(" + (row+1) + ") > div:nth-child(" + (col+1) + ")";
	var cell = $(calc);
	var color = $(calc).css("background-color");
	if (color === "rgb(255, 255, 255)") {
		$(cell).css("background-color", "blue");
	}
	*/

	var arr = getNeighbors(row, col);
	for(var j = 0; j < arr.length; j++) {
		var r = arr[j][0];
		var c = arr[j][1];
		if(isNumber(r) && isNumber(c)) {
			if(splitted[r][c] != "X" && visited[r][c] == false) {	
				dfs(r, c);
			}
		}
	}
}

