var height;
var width;
var visited;
var splitted;
var end_r;
var end_c;
var complete = 0;
var time = 1000;

$('#solve-maze').click(function() {
	var rows = $('.maze').children('.maze-row').each(function() {});
	var cols;

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
			end_r = i;
			end[1] = index;
			end_c = index;
		}
	}
	var index = 0;
	height = splitted.length;
	width = splitted[0].length;
	if (27000/(height*width) > 500) {
		time = 500;
	} else {
		time = 27000/(height*width);
	}

	visited = new Array(height);
	for(var i = 0; i < visited.length; i++) {
		visited[i] = new Array(width).fill(0);
	}

	if (complete) {
		$(".maze").children('.maze-row').each(function() {
			$(this).children('.maze-cell').each(function() {
				var colors = $(this).css("background-color");
				if (colors === "rgb(110, 196, 219)") {
					$(this).css("background-color","white");
				}
			});
		});
		complete = 0;
	} else {
		dfs_color(start[0],start[1]);
	}
});


function dfs_color(row, col) {
	//console.log("dfs call");
	visited[row][col] = 1;		

	//get row number maze-row
	//get col number maze-cell
	if (row == end_r && col == end_c) {
		complete = 1;
	}

	var calc = ".maze > div:nth-child(" + (row+2) + ") > div:nth-child(" + (col+1) + ")";
	var cell = $(calc);
	var color = $(calc).css("background-color");
	if (color === "rgb(255, 255, 255)") {
		$(cell).css("background-color", "#6ec4db");
	}

	setTimeout(function() {
		var arr = getNeighbors(row, col);
		for(var j = 0; j < arr.length; j++) {
			var r = arr[j][0];
			var c = arr[j][1];
			if(isNumber(r) && isNumber(c)) {
				if(splitted[r][c] != "X" && visited[r][c] == false) {	
					dfs_color(r, c);
				}
			}
		}
	}, time);
}

