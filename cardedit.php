<?php 
    include('classes/card.php');
    include 'inc/header.php';
    include 'inc/sidebar.php';


    if (!isset($_GET['cardId']) || $_GET['cardId'] == NULL) {
        echo "<script>window.location = 'cardlist.php'; </script>";
    }else{
        $id = $_GET['cardId'];
    }

    $card = new CardDetail();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $updateCardDetails = $card->cardUpdate($_POST, $id);
    }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update CardDetails</h2>
       <div class="block copyblock"> 
        <?php
        if (isset($updateCardDetails)) {
            echo $updateCardDetails;
        }

        $getcard = $card->getCardById($id);
        if ($getcard) {
            while ($result = $getcard->fetch_assoc()) {
        ?>
         <form action="" method="POST">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" name="cardName" value="<?php echo $result['cardName'] ?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="text" name="cardNumber" value="<?php echo $result['cardNumber'] ?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="text" name="CardHolder" value="<?php echo $result['CardHolder'] ?>" class="medium" />
                    </td>
                </tr>


				<tr> 
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
            <?php } } ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>