<script type="text/javascript">
var tab = ["image1.jpg", "image2.jpg", "image3.jpg"];
var secondes = 10;
var numero = -1;
var aleatoire = false;

function changerImage () {
	if (aleatoire) {
		var n = numero;
		while (n == numero) {
			n = Math.floor(Math.random() * tab.length);
		}
		numero = n;
	}
	else {
		numero++;
		if (numero >= tab.length){
			numero =0;
		}
	}
	document.getElementById('image1').src = tab[numero];
	setTimeout("changerImage();", secondes*1000);
}
</script>
