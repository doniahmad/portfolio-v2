<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['nama_skill']) && !empty($_POST['id'])) {
        curl_delete('/skill.php?id=' . $_POST['id']);
    } else {
        $data_input = [
            'nama_skill' => $_POST['nama_skill'],
        ];

        if (!empty($_POST['id'])) {
            $data_input += ['id' => $_POST['id']];
            curl_post($data_input, '/skill.php?id=' . $data_input['id']);
        } else {
            curl_post($data_input, '/skill.php');
        }
    }

    header('Refresh:0');
}

?>
<div id="dashboard-skill">
    <div class="top">
        <h2>Skill</h2>
        <hr>
    </div>
    <div class="list-skill">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Skil</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_skills as $item) : ?>
                    <tr>
                        <td class="form_update_skill" style="display: none;">
                            <form action="" method="POST" class="d-flex">
                                <input type="hidden" name="id" id="id" value="<?= $item['id'] ?>">
                                <input type="text" class="form-control" id="nama_skill" name="nama_skill" value="<?= $item['nama_skill'] ?>">
                                <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                            </form>
                        </td>
                        <td class="skill_name" style="display: table-cell;"><?= $item['nama_skill'] ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary" onclick="showUpdate(this)"><i class="fa-solid fa-pencil"></i></button>
                            <form action="" method="POST" style="display: inline;">
                                <input type="hidden" name="id" id="id" value="<?= $item['id'] ?>">
                                <button type="submit" class="btn btn-danger" style=" border-radius:5px;"><i class="fa-solid fa-xmark"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form action="" method="POST" class="d-flex">
            <input type="text" class="form-control" id="nama_skill" name="nama_skill">
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-plus"></i></button>
        </form>
    </div>
</div>