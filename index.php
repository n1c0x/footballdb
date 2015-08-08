<?php include("header.php");?>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			<div class="accordion" id="accordion2"><!-- 
				********************************************************************
				********************************************************************
				********************************************************************
				## # # ## ########  ##     ## ##    ##  ######   ######## ##    ## 
				##     ## ##     ## ##     ## ###   ## ##    ##  ##       ###   ## 
				##     ## ##     ## ##     ## ####  ## ##        ##       ####  ## 
				##     ## ########  ##     ## ## ## ## ##   #### ######   ## ## ## 
				##     ## ##     ## ##     ## ##  #### ##    ##  ##       ##  #### 
				##     ## ##     ## ##     ## ##   ### ##    ##  ##       ##   ### 
				 #######  ########   #######  ##    ##  ######   ######## ##    ##
				********************************************************************
				********************************************************************
				********************************************************************
			--><div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							<strong>&Uuml;bungen</strong>
						</a>
					</div> <!-- End of accordion-heading -->
					<div id="collapseOne" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="unstyled">
								<li><a href = "?page=1&art=uebungen" id="neu">Hinzuf&uuml;gen</a></li>
								<!-- <li><a href = "/functions/hinzufuegen.php?art=uebungen" id="neu">Hinzuf&uuml;gen</a></li> -->
								<li><a href = "?page=2&art=uebungen">&Uuml;bersicht</a></li>
								<li><a href = "?page=3&art=uebungen&status=formular">Suchen</a></li>
							</ul>
						</div> <!-- End of accordion-inner -->
					</div> <!-- End of collapseOne -->
				</div> <!-- End of accordion-group --><!-- 

				**************************************************************
				**************************************************************
				**************************************************************
				 ######  ########  #### ######## ##       ######## ########  
				##    ## ##     ##  ##  ##       ##       ##       ##     ## 
				##       ##     ##  ##  ##       ##       ##       ##     ## 
				 ######  ########   ##  ######   ##       ######   ########  
				      ## ##         ##  ##       ##       ##       ##   ##   
				##    ## ##         ##  ##       ##       ##       ##    ##  
				 ######  ##        #### ######## ######## ######## ##     ##
				**************************************************************
				**************************************************************
				**************************************************************
			-->	<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
							<strong>Spieler</strong>
						</a>
					</div> <!-- End of accordion-heading -->
					<div id="collapseTwo" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="unstyled">
								<li><a href = "?page=1&art=spieler" id="neu">Hinzuf&uuml;gen</a></li>
								<li><a href = "?page=2&art=spieler">&Uuml;bersicht</a></li>
								<li><a href = "?page=3&art=spieler&status=formular">Suchen</a></li>
							</ul>
						</div> <!-- End of accordion-inner -->
					</div> <!-- End of collapseTwo -->
				</div> <!-- End of accordion-group --><!-- 

				****************************************************
				****************************************************
				****************************************************
				 ######  ########  #### ######## ##       ######## 
				##    ## ##     ##  ##  ##       ##       ##       
				##       ##     ##  ##  ##       ##       ##       
				 ######  ########   ##  ######   ##       ######   
				      ## ##         ##  ##       ##       ##       
				##    ## ##         ##  ##       ##       ##       
				 ######  ##        #### ######## ######## ########
				****************************************************
				****************************************************
				****************************************************
			-->	<?php 
					$sql = "SELECT count(*) FROM spiele";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_all($result);
		            $row_ligaspiel = mysqli_fetch_all(mysqli_query($con,"SELECT count(*) FROM spiele WHERE spielart=1"));
		            $row_testspiel = mysqli_fetch_all(mysqli_query($con,"SELECT count(*) FROM spiele WHERE spielart=2"));
		            $row_pokalspiel = mysqli_fetch_all(mysqli_query($con,"SELECT count(*) FROM spiele WHERE spielart=3"));
        		?>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
							<strong>Spiele</strong>
						</a>
					</div> <!-- End of accordion-heading -->
					<div id="collapseThree" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="unstyled">
								<li><a href = "?page=1&art=spiele" id="neu">Hinzuf&uuml;gen</a></li>
								<li><a href = "?page=2&art=spiele">&Uuml;bersicht</a></li>
								
								<div class="accordion" id="accordion3">
									<div class="accordion-group">
										<div class="accordion-heading">
								    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseThreeOne">
								        		Ligaspiele
								      		</a>
								    	</div> <!-- End of accordion-heading -->
								    	<div id="collapseThreeOne" class="accordion-body collapse">
								      		<div class="accordion-inner">
								      			<ul>
									       			<?php
							                            date_default_timezone_set('Europe/Berlin');
							                            $sql2 = "SELECT ID, datum FROM spiele WHERE spielart=1 ORDER BY datum";
							                            $result2 = mysqli_query($con,$sql2);
							                            while($row2 = mysqli_fetch_array($result2)){
							                                $date = date("d-m-Y",$row2[1]);
							                                echo '<li><a href="functions/anzeigen.php?art=spiele&cat=all&id='.$row2[0].'" target=_blank>'.$date."</a></li>";
							                            }
							                        ?>
						                    	</ul>
								      		</div> <!-- End of accordion-inner -->
								    	</div> <!-- End of collapseThreeOne -->
								  	</div> <!-- End of accordion-group -->
									<div class="accordion-group">
									    <div class="accordion-heading">
									    	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseThreeTwo">
									        	Testspiele
									    	</a>
									    </div> <!-- End of accordion-inner -->
									    <div id="collapseThreeTwo" class="accordion-body collapse">
									    	<div class="accordion-inner">
									        	<ul>
									       			<?php
							                            date_default_timezone_set('Europe/Berlin');
							                            $sql2 = "SELECT ID, datum FROM spiele WHERE spielart=2 ORDER BY datum";
							                            $result2 = mysqli_query($con,$sql2);
							                            while($row2 = mysqli_fetch_array($result2)){
							                                $date = date("d-m-Y",$row2[1]);
							                                echo '<li><a href="functions/anzeigen.php?art=spiele&cat=all&id='.$row2[0].'" target=_blank>'.$date."</a></li>";
							                            }
							                        ?>
						                    	</ul>
									      	</div> <!-- End of accordion-inner -->
									    </div> <!-- End of collapseThreeTwo -->
									</div> <!-- End of accordion-group -->
									<div class="accordion-group">
									    <div class="accordion-heading">
									    	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseThreeThree">
									        	Pokalspiele
									    	</a>
									    </div> <!-- End of accordion-inner -->
									    <div id="collapseThreeThree" class="accordion-body collapse">
									    	<div class="accordion-inner">
									        	<ul>
									       			<?php
							                            date_default_timezone_set('Europe/Berlin');
							                            $sql2 = "SELECT ID, datum FROM spiele WHERE spielart=3 ORDER BY datum";
							                            $result2 = mysqli_query($con,$sql2);
							                            while($row2 = mysqli_fetch_array($result2)){
							                                $date = date("d-m-Y",$row2[1]);
							                                echo '<li><a href="functions/anzeigen.php?art=spiele&cat=all&id='.$row2[0].'" target=_blank>'.$date."</a></li>";
							                            }
							                        ?>
						                    	</ul>
									      	</div> <!-- End of accordion-inner -->
									    </div> <!-- End of collapseThreeTwo -->
									</div> <!-- End of accordion-group -->
								</div> <!-- End of accordion -->

							</ul> <!-- End of unstyled -->
						</div> <!-- End of accordion-inner -->
					</div> <!-- End of collapseOne -->
				</div> <!-- End of accordion-group --><!-- 

				************************************************************************
				************************************************************************
				************************************************************************
				######## ##     ## ########  ##    ## #### ######## ########  ######## 
				   ##    ##     ## ##     ## ###   ##  ##  ##       ##     ## ##       
				   ##    ##     ## ##     ## ####  ##  ##  ##       ##     ## ##       
				   ##    ##     ## ########  ## ## ##  ##  ######   ########  ######   
				   ##    ##     ## ##   ##   ##  ####  ##  ##       ##   ##   ##       
				   ##    ##     ## ##    ##  ##   ###  ##  ##       ##    ##  ##       
				   ##     #######  ##     ## ##    ## #### ######## ##     ## ########   
				************************************************************************
				************************************************************************
				************************************************************************
			-->	<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" href="?page=7">
							<strong>Turniere</strong>
						</a>
					</div> <!-- End of accordion-heading -->
				</div> <!-- End of accordion-group --><!-- 

				*********************************************************************************************************************
				*********************************************************************************************************************
				*********************************************************************************************************************
				######## #### ##    ##  ######  ######## ######## ##       ##       ##     ## ##    ##  ######   ######## ##    ## 
				##        ##  ###   ## ##    ##    ##    ##       ##       ##       ##     ## ###   ## ##    ##  ##       ###   ## 
				##        ##  ####  ## ##          ##    ##       ##       ##       ##     ## ####  ## ##        ##       ####  ## 
				######    ##  ## ## ##  ######     ##    ######   ##       ##       ##     ## ## ## ## ##   #### ######   ## ## ## 
				##        ##  ##  ####       ##    ##    ##       ##       ##       ##     ## ##  #### ##    ##  ##       ##  #### 
				##        ##  ##   ### ##    ##    ##    ##       ##       ##       ##     ## ##   ### ##    ##  ##       ##   ### 
				######## #### ##    ##  ######     ##    ######## ######## ########  #######  ##    ##  ######   ######## ##    ##   
				*********************************************************************************************************************
				*********************************************************************************************************************
				*********************************************************************************************************************
			-->	<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" href="?page=4">
							<strong>Einstellungen</strong>
						</a>
					</div> <!-- End of accordion-heading -->
				</div> <!-- End of accordion-group --><!-- 

				********************************************************************
				********************************************************************
				********************************************************************
				######## ########     ###    #### ##    ## #### ##    ##  ######   
				   ##    ##     ##   ## ##    ##  ###   ##  ##  ###   ## ##    ##  
				   ##    ##     ##  ##   ##   ##  ####  ##  ##  ####  ## ##        
				   ##    ########  ##     ##  ##  ## ## ##  ##  ## ## ## ##   #### 
				   ##    ##   ##   #########  ##  ##  ####  ##  ##  #### ##    ##  
				   ##    ##    ##  ##     ##  ##  ##   ###  ##  ##   ### ##    ##  
				   ##    ##     ## ##     ## #### ##    ## #### ##    ##  ######   
				********************************************************************
				********************************************************************
				********************************************************************
			-->	<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">
							<strong>Training</strong>
						</a>
					</div> <!-- End of accordion-heading -->
					<div id="collapseSix" class="accordion-body collapse">
						<div class="accordion-inner">
							<ul class="unstyled">
								<li><a href = "?page=1&art=training" id="neu">Hinzuf&uuml;gen</a></li>
								<li><a href = "?page=2&art=training">&Uuml;bersicht</a></li>
								<li><a href = "?page=3&art=training&status=formular">Suchen</a></li>
							</ul>
						</div> <!-- End of accordion-inner -->
					</div> <!-- End of collapseOne -->
				</div> <!-- End of accordion-group -->
			</div> <!-- End of accordion -->

		</div> <!-- End of span2 -->
		<div class="span9">
			<?php
			if(isset($_GET["page"])){
				switch ($_GET["page"]) {
					case '1':
						include("functions/hinzufuegen.php");
						break;
					case '2':
						include("functions/uebersicht.php");
						break;
					case '3':
						include("functions/suchen.php");
						break;
					case '4':
						include("einstellungen/index.php");
						break;
					case '5';
						include("functions/aendern.php");
						break;
					case '6';
						include("functions/anzeigen.php");
						break;
					case '7';
						include("turniere/index.php");
						break;
					default:
						break;
				}
			}
			?>
		</div> <!-- End of span9 -->
	</div> <!-- End of row-fluid -->
</div> <!-- End of container-fluid -->

<?php include("footer.php") ?>