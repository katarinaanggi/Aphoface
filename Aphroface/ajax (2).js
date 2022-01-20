//fungsi untuk membuat objek XMLHttpRequest
function getXMLHTTPRequest(){
	if (window.XMLHttpRequest){
		// code for modern browsers
		return new XMLHttpRequest();
	}else{
		// code for old IE browsers
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
}
// Fungsi urlAjax
function callAjax(url,inner){
	var xmlhttp = getXMLHTTPRequest();
	xmlhttp.open('GET', url, true);
    xmlhttp.onreadystatechange = function() {
		if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
            document.getElementById(inner).innerHTML = xmlhttp.responseText;
        }
        return false;
    }
    xmlhttp.send(null);
}

function searchProduk(produk){
	var inner = 'prod';
	var url = 'get_produk.php?produk=' + produk;
	if(produk == ""){
		document.getElementById(inner).innerHTML = window.location.replace("shop.php")
	}else{
		callAjax(url,inner);
	}
}

function showBrand(brand){
	var inner = 'detail_select';
	var url = 'get_brand.php?brand=' + brand;
	if(brand == ""){
		document.getElementById(inner).innerHTML = window.location.replace("shop.php");
	}else{
		callAjax(url,inner);
	}
}

function showCat(category){
	var inner = 'detail_select';
	var url = 'get_category.php?category=' + category;
	if(category == ""){
		document.getElementById(inner).innerHTML = window.location.replace("shop.php");
	}else{
		callAjax(url,inner);
	}
}

function searchKeyword(keyword){
	var inner = 'review';
	var url = 'get_review.php?keyword=' + keyword;
	if(keyword == ""){
		document.getElementById(inner).innerHTML = window.location.replace("forum.php");
	}else{
		callAjax(url,inner);
	}
}