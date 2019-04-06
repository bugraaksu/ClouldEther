<?php
    $pageTitle = "Manage Hubs";
    require_once(RESOURCE_DIR . 'templates/header.php');
?>
<body>
<!-- Navigation Menu Starts -->
<?php
    require_once(RESOURCE_DIR . 'templates/logged_in_navigation.php');
?>
<!-- Navigation Menu Ends -->
<!-- Content Starts -->

<div class="container" id="mainContentBody">
	<div class="col-md-12">
      	<fieldset>
	      	<h2 class="topHeader">Manage Hubs</h2>
	      	<br />
	      	<div class="col-md-12">
			    <?php
			        // Show potential feedback from the register object
			        if (FlashMessage::flashIsSet('ManageHubError')) {
			            FlashMessage::displayFlash('ManageHubError', 'error');
			        }
			        elseif (FlashMessage::flashIsSet('ManageHubMessage')) {
			            FlashMessage::displayFlash('ManageHubMessage', 'message');
			        }
			    ?>
			</div>
			<div class="col-md-12">
		    	<div class="panel-group" id="accordion">
		    		<div class="panel panel-default">
		        		<div class="panel-heading">
			            	<h4 class="panel-title">
			            		What would you like to do?
			            	</h4>
		          		</div>
			        	<div id="collapse4" class="panel-collapse ">
				            <div class="panel-body">
				            	<br />
				            	<p style="font-weight:normal; max-width:780px">
			            			A hub is essentially a virtual router that is created on the cluster. With hubs, you can create a private VPN connection.
			            		</p>
			            		<p style="font-weight:normal; max-width:780px">
			            			To connect to a hub, you may use either the command-line documentation CloudEther provided you, or the user interface management tool developed by SoftEther. Log in to the hub using the credentials provided by us in the welcome email. If there are issues, send us a message on the “Contact” tab.
			            		</p><br />
			            		<div class="row">
									<div class="col-md-12">
										<div class="table-responsive">
											<table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>Name</th>
													<th>Password</th>
													<th>Status</th>
													<th>Creation Date</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
									    	<?php
									    		if (!empty($allHubs)) {
									    			foreach ($allHubs as $hub) {
									    				echo '<tr><td>' . $hub['name'] . '</td>';
									    				echo '<td>' . $hub['password'] . '</td>';
									    				if ($manageHub->getHubStatus($hub['name'])) {
									    					echo '<td style="color:green;">Up</td>';
									    				}
									    				else {
									    					echo '<td style="color:red;">Down</td>';
									    				}
									    				echo '<td>' . $hub['created'] . '</td>';
											?>
														<td><form class="btn-link-form" method="post" action="/client/manage.php">
										    				<input type="hidden" value=<?php echo '"', $hub['name'], '"'; ?> name="hub_name">
										    				<input type="submit" class="btn btn-link" value="Delete" name="delete_hub">
										    			</form></td></tr>
											<?php
									    			}
									    		}
									    	?>
									    		<tr>
									    			<form class="btn-link-form" method="post" action="/client/manage.php">
											    		<td>
											    			<input type="text" class="form-control" name="hub_name" placeholder="Enter a New Hub Name">
							    						</td>
							    						<td></td>
							    						<td></td>
							    						<td></td>
							    						<td style="vertical-align: middle">
							    							<input type="submit" class="btn btn-link" name="create_hub" value="Add">
										    			</td>
									    			</form>
									    		</tr>
										    </tbody>
										  </table>
										</div>
									</div>
								</div>
								<br /><br />
				        	</div>
			          	</div>
		        	</div>
		    	</div> 
			</div>
		</fieldset>
	</div>
</div>
<!-- Content Ends -->
</body>
</html>