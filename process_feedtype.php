
<?php 
if(isset($_POST["feedtype"])){
$feedtype = $_POST["feedtype"];

if($feedtype=='Total Mixed Ratio'){
	?>
	<div class="form-group">
<label for="exampleInputEmail1">Silage</label>
<div class="input-group">
<input class="form-control" name="silage" required autocomplete="off" placeholder="Silage Quantity" type="number">
<div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
</div>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Hay</label>
<div class="input-group">
<input class="form-control" name="hay" required autocomplete="off" placeholder="Hay Quantity" type="number">
<div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
</div>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Daily Level</label>
<div class="input-group">
<input class="form-control" name="daily-level" required autocomplete="off" placeholder="Daily Level Qty" type="number">
<div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
</div>
</div>

		
		
		
    <?php     
    }else{?>
	<div class="form-group">
                                        <label for="exampleInputEmail1">Quantity</label>
                                        <div class="input-group">
                                            <input class="form-control" name="quantity" required autocomplete="off" placeholder="Quantity Given" type="number">
                                            <div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
                                        </div>
                                    </div>
									
	<?php }
	
} ?>


