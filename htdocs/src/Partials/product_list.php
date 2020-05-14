
<?php ###################################### Affiche La liste des produits ###########################################

function productDisplay ($products){
         for ($i=0; $i < count($products) ; $i++) { 

?>

        <div data-product-id='<?= $products[$i]["id"] ?>' id="div-product" class=" div-product border row m-0 p-4 "  data-toggle="modal" data-target=".bd-example-modal-xl">
                
                <div class="col-2 d-flex align-items-center justify-content-center m-0 p-0 ">
                     <div class = "product-img">
                         <img src="<?=$products[$i]['thumbnail']?>">
                     </div>

                </div>
             
                <div class="col-8 text-left "> 


                    <h4 class="title"><?=$products[$i]['name']?></h4><br>
            
            
                    <p class="summary "><?=$products[$i]['summary']?></p>         
                    <hr>
                    <div  class="d-flex justify-content-around link_product">
                        <div class=" website" >
                            <img src="public/images/icons/website-link.png"></img>
                            <a href ='<?=$products[$i]['website']?>'>website</a>
                        </div>
                        <div class=" comment">
                            <p><?=$products[$i]['comments_count']?>
                            <img src="public/images/icons/comments.png"></img>
                            </p>
                        </div>
                    </div>
                </div>
            
                <div class="col-2 d-flex align-items-center justify-content-center">

                    <div class="up-vote border">
                    <button type="button" class="btn btn-outline-light" id="btn_upVote">
                        <img src="public/images/icons/upvote.png"></img>
                        <h4 class="text-dark"><?=$products[$i]['votes_count']?></h4>
                    </button>
                    </div>

                </div>
            </a>
        </div>
 
<?php  
        }//Fermeture FOR
    } //Fermeture Fonction
?>


<?php
    
    
    if ((isset($_POST['catégorie_list']) ) == null){
        if (isset($_POST['orderBy']) == null || $_POST['orderBy'] === 'default'){
            echo 'default';
            $products = $producthunt_api->getProductsCollection(10);
            productDisplay ($products);
        }

        else if (isset($_POST['orderBy']) && $_POST['orderBy'] === 'catégorie'){ 
           $categorie = $producthunt_api->getCategories();
            for ($i=0; $i < count($categorie) ; $i++) { 
                echo '<h4>'."Catégorie : ".$categorie[$i]['name'].'</h4>';
                echo '<br>';

                $products = $producthunt_api->getProductsCollection($categorie[$i]['category_id']);

                    productDisplay ($products);
            }
        }
        else if (isset($_POST['orderBy']) && $_POST['orderBy'] === 'created_at'){ 
            $products = $producthunt_api->getFreshProducts(10);
            productDisplay ($products);
        }
        else if (isset($_POST['orderBy']) && $_POST['orderBy'] === 'up_vote') {
            $products = $producthunt_api->getPopularProducts(10);
            productDisplay ($products);
        }
    }else{
         if (isset($_POST['catégorie_list']) ) {
           
            $categorie = $producthunt_api->getCategory($_POST['catégorie_list']);
            $products = $producthunt_api->getProductsCollection($categorie['category_id']);
            productDisplay ($products);
                
        }
    }

?>


<!--productModal-->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
   
    </div>
  </div>
</div>
