<div class="container">

    <div>
        <div>
            <h1 class="text-danger text-center">testing...f</h1>

            <?php
            foreach ($results as $data)
            {?>
            <table>
            <tr>

                <td><?php  echo $data->PBI_ID; ?></td>
                <td><?php  echo $data->designation; ?></td>
                <?php } ?>
            </tr>
            </table>
        </div>
    </div>
</div>