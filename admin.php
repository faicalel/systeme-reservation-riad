<?php include_once('header.php'); ?>
<style>
.animate span{
	display: block;
	position: relative;
	text-align: center;
}

.animate.backwards > span{
	animation: animateBackwards 1s ease-in-out 
forwards;
}
.animate.forwards > span{
	animation: animateForwards 1s ease-in-out 
forwards;
}

.animate.mixed > span:nth-child(even){
	animation: animateBackwards 1s ease-in-out 
forwards;
}
.animate.mixed > span:nth-child(odd){
	animation: animateForwards 1s ease-in-out 
forwards;
}

@keyframes animateForwards {
	from { top: 0; transform: rotate(0deg); }
	to { top: .9em; transform: rotate(-15deg); }
}
@keyframes animateBackwards {
	from { top: 0; transform: rotate(0deg); }
	to { top: 1em; transform: rotate(25deg); }
}
</style>
<div class="row" style="margin-left :40%; margin-top:5%">
          <!-- Left col -->
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

        <h1 class="animate backwards" style="font-size:55px">        Bienvenue dans l’espace Administrateur du site Mbooking
</h1>

 

 <script>
   window.addEventListener("load", function(){
	var delay = 2;
	var nodes = document.querySelectorAll
(".animate");
	for(var i=0; i<nodes.length; i++){
		var words = nodes[i].innerText.split(" ");
		nodes[i].innerHTML = "";
for(var i2=0; i2<words.length; i2++){
			var item = document.createElement("span");
			item.innerText = words[i2];
			var calc = (delay+((nodes.length + i2)/3));
	item.style.animationDelay = calc+"s";
			nodes[i].appendChild(item);
}
	}
});

 </script>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php include_once('footer.php'); ?>
