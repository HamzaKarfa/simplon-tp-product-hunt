<?php
    
    $categorie = $producthunt_api->getCategories();
    //echo $categorie[0]['name'];

        if (isset($_POST['orderBy']) && $_POST['orderBy'] === 'catégorie'){ 
        
           
            for ($i=0; $i < count($categorie) ; $i++) { 
                echo $categorie[$i]['category_id'];

                echo '<br>';
                echo ($producthunt_api->getFreshProducts()[$i]['summary']);
                echo '<br>';

                if ($product['summary'] === ($producthunt_api->getFreshProducts($i)[$i]['summary'])){
                    echo('<h3>'.$product['name'].'</h3>');
                    $products = $producthunt_api->getFreshProducts($i);
                }
                //getProductCollection(catégory id)
                
            }
            
            
            
        } else {$products = $producthunt_api->getFreshProducts(10);
?>


<!--productModal-->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
   
    </div>
  </div>
</div>

<?php ###################################### Affiche La liste des produits ###########################################

 
    for ($i=0; $i <count($products) ; $i++) { ?>

        <div data-product-id='<?= $products[$i]["id"] ?>' id="div-product" class="row  m-0">
            
            <div class="col-2 d-flex align-items-center justify-content-center product-img ">
                <a  class="btn" data-toggle="modal" data-target=".bd-example-modal-xl">
                    <img src="<?=$products[$i]['thumbnail']?>">
                </a> 
            </div>
    
            <div class="col-8  mt-3 text-left ">
                <a  class="modalButton" data-toggle="modal" data-target=".bd-example-modal-xl">
                    <h4 class="title"><?=$products[$i]['name']?></h4><br>
                </a>
    
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
              
        </div>
    <hr>
        
    
<?php } } ?>