<?php
//sleep(1);

if (isset($_POST['request'])) {

    $request = $_POST['request'];

    $con = mysqli_connect("localhost", "root", "76718244", "mydb");

    $query = "SELECT distinct db_product.id, db_product.name, db_product.quantity 
                from db_product 
                INNER JOIN db_category 
                ON db_category.id = db_product.db_category_id 
                WHERE db_category.name = '$request';";

    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);

?>

    <table class="table" id='customers'>
        <?php
        if ($count) {
        ?>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Produto</th>
                    <th>Entrada</th>
                    <th>Venda</th>
                    <th>Consumo</th>
                    <th>Perda</th>
                    <th>Em estoque</th>
                </tr>
            <?php
        } else {
            echo "Sorry, no record found";
        }
            ?>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td> <?php echo $row["id"] ?></td>
                        <td><a href="http://www.google.com"><?php echo $row["name"] ?></a></td>
                        <td><input type='text' placeholder='0'></td>
                        <td><input type='text' placeholder='0'></td>
                        <td><input type='text' placeholder='0'></td>
                        <td><input type='text' placeholder='0'></td>
                        <td><?php echo $row["quantity"] ?><button type='submit'>Salvar</button></td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
    </table>

<?php
}
?>