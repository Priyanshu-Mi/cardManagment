<?php 
    include('classes/card.php');
    include 'inc/header.php';
    include 'inc/sidebar.php';

    $card = new CardDetail();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertCard = $card->cardInsert($_POST);
    }
     
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Card Details</h2>
               <div class="block copyblock"> 
                <?php
                if (isset($insertCard)) {
                    echo "$insertCard";
                }
                ?>
                 <form action="cardadd.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="cardName" placeholder="Enter Card Name..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="text" name="cardNumber" placeholder="Enter CardNumber" class="medium" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <input type="text" name="CardHolder" placeholder="Enter CardHolderName" class="medium" />
                            </td>
                        </tr>

						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>