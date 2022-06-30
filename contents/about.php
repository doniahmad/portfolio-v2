<section id="about">
    <div class="content-container">
        <div class="about-container">
            <div class="left-side">
                <div class="about-img">
                    <div class="img-cover">
                    </div>
                    <img src="./storage/<?= $data_setting['about_img'] ?>" alt="">
                </div>
                <div class="about-img acc">
                </div>
            </div>
            <div class="right-side">
                <h1 class="section-title">
                    <span>01. </span>Siapa Aku ?
                </h1>
                <p>
                    <?= $data_setting['about_desc'] ?>
                </p>
                <p>Saat ini ada beberapa keahlian yang aku mengerti, baik yang berhubungan dengan pengembangan website atau pun yang lain.</p>
                <p>
                    Dibawah adalah hal - hal yang aku mengerti :
                </p>
                <div class="list-skill">
                    <?php foreach ($data_skills as $item) : ?>
                        <div class="item">
                            <i class="fa-solid fa-caret-right"></i>
                            <?= $item['nama_skill']  ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>