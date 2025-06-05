window.onload = function (){
	const cbtn = document.getElementById("cbtn");
	const mbtn = document.getElementById("mbtn");
	const ibtn = document.getElementById("ibtn");

	const cfrm = document.getElementById("cfrm");
	const mfrm = document.getElementById("mfrm");
	const ifrm = document.getElementById("ifrm");

	cbtn.onclick = function () {
		cbtn.classList.add("btnsel");
		mbtn.classList.remove("btnsel");
		ibtn.classList.remove("btnsel");
		cfrm.style.display = "inline";
		cfrm.style.opacity = "100%";
		mfrm.style.opacity = "0%";
		ifrm.style.opacity = "0%";
		setTimeout(function() {
			mfrm.style.display = "none";
			ifrm.style.display = "none";
		},200);
	}
	mbtn.onclick = function () {
		cbtn.classList.remove("btnsel");
		mbtn.classList.add("btnsel");
		ibtn.classList.remove("btnsel");
		mfrm.style.display = "inline";
		cfrm.style.opacity = "0%";
		mfrm.style.opacity = "100%";
		ifrm.style.opacity = "0%";
		setTimeout(function() {
			cfrm.style.display = "none";
			ifrm.style.display = "none";
		},200);
	}
	ibtn.onclick = function () {
		cbtn.classList.remove("btnsel");
		mbtn.classList.remove("btnsel");
		ibtn.classList.add("btnsel");
		ifrm.style.display = "inline";
		ifrm.style.opacity = "100%";
		cfrm.style.opacity = "0%";
		mfrm.style.opacity = "0%";
		setTimeout(function() {
			cfrm.style.display = "none";
			mfrm.style.display = "none";
		},200);
	}
}