<?php

if (isset($_POST['request'])) {
    sleep(1);
    include('../db_connection.php');
    $request = $_POST['request'];

    $query = "SELECT distinct db_product.id, db_product.name, db_product.quantity 
                from db_product 
                INNER JOIN db_category 
                ON db_category.id = db_product.db_category_id 
                WHERE db_category.name = '$request';";

    $result = mysqli_query($conn, $query);
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
                    <th>Salvar</th>
                </tr>
            <?php
        } else {
            echo "Desculpe, nenhum produto encontrado";
        }
            ?>
            </thead>
            <tbody>
                <?php
                //sleep(1);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td id="id-<?php echo $row["id"] ?>"><?php echo $row["id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><input id="entrada-<?php echo $row["id"] ?>" type='number' placeholder="0"></td>
                        <td><input id="venda-<?php echo $row["id"] ?>" type='number' placeholder="0"></td>
                        <td><input id="consumo-<?php echo $row["id"] ?>" type='number' placeholder="0"></td>
                        <td><input id="perda-<?php echo $row["id"] ?>" type='number' placeholder="0"></td>
                        <td>
                            <div id="quantity-<?php echo $row["id"] ?>">
                                <?php echo $row["quantity"] ?>
                            </div>
                        </td>
                        <td>
                            <div>
                                <button class="button-save" id='<?php echo $row["id"] ?>'>Salvar</button>
                            </div>
                        </td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
    </table>


<?php
}
?>
<script src="./produtos/script_produtos.js"></script>