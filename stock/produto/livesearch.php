<?php

include("../db_connection.php");

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $query = "SELECT * FROM db_product WHERE name LIKE '{$input}%' or id ='{$input}%'  LIMIT 10;";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) { ?>

        <table class="table" id='customers'>
            <?php

            ?>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                </tr>

            </thead>
            <tbody>
                <?php
                //sleep(1);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td id="id-<?php echo $row["id"] ?>"><?php echo $row["id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>

<?php
    } else {
        echo "<h6>Nenhum produto encontrado</h6>";
    }
}

?>