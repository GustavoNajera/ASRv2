<section>
    <div class="container">    

        <div class="col s12 m7">
            <ul class="collapsible popout">
                <?php
                    $first = true;
                    foreach($listInfoGeneral as $infoGeneral): 
                        if($first){
                            $first =  false;
                ?>
                            <li class="active">
                <?php
                       }else{
                            echo '<li>';
                        }
                ?>
                    
                        <div class="collapsible-header"><i class="material-icons">filter_drama</i> <?= $infoGeneral["nombre"] ?> </div>
                        <div class="collapsible-body"><span><?= $infoGeneral["descripcion"] ?></span></div>
                    </li>
                
                <?php endforeach; ?>
            </ul>
        </div>    
    </div>
</section>
<!-- End Fun Facts Section -->