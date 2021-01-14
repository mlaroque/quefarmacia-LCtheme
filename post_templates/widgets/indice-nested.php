<?php global $purified_content, $post; ?>


          <div class="indice shadow">
                  <p><b>Índice</b></p>      
                    <ol>
                       <?php

                        //Almacenamos todos los tags h en una tabla
                       $matches_h_arr = array();
                        preg_match_all('/<h(.*?)<\/h/s', $post->post_content, $matches_global, PREG_PATTERN_ORDER);
                        foreach($matches_global[1] as $matchh3){
                          array_push($matches_h_arr, $matchh3);
                        }

                        //De la tabla, mostramos primero los h3 que están antes del primer h2
                          foreach ($matches_h_arr as $match_first_h3) :
                            if($match_first_h3[0] === "2"){
                              break;
                            }
                            if(strpos($match_first_h3[0],"recio") === false):
                        ?>
                          <li><a href="#<?php echo strtolower(urlencode(substr($match_first_h3, 2)));?>"><?php echo substr($match_first_h3, 2);?></a></li>

                        <?php endif; endforeach;

                        //Buscamos todos los h2
                          $matches_arr = array();
                          preg_match_all('~h2\>(.+?)</h2~', $post->post_content, $matches, PREG_PATTERN_ORDER);
                          
                          foreach($matches[1] as $matchh2):

                          $h2_id_href = strtolower(urlencode($matchh2));

                          //En el caso de medicamentos y remedios cambiamos el id
                          if(strpos($matchh2,"Medicamentos") !== false){
                            $h2_id_href = "medicamentos";
                          }else if(strpos($matchh2,"Homeo") !== false){
                            $h2_id_href = "homeopatia";
                          }else if(strpos($matchh2,"Remedios") !== false){
                            $h2_id_href = "remedios-naturales";
                          }
                            if(strpos($matchh2,"recio") === false):
                      ?> 
                      <li>
                        <a href="#<?php echo $h2_id_href;?>"><?php echo $matchh2;?></a>
                        <ul>
                        <?php

                        //Buscamos todos los h3 dentro de los h2
                        preg_match('/' . str_replace("?","\?",str_replace(" ", ".", $matchh2))  . '<\/h2>(.+?)<h2>/sx', $post->post_content, $matches7);

                        preg_match_all('~h3\>(.+?)</h3~', $matches7[0], $matches, PREG_PATTERN_ORDER);
                        
                        foreach($matches[1] as $matchh3):
                          array_push($matches_arr, $matchh3);

                        if(strpos($matchh3,"y precios:") !== false){
                            $matchh3 = str_replace("y precios:", "", $matchh3);
                        }
                      ?> 
                        <li>
                          <a href="#<?php echo strtolower(urlencode($matchh3));?>"><?php echo $matchh3;?></a>
                        </li>
                      <?php endforeach; ?>
                        </ul>

                      </li>
                      <?php endif; endforeach; ?>
                          <?php
                          //Mostramos ahora los h3 que están después de los h2 poniendo una variable detectando el primer h2 y luego analizando la tabla de h3 ya mostrados
                            $before_h2 = true;
                          foreach ($matches_h_arr as $match_first_h3) :
                            if($match_first_h3[0] === "2"){
                              $before_h2 = false;
                              continue;
                            }else if($before_h2 || $match_first_h3[0] !== "3" || in_array(substr($match_first_h3, 2), $matches_arr)){
                              continue;
                            }

                        ?>
                          <li><a href="#<?php echo strtolower(urlencode(substr($match_first_h3, 2)));?>"><?php echo substr($match_first_h3, 2);?></a></li>
                         <?php endforeach; ?>
              </ol>
          </div>

          <?php $purified_content = preg_replace_callback("/<h2(.*?)>(.*?)(?=<\/h2>)/s","replace_with_ids", $purified_content);
          $purified_content = preg_replace_callback("/<h3(.*?)>(.*?)(?=<\/h3>)/s","replace_with_ids_h3", $purified_content); ?>
