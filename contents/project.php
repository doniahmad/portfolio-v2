<?php
$featured_project = array_filter($data_projects, function ($var) {
    return ($var['featured_project'] == 1);
});

$non_featured = array_filter($data_projects, function ($var) {
    return ($var['featured_project'] == 0);
});
?>

<section id="project">
    <div class="content-container">
        <h1 class="section-title"><span>02. </span>Project</h1>
        <div class="featured-project">
            <?php foreach ($featured_project as $ft_item) : ?>
                <div class="item">
                    <div class="content">
                        <div class="project-type">Futured Project</div>
                        <h1 class="project-title"><?= $ft_item['nama_project'] ?></h1>
                        <div class="project-desc">
                            <?= $ft_item['desc_project']  ?>
                        </div>
                        <ul class="project-tech-list">
                            <?php
                            $tech_used = json_decode($ft_item['tech_used']);
                            foreach ($tech_used as $list) : ?>
                                <li>
                                    <?= $list ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="project-link">
                            <?php if (!empty($ft_item['link_github'])) : ?>
                                <a href="<?= $ft_item['link_github'] ?>" class="link-github" aria-label="GitHub" target="_blank">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($ft_item['link_url'])) : ?>
                                <a href="<?= $ft_item['link_url'] ?>" class="link-url" aria-label="External Url" target="_blank">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="project-img">
                        <div class="project-img-container">
                            <div class="img-cover">
                            </div>
                            <img src="<?= "/portfolio-v2/storage/" . $ft_item['img_project'] ?>" alt="">
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="another-project">
            <div class="another-project-title">
                <div class="another-project-line"></div>
                <div class="the-text">Beberapa Project Lain</div>
                <div class="another-project-line"></div>
            </div>
            <div class="content">
                <?php foreach ($non_featured as $bs_item) : ?>
                    <div class="item">
                        <div class="project-link">
                            <?php if (!empty($bs_item['link_url'])) : ?>
                                <a href="<?= $bs_item['link_url'] ?>" class="link-url" aria-label="External Url" target="_blank">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($bs_item['link_github'])) : ?>
                                <a href="<?= $bs_item['link_github'] ?>" class="link-github" aria-label="GitHub" target="_blank">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                        <h1 class="project-title">
                            <?= $bs_item['nama_project'] ?>
                        </h1>
                        <p class="project-desc">
                            <?= $bs_item['desc_project']  ?>
                        </p>
                        <ul class="project-tech-list">
                            <?php
                            $tech_used = json_decode($bs_item['tech_used']);
                            foreach ($tech_used as $list) : ?>
                                <li>
                                    <?= $list ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach ?>
            </div>
            <!-- <div class="showmore-btn">Show More</div> -->
        </div>
    </div>
</section>