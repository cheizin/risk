<script>


var current_url ="http://cmasrv13/prmis/pages/risk-management/view-risks.php";

var result= current_url.split('/');
var Param = result[result.length-3];alert(Param);
</script>



//<?php
                    $(".risk_description").keyup(function (event) {
                        if (event.keyCode == 13) {
                            textboxes = $("input.risk_description");
                            currentBoxNumber = textboxes.index(this);
                            if (textboxes[currentBoxNumber + 1] != null) {
                                nextBox = textboxes[currentBoxNumber + 1];
                                nextBox.focus();
                                nextBox.select();
                            }
                            event.preventDefault();
                            return false;
                        }
                    });
                    ?>
                    */
