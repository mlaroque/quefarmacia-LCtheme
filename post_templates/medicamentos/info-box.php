<?php

global $med_info;

?>

                    <p><b>¿Para qué Sirve?</b>:
                        <?php echo $med_info["mt"][0]["quefarma_med_para_que_es"][0];?></p>
                    <p><b>Fórmula:</b> <?php echo $med_info["mt"][0]["quefarma_med_formula"][0];?></p>
                    <p><b>¿Qué es?</b>: <?php echo $med_info["mt"][0]["quefarma_med_tipo"][0];?> </p>
                    <p><b>Presentaciones</b>:
                        <?php echo $med_info["mt"][0]["quefarma_med_presentaciones"][0];?></p>
                    <p><b class="azul capit"><?php echo $med_info["mt"][0]["med_patente_generico"][0];?>
                            - Venta <?php echo $med_info["mt"][0]["quefarma_med_venta"][0];?></b></p>
                    <p><b>Riesgos en Embarazo</b>: <?php echo $med_info["mt"][0]["med_riesgo_embarazo"][0];?>
                    </p>
                    <p><b>Riesgos en Lactancia</b>:
                        <?php echo $med_info["mt"][0]["med_riesgo_lactancia"][0];?></p>
                    <p><b>Riesgos con Alcohol</b>: <?php echo $med_info["mt"][0]["med_riesgo_alcohol"][0];?>
                    </p>
