<footer class="footer text-faded text-center py-5">
      <div class="container">
        <p class="m-0 small">&copy; 2018 Created by <a href="index.php?page=author">Predrag Vučetić<a> &ndash; For source code click <a href="https://github.com/predragvucetic/kafeterijajava">here.<a></p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lightbox-plus-jquery.min.js"></script>
	<script src="js/main.js"></script>
    <script type="text/javascript">

	//provera na klijentskoj strani
	function provera(){

		var ime = document.querySelector('#ime');
		var reIme = /^[A-Z][a-z]{2,50}$/;
		if(!ime.value.match(reIme)){
			document.querySelector('#ime').style.border = "2px solid red";

			return false;
		}

		var prezime = document.querySelector('#prezime');
		var rePrezime = /^[A-Z][a-z]{2,80}$/;
		if(!prezime.value.match(rePrezime)){
			document.querySelector('#prezime').style.border = "2px solid red";

			return false;
		}

		var korisnickoIme = document.querySelector('#korisnickoIme');
		var reKorisnickoIme = /^[\w]{5,100}$/;
		if(!korisnickoIme.value.match(reKorisnickoIme)){
			document.querySelector('#korisnickoIme').style.border = "2px solid red";

			return false;
		}

		var lozinka = document.querySelector('#lozinka');
		var reLozinka = /^[\S]{5,}$/;
		if(!lozinka.value.match(reLozinka)){
			document.querySelector('#lozinka').style.border = "2px solid red";

			return false;
		}

		return true;
		
	}


	//anketa  
	$(document).ready(function(){
	
		anketa_podaci();

		function anketa_podaci()
		{
			$.ajax({
				url:"views/anketa_podaci.php",
				method:"POST",
				success:function(data)
				{
				$('#anketa_rezultat').html(data);
				}
			})  
		}
		$('#anketa_forma').on('submit', function(event)
		{
			event.preventDefault();
			var anketa_opcija = '';
			$('.anketa_opcija').each(function(){
			if($(this).prop("checked"))
			{
				anketa_opcija = $(this).val();
			}
			});
			if(anketa_opcija != '')
			{
				$('#anketa_dugme').attr("disabled", "disabled");
				var forma_podaci = $(this).serialize();
				$.ajax({
					url:"views/anketa.php",
					method:"POST",
					data:forma_podaci,
					success:function(data)
					{
						$('#anketa_forma')[0].reset();
						$('#anketa_dugme').attr('disabled', false);
						anketa_podaci();
						alert("Uspešno ste glasali");
					}
				});
			}
			else
			{
				alert("Morate izabrati opciju");
			}
		});	
	});


	</script>

  </body>

</html>