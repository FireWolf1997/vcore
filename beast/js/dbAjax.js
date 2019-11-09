$(document).ready(function () {
	let percentege = 0;
	let progressBar = $("#progress-bar");
	let barValue = $("#val");
	let list_files = $("#list-files");
	let intervalID;
	let step = 1;
	let files;

	$("#submit-btn").on('click', function () {
		initTable()
		step=1;
	});

	function getQueryFilesList() {
		$.ajax({
			type: "POST",
			url: "/vcore/beast/getQueryFiles.php",
			data: {"tooken": "qwerty"},
			success: function(data){
				files = JSON.parse(data)
				fillList();
			}
		});
	}

	function initTable() {
		for(let i = 0; i<files.length; i++){
			setTimeout(initFile(files[i]['name']));
		}
	}


	function initFile(filename) {
		$.ajax({
			type: "POST",
			url: "/vcore/beast/initTable.php",
			data: {"tooken": "qwerty", "filename": filename},
			success: function(data){
				if(data == 1){
					nextStep();
				}
				else{
					alert(data);
					return;
				}
			}
		});
	}

	function fillList() {
		list_files.html("");
		for(let i = 0; i<files.length; i++){
			list_files.append("<tr id='r'+i><td>"+files[i]['name'] + "</td><td>" + files[i]['size']+ " byte" +"</td>></tr>");
		}
	}

	function nextStep() {
		percentege = step/files.length*100;
			progressBar.css("width", percentege+"%");
			barValue.html(percentege+"%");
			step++;
	}

setInterval(getQueryFilesList, 500);
})
