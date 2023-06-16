<?php
                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                        $date = getdate();
                        $weekdate = $date['weekday'];
                        $hour = $date['hours'];
                        if($weekdate=="Monday"||$weekdate=="Wednesday"||$weekdate=="Friday"){
                            if($hour>=10&&$hour<24){?>
                                <p class="food-price"><?php echo $r['price']/2; ?> VND</p>
                                <p class="food-price"><del><?php echo $r['price']; ?></del> VND</p>
                            <?php }
                            else{?>
                                <p class="food-price"><?php echo $r['price']; ?> VND</p><?php
                            }
                        }
                        else {?>
                            <p class="food-price"><?php echo $r['price']; ?> VND</p><?php
                        }
?>