<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="./public/css/style.css">
            <title>Product Hunt</title>
            
</head>
<body> 
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
		
			<a class="navbar-brand" href="index.php">
			<img src="./public/images/icons/icon_Product_Hunt.png" >
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

		
            
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
			<?php if (isset($_COOKIE['user_name'])){?>
                    
            	  	<div class="col-7 ml-5 pl-5 justify-content-center">
						
					 	 <form class="form-inline">
            	          <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            	          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						</form> 
						
					</div>

					<div class="col-5 justify-content-center">
						<form method="post" action="index.php">
            	    	    <div class="form-group ">
            	    	        <select class="form-control form-control-sm " name="orderBy">
								  <option value="default">Trié par</option>
								  <option value="catégorie">Catégorie</option>
								  <option value="created_at">Date</option>
								  <option value="up_vote">Les mieux votés</option>
								</select>
								<button type="submit">Trier</button>
							</div>
						</form>
            	    </div>
				 

			<?php }?>
            </div>
		
		

            <div class="collapse navbar-collapse m-0 justify-content-end " id="navbarSupportedContent">
              	<div class="align-items-end flex-column">
				  <?php if (isset($_COOKIE['user_name'])){?>
                      <a class="nav-link" href="../src/Partials/index_logout.php" ><h4>Deconnexion</h4></a>
                    <?php } ?>
            	</div>  
			</div>            
		 
        
        </nav>    
    </header>