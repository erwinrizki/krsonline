function validasiForm() {
	var nim = document.forms["formmhs"]["nim"].value;
	var nama = document.forms["formmhs"]["nama"].value;
	var password = document.forms["formmhs"]["pass"].value;
	var prodi = document.forms["formmhs"]["progdi"].value;
	var ips = document.forms["formmhs"]["ips"].value;
	
	if((nim==null || nim=="")||(nama==null || nama=="")||(password==null || password=="")||(prodi==null || prodi=="")||(ips==null || ips=="")) {
		alert("Isian harus diisi dengan lengkap!");
		location.replace('datamhs.html');
		return false;
	}
}

function validasiFormDosen() {
	var nip = document.forms["formdosen"]["nip"].value;
	var nama = document.forms["formdosen"]["nama"].value;
	var pass = document.forms["formdosen"]["pass"].value;
	
	if((nip==null || nip=="")||(nama==null || nama=="")||(pass==null || pass=="")) {
		alert("Isian harus diisi dengan lengkap!");
		location.replace('datadosen.html');
		
		return false;
	}
}