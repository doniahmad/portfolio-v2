<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['id'])) {
        $data_input = ['id' => $_POST['id']];
        curl_delete('/project.php?id=' . $data_input['id']);
    }

    header('Refresh:0');
}

?>

<div id="dashboard-project">
    <div class="top">
        <h2>Project</h2>
        <a href="<?= $path . "?page=add-project" ?>">
            <button type="button" class="btn btn-success new-project ms-auto">Tambah Project</button>
        </a>
        <hr>
    </div>
    <div class="list-project">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Project</th>
                    <th scope="col">Featured Project</th>
                    <th scope="col">Link Github</th>
                    <th scope="col">Link Web</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_projects as $item) : ?>
                    <tr>
                        <td class="img-project"><img src="<?= "/portfolio-v2/storage/" . $item['img_project'] ?>" alt=""></td>
                        <td><?= $item['nama_project'] ?></td>
                        <?php if ($item['featured_project']) : ?>
                            <td class="featured-condition"><i class="fa-solid fa-check check"></i></td>
                        <?php else : ?>
                            <td class="featured-condition"><i class="fa-solid fa-xmark xmark"></i></td>
                        <?php endif; ?>
                        <td><?= $item['link_github'] ?></td>
                        <td><?= $item['link_url'] ?></td>
                        <td class="d-flex">
                            <a href="<?= $path . "?page=add-project&id=" . $item['id'] ?>">
                                <button type="button" class="btn btn-primary mx-1"><i class="fa-solid fa-pencil"></i></button>
                            </a>
                            <form action="" method="POST">
                                <input type="hidden" name="id" id="id" value="<?= $item['id'] ?>">
                                <button type="submit" class="btn btn-danger mx-1"><i class="fa-solid fa-xmark"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>