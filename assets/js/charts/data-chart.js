(function ($) {
"use strict";
	/*----------------------------------------*/
	/*  1.  Bar Chart
	/*----------------------------------------*/
	var ctx = document.getElementById("data");
	var barchart1 = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Siswa Terdaftar", "Administrator", "Guru Terdaftar", "Pengaduan Siswa", "Jenis Pelanggaran", "Riwayat"],
			datasets: [{
				label: "Data Keseluruhan",
				data: [12, 12, 13, 15, 12, 13],
				backgroundColor: [
					'rgba(255, 152, 0, 0.5)',
					'rgba(139, 195, 74, 0.5)',
					'rgba(103, 58, 183, 0.5)',
					'rgba(233, 30, 99, 0.5)',
					'rgba(63, 81, 181, 0.5)',
					'rgba(96, 125, 139, 0.5)'
				],
				borderWidth:0
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
	
		
})(jQuery); 