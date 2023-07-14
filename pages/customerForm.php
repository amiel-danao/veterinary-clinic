<?php
if (isset($_SESSION['errorMessage'])) {
	$message = $_SESSION['errorMessage'];
	echo '<script>alert("' . $message . '");</script>';
	unset($_SESSION['errorMessage']);
}
?>

<div class="" id="v-pills-customer" role="tabpanel" aria-labelledby="v-pills-customer-tab" style="padding-left: 150px; padding-right: 150px;">
	<div class="card card-outline-secondary my-4">
		<div class="card-header">Customer Details</div>
			<div class="card-body">
				<!-- Div to show the ajax message from validations/db submission -->
				<div id="customerDetailsMessage"></div>
					<form id="registerForm" action="rest/register.php" method="POST"> 
						<div class="form-row">
							<div class="form-group col-md-6">
						  	<label for="customerDetailsCustomerFullName">Full Name<span class="requiredIcon">*</span></label>
						  	<input type="text" class="form-control" id="customerDetailsCustomerFullName" name="customerDetailsCustomerFullName" required>
							</div>
              <?php
                if(isset($_SESSION['loggedIn'])){ ?>
                  <div class="form-group col-md-2">
                    <label for="customerDetailsStatus">Status</label>
                    <select id="customerDetailsStatus" name="customerDetailsStatus" class="form-control chosenSelect">
                    <?php include('inc/statusList.html'); ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="customerDetailsCustomerID">Customer ID</label>
                    <input type="text" class="form-control invTooltip" id="customerDetailsCustomerID" name="customerDetailsCustomerID" title="This will be auto-generated when you add a new customer" autocomplete="off">
                    <div id="customerDetailsCustomerIDSuggestionsDiv" class="customListDivWidth"></div>
                  </div>
              <?php
                } 
              ?>
					  </div>
					  <div class="form-row">
						  <div class="form-group col-md-3">
								<label for="customerDetailsCustomerMobile">Phone (mobile)<span class="requiredIcon">*</span></label>
								<input type="tel" class="form-control invTooltip" id="customerDetailsCustomerMobile" name="customerDetailsCustomerMobile" pattern="[0-9]{10}" placeholder="Ex: 9951239876" required>
						  </div>
						  <div class="form-group col-md-3">
								<label for="customerDetailsCustomerPhone2">Phone 2</label>
								<input type="tel" class="form-control invTooltip" id="customerDetailsCustomerPhone2" name="customerDetailsCustomerPhone2" pattern="[0-9]{10}" placeholder="Ex: 9951239876">
						  </div>
						  <div class="form-group col-md-6">
								<label for="customerDetailsCustomerEmail">Email<span class="requiredIcon">*</span></label>
								<input type="email" class="form-control" id="customerDetailsCustomerEmail" name="customerDetailsCustomerEmail" required>
							</div>
					  </div>
            <?php
              if(!isset($_SESSION['loggedIn'])){ ?>
                <div class="form-row">
						    	<div class="form-group col-md-3">
							    	<label for="customerDetailsPassword">Password<span class="requiredIcon">*</span></label>
							    	<input type="password" class="form-control invTooltip" name="customerDetailsPassword" placeholder="Enter password" required>
						    	</div>
                  <div class="form-group col-md-3">
                    <label for="customerDetailsRetypePassword">Re-type Password<span class="requiredIcon">*</span></label>
                    <input type="password" class="form-control invTooltip" name="customerDetailsRetypePassword" placeholder="Re-type password" required>
                  </div>
					    	</div>
							<div class="form-row">
								<ul>
									<li><small>Password length should be at least 8 characters.</small></li>
									<li><small>Password should contain numbers.</small></li>
								</ul>
							</div>
						<?php
              } 
						?>
					  	<div class="form-group">
							<label for="customerDetailsCustomerAddress">Address<span class="requiredIcon">*</span></label>
							<input type="text" class="form-control" id="customerDetailsCustomerAddress" name="customerDetailsCustomerAddress" required>
					  	</div>
					  	<div class="form-group">
							<label for="customerDetailsCustomerAddress2">Address 2</label>
							<input type="text" class="form-control" id="customerDetailsCustomerAddress2" name="customerDetailsCustomerAddress2">
					  	</div>
					  	<div class="form-row">
							<div class="form-group col-md-6">
						  	<label for="customerDetailsCustomerCity">City</label>
						  	<input type="text" class="form-control" id="customerDetailsCustomerCity" name="customerDetailsCustomerCity">
							</div>
							<div class="form-group col-md-4">
						  	<label for="customerDetailsCustomerDistrict">District</label>
						  	<select id="customerDetailsCustomerDistrict" name="customerDetailsCustomerDistrict" class="form-control chosenSelect">
								<?php include('inc/districtList.html'); ?>
						  	</select>
							</div>
					  </div>	
            <?php 
              if(isset($_SESSION['loggedIn'])){ ?>
                <button type="button" id="addCustomer" name="addCustomer" class="btn btn-success">Add Customer</button>
                <button type="button" id="updateCustomerDetailsButton" class="btn btn-primary">Update</button>
                <button type="button" id="deleteCustomerButton" class="btn btn-danger">Delete</button>
                <button type="reset" class="btn">Clear</button> <?php
              } else { ?>
                <button id="registerButton" type="submit" class="btn btn-success">Register</button>
				
                <?php
              }
            ?>
					</form>
			</div> 
	</div>
</div>