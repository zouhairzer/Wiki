<?php foreach ($results as $row):?>
			<article class="postcard light green">
				<a class="postcard__img_link" href="?route=homeMoreInfo">
					<img class="postcard__img" src="../../<?= $row['image'];?>" alt="Image Title" />
				</a>
				<div class="postcard__text t-dark">
					<h3 class="postcard__title green"><?= $row['titre'];?></h3>
					<div class="postcard__subtitle small">
						<time datetime="2020-05-25 12:00:00">
							<i class="fas fa-calendar-alt mr-2"></i>
						</time>
					</div>
					<div class="postcard__preview-txt"><?= $row['description'];?></div>
					<ul class="postcard__tagbox">
						<li class="tag__item"><i class="fas fa-tag mr-2"></i><?= $row['date'];?></li>
					</ul>
				</div>
			</article>
			<?php endforeach; ?>