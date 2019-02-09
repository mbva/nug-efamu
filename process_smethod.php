
<?php 
if(isset($_POST["smethod"])){
$smethod = $_POST["smethod"];

if($smethod=='Artifical Insermination'){
	?>
	<div class="form-group">
	   <label for="exampleInputEmail1">AI Method</label>
                                        <div class="input-group">
                                            <select class="form-control " name="aimethod" required>
                                               
                   <option value="">Select AI Method</option>
                   <option value="Semen Straws">Semen Straws</option>
                   <option value="Embryo Transfer">Embryo Transfer</option>
                                                        
                                            </select>
<div class="input-group-addon"><i class="ti-pencil-alt"></i></div>
</div>
</div>
<?php }}
?>
