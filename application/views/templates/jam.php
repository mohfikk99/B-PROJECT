<div class="container-fluid">
	<div class="row">
		<div class="col-lg-1">
			<div id="theme">
				<div onclick="setDarkMode(true)" id="darkBtn" class="">
					<button class="badge badge-dark">Dark</button>
				</div>
				<div onclick="setDarkMode(false)" id="lightBtn" class="is-hidden">
					<button class="badge badge-light">Light</button>
				</div>
			</div>
		</div>
		<div class="col-lg-9">
			<?php if (validation_errors()) : ?>
              <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
              </div>
            <?php endif; ?>

            <?= $this->session->flashdata('massage'); ?>

		</div>
		<div class="col-lg-2">
			<div class="jam_analog_pas text-right">
				<div class="xxx">
					<div class="jarum jarum_detik"></div>
					<div class="jarum jarum_menit"></div>
					<div class="jarum jarum_jam"></div>
					<div class="lingkaran_tengah"></div>
				</div>
			</div>
		</div>
	</div>
</div>
    
 
<script type="text/javascript">
	const secondHand = document.querySelector('.jarum_detik');
	const minuteHand = document.querySelector('.jarum_menit');
	const jarum_jam = document.querySelector('.jarum_jam');
 
	function setDate(){
		const now = new Date();
 
		const seconds = now.getSeconds();
		const secondsDegrees = ((seconds / 60) * 360) + 90;
		secondHand.style.transform = `rotate(${secondsDegrees}deg)`;
		if (secondsDegrees === 90) {
			secondHand.style.transition = 'none';
		} else if (secondsDegrees >= 91) {
			secondHand.style.transition = 'all 0.05s cubic-bezier(0.1, 2.7, 0.58, 1)'
		}
 
		const minutes = now.getMinutes();
		const minutesDegrees = ((minutes / 60) * 360) + 90;
		minuteHand.style.transform = `rotate(${minutesDegrees}deg)`;
 
		const hours = now.getHours();
		const hoursDegrees = ((hours / 12) * 360) + 90;
		jarum_jam.style.transform = `rotate(${hoursDegrees}deg)`;
	}
 
	setInterval(setDate, 1000)
</script>




<script>
 function setDarkMode(isDark) {
        var darkBtn = document.getElementById('darkBtn')
        var lightBtn = document.getElementById('lightBtn')

        if(isDark) {
            lightBtn.style.display = "block"
            darkBtn.style.display = "none"
        } else {
            lightBtn.style.display = "none"
            darkBtn.style.display = "block"
        }

        document.body.classList.toggle("darkmode");
    }


    //check localstorage
if(localStorage.getItem('preferredTheme') == 'dark') {
    setDarkMode(true)
}

function setDarkMode(isDark) {
    var darkBtn = document.getElementById('darkBtn')
    var lightBtn = document.getElementById('lightBtn')

    if(isDark) {
        lightBtn.style.display = "block"
        darkBtn.style.display = "none" 
    //tambahan localstorage
        localStorage.setItem('preferredTheme', 'dark');
    } else {
        lightBtn.style.display = "none"
        darkBtn.style.display = "block"
     //tambahan localstorage
        localStorage.removeItem('preferredTheme');
    }

    document.body.classList.toggle("darkmode");
}

</script>