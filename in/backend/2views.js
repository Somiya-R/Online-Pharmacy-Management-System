window.onload = function (){
	const cbtn = document.getElementById("cbtn");
	const ibtn = document.getElementById("ibtn");

	const cfrm = document.getElementById("cfrm");
	const ifrm = document.getElementById("ifrm");

	cbtn.onclick = function () {
		cbtn.classList.add("btnsel");
		ibtn.classList.remove("btnsel");
		cfrm.style.display = "inline";
		cfrm.style.opacity = "100%";
		ifrm.style.opacity = "0%";
		setTimeout(function() {
			ifrm.style.display = "none";
		},200);
	}
	ibtn.onclick = function () {
		cbtn.classList.remove("btnsel");
		ibtn.classList.add("btnsel");
		ifrm.style.display = "inline";
		ifrm.style.opacity = "100%";
		cfrm.style.opacity = "0%";
		setTimeout(function() {
			cfrm.style.display = "none";
		},200);
	}
}